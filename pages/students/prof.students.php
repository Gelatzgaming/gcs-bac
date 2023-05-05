<!DOCTYPE html>
<html lang="en">
<title>Student's Profile | SFAC GCS</title>

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
                            <h5 class="mb-0">Edit Student's Profile</h5>
                        </div>
                        <form action="userData/user.edit.prof.students.php" method="POST" enctype="multipart/form-data">
                            <?php
                            $get_student = $conn->query("SELECT * FROM tbl_students WHERE stud_id = '$_GET[stud_id]'");
                            $res_count = $get_student->num_rows;
                            if ($res_count == 0) {
                                // error code
                            }
                            $row = $get_student->fetch_array();

                            ?>
                            <input class="form-control" type="text" name="stud_id"
                                value="<?php echo $row['stud_id']; ?>" hidden>
                            <div class="row">
                                <div class="form-group my-4">
                                    <div class="custom-file">
                                        <?php
                                        if (!empty($row['img'])) {
                                            echo '<div class="text-center mb-3">
                                            <img class="img-fluid img-circle" src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" alt="User profile picture" style="width: 120px; height: 120px;">
                                        </div>';
                                        } else {
                                            echo '<div class="text-center mb-3">
                                            <img class="img-fluid img-circle" src="../../assets/img/icons/user.png " alt="User profile picture" style="width: 120px; height: 120px;">
                                        </div>';
                                        }
                                        ?>
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
                            <h3 class="text-center">Personal Data</h3>
                            <div class="row mx-auto">
                                <div class="col-md-4 mx-auto">
                                    <div class="input-group input-group-static my-3">
                                        <label>Student No.</label>
                                        <input type="text" name="stud_no" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['stud_no']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 mx-auto">
                                    <div class="input-group input-group-static my-3">
                                        <label>Student No.</label>
                                        <select class="form-control" id="level" name="level"
                                            placeholder="Year/Grade Level">
                                            <option selected disabled>Select Gender</option>
                                            <?php
                                            $query = mysqli_query($conn, "SELECT * FROM tbl_genders");
                                            while ($row1 = mysqli_fetch_array($query)) {
                                                echo '
                                                <option value="' . $row1['gender'] . '">' . $row1['gender'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row mx-auto">
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Last name</label>
                                        <input type="text" name="lastname" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['lastname']; ?>" placeholder="Last name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>First name</label>
                                        <input type="text" name="firstname" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['firstname']; ?>" placeholder="First name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Middle Name</label>
                                        <input type="text" name="middlename" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['middlename']; ?>"
                                            placeholder="Middle name">
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto">
                                <div class="col-md-12">
                                    <div class="input-group input-group-static my-3">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['address']; ?>"
                                            placeholder="Enter your Address">
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto">
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Date of birth</label>
                                        <input type="date" name="birthdate" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['birthdate']; ?>"
                                            placeholder="Enter your birthdate">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Place of Birth</label>
                                        <input type="text" name="birthplace" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['birthplace']; ?>"
                                            placeholder="Enter your Place of Birth">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Age</label>
                                        <input type="text" name="age" class="form-control" autocomplete="off" required
                                            value="<?php echo $row['age']; ?>" placeholder="Enter your Age">
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto">
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Civil Status</label>
                                        <input type="text" name="civilstatus" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['civilstatus']; ?>"
                                            placeholder="Ex. Single/Married">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Citizenship</label>
                                        <input type="text" name="citizenship" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['citizenship']; ?>"
                                            placeholder="Ex. Filipino">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Religion</label>
                                        <input type="text" name="religion" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['religion']; ?>" placeholder="Ex. Catholic">
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto">
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['email']; ?>"
                                            placeholder="example@gmail.com">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Contact Number</label>
                                        <input type="text" name="contact" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['contact']; ?>"
                                            placeholder="Contact Number">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Landline</label>
                                        <input type="text" name="landline" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['landline']; ?>"
                                            placeholder="Landline Number">
                                    </div>
                                </div>
                            </div>





                            <h3 class="text-center my-3">Family Background</h3>
                            <div class="row mx-auto">
                                <h5>Father</h5>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Last Name</label>
                                        <input type="text" name="flastname" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['flastname']; ?>" placeholder="Last name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>First name</label>
                                        <input type="text" name="ffirstname" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['ffirstname']; ?>" placeholder="First name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Middle name</label>
                                        <input type="text" name="fmiddlename" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['fmiddlename']; ?>"
                                            placeholder="Middle name">
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto">
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Age</label>
                                        <input type="text" name="fage" class="form-control" autocomplete="off" required
                                            value="<?php echo $row['fage']; ?>" placeholder="00 yrs old">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Birthdate</label>
                                        <input type="date" name="fbirthdate" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['fbirthdate']; ?>" placeholder="First name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Citizenship</label>
                                        <input type="text" name="fcitizenship" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['fcitizenship']; ?>"
                                            placeholder="Ex. Filipino">
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto">
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Home Address</label>
                                        <input type="text" name="faddress" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['faddress']; ?>" placeholder="Home Address">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Tel No.</label>
                                        <input type="text" name="ftel_no" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['ftel_no']; ?>" placeholder="0123-4567">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Cell No.</label>
                                        <input type="text" name="fcell_no" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['fcell_no']; ?>" placeholder="09123456789">
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto">
                                <div class="col-md-5 mx-auto">
                                    <div class="input-group input-group-static my-3">
                                        <label>Education Attained</label>
                                        <input type="text" name="feducation" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['feducation']; ?>"
                                            placeholder="Education Attained">
                                    </div>
                                </div>
                                <div class="col-md-5 mx-auto">
                                    <div class="input-group input-group-static my-3">
                                        <label>Occupation</label>
                                        <input type="text" name="foccupation" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['foccupation']; ?>"
                                            placeholder="Occupation">
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto">
                                <h5>Mother</h5>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Last Name</label>
                                        <input type="text" name="mlastname" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['mlastname']; ?>" placeholder="Last name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>First name</label>
                                        <input type="text" name="mfirstname" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['mfirstname']; ?>" placeholder="First name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Middle name</label>
                                        <input type="text" name="mmiddlename" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['mmiddlename']; ?>"
                                            placeholder="Middle name">
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto">
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Age</label>
                                        <input type="text" name="mage" class="form-control" autocomplete="off" required
                                            value="<?php echo $row['mage']; ?>" placeholder="00 yrs old">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Birthdate</label>
                                        <input type="date" name="mbirthdate" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['mbirthdate']; ?>" placeholder="First name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Citizenship</label>
                                        <input type="text" name="mcitizenship" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['mcitizenship']; ?>"
                                            placeholder="Ex. Filipino">
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto">
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Home Address</label>
                                        <input type="text" name="maddress" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['maddress']; ?>" placeholder="Home Address">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Tel No.</label>
                                        <input type="text" name="mtel_no" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['mtel_no']; ?>" placeholder="0123-4567">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Cell No.</label>
                                        <input type="text" name="mcell_no" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['mcell_no']; ?>" placeholder="09123456789">
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto">
                                <div class="col-md-5 mx-auto">
                                    <div class="input-group input-group-static my-3">
                                        <label>Education Attained</label>
                                        <input type="text" name="meducation" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['meducation']; ?>"
                                            placeholder="Education Attained">
                                    </div>
                                </div>
                                <div class="col-md-5 mx-auto">
                                    <div class="input-group input-group-static my-3">
                                        <label>Occupation</label>
                                        <input type="text" name="moccupation" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['moccupation']; ?>"
                                            placeholder="Occupation">
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto">
                                <h5>Guardian</h5>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Last Name</label>
                                        <input type="text" name="glastname" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['glastname']; ?>" placeholder="Last name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>First name</label>
                                        <input type="text" name="gfirstname" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['gfirstname']; ?>" placeholder="First name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Middle name</label>
                                        <input type="text" name="gmiddlename" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['gmiddlename']; ?>"
                                            placeholder="Middle name">
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto">
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Age</label>
                                        <input type="text" name="gage" class="form-control" autocomplete="off" required
                                            value="<?php echo $row['gage']; ?>" placeholder="00 yrs old">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Birthdate</label>
                                        <input type="date" name="gbirthdate" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['gbirthdate']; ?>" placeholder="First name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Relationship</label>
                                        <input type="text" name="relationship" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['relationship']; ?>"
                                            placeholder="Ex. Mother/Father">
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto">
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Citizenship</label>
                                        <input type="text" name="gcitizenship" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['gcitizenship']; ?>"
                                            placeholder="Ex. Filipino">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Home Address</label>
                                        <input type="text" name="gaddress" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['gaddress']; ?>" placeholder="Home Address">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Education Attained</label>
                                        <input type="text" name="geducation" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['geducation']; ?>"
                                            placeholder="Education Attained">
                                    </div>
                                </div>


                            </div>
                            <div class="row mx-auto">
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Cell No.</label>
                                        <input type="text" name="gcell_no" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['gcell_no']; ?>" placeholder="09123456789">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Tel No.</label>
                                        <input type="text" name="gtel_no" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['gtel_no']; ?>" placeholder="0123-4567">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label>Occupation</label>
                                        <input type="text" name="goccupation" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['goccupation']; ?>"
                                            placeholder="Occupation">
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto">
                                <h5 class="text-center">No. of Siblings</h5>
                                <h6 class="text-center">(from first to last child)</h6>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-1">
                                        <label>Full name</label>
                                        <input type="text" name="sib1_name" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['sib1_name']; ?>" placeholder="Full name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-1">
                                        <label>Occupation</label>
                                        <input type="text" name="sib1_occ" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['sib1_occ']; ?>" placeholder="Occupation">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-1">
                                        <label>Contact Number</label>
                                        <input type="text" name="sib1_contact" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['sib1_contact']; ?>"
                                            placeholder="09123456789">
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto">
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-1">
                                        <input type="text" name="sib2_name" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['sib2_name']; ?>" placeholder="Full name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-1">
                                        <input type="text" name="sib2_occ" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['sib2_occ']; ?>" placeholder="Occupation">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-1">
                                        <input type="text" name="sib2_contact" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['sib2_contact']; ?>"
                                            placeholder="09123456789">
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto">
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-1">
                                        <input type="text" name="sib3_name" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['sib3_name']; ?>" placeholder="Full name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-1">
                                        <input type="text" name="sib3_occ" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['sib3_occ']; ?>" placeholder="Occupation">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-1">
                                        <input type="text" name="sib3_contact" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['sib3_contact']; ?>"
                                            placeholder="09123456789">
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto">
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-1">
                                        <input type="text" name="sib4_name" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['sib4_name']; ?>" placeholder="Full name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-1">
                                        <input type="text" name="sib4_occ" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['sib4_occ']; ?>" placeholder="Occupation">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-1">
                                        <input type="text" name="sib4_contact" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['sib4_contact']; ?>"
                                            placeholder="09123456789">
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto">
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-1">
                                        <input type="text" name="sib5_name" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['sib5_name']; ?>" placeholder="Full name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-1">
                                        <input type="text" name="sib5_occ" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['sib5_occ']; ?>" placeholder="Occupation">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-1">
                                        <input type="text" name="sib5_contact" class="form-control" autocomplete="off"
                                            required value="<?php echo $row['sib5_contact']; ?>"
                                            placeholder="09123456789">
                                    </div>
                                </div>
                            </div>




                    </div>
                    <a class="btn btn-secondary mx-3 mt-3" href="list.students.php"><i
                            class="fa fa-arrow-alt-circle-left"> </i>
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
        <?php include '../../includes/footer.php' ?>

    </main>

    <?php include '../../includes/footer-setting.php'; ?>

    <!--   Core JS Files   -->
    <?php include '../../includes/script.php'; ?>
</body>

</html>