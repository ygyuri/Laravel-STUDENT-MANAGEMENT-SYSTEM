@extends('layouts.admin')

@section('content')
    <h1>Add Course Form</h1>

    <form id="addCourseForm" method="POST" action="{{ route('admin.store.course') }}">
        @csrf
        <div class="form-group">
            <label for="course_name">Course Name:</label>
            <input type="text" class="form-control" id="course_name" name="course_name" required>
        </div>
        <div class="form-group">
            <label for="teacher_id">Teacher ID:</label>
            <input type="text" class="form-control" id="teacher_id" name="teacher_id" required>
        </div>
        <div class="form-group">
            <label for="department_id">Department ID:</label>
            <input type="text" class="form-control" id="department_id" name="department_id" required>
        </div>
        <!-- Add more form fields as needed -->

        <button type="submit" class="btn btn-primary">Submit</button>
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

    <!-- Script for displaying pop-up message -->
    <script>
        // Listen for form submission
        document.getElementById('addCourseForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Submit the form using AJAX
            axios.post('{{ route("admin.store.course") }}', new FormData(this))
                .then(function(response) {
                    // Display success message using a pop-up
                    alert('Course added successfully');

                    // Optionally, you can redirect the user to another page
                    window.location.href = '{{ route("admin.add.course") }}';
                })
                .catch(function(error) {
                    // Handle errors if any
                    console.error('Error adding course:', error);
                    alert('Failed to add course. Please try again.');
                });
        });
    </script>
@endsection
