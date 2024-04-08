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
        <a href="">Admin Dashboard</a>
        <div class="logout">
            <a href="{{ route('admin.logout') }}" class="btn btn-primary">Logout</a>
        </div>
    </header>

    <!-- Sidebar Section -->
    <aside>
        <ul>

               <li><a href="{{ route('admin.admission.data') }}">Admission Requests</a></li>
               <li><a href="{{ route('admin.add.student') }}">Add Student</a></li>
               <li><a href="{{ route('admin.view.student') }}">View Student</a></li>
               <li><a href="{{ route('admin.add.teacher') }}">Add Teacher</a></li>
               <li><a href="{{ route('admin.view.teacher') }}">View Teachers</a></li>
               <li><a href="{{ route('admin.view.courses') }}">View Courses</a></li>
               <li><a href="{{ route('admin.add.course') }}">Add Course</a></li>

               <li><a href="{{ route('admin.view.departments') }}">View Departments</a></li>
               <li><a href="{{ route('admin.add.department') }}">Add Department</a></li>
               <li><a href="{{ route('googlemaps') }}">Search Locations</a></li>





        </ul>

    </aside>

     <!-- Main Content Section -->
     <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- Heading and Paragraph -->
                <h1>This is the Admin Homepage</h1>
                <p>The admin Has the following Privileges as seen on the sidebar.</p>
            </div>
        </div>
    </div>

</body>
</html>
