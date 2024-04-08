@extends('layouts.admin')

@section('content')
    <h1>Admin Dashboard To Add Teachers</h1>

    <!-- Form to add a new teacher -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Add Teacher</h2>
                <form action="{{ route('admin.store.teacher') }}" method="POST">
                    @csrf
                    <!-- Name field -->
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                    </div>
                    <!-- Email field -->
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <!-- Password field -->
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <!-- Department ID field -->
                    <div class="form-group">
                        <label for="department_id">Department ID:</label>
                        <input type="text" class="form-control" id="department_id" name="department_id" placeholder="Department ID" required>
                    </div>
                    <!-- Created At field (hidden, automatically set by the system) -->
                    <!-- Updated At field (hidden, automatically set by the system) -->
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary">Add Teacher</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Display success message if present -->
    @if(Session::has('success'))
        <script>
            window.onload = function() {
                alert("{{ Session::get('success') }}");
            };
        </script>
    @endif

@endsection
