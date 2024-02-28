<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>

    <!-- Linking to Bootstrap for styling -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- Linking my custom admin.css stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">


    <!-- Linking my custom js styles stylesheet -->
    <script src="{{ asset('js/scripts.js') }}"></script>


    <!-- Linking my Axios library-->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


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
