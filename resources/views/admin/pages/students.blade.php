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
            <a href="/import-students" class="btn btn-primary me-2">Import</a>
            <a href="#" class="btn btn-primary me-2" onClick="bulk_delete()">Bulk Delete</a>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Export
                </button>
                <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                <li><a class="dropdown-item" href="/export/students/csv">Export CSV</a></li>
                <li><a class="dropdown-item" href="/export/students/pdf">Export PDF</a></li>
                </ul>
            </div>
            <h6 class="mb-0">Student Details</h6>  
        </div>
        <div class="table-responsive">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col"><input class="form-check-input check-input-all" type="checkbox"></th>
                        <th scope="col">Name</th>
                        <th scope="col">Room</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Parent</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td><input class="form-check-input check-input-single" type="checkbox" value="{{ $student->id }}"></td>
                        <td>{{ $student->name }}</td>
                        <td> {{ $student->room }}</td> <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->parent }}</td>
                        <td>
                            <a href="edit-student/{{ $student->id }}"><button type="button" class="btn btn-sm btn-primary me-1">Edit</button></a>
                            <button type="button" class="btn btn-sm btn-danger" onClick="delete_student({{ $student->id }}, this)">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $students->links() }}
        @if (session()->has('message'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session()->get('message') }}
        </div>
        @endif
    </div>
</div>

@include('admin/templates/footer')  
