<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::with('university')->get();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $universities=University::all();
        return view('admin.user.create',compact('universities','role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:users,email',
        'username'=>'required',
        'password'=>'required|confirmed:confirm_password',
        'confirm_password'=>'required',
        'role'=>'required',
        'university_id'=>'nullable|exists:universities,id'
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
            'role'=>$request->role,
            'university_id'=>$request->university_id ?: null
        ]);
        return redirect()->route('admin.student-enquiry.index')->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $universities=University::all();
        return view('admin.user.edit',compact('user','universities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'username' => 'required',
            'password' =>'nullable|confirmed'
        ]);
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'username'=>$request->username,
            'password' => Hash::make($request->password)
        ]);
      return redirect()->route('admin.user.index')->with('success','user updated successfully');      
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
