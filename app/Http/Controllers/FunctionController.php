<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\contactRequest;
use App\Http\Requests\signinRequest;
use App\Http\Requests\addTeacherRequest;
use App\Http\Requests\editTeacherRequest;
use App\Models\Contact;
use App\Models\User;
use App\Models\Upload;
use App\Models\Teacher;

use App\Mail\thankyou as thankyouEmail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Auth;

class FunctionController extends Controller
{
    public function process_contact(contactRequest $request){
    
        $contact = Contact::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'message' => $request->input('message')
        ]);
        if($contact){
            Mail::to($request->input('email'))->send(new thankyouEmail());
            return view('pages/thank-you');
        }
    }
    
    public function process_signin(signinRequest $request){
        $user = User::where(['username' => $request->input('username'), 'password' => $request->input('password')])->first();
        if ($user) {
            return redirect('dashboard');
        } else {
            return back()->withErrors([
                'message' => 'Invalid username or password',
            ]);
        }
    }

    public function add_teacher_process(addTeacherRequest $request){
        $teacher = Teacher::where(['subject' => $request->input('subject'), 'room' => $request->input('room')])->first();
        if($teacher) return back()->withErrors([ 'message' => ucfirst($request->input('subject')).' teacher already available in room '.$request->input('room') ]);
        else
        {
            $teacher = Teacher::create([
                'name' => $request->input('name'),
                'subject' => $request->input('subject'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'room' => $request->input('room'),
            ]);
            if($teacher) return redirect('manage-teachers');
        }
    }

    public function remove_teacher(Request $request){
        $id = $request->input('id');
        $teacher = Teacher::find($id);
    
        if($teacher){
            $teacher->delete();
            return response()->json(['success' => true, 'message' => 'Teacher deleted successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Teacher not found']);
        }
    }

    public function edit_teacher_process(editTeacherRequest $request){
        $teacher = Teacher::where(['email' => $request->input('email')])->first();
        if($teacher){
            return back()->withErrors(['email'=> 'Email already exist']);
        }
        else{
            $teacher = Teacher::where(['id' => $request->input('id')])->first();
            if($teacher)
            {
                $teacher->update([
                    'name' => $request->input('name'),
                    'subject' => $request->input('subject'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'room' => $request->input('room'),
                ]);
                return redirect('manage-teachers');
            }
        }
    }
}
