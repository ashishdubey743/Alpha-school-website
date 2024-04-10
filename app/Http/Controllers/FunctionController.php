<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\contactRequest;
use App\Http\Requests\signinRequest;
use App\Http\Requests\taskRequest;
use App\Http\Requests\addTeacherRequest;
use App\Http\Requests\editTeacherRequest;
use App\Http\Requests\editStudentRequest;
use App\Models\Contact;
use App\Models\User;
use App\Models\Upload;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Task;

use App\Mail\thankyou as thankyouEmail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Log;
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

    public function delete_query(Request $request){
        $id = $request->input('id');
        $query = Contact::find($id);
    
        if($query){
            $query->delete();
            return response()->json(['success' => true, 'message' => 'Query deleted successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Query not found']);
        }
    }

    public function delete_task(Request $request){
        $id = $request->input('id');
        $task = Task::find($id);
    
        if($task){
            $task->delete();
            return response()->json(['success' => true, 'message' => 'Task deleted successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Task not found']);
        }
    }

    public function delete_student(Request $request){
        $id = $request->input('id');
        $student = Student::find($id);
    
        if($student){
            $student->delete();
            return response()->json(['success' => true, 'message' => 'Student deleted successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Student not found']);
        }
    }

    public function edit_teacher_process(editTeacherRequest $request){
        $teacher = Teacher::where(['email' => $request->input('email')])->first();
        if($teacher && $teacher->name != $request->input('name')){
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

    public function edit_task_process(taskRequest $request){
            $task = Task::where(['id' => $request->input('id')])->first();
            if($task)
            {
                $task->update([
                    'taskname' => $request->input('taskname'),
                    'duedate' => $request->input('duedate'),
                    'subject' => $request->input('subject'),
                    'room' => $request->input('room'),
                    'assigned' => $request->input('assigned'),
                    'status' => $request->input('status'),
                ]);
                return redirect('manage-tasks');
            }
    }

    public function add_task_process(taskRequest $request){
        $task = Task::where(['taskname' => $request->input('taskname'), 'assigned' => $request->input('assigned')])->first();
        if($task) return back()->withErrors([ 'message' => ucfirst($request->input('taskname')).' is already assigned to  '.$request->input('assigned') ]);
        else
        {
            $task = Task::create([
                'taskname' => $request->input('taskname'),
                'duedate' => $request->input('duedate'),
                'subject' => $request->input('subject'),
                'room' => $request->input('room'),
                'assigned' => $request->input('assigned'),
                'status' => $request->input('status'),
            ]);
            if($task) return redirect('manage-tasks');
        }
    }

    public function import_student_process(Request $request){
        $validator = Validator::make($request->all(), [
            'student_file' => 'required|file|mimes:csv,txt',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $uploadedFile = $request->file('student_file');
        
        if (!$uploadedFile->isValid()) {
            return back()->withErrors(['student_file' => 'Invalid file uploaded']);
        }

        $studentCreated = 0;
        $errors = [];

        try {
            
            $reader = new \SplFileObject($uploadedFile->getRealPath());
            $reader->setFlags(\SplFileObject::READ_CSV);
            
            $headers = $reader->current(); 
            $reader->next();
            $firstRowSkipped = false;
            foreach ($reader as $row) {
                if ($row[0] == NULL) {
                    continue; 
                }
                Log::debug($row);
                if (!$firstRowSkipped) {
                    $firstRowSkipped = true;
                    continue;
                }
                
                $data = [];

                for ($i = 0; $i < count($headers); $i++) {
                    $data[$headers[$i]] = $row[$i];
                }

                $validator = Validator::make($data, [
                    'name' => 'required',
                    'email' => 'required', 
                    'room' => 'required', 
                    'phone' => 'required', 
                    'parent' => 'required', 
                ]);

                if ($validator->fails()) {
                    
                    $errors[] = 'Line ' . ($reader->key() + 1) . ' - ' . $validator->errors()->first();
                    continue;
                }
                $student = Student::where(['email' => $data['email']])->first();
                if($student){
                    $student->update([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'room' => $data['room'],
                        'phone' => $data['phone'],
                        'parent' => $data['parent']
                    ]);
                }else{
                    $student = Student::create([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'room' => $data['room'],
                        'phone' => $data['phone'],
                        'parent' => $data['parent']
                    ]);
                }
                $studentCreated++;
              
            }
            $message = $studentCreated > 0 ? 'Successfully imported students.' : 'No valid users found in the uploaded file.';
            
            return back()->with('message', $message);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred during upload: ' . $e->getMessage()]);
        }
    }

    public function edit_student_process(editStudentRequest $request){
        $student = Student::where(['id' => $request->input('id')])->first();
        if($student && $student->email != $request->input('email')){
            return back()->withErrors(['email'=> 'Email already exist']);
        }
        else{
            $student = Student::where(['id' => $request->input('id')])->first();
            if($student)
            {
                $student->update([
                    'name' => $request->input('name'),
                    'room' => $request->input('room'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'parent' => $request->input('parent')
                ]);
                return redirect('/manage-students');
            }
        }
    }

    public function bulk_delete(Request $request){
        $ids = $request->input('ids');
        if($ids)
        {
            Student::destroy($ids);
            return response()->json(['success' => true, 'message' => ' Selected Students deleted successfully']);
        }
    }
}
