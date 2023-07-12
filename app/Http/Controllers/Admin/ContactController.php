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
    // public function index()
    // {
    //     $contacts = contact::all();
    //     return view('admin.contact.index', compact('contacts'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('admin.contact.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $data = $request->validate([
            'title' => 'required',
            'short_description' => 'required|max:300',
            'address' => 'required',
            'email_primary' => 'required|email',
            'email_secondary' => 'nullable|email',
            'phone_primary' => 'required|min:10',
            'phone_secondary' => 'nullable|min:10',
        ]);
        $contact = Contact::first();
        if ($contact) {
            $contact->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'address' => $request->address,
                'email_primary' => $request->email_primary,
                'email_secondary' => $request->email_secondary  ?: "null",
                'phone_primary' => $request->phone_primary,
                'phone_secondary' => $request->phone_secondary  ?: "null",
            ]);
            return redirect()->back()->with('success', 'contact updated successfully');
        } else {
            contact::create([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'address' => $request->address,
                'email_primary' => $request->email_primary,
                'email_secondary' => $request->email_secondary ?: "null" ,
                'phone_primary' => $request->phone_primary,
                'phone_secondary' => $request->phone_secondary  ?: "null",
            ]);
            return redirect()->back()->with('success', 'contact created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(contact $contact)
    // {
    //     return view('admin.contact.show', compact('contact'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(contact $contact)
    {
        $contact = contact::first();
        $data=[
            'title'=>$contact?$contact->title:null,
            'address'=>$contact?$contact->address:null,
            'short_description'=>$contact?$contact->short_description :null,
            'email_primary'=>$contact?$contact->email_primary:null,
            'email_secondary'=>$contact?$contact->email_secondary:null,
            'phone_primary'=>$contact?$contact->phone_primary:null,
            'phone_secondary'=>$contact?$contact->phone_secondary:null,
        ];
        return view('admin.contact.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, contact $contact)
    // {
    //     $data = $request->validate([
    //         'title' => 'required|unique:contacts,title,' . $contact->id,
    //         'short_description' => 'required',
    //         'image' => 'nullable',
    //         'body' => 'required',
    //         'extra' => 'required',
    //         'status' => 'nullable|boolean'
    //     ]);
    //     $slug = Str::slug($request->title);
    //     $counter = 1;
    //     while (contact::where('slug', $slug)->exists()) {
    //         $slug = Str::slug($request->title) . '-' . $counter;
    //         $counter++;
    //     }
    //     if ($request->hasFile('image')) {
    //         unlink(public_path($contact->image));
    //         $image = $request->file('image');
    //         $img_name = $image->getClientOriginalName();
    //         $image->move(public_path('contact'), $img_name);
    //     }
    //     $contact->update([
    //         'title' => $request->title,
    //         'slug' => $slug,
    //         'image' => $request->hasfile('image') ? 'contact/' . $img_name : $contact->image,
    //         'short_description' => $request->short_description,
    //         'body' => $request->body,
    //         'extra' => $request->extra,
    //         'status' => $request->status ? 1 : 0
    //     ]);
    //     return redirect()->route('admin.contact.index')->with('success', 'contact updated successfully');
    // }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(contact $contact)
    // {
    //     $contact->delete();
    //     return redirect()->route('admin.contact.index')->with('success', 'contact deleted successfully');
    // }
}
