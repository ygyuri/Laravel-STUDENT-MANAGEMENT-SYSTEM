@extends('layouts.admin')

@section('content')
    <h1>Admin Dashboard to View Departments</h1>

    @if (count($departments) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Department Name</th>
                    <th>Course ID</th>
                    <th>Teacher ID</th>
                    
                    <th>Action</th> <!-- New column for delete action -->
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <td>{{ $department->id }}</td>
                        <td>{{ $department->Department_Name }}</td> <!-- Display department name -->
                        <td>{{ $department->course_id }}</td>
                        <td>{{ $department->teacher_id }}</td>

                        <td>
                            <form action="{{ route('admin.delete.department', $department->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No departments found.</p>
    @endif

    <script>
        // Check if the session has a success message
        @if(Session::has('success'))
            // Display a JavaScript alert with the success message
            alert('{{ Session::get('success') }}');
        @endif

        // Check if the session has an error message
        @if(Session::has('error'))
            // Display a JavaScript alert with the error message
            alert('{{ Session::get('error') }}');
        @endif
    </script>
@endsection
