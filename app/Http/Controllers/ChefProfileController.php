<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

            // Delete the old photo
            $image = $request->file('profile_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/'. $filename);
            Image::make( $image)->save($location);

            $oldFilename = $chef->profile_img;

            // add the new photo
            $chef->profile_img = $filename;

            // update the database
            Storage::delete($oldFilename);
        }

        $chef->save();

        return view('desktop.chef.chef', ['chef' => $chef]);
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
