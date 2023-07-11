<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       $data= $request->validate([
            'title'=>'required',
            'short_description'=>'required',
            'address'=>'required',
            'phone.*'=> 'required|array',
            'email.*'=> 'required|email|unique:contacts,email',
           
        ]);
        
        $contact=Contact::first();
        if ($contact) {
            $contact->update([
                'title' => $request->title,
                'short_description'=>$request->short_description,
                'address'=>$request->address,
                'phone'=>json_encode($request->phone),
                'email'=>json_encode($request->email)
            ]);
            return redirect()->route('admin.contact.index')->with('success','contact updated successfully');

        }else{
            Contact::create([
                'title' => $request->title,
                'short_description'=>$request->short_description,
                'address'=>$request->address,
                'phone'=>json_encode($request->phone),
                'email'=>json_encode($request->email)
            ]);
            return redirect()->route('admin.contact.index')->with('success','contact created successfully');
        }
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
}
