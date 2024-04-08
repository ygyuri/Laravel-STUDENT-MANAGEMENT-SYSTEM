@extends('layouts.admin')

@section('content')
    <h1>Admin Dashboard to View Departments</h1>

    @if (count($departments) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Department Name</th>
                    <th>Courses</th>
                    <th>Teachers</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <td>{{ $department->id }}</td>
                        <td>{{ $department->Department_Name }}</td>
                        <td>
                            @foreach ($department->courses as $course)
                                {{ $course->course_name }}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($department->teachers as $teacher)
                                {{ $teacher->name }}<br>
                            @endforeach
                        </td>
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
        @if(Session::has('success'))
            alert('{{ Session::get('success') }}');
        @endif

        @if(Session::has('error'))
            alert('{{ Session::get('error') }}');
        @endif
    </script>
@endsection
