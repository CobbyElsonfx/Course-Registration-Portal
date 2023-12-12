
  <nav id="sidebar">
            <div class="sidebar-header">
                <h3>WATICO</h3>
            </div>

            <ul class="list-unstyled components">
                <p>ADMIN DASHBOARD</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Manage</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="manage-students.php">Students</a>
                        </li>
                        <li>
                            <a href="student-registration.php">Registration</a>
                        </li>
                        <li>
                            <a href="programme.php">Programme</a>
                        </li>
                        <li>
                            <a href="course.php">New Course</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">History</a>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">History</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="enroll-history.php">Enrollment History</a>
                        </li>
                        <li>
                            <a href="user-log.php">User Logs</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="analytics.php">Analytics</a>
                </li>
                <li>
                    <a href="#">Results</a>
                </li>
            </ul>
            
    <div class="dropdown "  style="margin-top:4rem;">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
      <img class="offcanvasNavIcon m-2" src="../assets/img/logout.svg">
        <strong>Admin</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
      </ul>
    </div>

     
        </nav>