<nav class="navbar bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#"></a>

    <nav class="navbar navbar-expand-lg d-none d-md-block">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

          <ul class="navbar-nav">
            <li class="navLink px-3 py-2 d-flex  flex-column  justify-content-center align-items-center">
              <img class="navIcon" src="./assets/img/profile.svg">
              <a href="my-profile.php">My Profile</a>
            </li>
            <li class="navLink px-3 py-2 d-flex  flex-column  justify-content-center align-items-center ">
              <img class="navIcon px-1" src="./assets/img/online-course-list.svg">
              <a href="enroll.php">Enroll for Course </a>
            </li>

            <li class="navLink  px-3 py-2 d-flex  flex-column  justify-content-center align-items-center">
              <img class="navIcon" src="./assets/img/password.svg">
              <a href="change-password.php">Change Password</a>
            </li>
            <li class="navLink  px-3 py-2 d-flex  flex-column  justify-content-center align-items-center">
              <img class="navIcon" src="./assets/img/history.svg">
              <a href="enroll-history.php">Enroll History</a>
            </li>
            <li class="navLink  px-3 py-2 d-flex  flex-column  justify-content-center align-items-center ">
              <img class="navIcon" src="./assets/img/results.svg">
              <a href="results.php">Results</a>
            </li>
            <li class="navLink  px-3 py-2 d-flex  flex-column  justify-content-center align-items-center">
              <img class="navIcon" src="./assets/img/logout.svg">
              <a href="logout.php">


                Logout</a>
            </li>
          </ul>

        </div>
      </div>
    </nav>
    <div type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
      aria-label="Toggle navigation">
      <img style="width: 29px;" src="./assets/img/hamburger.png" />
    </div>




    <div class="offcanvas offcanvas-start" style="backdrop-filter: blur(5px) !important;
  background-color: rgba(2, 3, 37,0.8); color:white;" tabindex="-1" id="offcanvasNavbar"
      aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">WATICO</h5>
        <img style="width:25px; height:25px;" type="button" class="btn-close" src="./assets/img/close.svg"
          data-bs-dismiss="offcanvas" aria-label="Close" />
      </div>
      <div class="offcanvas-body d-flex justify-content-center align-items-center ">
        <ul class="navbar-nav justify-content-between  align-items-start mt-3 flex-grow-1 pe-3c">
          <li class="navLink px-3 py-2 d-flex justify-content-between">
            <img class="offcanvasNavIcon" src="./assets/img/profile.svg">
            <a href="my-profile.php">My Profile</a>
          </li>

          <li class="navLink px-3 py-2 d-flex justify-content-between">
            <img class="offcanvasNavIcon m-2 " src="./assets/img/online-course-list.svg">
            <a class="nav-link active" style="color: white ;" aria-current="page" href="enroll.php">Enroll for Course </a>
          </li>

          <li class="navLink px-3 py-2 d-flex justify-content-between">
            <img class="offcanvasNavIcon m-2" src="./assets/img/password.svg">
            <a style="color: white ;" class="nav-link " href="change-password.php">Change Password</a>
          </li>
          <li class="navLink px-3 py-2 d-flex justify-content-between ">
            <img class="offcanvasNavIcon m-2" src="./assets/img/history.svg">
            <a style="color: white ;" class="nav-link " href="enroll-history.php">Enroll History</a>
          </li>
          <li class="navLink px-3 py-2 d-flex justify-content-between">
            <img class="offcanvasNavIcon m-2" src="./assets/img/results.svg">
            <a style="color: white ;" class="nav-link " href="results.php">Results</a>
          </li>
          <li class="navLink px-3 py-2 d-flex justify-content-between ">
          <img class="offcanvasNavIcon m-2" src="./assets/img/logout.svg">

            <a style=" color: white ;" class="nav-link " href="logout.php">
              Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>