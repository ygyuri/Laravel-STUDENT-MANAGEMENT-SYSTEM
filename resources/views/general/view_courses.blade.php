@extends('layouts.admin')

@section('content')
    <!-- Page Title -->
    <h1>Admin Dashboard to View Courses</h1>

    <!-- Check if courses exist -->
    @if (count($courses) > 0)
        <!-- Table to display courses -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Course Name</th>
                    <th>Teacher ID</th>
                    <th>Department ID</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th> <!-- New column for edit and delete action -->
                </tr>
            </thead>
            <tbody>
                <!-- Loop through courses and display each row -->
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td id="course_name_{{ $course->id }}">{{ $course->course_name }}</td>
                        <td id="teacher_id_{{ $course->id }}">{{ $course->teacher_id }}</td>
                        <td id="department_id_{{ $course->id }}">{{ $course->department_id }}</td>
                        <td>{{ $course->created_at }}</td>
                        <td>{{ $course->updated_at }}</td>
                        <td>
                          
                            <!-- Form to delete the course -->
                            <form style="display: inline;" action="{{ route('admin.delete.course', $course->id) }}" method="POST">
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
        <!-- If no courses found, display a message -->
        <p>No courses found.</p>
    @endif


@endsection
