<!DOCTYPE html>
<html lang="en">
<title>Edit Students | SFAC GCS</title>

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
                    } elseif (!empty($_SESSION['success-edit'])) {
                        echo ' <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
                        <span class="alert-text"><strong>Successully Added!</strong></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                        unset($_SESSION['success-edit']);
                    }
                    ?>
                    <div class="card mt-4">
                        <div class="card-header p-3">
                            <h5 class="mb-0">Edit Students</h5>
                        </div>
                        <form action="userData/user.edit.students.php" method="POST" enctype="multipart/form-data">
                            <?php
                            $get_student = $conn->query("SELECT * FROM tbl_students WHERE stud_id = '$_GET[stud_id]'");
                            $res_count = $get_student->num_rows;
                            if ($res_count == 0) {
                                // error code
                            }
                            $row = $get_student->fetch_array();

                            ?>
                            <input class="form-control" type="text" name="stud_id" value="<?php echo $row['stud_id']; ?>" hidden>
                            <div class="row">
                                <div class="form-group my-4">
                                    <div class="custom-file">
                                        <div class="text-center mb-3">
                                            <img class="img-fluid img-circle" src="../../assets/img/icons/user.png " alt="User profile picture" style="width: 120px; height: 120px;">
                                        </div>
                                        <div class="row">
                                            <div class="form-group m-auto col-md-2">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="form-control" name="prof_img" required>
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
                                        <label class="form-label"></label>
                                        <input type="text" name="firstname" class="form-control" autocomplete="off" required value="<?php echo $row['firstname']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label"></label>
                                        <input type="text" name="middlename" class="form-control" autocomplete="off" required value="<?php echo $row['middlename']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label"></label>
                                        <input type="text" name="lastname" class="form-control" autocomplete="off" required value="<?php echo $row['lastname']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto">
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label"></label>
                                        <input type="email" name="email" class="form-control" autocomplete="off" required value="<?php echo $row['email']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label"></label>
                                        <input type="text" name="stud_no" class="form-control" autocomplete="off" required value="<?php echo $row['stud_no']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static mb-4">
                                        <label for="exampleFormControlSelect1" class="ms-0">Year Level/Grade
                                            Level</label>
                                        <select class="form-control" id="level" name="level" placeholder="Year/Grade Level">
                                            <option value="<?php echo $row['yearlevel']; ?>">
                                                <?php echo $row['yearlevel']; ?></option>
                                            <?php
                                            $query1 = mysqli_query($conn, "SELECT * FROM tbl_grade_levels");
                                            while ($row2 = mysqli_fetch_array($query1)) {
                                                echo '<option value="' . $row2['grade_level'] . '">' . $row2['grade_level'] . '</option>';
                                            }
                                            ?>
                                            <?php
                                            $query = mysqli_query($conn, "SELECT * FROM tbl_year_levels");
                                            while ($row1 = mysqli_fetch_array($query)) {
                                                echo '
                                                <option value="' . $row1['year_level'] . '">' . $row1['year_level'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto">
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label"></label>
                                        <input type="text" name="username" class="form-control" autocomplete="off" required value="<?php echo $row['username']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" name="password2" class="form-control" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-secondary mx-3 mt-3" href="list.students.php"><i class="fa fa-arrow-alt-circle-left"> </i>
                                Back
                            </a>
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