@extends('layouts.admin')

@section('content')
    <h1>Add Department Form</h1>

    <form id="addDepartmentForm" method="POST" action="{{ route('admin.store.department') }}">
        @csrf
        <div class="form-group">
            <label for="Department_Name">Department Name:</label>
            <input type="text" class="form-control" id="Department_Name" name="Department_Name" required>
        </div>
        <!-- You can add more form fields as needed -->

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @if ($errors->any())
        <div class="mt-3 alert alert-danger">
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
        document.getElementById('addDepartmentForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Submit the form using AJAX
            axios.post('{{ route("admin.store.department") }}', new FormData(this))
                .then(function(response) {
                    // Display success message using a pop-up
                    alert('Department added successfully');

                    // Optionally, you can redirect the user to another page
                    window.location.href = '{{ route("admin.add.department") }}';
                })
                .catch(function(error) {
                    // Handle errors if any
                    console.error('Error adding department:', error);
                    alert('Failed to add department. Please try again.');
                });
        });
    </script>
@endsection
