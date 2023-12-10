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
            <li class="navLink px-3 py-2 d-flex">
              <img class="profileIcon" src="./assets/img/profile.svg">

              <a href="my-profile.php">My Profile</a>
            </li>
            <li class="navLink px-3 py-2 d-flex ">
              <img class="enrollIcon px-1" src="./assets/img/online-course-list.svg">

              <a href="enroll.php">Enroll for Course </a>
            </li>

            <li class="navLink  px-3 py-2">
              <img class="passwordIcon" src="./assets/img/password.svg">

              <a href="change-password.php">Change Password</a>
            </li>
            <li class="navLink  px-3 py-2">

              <img class="historyIcon" src="./assets/img/history.svg">
              <a href="enroll-history.php">Enroll History</a>
            </li>
            <li class="navLink  px-3 py-2">
              <img class="logoutIcon" src="./assets/img/logout.svg">
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
        <ul class="navbar-nav justify-content-between  align-items-center mt-3 flex-grow-1 pe-3c">
          <li class="navLink px-3 py-2">
            <img class="profileIcon" src="./assets/img/profile.svg">

            <a href="my-profile.php">My Profile</a>
          </li>

          <li class="nav-item mb-3">
            <img class="enrollIcon px-1" src="./assets/img/online-course-list.svg">

            <a class="nav-link active" style="font-size: 1.2rem;
  font-weight: 500 ;
  color: white ;" aria-current="page" href="enroll.php">Enroll for Course </a>
          </li>

          <li class="nav-item mb-3 ">
          <img class="passwordIcon" src="./assets/img/password.svg">

            <a style="font-size: 1.2rem;
  font-weight: 500 ;
  color: white ;" class="nav-link " href="change-password.php">Change Password</a>
          </li>
          <li class="nav-item mb-3 ">
          <img class="historyIcon" src="./assets/img/history.svg">

            <a style="font-size: 1.2rem;
  font-weight: 500 ;
  color: white ;" class="nav-link " href="enroll-history.php">Enroll History</a>
          </li>
          <li class="nav-item mb-3 ">
            <a style="font-size: 1.2rem;
  font-weight: 500 ;
  color: white ;" class="nav-link " href="logout.php">


              Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>