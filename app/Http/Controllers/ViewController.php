<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;


class ViewController extends Controller
{
    public function home(){
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


    // Admin
    public function signin(){
        return view('admin/pages/signin');
    }

    public function dashboard(){
        return view('admin/pages/dashboard');
    }

    public function manage_teachers(){
        $teachers = Teacher::get();
        return view('admin/pages/teachers', compact('teachers'));
    }

    public function manage_queries(){
        return view('admin/pages/queries');
    }

    public function manage_tasks(){
        return view('admin/pages/tasks');
    }

    public function add_teacher(){
        return view('admin/pages/add-teacher');
    }

    public function edit_teacher($id){
        $teacher = Teacher::find($id);
        return view('admin/pages/edit-teacher', compact('teacher'));
    }
}
