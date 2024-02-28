@extends('layouts.teacher')

@section('content')
    <h1>All Courses</h1>
    @if ($courses->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Course Name</th>
                    
                    <th>Department</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td>{{ $course->course_name }}</td>

                        <td>{{ $course->department_id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No courses found.</p>
    @endif
@endsection
