@extends('layouts.admin')

@section('content')
    <h1>View Teachers</h1>

    <!-- Check if there are teachers to display -->
    @if (count($teachers) > 0)
        <!-- Table to display teachers -->
        <table class="table">
            <thead>
                <tr>
                    <!-- ID field -->
                    <th>ID</th>
                    <!-- Name field -->
                    <th>Name</th>
                    <!-- Email field -->
                    <th>Email</th>
                    <!-- Department Name field -->
                    <th>Department Name</th>
                    <!-- Courses field -->
                    <th>Courses</th>
                    <!-- Actions field -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through each teacher and display their details -->
                @foreach ($teachers as $teacher)
                    <tr>
                        <!-- Display teacher's ID -->
                        <td>{{ $teacher->id }}</td>
                        <!-- Display teacher's name -->
                        <td>{{ $teacher->name }}</td>
                        <!-- Display teacher's email -->
                        <td>{{ $teacher->email }}</td>
                        <!-- Display teacher's department name -->
                        <td>{{ $teacher->department->Department_Name }}</td>
                        <!-- Display teacher's courses -->
                        <td>
                            @if ($teacher->courses->count() > 0)
                                <ul>
                                    @foreach ($teacher->courses as $course)
                                        <li>{{ $course->name }} (Unit: {{ $course->pivot->unit }})</li>
                                    @endforeach
                                </ul>
                            @else
                                No courses assigned
                            @endif
                        </td>
                        <!-- Action to delete teacher -->
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
        <!-- Message when no teachers found -->
        <p>No teachers found.</p>
    @endif

    <!-- Display success message if present -->
    @if(Session::has('success'))
        <script>
            window.onload = function() {
                alert("{{ Session::get('success') }}");
            };
        </script>
    @endif
@endsection
