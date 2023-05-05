<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">

            </ol>
            <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                    <label class="form-label">Type here...</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user cursor-pointer"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end px-3 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                        <div class="caption ms-3 d-none d-md-block ">
                            <h6 class="mb-0 caption-title text-center"><?php echo $user_fullname; ?></h6>
                            <p class="mb-0 caption-sub-title text-center"><?php echo $_SESSION['role'] ?></p>
                        </div>
                        <hr style="border: 1px solid black;">
                        <a class="btn btn-danger" href="../login/userData/user.logout.php" type="button"
                            style="margin-left: 30px;">
                            Log out
                        </a>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>