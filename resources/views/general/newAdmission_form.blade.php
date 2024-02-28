<!-- resources/views/general/newAdmission.blade.php -->

@extends('layouts.admin')

@section('content')
    <!-- Page Title -->
    <h1>Admission Data</h1>

    <!-- Check if admissions exist -->
    @if ($admissions->count() > 0)
        <!-- Table to display admission data -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through admissions and display each row -->
                @foreach ($admissions as $admission)
                    <tr>
                        <td>{{ $admission->id }}</td>
                        <td>{{ $admission->name }}</td>
                        <td>{{ $admission->email }}</td>
                        <td>{{ $admission->phone }}</td>
                        <td>{{ $admission->message }}</td>
                        <td>{{ $admission->created_at }}</td>
                        <td>{{ $admission->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <!-- If no admissions found, display a message -->
        <p>No admissions found.</p>
    @endif
@endsection
