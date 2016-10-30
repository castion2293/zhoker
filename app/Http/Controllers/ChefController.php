<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;

use App\Http\Requests;
use App\Http\Requests\MealCreateRequest;
use Auth;
use App\Chef;
use App\Meal;
use App\DateTimePeople;
use App\Category;
use App\Method;
use App\Shift;
use Purifier;
use Image;
use Storage;

class ChefController extends Controller
{
    public function __construct() {
        $this->middleware('chef');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->chef_id;
        $meals = Chef::find($id)->meals()->paginate(6);

        return view('desktop.chef.index', ['meals' => $meals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $methods = Method::all();
        $shifts = Shift::all();
        return view('desktop.chef.create', ['categories' => $categories, 'methods' => $methods, 'shifts' => $shifts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MealCreateRequest $request)
    {
        $meal = new Meal();
        
        $meal->chef_id = Auth::user()->chef_id;
        $meal->name = $request->input('name');
        $meal->price = $request->input('price');
        $meal->description = Purifier::clean($request->input('description'));

        // save the image
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            $s3 = Storage::disk('s3');
            $filePath = '/images/' . $filename;
            $s3->put($filePath, file_get_contents($image), 'public');

            $meal->img_path = 'https://s3-us-west-2.amazonaws.com/zhoker' . $filePath;
        }

        $meal->save();

        $dtp_array = explode(";", $request->datetimepeople);
        
        for($i=0; $i < count($dtp_array) - 1; $i++)
        {
            $datetimepeople = new DateTimePeople();
            
            $dpt_split_array = explode(",", $dtp_array[$i]);

            $datetimepeople->date = $dpt_split_array[0];
            $datetimepeople->time = $dpt_split_array[1];
            $datetimepeople->people_left = $dpt_split_array[2];
            $datetimepeople->meal()->associate($meal);

            $datetimepeople->save();
        }
        
        $meal->shifts()->sync($request->shifts, false);
        $meal->categories()->sync($request->categories, false);
        $meal->methods()->sync($request->methods, false);

        return redirect()->route('chef.show', $meal->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meal = Meal::find($id);
        return view('desktop.chef.show',['meal' => $meal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meal = Meal::find($id);
        
        $datetimepeoples = $meal->datetimepeoples()->get();
        $old_datetimepeople = "";
        foreach ($datetimepeoples as $datetimepeople) {
            $old_datetimepeople .= $datetimepeople->date . ',' . $datetimepeople->time . ',' . $datetimepeople->people_left . ';';
        }

        $shifts = Shift::all();
        $shiftarray = [];
        foreach($shifts as $shift) {
            $shiftarray[$shift->id] = $shift->shift;
        }

        $categories = Category::all();
        $categoryarray = [];
        foreach($categories as $category) {
            $categoryarray[$category->id] = $category->category;
        }

        $methods = Method::all();
        $methodarray = [];
        foreach($methods as $method) {
            $methodarray[$method->id] = $method->method;
        }
        
        return view('desktop.chef.edit', ['meal' => $meal, 'datetimepeople' => $old_datetimepeople, 'shifts' => $shiftarray, 'categories' => $categoryarray, 'methods' => $methodarray]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MealCreateRequest $request, $id)
    {
        $meal = meal::find($id);

        $meal->datetimepeoples()->delete();

        $meal->name = $request->input('name');
        $meal->price = $request->input('price');
        $meal->description = Purifier::clean($request->input('description'));

        if ($request->hasFile('img')) {

            $image = $request->file('img');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            $s3 = Storage::disk('s3');
            $filePath = '/images/' . $filename;
            $s3->put($filePath, file_get_contents($image), 'public');

            $leng = strlen('https://s3-us-west-2.amazonaws.com/zhoker');

            $oldFilename = $meal->img_path;
            $oldpath = substr($oldFilename, $leng);
            $s3->delete($oldpath);

            $meal->img_path = 'https://s3-us-west-2.amazonaws.com/zhoker' . $filePath;
        }

        $meal->save();

        $dtp_array = explode(";", $request->datetimepeople);
        
        for($i=0; $i < count($dtp_array) - 1; $i++)
        {
            $datetimepeople = new DateTimePeople();
            
            $dpt_split_array = explode(",", $dtp_array[$i]);

            $datetimepeople->date = $dpt_split_array[0];
            $datetimepeople->time = $dpt_split_array[1];
            $datetimepeople->people_left = $dpt_split_array[2];
            $datetimepeople->meal()->associate($meal);

            $datetimepeople->save();
        }

        $meal->shifts()->sync($request->shifts);
        $meal->categories()->sync($request->categories);
        $meal->methods()->sync($request->methods);

        return redirect()->route('chef.show', $meal->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meal = meal::find($id);

        $meal->datetimepeoples()->delete();
        $meal->shifts()->detach();
        $meal->categories()->detach();
        $meal->methods()->detach();

        $s3 = Storage::disk('s3');
        $leng = strlen('https://s3-us-west-2.amazonaws.com/zhoker');
        $Filename = $meal->img_path;
        $Filepath = substr($Filename, $leng);
        $s3->delete($Filepath);

        Storage::delete($meal->img_path);
        
        $meal->delete();

        return redirect()->route('chef.index');
    }
}
