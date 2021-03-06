<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;

class ListingsController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = Listing::orderBy('created_at', 'desc')->get();
        return view('listings')->with('listings', $listings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createlisting');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validating input form
        $this->validate($request, [
            'name'=>'required',
            'email'=>'email'
        ]);
        //Create listing  'name', 'address', 'phone','website','email','bio'
        $listing = new Listing;
        $listing->name = $request->input('name');
        $listing->address = $request->input('address');
        $listing->phone = $request->input('phone');
        $listing->website = $request->input('website');
        $listing->email = $request->input('email');
        $listing->bio = $request->input('bio');
        $listing->user_id = auth()->user()->id; //ID of the auth user
        $listing->save();

        return redirect('/dashboard')->with('success','Listing created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
        $listing = Listing::find($id);
        return view('showlisting')->with('listing', $listing);
        
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = Listing::find($id);
        return view('editlisting')->with('listing', $listing);
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
        //Validating input form
        $this->validate($request, [
            'name'=>'required',
            'email'=>'email'
        ]);
        //Create listing  'name', 'address', 'phone','website','email','bio'
        $listing = Listing::find($id);
        $listing->name = $request->input('name');
        $listing->address = $request->input('address');
        $listing->phone = $request->input('phone');
        $listing->website = $request->input('website');
        $listing->email = $request->input('email');
        $listing->bio = $request->input('bio');
        $listing->user_id = auth()->user()->id; //ID of the auth user
        $listing->save();

        return redirect('/dashboard')->with('success','Listing updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing = Listing::find($id);
        $listing->delete();

        return redirect('/dashboard')->with('success','Listing delete');
    }
}
