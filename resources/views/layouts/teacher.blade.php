<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>

    <!-- Linking to Bootstrap for styling -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Linking to Bootstrap theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

    <!-- Linking to custom stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <!-- Linking to Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

    <!-- Header Section -->
    <header class="header">
        <a href="#">Teacher Dashboard</a>
        <div class="logout">
            <a href="{{ route('admin.logout') }}" class="btn btn-primary">Logout</a>
        </div>
    </header>

    <!-- Sidebar Section -->
    <aside>
        <ul>
            <!-- Add more sidebar links as needed -->
        </ul>
    </aside>

    <!-- Main Content Section -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- Heading and Paragraph -->
                <h1></h1>
                <p></p>
                <!-- Add content specific to each page using blade directives -->
                @yield('content')
            </div>
        </div>
    </div>

</body>
</html>
