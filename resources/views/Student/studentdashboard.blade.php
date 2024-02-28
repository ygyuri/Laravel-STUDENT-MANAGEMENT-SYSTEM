@extends('layouts.student')

@section('content')
    <div>
        <h2>Student Details</h2>
        <p>Name: {{ $student->name }}</p>
        <p>Email: {{ $student->email }}</p>
        @if ($student->department)
            <p>Department: {{ $student->department->name }}</p>
        @endif
        <p>Fees: {{ $student->fees }}</p>
    </div>

    <h2>Course Details</h2>
    <table>
        <thead>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                @if ($student->teacher)
                    <th>Teacher</th>
                @endif
                @if ($student->department)
                    <th>Department</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @if ($student->course)
                <tr>
                    <td>{{ $student->course->id }}</td>
                    <td>{{ $student->course->course_name }}</td>
                    @if ($student->teacher)
                        <td>{{ $student->course->teacher->name }}</td>
                    @endif
                    @if ($student->department)
                        <td>{{ $student->course->department->name }}</td>
                    @endif
                </tr>
            @endif
        </tbody>
    </table>
@endsection
