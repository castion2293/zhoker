<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('desktop.chef.index');
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
            $location = public_path('images/'. $filename);
            Image::make( $image)->resize(800, 400)->save($location);

            $meal->img_path = $filename;
        }

        $meal->save();

        $datetimepeople = new DateTimePeople();

        $datetimepeople->date = $request->input('date');
        $datetimepeople->time = $request->input('time');
        $datetimepeople->people_left = $request->input('people');
        $datetimepeople->meal()->associate($meal);

        $datetimepeople->save();

        $meal->shifts()->sync($request->shifts, false);
        $meal->categories()->sync($request->categories, false);
        $meal->methods()->sync($request->methods, false);

        //echo('done');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getProfile()
    {
        return view('desktop.chef.profile');
    }
}
