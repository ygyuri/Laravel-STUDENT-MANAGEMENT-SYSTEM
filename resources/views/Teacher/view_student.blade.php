@extends('layouts.teacher')

@section('content')

<h2>Students Associated with Courses Taught by {{ Auth::user()->name }}</h2>

<table>
    <thead>
        <tr>
            <th>Student Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Department</th>
            <!-- Add more columns as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>
                    @foreach ($courses as $course)
                        @if ($course->id == $student->course_id)
                            {{ $course->course_name }}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($courses as $course)
                        @if ($course->id == $student->course_id)
                            {{ $course->department->name }}
                        @endif
                    @endforeach
                </td>
                <!-- Add more columns as needed -->
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
