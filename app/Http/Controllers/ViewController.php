<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(){
        return view('pages/home');
    }

    public function about(){
        return view('pages/about');
    }

    public function teacher(){
        return view('pages/teacher');
    }

    public function vehicle(){
        return view('pages/vehicle');
    }

    public function contact(){
        return view('pages/contact');
    }
}
