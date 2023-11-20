<?php
session_start();
error_reporting(0);
include("includes/config.php");


?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Home Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/home_page.css" rel="stylesheet" />
</head>

<body>
    <header class="p-4 homePageBackground  ">
        <div class="container d-flex  flex-column  align-items-center  ">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li class="navLink px-3 py-2 ">
                                            <img class="homeIcon" src="./assets/img/home.svg">

                        <a href="home.php">Home </a>
                    </li>
                    <li class="navLink px-3 py-2">
                                            <img class="adminIcon" src="./assets/img/login.svg">

                        <a href="./admin/index.php">Admin Login </a>
                    </li>
                    <li class="navLink px-3 py-2 ">
                                            <img class="studentIcon" src="./assets/img/student.svg">

                        <a href="./index.php">Student Login</a></li>
                    <li class="navLink px-3 py-2">
                                            <img class="studentIcon" src="./assets/img/accounting.svg">
                                            <a href="./admin/account_office_panel.php">Accounts Login</a></li>
                    <li class="navLink px-3 py-2">
                                            <img class="homeIcon" src="./assets/img/teacher.svg">
                        
                        <a href="#">Lecturers Login</a></li>

                    <li>
                        <div class='address'>
                            <p>P.O.Box 94, Sefwi Bekwi Wiawso</p>
                            <p>admin@wce.edu.gh</p>
                            <p>024 333 2222 , 024 370 4297</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class=" container content-wrapper d-flex align-items-center  justify-content-center">
            <div class="d-flex flex-row align-items-center  justify-content-center">
                <div>
                    <img class="logo" src="assets/img/schoolLogo.png">

                </div>
                <div class="besidelogo">
                    <caption>
                        <h1 class="welcomeHome">WEL<span class="come">COME</span> TO</h1>
                    </caption>
                    <div>
                        <h2 class="subheading">The Student Course Registration Portal</h2>
                    </div>
                    <div>
                        <p class='description'>
                            Wiawso College of Education is a tertiary Institution <br>located in the Western North
                            Region of
                            Ghana. It is equipped with competent staffs <br>to train qualified teachers in the country.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>



    <section class="footerHome">
        <div class="d-flex gap-5 row">
                <div class="corevalue col-lg-7 col-md-7 col-sm-12">
                <h2>Our Core Values</h2>
                <ul>
                    <li>
                        <b>EXCELENCE</b> – A community striving for excellence in all our academic pursuits
                    </li>
                    <li><b>INTIGRETY</b>I – We are open, truthful and straightforward with our interactions with others
                    </li>
                    <li><b>STUDENT FOCUS</b> – We are dedicated to ensuring the personal and professional growth of our
                        students
                    </li>
                    <li><b>LEADERSHIP</b> – Advocating for student teachers, staff and <br>the teaching profession as a
                        whole and
                        listening with humility. <br>Involving student teachers and staff in college committees to groom
                        them for future leadership positions</li>
                </ul>
                 </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
            <div>
                <h2>Our Vision</h2>
                <p>
                    To produce safe teachers who are academically sound, <br>professionally competent, ready to serve
                    the
                    community and <br>will not cause harm physically and mentally to pupils.

                </p>
            </div>

            <div class="mission">
                <h2>Our Mission</h2>
                <p>
                    Equipping teacher trainees to be knowledgeable <br>and self-motivated in a tertiary environment

                </p>
            </div>

            </div>
        </div>
</section>

        <script src="assets/js/bootstrap.js"></script>

</body>

</html>