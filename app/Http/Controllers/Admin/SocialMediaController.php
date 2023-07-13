<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialmedias = SocialMedia::all();
        return view('admin.social-media.index',compact('socialmedias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $socialmedia=SocialMedia::find($id);
        return view('admin.social-media.show',compact('socialmedia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $socialmedia=SocialMedia::find($id);
        return view('admin.social-media.edit',compact('socialmedia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $socialmedia=SocialMedia::find($id);
        $request->validate([
            'name'=>'required',
            'link'=>'required'
        ]);
        $socialmedia->update([
            'name'=>$request->name,
            'link'=>$request->link
        ]);
        return redirect()->route('admin.social-media.index')->with('success','record updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $socialmedia=SocialMedia::find($id);
        $socialmedia->delete();
        return redirect()->route('admin.social-media.index')->with('success','deleted successfully');
    }
}
