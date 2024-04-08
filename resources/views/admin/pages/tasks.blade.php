@include('admin/templates/header')  
<style>
       .pagination {
        justify-content: center;
        margin-top: 20px;
    }

    .pagination > .page-item > .page-link {
        color: #6c757d;
        background-color: #ffffff;
        border: 1px solid #dee2e6;
    }

    .pagination > .page-item > .page-link:hover {
        color: #007bff;
        background-color: #e9ecef;
        border-color: #dee2e6;
    }

    .pagination > .page-item.active > .page-link {
        z-index: 3;
        color: #ffffff;
        background-color: #007bff;
        border-color: #007bff;
    }
</style>
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <a href="add-task" class="btn btn-primary me-2">Add Task</a> <h6 class="mb-0">School Tasks</h6>
            
        </div>
        <div class="table-responsive">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">Task Name</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Class</th>
                        <th scope="col">Assigned To</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($tasks as $task) <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>{{ $task->taskname }}</td> <td>{{ $task->duedate }}</td> <td>{{ $task->subject }}</td> <td>{{ $task->room }}</td> <td>{{ $task->assigned }}</td> <td>
                            @if($task->status == 'Completed')
                            <span class="badge bg-success">{{ $task->status }}</span> </td>
                            @endif
                            @if($task->status == 'In Progress')
                            <span class="badge bg-warning">{{ $task->status }}</span> </td>
                            @endif
                            @if($task->status == 'Not Started')
                            <span class="badge bg-secondary">{{ $task->status }}</span> </td>
                            @endif
                        <td>
                            <a href="edit-task/{{ $task->id }}"><button type="button" class="btn btn-sm btn-primary me-1">Edit</button></a>
                            <button type="button" class="btn btn-sm btn-danger" onClick="delete_task({{ $task->id }}, this)">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
            {{ $tasks->links() }} 
    </div>
</div>

@include('admin/templates/footer')  
