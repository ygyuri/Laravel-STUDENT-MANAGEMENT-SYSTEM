<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>

    <!-- Linking to Bootstrap for styling -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Linking my custom admin.css stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">

    <!-- Linking to Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

    <!-- Header Section -->
    <header class="header">
        <a href="">Admin Dashboard To Add Students</a>
        <div class="logout">
            <a href="{{ route('admin.logout') }}" class="btn btn-primary">Logout</a>
        </div>
    </header>

    <!-- Sidebar Section -->
    <aside>
        <ul>
           {{-- <li><a href="{{ route('admin.add.student') }}">Add Student</a></li>
                <li><a href="{{ route('admin.view.student') }}">View Student</a></li>
                <li><a href="{{ route('admin.add.teacher') }}">Add Teacher</a></li>
                <li><a href="{{ route('admin.view.teacher') }}">View Teacher</a></li>
                <li><a href="{{ route('admin.add.course') }}">Add Courses</a></li>
                <li><a href="{{ route('admin.view.courses') }}">View Courses</a></li>
            --}}
        </ul>
    </aside>

     <!-- Main Content Section -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Heading and Paragraph -->
            <h1>Admin Add Students</h1>
            <p>The admin has the following privileges To Add Students.</p>
            <div class="row">
                <div class="col-md-6">
                    <!-- Add Student Form -->
                    <form action="{{ route('admin.store.student') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" >
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="course_id">Course ID:</label>
                            <input type="number" class="form-control" id="course_id" name="course_id" placeholder="Course ID" required>
                        </div>
                        <div class="form-group">
                            <label for="teacher_id">Teacher ID:</label>
                            <input type="number" class="form-control" id="teacher_id" name="teacher_id" placeholder="Teacher ID" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fee_balance">Fee Balance:</label>
                            <input type="number" class="form-control" id="fee_balance" name="fee_balance" placeholder="Fee Balance" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Student</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if(Session::has('success'))
    <script>
        window.onload = function() {
            alert("{{ Session::get('success') }}");
        };
    </script>
@endif

</body>
</html>
