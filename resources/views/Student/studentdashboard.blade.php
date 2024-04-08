@extends('layouts.student')

@section('content')
    <div>
        <h2>Student Details</h2>
        <p>Name: {{ $student->name }}</p>
        <p>Email: {{ $student->email }}</p>
        @if ($student->course)
            <p>Department: {{ $student->course->department->name }}</p>
        @endif
        <p>Fees: {{ $student->fee_balance }}</p> {{-- Assuming 'fee_balance' is the correct attribute --}}
    </div>

    <h2>Course Details</h2>
    <table>
        <thead>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                @if ($student->course && $student->course->teacher)
                    <th>Teacher</th>
                @endif
                @if ($student->course)
                    <th>Department</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @if ($student->course)
                <tr>
                    <td>{{ $student->course->id }}</td>
                    <td>{{ $student->course->course_name }}</td>
                    @if ($student->course->teacher)
                        <td>{{ $student->course->teacher->name }}</td>
                    @endif
                    <td>{{ $student->course->department->name }}</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
