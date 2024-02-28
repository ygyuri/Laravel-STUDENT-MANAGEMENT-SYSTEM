<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
<body>

<nav>
    <label class="logo">YG'S SCHOOL</label>
    <ul>
        <li><a href="">Home</a></li>
        <li><a href="#admission">Admission</a></li>
        <li><a href="{{ route('student.login') }}" class="btn btn-primary">Login as Student</a></li>
        <li><a href="{{ route('teacher.login') }}" class="btn btn-success">Login as Teacher</a></li>
        <li><a href="{{ route('admin.login') }}" class="btn btn-success">Login as Admin</a></li>
    </ul>
</nav>

<div class="section1 text-center">
    <label class="img_text">We Foster Knowledge with meticulous detail</label>
    <img class="main_img" src="/STATIC/images/pexels-emmanuel-ikwuegbu-8948347.jpg">
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img class="welcome_img" src="/STATIC/images/pexels-godisable-jacob-901964.jpg">
        </div>
        <div class="col-md-8">
            <h1>Welcome to YG's School</h1>
            <p>
                YG's Educational Institution has been dedicated to worldwide education long before it became an essential facet of modern learning. Established in 2023, we proudly stand as the inaugural English medium school in KENYA to embrace both Havard and Cambridge curriculum (in O and A levels), uniting students in a dynamic, intellectually stimulating, and supportive setting where diverse perspectives are valued and commemorated.Devoted to global education in helping less fortunate areas long before it became a crucial element of contemporary learning. Founded in January, aspires to assist underprivileged children in areas affected by substance abuse.
            </p>
        </div>
    </div>
</div>

<center>
    <h1>Our Teachers</h1>
</center>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img class="teacher" src="/STATIC/images/pexels-cottonbro-studio-6209566.jpg">
            <p>Teacher Williams is well versed in Human Resource Management and takes Students on the same.</p>
        </div>
        <!-- Add more teacher sections as needed -->
        <!-- Additional teacher sections -->
        <div class="col-md-4">
            <img class="teacher" src="/STATIC/images/pexels-katerina-holmes-5905923.jpg">
            <p>Teacher Pearsons is well versed in Artificial Intelligence and Data Science and takes Students on the same.</p>
        </div>
        <div class="col-md-4">
            <img class="teacher" src="/STATIC/images/pexels-yan-krukau-8618026.jpg">
            <p>Teacher Williams is well versed in Web Application Development and takes Students on the same.</p>
        </div>
    </div>
</div>

<center>
    <h1>Our Courses</h1>
</center>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img class="teacher" src="/STATIC/images/pexels-karolina-grabowska-4491461.jpg">
            <h3>Human Resource Management</h3>
        </div>
        <div class="col-md-4">
            <img class="teacher" src="/STATIC/images/pexels-luis-gomes-546819.jpg">
            <h3>Artificial Intelligence and Data Science</h3>
        </div>
        <div class="col-md-4">
            <img class="teacher" src="/STATIC/images/pexels-polina-tankilevitch-4443160.jpg">
            <h3>Web Application Development</h3>
        </div>
    </div>
</div>

<center>
    <h1 class="adm" id="admission">Admission Form</h1>
</center>

<div align="center" class="admission_form" id="admission-form">
    <form action="{{ route('submitadmissionForm') }}" method="post">
        @csrf <!-- Add CSRF token -->
        <div class="adm_int">
            <label class="label_text">Name</label>
            <input class="input_deg" type="text" name="name" autocomplete="off">
        </div>
        <div class="adm_int">
            <label class="label_text">Email</label>
            <input class="input_deg" type="text" name="email" autocomplete="off">
        </div>
        <div class="adm_int">
            <label class="label_text">Phone</label>
            <input class="input_deg" type="text" name="phone" autocomplete="off">
        </div>
        <div class="adm_int">
            <label class="label_text">Message</label>
            <textarea class="input_txt" name="message" autocomplete="off"></textarea>
        </div>
        <div class="adm_int">
            <input class="btn btn-primary" id="submit" type="submit" value="apply" name="apply">
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
    // Check if the page has a success message
    @if(session('success'))
        // Display a popup message
        alert("Application for admission successful");
    @endif
</script>

<footer class="text-center">
    <h3 class="footer_text">All @copyright reserved YG's School</h3>
</footer>

</body>
</html>
