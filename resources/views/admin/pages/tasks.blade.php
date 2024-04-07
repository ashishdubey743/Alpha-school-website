@include('admin/templates/header')  
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <a href="add-teacher" class="btn btn-primary me-2">Add Teacher</a> <h6 class="mb-0">All tasks</h6>
            
        </div>
        <div class="table-responsive">
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
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>Alice Smith</td>
                        <td>Mathematics</td>
                        <td>alice.smith@school.edu</td>
                        <td>(555) 555-1234</td>
                        <td>201</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary me-1">Edit</button>
                            <button type="button" class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>Bob Johnson</td>
                        <td>Science</td>
                        <td>bob.johnson@school.edu</td>
                        <td>(555) 555-5678</td>
                        <td>302</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary me-1">Edit</button>
                            <button type="button" class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>Charlie Williams</td>
                        <td>History</td>
                        <td>charlie.williams@school.edu</td>
                        <td>(555) 555-9012</td>
                        <td>105</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary me-1">Edit</button>
                            <button type="button" class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('admin/templates/footer')  