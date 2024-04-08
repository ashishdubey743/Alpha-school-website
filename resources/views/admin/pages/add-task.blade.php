@include('admin/templates/header')

<div class="container mt-5">
    <h2 class="mb-4">Add Task</h2>
    <div class="table-responsive">
        <form action="/add_task_process" method="post">
            @csrf
            <table class="table text-start align-middle table-bordered mb-0">
                <tbody>
                    <tr>
                        <td><label for="task_name">Task Name:</label></td>
                        <td>
                            <input type="text" class="form-control" id="task_name" name="taskname" >
                            @error('taskname')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="due_date">Due Date:</label></td>
                        <td>
                            <input type="date" class="form-control" id="due_date" name="duedate" >
                            @error('duedate')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="subject">Subject:</label></td>
                        <td>
                            <select class="form-control" id="subject" name="subject" >
                                <option value="">Select Subject</option>
                                <option value="English">English</option>
                                <option value="Hindi">Hindi</option>
                                <option value="Math">Math</option>
                                <option value="SST">SST</option>
                                <option value="Science">Science</option>
                            </select>
                            @error('subject')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="class">Room:</label></td>
                        <td>
                            <input type="text" class="form-control" id="class" name="room" >
                            @error('room')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="assigned_to">Assigned To:</label></td>
                        <td>
                            <select class="form-control" id="assigned" name="assigned" >
                                <option value="">Select Teacher</option>
                                @foreach($teachers as $teacher)
                                <option value="{{ $teacher->name }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                            @error('assigned')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="status">Status:</label></td>
                        <td>
                            <select class="form-control" id="status" name="status" >
                                <option value="">Select Status</option>
                                <option value="Not Started">Not Started</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                            </select>
                            @error('status')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-end">
                            <button type="submit" class="btn btn-md btn-success me-1">Add Task</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        @if($errors->has('message'))
            <div class="alert alert-danger mb-3" id="flash-message">
                {{ $errors->first('message') }}
            </div>
        @endif
    </div>
</div>

@include('admin/templates/footer')
