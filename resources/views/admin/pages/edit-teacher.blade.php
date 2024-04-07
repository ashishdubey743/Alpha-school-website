@include('admin/templates/header')

<div class="container mt-5">
    <h2 class="mb-4">Edit Teacher</h2>
    <div class="table-responsive">
        <form action="/edit_teacher_process" method="post">
            @csrf
            <table class="table text-start align-middle table-bordered mb-0">
                <input type="hidden" name="id" value="{{ $teacher->id }}">
                <tbody>
                    <tr>
                        <td><label for="name">Name:</label></td>
                        <td>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $teacher->name }}">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                        
                    </tr>
                    <tr>
                        <td><label for="subject">Subject:</label></td>
                        <td>
                            <input type="text" class="form-control" id="subject" name="subject" value="{{ $teacher->subject }}">
                            @error('subject')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                        
                    </tr>
                    <tr>
                        <td><label for="email">Email:</label></td>
                        <td>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $teacher->email }}">
                            @if($errors->has('message'))
                            <div class="text-danger">{{ $errors->first('message') }}</div>
                            @endif
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                        
                    </tr>
                    <tr>
                        <td><label for="phone">Phone:</label></td>
                        <td>
                            <input type="tel" class="form-control" id="phone" name="phone" value="{{ $teacher->phone }}">
                            @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="room">Room:</label></td>
                        <td>
                            <input type="text" class="form-control" id="room" name="room" value="{{ $teacher->room }}">
                            @error('room')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-end">
                            <button type="submit" class="btn btn-md btn-success me-1">Edit Teacher</button>
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