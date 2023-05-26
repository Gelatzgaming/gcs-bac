<!DOCTYPE html>
<html lang="en">
<title>Edit Student Evaluation | SFAC GCS</title>

<head>
    <?php include '../../includes/header.php';

    $stud_id = $_GET['stud_id']
    ?>
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
                        <span class="alert-text"><strong>Successully Edited!</strong></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                        unset($_SESSION['success-edit']);
                    }
                    ?>
                    <div class="card mt-4">
                        <div class="card-header p-3">
                            <h5 class="mb-0">Edit Students Evaluation</h5>
                        </div>
                        <form action="userData/user.edit.eval.php?stud_id=<?php echo $stud_id ?>" method="POST" enctype="multipart/form-data">
                            <?php
                            $get_eval = $conn->query("SELECT * FROM tbl_evaluation WHERE stud_id = '$_GET[stud_id]'");
                            $res_count = $get_eval->num_rows;
                            if ($res_count == 0) {
                                // error code
                            }
                            $row = $get_eval->fetch_array();

                            ?>
                            <input class="form-control" type="text" name="stud_id" value="<?php echo $row['stud_id']; ?>" hidden>

                            <div class="row mx-auto">
                                <div class="col-md-4">
                                    <div class="input-group input-group-static mb-3">
                                        <label>Date of Assessment</label>
                                        <input type="date" name="date" class="form-control" required value="<?php echo $row['date']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static mb-3">
                                        <label>Nature of Exam</label>
                                        <input type="text" name="exam" class="form-control" autocomplete="off" required placeholder="Nature of Exam" value="<?php echo $row['exam']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static mb-3">
                                        <label>Name of Test</label>
                                        <input type="text" name="test" class="form-control" autocomplete="off" required placeholder="Name of Test" value="<?php echo $row['test']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto justify-content-center">
                                <div class="col-md-4">
                                    <div class="input-group input-group-static mb-3">
                                        <label>Key Result</label>
                                        <input type="text" name="result" class="form-control" autocomplete="off" required placeholder="Key Result" value="<?php echo $row['result']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static mb-3">
                                        <label>Description</label>
                                        <input type="text" name="description" class="form-control" autocomplete="off" required placeholder="Description" value="<?php echo $row['description']; ?>">
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