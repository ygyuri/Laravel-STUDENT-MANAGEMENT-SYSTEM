@extends('layouts.admin')

@section('content')
    <h1>Edit Course Form</h1>

    <form method="POST" action="{{ route('admin.update.course', $course->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="course_name">Course Name:</label>
            <input type="text" class="form-control" id="course_name" name="course_name" value="{{ $course->course_name }}" required>
        </div>
        <div class="form-group">
            <label for="teacher_id">Teacher ID:</label>
            <input type="text" class="form-control" id="teacher_id" name="teacher_id" value="{{ $course->teacher_id }}" required>
        </div>
        <div class="form-group">
            <label for="department_id">Department ID:</label>
            <input type="text" class="form-control" id="department_id" name="department_id" value="{{ $course->department_id }}" required>
        </div>
        <!-- Add more form fields as needed -->

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection
