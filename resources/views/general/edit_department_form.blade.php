@extends('layouts.admin')

@section('content')
    <h1>Edit Department</h1>

    <form action="{{ route('admin.update.department', $department->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $department->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" required>{{ $department->description }}</textarea>
        </div>

        <!-- Add more fields as needed -->

        <button type="submit" class="btn btn-primary">Update Department</button>
    </form>
@endsection
