<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public Function home() {
        if(auth()->user()->role == 'admin'){
        //     // return redirect('/admin');
           return view('admin.dashboard');
        }
        return view('home');
    }
}
