@extends('layouts.admin')

@section('content')
    <h1>View Teachers</h1>

    @if (count($teachers) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Course ID</th>
                    <th>Department Name</th>
                    <th>Department id</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->id }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>{{ $teacher->course_id }}</td>
                        <td>{{ $teacher->Department_Name }}</td>
                        <td>{{ $teacher->department_id }}</td>

                        <td>
                            <form action="{{ route('admin.delete.teacher', $teacher->id) }}" method="POST">
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
        <p>No teachers found.</p>
    @endif
    @if(Session::has('success'))
    <script>
        window.onload = function() {
            alert("{{ Session::get('success') }}");
        };
    </script>
    @endif
@endsection
