<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Contact;
use App\Models\Task;
use App\Models\Student;


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
        $teachers = Teacher::paginate(10);
        return view('admin/pages/teachers', compact('teachers'));
    }
    public function manage_students(){
        $students = Student::paginate(10);
        return view('admin/pages/students',compact('students'));
    }

    public function manage_queries(){
        $queries = Contact::paginate(10);
        return view('admin/pages/queries', compact('queries'));
    }

    public function manage_tasks(){
        $tasks = Task::paginate(10);
        return view('admin/pages/tasks', compact('tasks'));
    }

    public function add_teacher(){
        $teachers = Teacher::get();
        return view('admin/pages/add-teacher');
    }

    public function add_task(){
        $teachers = Teacher::get();
        return view('admin/pages/add-task', compact('teachers'));
    }

    public function edit_teacher($id){
        $teacher = Teacher::find($id);
        return view('admin/pages/edit-teacher', compact('teacher'));
    }

    public function edit_student($id){
        $student = Student::find($id);
        return view('admin/pages/edit-student', compact('student'));
    }

    public function edit_task($id){
        $task = Task::find($id);
        $teachers = Teacher::get();
        return view('admin/pages/edit-task', compact('task','teachers'));
    }

    public function import_students(){
        return view('admin/pages/import-students');
    }
}
