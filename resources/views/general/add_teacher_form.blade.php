@extends('layouts.admin')

@section('content')
    <h1>Admin Dashboard To Add Teachers</h1>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Add Teacher</h2>
                <form action="{{ route('admin.store.teacher') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="course_id">Course ID:</label>
                        <input type="number" class="form-control" id="course_id" name="course_id" placeholder="Course ID" required>
                    </div>
                    <div class="form-group">
                        <label for="department_id">Department ID:</label>
                        <input type="text" class="form-control" id="department_id" name="department_id" placeholder="Department ID" required>
                    </div>
                    <div class="form-group">
                        <label for="Department_Name">Department Name:</label>
                        <input type="text" class="form-control" id="Department_Name" name="Department_Name" placeholder="Department Name" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Teacher</button>


                </form>
            </div>
        </div>
    </div>

    @if(Session::has('success'))
        <script>
            window.onload = function() {
                alert("{{ Session::get('success') }}");
            };
        </script>
    @endif

@endsection
