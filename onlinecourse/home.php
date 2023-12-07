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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
    <link href="assets/css/home_page.css" rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container px-5">
                <a class="navbar-brand fw-bold" href="#page-top">WATICO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="bi-list">
                    </i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        <li class="nav-item">
                            <a class="nav-link me-lg-3" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link me-lg-3" href="./admin/index.php">
                            Admin Page</a>
                        </li>
                        <li class="nav-item">

                            <a class="nav-link me-lg-3" href="./index.php">Student Page</a></li>
                        <li class="nav-item">

                            <a class="nav-link me-lg-3" href="./admin/account_office_panel.php">Accounts Page</a>
                            </li>
                        <li class="nav-item">

                        <a class="nav-link me-lg-3" href="#features">Features</a></li>
                    </ul>
                    <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal"
                        data-bs-target="#feedbackModal">
                        <span class="d-flex align-items-center">
                            <i class="bi-chat-text-fill me-2"></i>
                            <span class="small">Get in touch</span>
                        </span>
                    </button>
                </div>
            </div>
    </nav>
            <!-- Mashead header-->
    <header class="masthead">
    <div class="overlay">
    </div>
    <div class="container px-5 ">
        <div class="row gy-2 gx-lg-0 align-items-center">
            <div class="col-lg-4 d-flex justify-content-center justify-content-lg-end">
                <div>
                    <img class="logo" src="assets/img/schoolLogo.png">
                </div>
            </div>
            <div class="col-lg-8">
                <!-- Mashead text and app badges-->
                <div class="mb-2 mb-lg-0 text-start text-lg-start">
                    <h1 class="display-1 lh-1 mb-3 welcomeHome">WEL<span class="come">COME</span> TO</h1>
                    <h2 class="subheading ">The Student Course Registration Portal</h2>
                    <p class="lead fw-normal text-white mb-2 "> Wiawso College of Education is a tertiary Institution <br>located in the Western North
                    Region of
                    Ghana. It is equipped with competent staffs <br>to train qualified teachers in the country</p>

                </div>
            </div>

        </div>
    </div>

    </header>

    <section class="footerHome">
        <div class="d-flex  row">
            <div class="corevalue col-lg-7 col-md-7 col-sm-12">
                <h2>Our Core Values</h2>
                <ul>
                    <li>
                        <b>EXCELENCE</b> – A community striving for excellence in all our academic pursuits
                    </li>
                    <li><b>INTIGRETY</b> – We are open, truthful and straightforward with our interactions with others
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
                        To produce safe teachers who are academically sound, <br>professionally competent, ready to
                        serve
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

</body>

</html>