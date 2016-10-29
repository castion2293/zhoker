<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;

use App\Http\Requests;
use App\Http\Requests\ChefProfileEditRequest;
use Auth;
use App\Chef;
use Purifier;
use Image;
use Storage;

class ChefProfileController extends Controller
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
        
        return redirect()->route('chef_profile.edit', $id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chef = Chef::find($id);

        return view('desktop.chef.edit_profile', ['chef' => $chef]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChefProfileEditRequest $request, $id)
    {
        $chef = Chef::find($id);

        $chef->address = $request->input('address');
        $chef->city = $request->input('city');
        $chef->state = $request->input('state');
        $chef->zip_code = $request->input('zip_code');
        $chef->store_name = $request->input('store_name');
        $chef->store_description = $request->input('store_description');

        if ($request->hasFile('profile_img')) {

            $image = $request->file('profile_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            $s3 = Storage::disk('s3');
            $filePath = '/images/' . $filename;
            $s3->put($filePath, file_get_contents($image), 'public');

            $leng = strlen('https://s3-us-west-2.amazonaws.com/zhoker');

            $oldFilename = $chef->profile_img;
            $oldpath = substr($oldFilename, $leng);
            $s3->delete($oldpath);
            
            $chef->profile_img = 'https://s3-us-west-2.amazonaws.com/zhoker' . $filePath;
        }

        $chef->save();
        $meals = $chef->meals()->orderBy('updated_at', 'desc')->take(6)->get();

        return view('desktop.chef.chef', ['chef' => $chef, 'meals' => $meals]);
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
}
