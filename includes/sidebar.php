<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="../dashboard/index.php">
            <img src="../../assets/img/icons/logo.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">SFAC Bacoor | GCS</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">

            <?php if ($_SESSION['role'] == "Super Admin") {
        echo '<li class="nav-item">
        <a class="nav-link text-white active bg-gradient-primary" href="../dashboard/index.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
        </a>
    </li>
    <h6 class="mx-4 mt-3" style="color: white;">Add Users</h6>
        <li class="nav-item">
          <a class="nav-link text-white " href="../super_admin/add.admin.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-plus-square"></i>
            </div>
            <span class="nav-link-text ms-1">Add Admin</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../students/add.students.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-plus-square"></i>
            </div>
            <span class="nav-link-text ms-1">Add Students</span>
          </a>
        </li>
    
    <h6 class="mx-4 mt-3" style="color: white;">User Lists</h6>
        <li class="nav-item">
          <a class="nav-link text-white " href="../super_admin/list.admin.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-user"></i>
            </div>
            <span class="nav-link-text ms-1">Admin List</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../students/list.students.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-user"></i>
            </div>
            <span class="nav-link-text ms-1">Students List</span>
          </a>
        </li>
    ';
      } elseif ($_SESSION['role'] == "Administrator") {
        echo '<li class="nav-item">
        <a class="nav-link text-white active bg-gradient-primary" href="../dashboard/index.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
        </a>
    </li>
    <h6 class="mx-4 mt-3" style="color: white;">Manage Students</h6>
        <li class="nav-item">
          <a class="nav-link text-white " href="../students/add.students.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-plus-square"></i>
            </div>
            <span class="nav-link-text ms-1">Add Students</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../evaluation/view.eval.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-address-card"></i>
            </div>
            <span class="nav-link-text ms-1">Student Evaluation</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../notes/view.notes.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-newspaper-o"></i>
            </div>
            <span class="nav-link-text ms-1">Significant Notes</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../students/list.students.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-user"></i>
            </div>
            <span class="nav-link-text ms-1">Students List</span>
          </a>
        </li>
        <h6 class="mx-4 mt-3" style="color: white;">Forms</h6>
        <li class="nav-item">
        <a class="nav-link text-white " href="../forms/guidance.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-file-o"></i>
          </div>
          <span class="nav-link-text ms-1">Blank Forms</span>
        </a>
      </li>
      
        ';
      } elseif ($_SESSION['role'] == "Student") {
        echo '<li class="nav-item">
        <a class="nav-link text-white active bg-gradient-primary" href="../pages/dashboard/index.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
        </a>
    </li>
    <h6 class="mx-4 mt-3" style="color: white;">Manage Students</h6>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/billing.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-plus-square"></i>
            </div>
            <span class="nav-link-text ms-1">Add Students</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/billing.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-user"></i>
            </div>
            <span class="nav-link-text ms-1">Students List</span>
          </a>
        </li>
        <h6 class="mx-4 mt-3" style="color: white;">Forms</h6>
        <li class="nav-item">
        <a class="nav-link text-white " href="../pages/billing.html">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-file-o"></i>
          </div>
          <span class="nav-link-text ms-1">Blank Forms</span>
        </a>
      </li>
      
        ';
      }

      ?>

        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <!-- <a class="btn bg-gradient-primary mt-4 w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade
                to pro</a> -->
        </div>
    </div>
</aside>