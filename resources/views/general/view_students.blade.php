@extends('layouts.admin')

@section('content')
    <h1>Admin Dashboard to View Students</h1>

    @if (count($students) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Course ID</th>
                    <th>Teacher ID</th>
                    <th>Fee Balance</th>
                    <th>Action</th> <!-- New column for delete action -->
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->course_id }}</td>
                        <td>{{ $student->teacher_id }}</td>
                        <td>{{ $student->fee_balance }}</td>
                        <td>
                            <form action="{{ route('admin.delete.student', $student->id) }}" method="POST">
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
        <p>No students found.</p>
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
