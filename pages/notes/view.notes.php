<!DOCTYPE html>
<html lang="en">
<title>Students Significant Notes | SFAC GCS</title>

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
                    } elseif (!empty($_SESSION['success-del'])) {
                        echo ' <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
                        <span class="alert-text"><strong>Successully Deleted!</strong></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                        unset($_SESSION['success-del']);
                    }
                    ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card mt-4">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                        <h6 class="text-white text-capitalize ps-3">Students Significant Notes</h6>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-5 mb-3 mt-4">
                                        <form method="GET">
                                            <div class="input-group">
                                                <input type="search" class="form-control" placeholder="Search for (Student no. or Name)" name="search">
                                                <div class="input-group-append">
                                                    <button type="submit" name="look" class="btn bg-navy" data-toggle="tooltip" data-placement="bottom" title="Search">
                                                        <i class="fa fa-search mt-4"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-2">
                                    <div class="table-responsive p-0 mx-3">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr class="light">
                                                    <th>Image</th>
                                                    <th>Fullname</th>
                                                    <th>Email</th>
                                                    <th>Year/Grade Level</th>
                                                    <th>Username</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_GET['look'])) {

                                                    $_GET['search'] = addslashes($_GET['search']);
                                                    $_SESSION['search'] = $_GET['search'];

                                                    $get_user = mysqli_query($conn, "SELECT *, CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename) AS fullname 
                                                FROM tbl_students
                                                LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                                WHERE (firstname LIKE '%$_GET[search]%' 
                                                OR middlename LIKE '%$_GET[search]%'
                                                OR lastname  LIKE '%$_GET[search]%' 
                                                OR stud_no LIKE '%$_GET[search]%'
                                                OR yearlevel LIKE '%$_GET[search]%')                         
                                                ORDER BY stud_id DESC
                                                ") or die(mysqli_error($conn));
                                                    while ($row = mysqli_fetch_array($get_user)) {
                                                        $id = $row['stud_id'];
                                                        $_SESSION['stud_no'] = $row['stud_no'];

                                                ?>



                                                        <tr>
                                                            <td><img class="img-fluid mr-4" src="data:image/jpeg;base64, <?php echo base64_encode($row['img']); ?>" alt="image" style="height: 80px; width: 100px"></td>
                                                            <td><?php echo $row['fullname'] ?></td>
                                                            <td><?php echo $row['email'] ?></td>
                                                            <td><?php echo $row['yearlevel'] ?></td>
                                                            <td><?php echo $row['username'] ?></td>
                                                            <td><a href="add.notes.php<?php echo '?stud_id=' . $id; ?>" type="button" class="btn btn-success mx-1"><i class="fa fa-edit"></i>
                                                                    Add Significant Notes
                                                                </a>
                                                                <br>
                                                                <a href="edit.notes.php<?php echo '?stud_id=' . $id; ?>" type="button" class="btn btn-info mx-1"><i class="fa fa-edit"></i>
                                                                    Edit Significant Notes
                                                                </a>

                                                            </td>
                                                        </tr>
                                                        <!-- Delete Modal Start-->
                                                        <div class="modal fade" id="delete<?php echo $row['stud_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Delete</h5>
                                                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-center my-5">
                                                                        <p>Are you sure you want to delete,
                                                                            <br><strong><i class="font-weight-bold"><?php echo $row['fullname'] ?></i></strong>
                                                                            ?
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <a type="button" href="userData/user.del.admin.php?stud_id=<?php echo $row['stud_id'] ?>" class="btn bg-gradient-primary">Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php }
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


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