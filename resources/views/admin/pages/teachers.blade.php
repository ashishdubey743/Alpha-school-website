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
            <a href="add-teacher" class="btn btn-primary me-2">Add Teacher</a> <h6 class="mb-0">Teacher Details</h6>
            
        </div>
        <div class="table-responsive">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">Name</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Room</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($teachers as $teacher)
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->subject }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>{{ $teacher->phone }}</td>
                        <td>{{ $teacher->room }}</td>
                        <td>
                            <a href="edit/{{ $teacher->id }}"><button type="button" class="btn btn-sm btn-primary me-1">Edit</button></a>
                            <button type="button" class="btn btn-sm btn-danger" onClick="delete_teacher({{ $teacher->id }}, this)" >Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
            {{ $teachers->links() }}
    </div>
</div>

@include('admin/templates/footer')  
