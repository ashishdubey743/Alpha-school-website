@include('admin/templates/header')  

<div class="container mt-5">
    <h2 class="mb-4">Edit Student</h2>
    <div class="table-responsive">
        <form action="/edit_student_process" method="post">
            @csrf <table class="table text-start align-middle table-bordered mb-0">
            <input type="hidden" name="id" value="{{ $student->id }}">
                <tbody>
                    <tr>
                        <td><label for="name">Name:</label></td>
                        <td>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="room">Room:</label></td>
                        <td>
                            <input type="text" class="form-control" id="room" name="room" value="{{ $student->room }}">
                            @error('room')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="email">Email:</label></td>
                        <td>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="phone">Phone:</label></td>
                        <td>
                            <input type="tel" class="form-control" id="phone" name="phone" value="{{ $student->phone }}">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="parent">Parent Name:</label></td>
                        <td>
                            <input type="text" class="form-control" id="parent" name="parent" value="{{ $student->parent }}">
                            @error('parent')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-end">
                            <button type="submit" class="btn btn-md btn-success me-1">Edit Student</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        @if($errors->has('email')) <div class="alert alert-danger mb-3" id="flash-message">
                {{ $errors->first('email') }}
            </div>
        @endif
    </div>
</div>


@include('admin/templates/footer')  
