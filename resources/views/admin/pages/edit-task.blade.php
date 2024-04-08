@include('admin/templates/header')

<div class="container mt-5">
    <h2 class="mb-4">Edit Task</h2>
    <div class="table-responsive">
        <form action="/edit_task_process" method="post">
            @csrf
            <table class="table text-start align-middle table-bordered mb-0">
            <input type="hidden" name="id" value="{{ $task->id }}">
                <tbody>
                    <tr>
                        <td><label for="task_name">Task Name:</label></td>
                        <td>
                            <input type="text" class="form-control" id="taskname" name="taskname" value="{{ $task->taskname }}">
                            @error('taskname')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="due_date">Due Date:</label></td>
                        <td>
                            <input type="date" class="form-control" id="due_date" name="duedate" value="{{ $task->duedate }}">
                            @error('duedate')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="subject">Subject:</label></td>
                        <td>
                        <select class="form-control" id="subject" name="subject" value="{{ $task->subject }}">
                        <option value="">Select Subject</option>
                        @foreach (['English', 'Hindi', 'Math', 'SST', 'Science'] as $subject)
                            <option value="{{ $subject }}"
                                    @selected($task->subject === $strict = $subject)
                            >
                            {{ $subject }}
                            </option>
                        @endforeach
                        </select>

                            
                            @error('subject')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="class">Room:</label></td>
                        <td>
                            <input type="text" class="form-control" id="class" name="room" value="{{ $task->room }}">
                            @error('room')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="assigned_to">Assigned To:</label></td>
                        <td>
                            <select class="form-control" id="assigned" name="assigned" value="{{ $task->assigned }}">
                                <option value="">Select Teacher</option>
                                @foreach($teachers as $teacher)
                                    @if($teacher->name == $task->assigned)
                                    <option value="{{ $teacher->name }}" selected>{{ $teacher->name }}</option>
                                    @else
                                    <option value="{{ $teacher->name }}">{{ $teacher->name }}</option>
                                    @endif
                                
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
                        <select class="form-control" id="status" name="status" value="{{ $task->status }}">
                        <option value="">Select Status</option>
                        @foreach (['Not Started', 'In Progress', 'Completed'] as $status)
                            <option value="{{ $status }}"
                                    @selected($task->status === $strict = $status)
                            >
                            {{ $status }}
                            </option>
                        @endforeach
                        </select>

                            @error('status')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-end">
                            <button type="submit" class="btn btn-md btn-success me-1">Edit Task</button>
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
