<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../../includes/header.php'; ?>
</head>

<body class="g-sidenav-show  bg-gray-200">

    <?php include '../../includes/sidebar.php'; ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <!-- Navbar -->
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row">

                <div class="col-md-12">
                    <?php
                    if (!empty($_SESSION['errors'])) {
                        echo ' <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
                                                            ';
                        foreach ($_SESSION['errors'] as $error) {
                            echo $error;
                        }
                        echo '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                        unset($_SESSION['errors']);
                    } elseif (!empty($_SESSION['success'])) {
                        echo ' <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
                        <span class="alert-text"><strong>Successully Added!</strong></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                        unset($_SESSION['success']);
                    }
                    ?>
                    <div class="card mt-4">
                        <div class="card-header p-3">
                            <h5 class="mb-0">Add Administrator</h5>
                        </div>
                        <form action="userData/user.add.admin.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group my-4">
                                    <div class="custom-file">
                                        <div class="text-center mb-3">
                                            <img class="img-fluid img-circle" src="../../assets/img/icons/user.png "
                                                alt="User profile picture" style="width: 120px; height: 120px;">
                                        </div>
                                        <div class="row">
                                            <div class="form-group m-auto col-md-2">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="form-control" name="prof_img"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto">
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">First name</label>
                                        <input type="text" name="firstname" class="form-control" autocomplete="off"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Last name</label>
                                        <input type="text" name="lastname" class="form-control" autocomplete="off"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" autocomplete="off"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto">
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" name="username" class="form-control" autocomplete="off"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" autocomplete="off"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" name="password2" class="form-control" autocomplete="off"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group float-end mx-3 mt-3">
                                <button class="btn btn-primary" type="submit" name="submit">
                                    Submit
                                </button>
                            </div>


                        </form>


                    </div>


                </div>
            </div>
        </div>
        <?php include '../../includes/footer.php' ?>

    </main>

    <?php include '../../includes/footer-setting.php'; ?>

    <!--   Core JS Files   -->
    <?php include '../../includes/script.php'; ?>
</body>

</html>