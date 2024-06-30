<?php
    session_start();
    //para ma-check if nag log in ba si user
    if(!isset($_SESSION['username']))
    {
        header("Location: index.php");
    }
    include ('connection.php');

    $student_no = $_GET['student_no'];
    //Fetching datas for outputting student infos
    $sql = "SELECT * FROM student_info WHERE student_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $student_no);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    //Fetching datas for outputting guardian infos
    $sql1 = "SELECT * FROM guardian_info WHERE student_employee_no = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("s", $student_no);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    $row1 = $result1->fetch_assoc();
    
    $mname = $row['Mname'];
    $minitial = strtoupper(substr($mname, 0, 1)); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CCST SHS</title>
  <link rel="icon" type="image/x-icon" href="a/logo-re.png">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
  <style>
    .widget-user-header {
      padding: 20px; /* add some padding */
      border-radius: 10px; /* add a border radius */
    }

    .widget-user-username {
      font-size: 18px; /* change the font size to 24px */
      font-weight: bold; /* make the font bold */
      color: #fff; /* change the text color to white */
    }

    .widget-user-desc {
      font-size: 18px; /* change the font size to 18px */
      color: #ccc; /* change the text color to a light gray */
  margin-top: 10px; /* add some margin top */
    }

    .table-sm td, .table-sm th {
        padding: 0.25rem; /* Reduces padding inside cells */
    }
    .fw-semibold {
        font-weight: 600; /* Ensures text is bold but not overly so */
    }
    .align-middle {
        vertical-align: middle;
    }
    p {
        margin: 0; /* Removes default margins around paragraphs */
    }
  </style>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li cSlass="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link text-secondary text-decoration-none">
      <img src="a/logo-re.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .9">
      <span class="brand-text fw-bold">CCST SHS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="a/blankprofile.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block text-decoration-none text-secondary">Registrar</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="adminIndex.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Records
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Students
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="regularStudents.php" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Regular</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Irregular</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fas fa-user-tie nav-icon"></i>
                  <p>Teachers</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="gradeRevisions.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Grade Revisions
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Documents
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="generateForm137.php" class="nav-link">
                  <i class="fas fa-file nav-icon"></i>
                  <p>Form 137</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fas fa-file nav-icon"></i>
                  <p>Form 138</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="generateGoodMoral.php" class="nav-link">
                  <i class="fas fa-file nav-icon"></i>
                  <p>Good Moral Certificate</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Add People
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addstudent.php" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Student</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="addteacher.php" class="nav-link">
                  <i class="fas fa-user-tie nav-icon"></i>
                  <p>Teacher</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="subjectTeacher.php" class="nav-link active">
                  <i class="fas fa-user-tie nav-icon"></i>
                  <p>Subject Teacher</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="addcoordinator.php" class="nav-link">
                  <i class="fas fa-user-tie nav-icon"></i>
                  <p>Coordinator</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Add Course
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Strand.php" class="nav-link">
                  <i class="fas fa-book-open nav-icon"></i>
                  <p>Strand</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Section.php" class="nav-link">
                  <i class="fas fa-book-open nav-icon"></i>
                  <p>Section</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Subject.php" class="nav-link">
                  <i class="fas fa-book-open nav-icon"></i>
                  <p>Subject</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link text-danger">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

        <?php
            //SUBJECT ADDED
            if (isset($_GET['updated'])) {
              echo "
                <script src='plugins/sweetalert2/sweetalert2.min.js'></script>
                <script>
                  Swal.fire({
                    icon: 'success',
                    title: 'Student Information Updated Successfully!',
                  });
                </script>
              ";
            }
          ?>

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 fw-bold fs-4">Regular Students</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

             <!-- ./row -->
        <div class="row">
          <div class="col-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Guardian Info</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Scholastic Records</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Grades</a>
                  </li>
                </ul>
              </div>

              <div class="card-body">

                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <!-- STUDENT PROFILE -->
                   <!-- CONTENT -->
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                    <!-- PROFILE -->
                    <!-- CONTENT -->
                    <div class="row">
                        <div class="col-xl-5">
                            <!-- Profile picture card-->
                            <div class="card mb-3 mb-xl-0">
                                <div class="card-header d-flex align-items-center">
                                    
                                    <img class="img-account-profile rounded-circle mb-2" src="a/blankprofile.jpg" style="height:70pt; width:70pt;" alt="">
                                    <span class="ms-2">
                                    <div class="fs-4 text-start fw-semibold"><?=$row['Lname']."".$row['Suffix'].", ".$row['Fname']." ".$minitial."."?></div>
                                    <figcaption class="fw-bold"><?=$row['strand']."".$row['grade_level']."-".$row['section']?></figcaption>
                                    <figcaption class="fw-bold"><?=$row['student_no']?></figcaption>
                                    </span>
                                </div>
                                <div class="card-body text-start text-primary">
                                    <div class="col">
                                        <span><i class="bi bi-caret-right-fill me-2"></i></span>
                                        <strong class="text-uppercase fs-6"><?=" ACADEMIC YEAR ".$row['school_year']?></strong>
                                    </div>
                                    <div class="col">
                                        <span><i class="bi bi-caret-right-fill me-2"></i></span>
                                        <strong class="text-uppercase fs-6"><?=$row['track']?> Track</strong>
                                    </div>
                                    <div class="col">
                                        <span><i class="bi bi-caret-right-fill me-2"></i></span>
                                        <strong class="fs-6"><?=$row['strand']?> - <?=$row['grade_level']?></strong> 
                                    </div>
                                    <div class="col">
                                        <span><i class="bi bi-caret-right-fill me-2"></i></span>
                                        <strong class="text-uppercase fs-6 text-success"><?=$row['status']?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header fw-bold">Personal Information</div>
                                <div class="card-body">
                                    <form action="update.php?student_no=<?=$student_no?>" method="post">
                                        <!-- Form Group (username)-->
                                        <div class="row mb-3">
                                            <div class="col-md-3">
                                                <label class="small mb-1" for="inputFirstName">First Name</label>
                                                <input class="form-control" id="inputFirstName" name="Fname" type="text" value="<?=$row['Fname']?>" readonly>
                                            </div>
                                            <!-- Form Group (last name)-->
                                            <div class="col-md-3">
                                                <label class="small mb-1" for="inputLastName">Middle Name</label>
                                                <input class="form-control" id="inputLastName" name="Mname" type="text" value="<?=$row['Mname']?>" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="small mb-1" for="inputLastName">Last Name</label>
                                                <input class="form-control" id="inputLastName" name="Lname" type="text" value="<?=$row['Lname']?>" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="small mb-1" for="inputLastName">Suffix</label>
                                                <input class="form-control" id="inputLastName" name="Suffix" type="text" value="<?=$row['Suffix']?>" readonly>
                                            </div>
                                        </div>
                                        <!-- Form Row-->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (first name)-->
                                            <div class="col-md-4">
                                                <label class="small mb-1" for="inputFirstName">Birthday</label>
                                                <input class="form-control" id="inputFirstName" name="birthday" type="date" value="<?=$row['birthday']?>" readonly>
                                            </div>
                                            <!-- Form Group (last name)-->
                                            <div class="col-md-4">
                                                <label class="small mb-1" for="inputLastName">Age</label>
                                                <input class="form-control" id="inputLastName" name="age" type="number" value="<?=$row['age']?>" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sex" class="small mb-1">Sex <span class="text-danger">*</span></label>
                                                <select name="sex" id="sex" class="form-select" readonly>
                                                    <option disabled>Select Gender</option>
                                                    <option value="Male" <?= ($row['Gender'] == 'Male') ? 'selected' : '' ?>>Male</option>
                                                    <option value="Female" <?= ($row['Gender'] == 'Female') ? 'selected' : '' ?>>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Form Row        -->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (organization name)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputOrgName">Email</label>
                                                <input class="form-control" id="inputOrgName" name="email" type="email" value="<?=$row['email']?>" readonly>
                                            </div>
                                            <!-- Form Group (location)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLocation">Contact Number</label>
                                                <input class="form-control" id="inputLocation" name="contact_num" type="number" value="<?=$row['contact_num']?>" readonly>
                                            </div>
                                        </div>
                                        <!-- Form Group (email address)-->
                                        <div class="mb-3" id="addressDiv">
                                            <label class="small mb-1" for="inputEmailAddress">Address</label>
                                            <input class="form-control" id="inputEmailAddress" type="text" placeholder="Enter your email address" value="<?=$row['house_num']." ".$row['brgy_name'].", ".$row['citymun_name'].", ".$row['prov_name']?>" readonly>
                                        </div>
                                        <div class="d-flex justify-content-end" id="updatePdiv">
                                            <button id="updateprofile" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .CONTENT -->
                    <!-- PROFILE -->
                  </div>
                  <!-- CONTENT -->
                  <!-- STUDENT PROFILE -->

                  <!-- GUARDIAN INFO -->
                  <!-- CONTENT -->
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    <div class="row">
                            <div class="col-xl-5">
                                <!-- Profile picture card-->
                                <div class="card mb-3 mb-xl-0">
                                    <div class="card-header d-flex align-items-center">
                                        
                                        <img class="img-account-profile rounded-circle mb-2" src="a/blankprofile.jpg" style="height:70pt; width:70pt;" alt="">
                                        <span class="ms-2">
                                        <div class="fs-4 text-start fw-semibold"><?=$row['Lname']."".$row['Suffix'].", ".$row['Fname']." ".$minitial."."?></div>
                                        <figcaption class="fw-bold"><?=$row['strand']."".$row['grade_level']."-".$row['section']?></figcaption>
                                        <figcaption class="fw-bold"><?=$row['student_no']?></figcaption>
                                        </span>
                                    </div>
                                    <div class="card-body text-start text-primary">
                                        <div class="col">
                                            <span><i class="bi bi-caret-right-fill me-2"></i></span>
                                            <strong class="text-uppercase fs-6"><?=" ACADEMIC YEAR ".$row['school_year']?></strong>
                                        </div>
                                        <div class="col">
                                            <span><i class="bi bi-caret-right-fill me-2"></i></span>
                                            <strong class="text-uppercase fs-6"><?=$row['track']?> Track</strong>
                                        </div>
                                        <div class="col">
                                            <span><i class="bi bi-caret-right-fill me-2"></i></span>
                                            <strong class="fs-6"><?=$row['strand']?> - <?=$row['grade_level']?></strong> 
                                        </div>
                                        <div class="col">
                                            <span><i class="bi bi-caret-right-fill me-2"></i></span>
                                            <strong class="text-uppercase fs-6 text-success"><?=$row['status']?></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header fw-bold">Guardian Information</div>
                                    <div class="card-body">
                                        <form action="update.php" method="post">
                                            <!-- Form Group (username)-->
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputFirstName">Guardian Name</label>
                                                    <input class="form-control" id="inputFirstName" type="text" value="<?=$row1['g_name']?>" disabled>
                                                </div>
                                            </div>
                                            <!-- Form Row -->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (location)-->
                                                <div class="col-md-3">
                                                    <label class="small mb-1" for="inputLocation">Contact Number</label>
                                                    <input class="form-control" id="inputLocation" type="number" value="<?=$row1['g_contact_no']?>" disabled>
                                                </div>
                                            </div>
                                            <!-- Form Group (email address)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputEmailAddress">Address</label>
                                                <input class="form-control" id="inputEmailAddress" type="text" placeholder="Enter your email address" value="<?=$row1['g_house_num']." ".$row1['g_brgyname'].", ".$row1['g_citymunname'].", ".$row1['g_provname']?>" disabled>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <a href="updateGuardian.php" class="btn btn-primary">Update</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  <!-- CONTENT -->
                  <!-- GUARDIAN INFO -->

                  <!-- SCHOLASTIC RECORDS -->
                  <!-- CONTENT -->
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                    <div class="row">
                        <div class="col-xl-5">
                            <!-- Profile picture card-->
                            <div class="card mb-3 mb-xl-0">
                                <div class="card-header d-flex align-items-center">
                                        
                                    <img class="img-account-profile rounded-circle mb-2" src="a/blankprofile.jpg" style="height:70pt; width:70pt;" alt="">
                                    <span class="ms-2">
                                    <div class="fs-4 text-start fw-semibold"><?=$row['Lname']."".$row['Suffix'].", ".$row['Fname']." ".$minitial."."?></div>
                                    <figcaption class="fw-bold"><?=$row['strand']."".$row['grade_level']."-".$row['section']?></figcaption>
                                    <figcaption class="fw-bold"><?=$row['student_no']?></figcaption>
                                    </span>
                                </div>
                                <div class="card-body text-start text-primary">
                                    <div class="col">
                                        <span><i class="bi bi-caret-right-fill me-2"></i></span>
                                            <strong class="text-uppercase fs-6"><?=" ACADEMIC YEAR ".$row['school_year']?></strong>
                                        </div>
                                        <div class="col">
                                            <span><i class="bi bi-caret-right-fill me-2"></i></span>
                                            <strong class="text-uppercase fs-6"><?=$row['track']?> Track</strong>
                                        </div>
                                        <div class="col">
                                            <span><i class="bi bi-caret-right-fill me-2"></i></span>
                                            <strong class="fs-6"><?=$row['strand']?> - <?=$row['grade_level']?></strong> 
                                        </div>
                                        <div class="col">
                                            <span><i class="bi bi-caret-right-fill me-2"></i></span>
                                            <strong class="text-uppercase fs-6 text-success"><?=$row['status']?></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header fw-bold">Scholastic Records</div>
                                    <div class="card-body">
                                        <form action="update.php" method="post">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="lrn" class="form-label">LRN</label>
                                                <input type="number" name="lrn" class="form-control" id="lrn" placeholder="<?=$row['LRN']?>" minlength="12" maxlength="12" disabled>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="shs_admit" class="form-label">Date of SHS Admission</label>
                                                <input type="date" id="shs_admit" class="form-control" name="date_shs_admission" value = "<?=$row['shs_admission_date']?>" disabled>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="grade_level" class="form-label">Grade Level</label>
                                                <select name="grade_level" id="grade_level" class="form-select" disabled>
                                                    <option disabled selected><?=$row['grade_level']?></option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="section" class="form-label">Section</label>
                                                <select name="section" id="section" class="form-select" disabled>
                                                    <option disabled selected><?=$row['section']?></option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="track" class="form-label">Track</label>
                                                <select name="track" id="track" class="form-select" disabled>
                                                    <option disabled selected><?=$row['track']?></option>
                                                    <option>Academic</option>
                                                    <option>TVL</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="strand" class="form-label">Strand</label>
                                                <select name="strand" class="form-select" id="strand" disabled>
                                                    <option disabled selected><?=$row['strand']?></option>
                                                    <option>STEM</option>
                                                    <option>ABM</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="sem" class="form-label">Term</label>
                                                <select name="sem" class="form-select" id="sem" disabled>
                                                    <option disabled selected><?=$row['semester']?></option>
                                                    <option>1st Semester</option>
                                                    <option>2nd Semester</option>
                                                </select>
                                            </div>  
                                            <div class="col-md-3">
                                                <label for="school_year" class="form-label">School Year</label>
                                                <select name="school_year" id="school_year" class="form-select" disabled>
                                                    <option disabled selected><?=$row['school_year']?></option>
                                                    <option>2023-2024</option>
                                                    <option>2024-2025</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="status" class="form-label">Status</label>
                                                <select name="status" id="status" class="form-select" disabled>
                                                    <option disabled selected><?=$row['status']?></option>
                                                    <option>Regular</option>
                                                    <option>Irregular</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3 mt-4 ms-3" style="flex-direction: row; align-items:center;">
                                                <input type="checkbox" class="form-check-input" name="HScompleter" id="HScompleter" value="High School Completer">
                                                <label for="HScompleter" class="form-label" style="font-size:12pt; padding-left:2pt;">High School Completer</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="HSgen_ave" class="form-label">High School Gen. Ave</label>
                                                <input type="number" id="HSgen_ave" class="form-control" name="HSgen_ave" placeholder="Enter Gen. Ave" min="60" max="100">
                                            </div>
                                            
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3 mt-4 ms-4" style="flex-direction: row; align-items:center;">
                                                <input type="checkbox" name="JHScompleter" class="form-check-input" id="JHScompleter" value="Junior High School Completer" checked disabled>
                                                <label for="JHScompleter" class="form-label" style="font-size:12pt; padding-left:2pt;">Junior High School Completer</label>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="JHSgen_ave" class="form-label">Junior High School Gen. Ave</label>
                                                <input type="number" id="JHSgen_ave" class="form-control" name="JHSgen_ave" placeholder="<?=$row['JHS_genave']?>" min="60" max="100" disabled>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="date_graduation" class="form-label">Date of Graduation/Completion</label>
                                                <input type="date" class="form-control" id="date_graduation" name="date_graduation" value="<?=$row['graduation_date']?>" disabled>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <label for="name_school" class="form-label">Name of School</label>
                                                <input type="text" class="form-control" id="name_school" name="name_school" placeholder="<?=$row['school_name']?>" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="school_address" class="form-label">School Address</label>
                                                <input type="text" class="form-control" id="school_address" name="school_address" placeholder="<?=$row['school_address']?>" disabled>
                                            </div>
                                        </div>
                                            <button class="btn btn-primary mt-2" type="button">Save changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  <!-- CONTENT -->
                  <!-- SCHOLASTIC RECORDS -->


                  <!-- GRADES -->
                  <!-- CONTENT -->
                  <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                    <div class="row">
                        <div class="col">

                            <div class="nav w-100 mb-2" id="myTab" role="tablist">
                              <button class="nav-link btn btn-info active col-6" id="grade11-tab" data-bs-toggle="tab" href="#grade11" role="tab" aria-controls="grade11" aria-selected="true">Grade 11</button>
                              <button class="nav-link btn btn-info col-6" id="grade12-tab" data-bs-toggle="tab" href="#grade12" role="tab" aria-controls="grade12" aria-selected="false">Grade 12</button>
                            </div>

                            <div class="tab-content" id="myTabContent">

                                <!-- G11 GRADES CONTENTS START -->
                                <div class="tab-pane fade show active" id="grade11" role="tabpanel" aria-labelledby="grade11-tab">

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#1stSemModal">
                                        View Grade 11 Grades
                                    </button>

                                    <!-- Modal G11 GRADES -->
                                    <div class="modal fade" id="1stSemModal" tabindex="-1" aria-labelledby="1stSemModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="1stSemModalLabel">Grade 11 Grades</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            
                                                <!-- 1ST SEMESTER VIEW GRADES -->
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">1st Semester</h5>

                                                        <table cellspacing="0" class="table table-sm table-bordered table-striped text-center align-middle">
                                                        <thead>
                                                            <tr>
                                                                <td rowspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">Indicate if Subject is CORE, APPLIED, or SPECIALIZED</p>
                                                                </td>
                                                                <td rowspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">SUBJECTS</p>
                                                                </td>
                                                                <td colspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">Quarter</p>
                                                                </td>
                                                                <td rowspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">SEM FINAL GRADE</p>
                                                                </td>
                                                                <td rowspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">ACTION TAKEN</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">1ST</p>
                                                                </td>
                                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">2ND</p>
                                                                </td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- CORE SUBJECTS -->
                                                            <?php
                                                            $query = "SELECT * FROM core_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                                                            $stmt = $conn->prepare($query);
                                                            $stmt->bind_param("s", $student_no);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();

                                                            if($result->num_rows > 0)
                                                            {
                                                                while($row = $result->fetch_assoc())
                                                                { ?>

                                                                    
                                                                    <tr>
                                                                        <td>
                                                                        <p class="s8">Core</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['1st']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['2nd']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['final']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['remarks']?></p>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php }
                                                            }
                                                            else
                                                            {?>
                                                                
                                                                    <tr>
                                                                        <td>
                                                                            Student has no Core Subject to take!
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php  }
                                                            ?>
                                                            <!-- APPLIED SUBJECTS -->
                                                            <?php
                                                            $query = "SELECT * FROM applied_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                                                            $stmt = $conn->prepare($query);
                                                            $stmt->bind_param("s", $student_no);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();

                                                            if($result->num_rows > 0)
                                                            {
                                                                while($row = $result->fetch_assoc())
                                                                { ?>

                                                                    
                                                                    <tr>
                                                                        <td>
                                                                        <p class="s8">Applied</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['1st']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['2nd']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['final']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['remarks']?></p>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php }
                                                            }
                                                            else
                                                            {?>
                                                                
                                                                    <tr>
                                                                        <td>
                                                                            Student has no Applied Subject to take!
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php  }
                                                            ?>
                                                            <!-- SPECIALIZED SUBJECTS -->
                                                            <?php
                                                            $query = "SELECT * FROM specialized_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                                                            $stmt = $conn->prepare($query);
                                                            $stmt->bind_param("s", $student_no);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();

                                                            if($result->num_rows > 0)
                                                            {
                                                                while($row = $result->fetch_assoc())
                                                                { ?>

                                                                    
                                                                    <tr>
                                                                        <td>
                                                                        <p class="s8">Specialized</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['1st']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['2nd']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['final']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['remarks']?></p>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php }
                                                            }
                                                            else
                                                            {?>
                                                                
                                                                    <tr>
                                                                        <td>
                                                                            Student has no Specialized Subject to take!
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php  }
                                                            ?>
                                                            <!-- OTHER SUBJECTS -->
                                                            <?php
                                                            $query = "SELECT * FROM other_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                                                            $stmt = $conn->prepare($query);
                                                            $stmt->bind_param("s", $student_no);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();

                                                            if($result->num_rows > 0)
                                                            {
                                                                while($row = $result->fetch_assoc())
                                                                { ?>

                                                                    
                                                                    <tr>
                                                                        <td>
                                                                        <p class="s8">Other</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['1st']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['2nd']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['final']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['remarks']?></p>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php }
                                                            }
                                                            else
                                                            {?>
                                                                
                                                                    <tr>
                                                                        <td>
                                                                            Student has no Other Subject to take!
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php  }
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                            </tr>
                                                            <!-- OTHER SUBJECTS -->
                                                            <?php
                                                            $query = "SELECT * FROM gen_aves WHERE student_no = ?";
                                                            $stmt = $conn->prepare($query);
                                                            $stmt->bind_param("s", $student_no);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();

                                                            if($result->num_rows > 0)
                                                            {
                                                                while($row = $result->fetch_assoc())
                                                                { ?>

                                                                    
                                                                    <tr>
                                                                        <td colspan="4" bgcolor="#BEBEBE" class="justify-content-center">
                                                                            <p class="fw-semibold text-end">General Ave. for the Semester:</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['g11_1stSem']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['g11_1remarks']?></p>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php }
                                                            }
                                                            else
                                                            {?>
                                                                
                                                                    <tr>
                                                                        <td>
                                                                            Student has no General Average!
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php  }
                                                            ?>
                                                        </tbody>
                                                    </table>

                                                    </div>
                                                </div>
                                                <!-- 1ST SEMESTER VIEW GRADES -->

                                                <!-- 2ND SEMESTER VIEW GRADES -->
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">2nd Semester</h5>

                                                        <table cellspacing="0" class="table table-sm table-bordered table-striped text-center align-middle">
                                                        <thead>
                                                            <tr>
                                                                <td rowspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">Indicate if Subject is CORE, APPLIED, or SPECIALIZED</p>
                                                                </td>
                                                                <td rowspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">SUBJECTS</p>
                                                                </td>
                                                                <td colspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">Quarter</p>
                                                                </td>
                                                                <td rowspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">SEM FINAL GRADE</p>
                                                                </td>
                                                                <td rowspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">ACTION TAKEN</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">3RD</p>
                                                                </td>
                                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">4TH</p>
                                                                </td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- CORE SUBJECTS -->
                                                            <?php
                                                            $query = "SELECT * FROM core_sub_grades WHERE student_no = ? AND sem = '2nd Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                                                            $stmt = $conn->prepare($query);
                                                            $stmt->bind_param("s", $student_no);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();

                                                            if($result->num_rows > 0)
                                                            {
                                                                while($row = $result->fetch_assoc())
                                                                { ?>

                                                                    
                                                                    <tr>
                                                                        <td>
                                                                        <p class="s8">Core</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['1st']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['2nd']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['final']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['remarks']?></p>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php }
                                                            }
                                                            else
                                                            {?>
                                                                
                                                                    <tr>
                                                                        <td>
                                                                            Student has no Core Subject to take!
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php  }
                                                            ?>
                                                            <!-- APPLIED SUBJECTS -->
                                                            <?php
                                                            $query = "SELECT * FROM applied_sub_grades WHERE student_no = ? AND sem = '2nd Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                                                            $stmt = $conn->prepare($query);
                                                            $stmt->bind_param("s", $student_no);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();

                                                            if($result->num_rows > 0)
                                                            {
                                                                while($row = $result->fetch_assoc())
                                                                { ?>

                                                                    
                                                                    <tr>
                                                                        <td>
                                                                        <p class="s8">Applied</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['1st']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['2nd']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['final']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['remarks']?></p>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php }
                                                            }
                                                            else
                                                            {?>
                                                                
                                                                    <tr>
                                                                        <td>
                                                                            Student has no Applied Subject to take!
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php  }
                                                            ?>
                                                            <!-- SPECIALIZED SUBJECTS -->
                                                            <?php
                                                            $query = "SELECT * FROM specialized_sub_grades WHERE student_no = ? AND sem = '2nd Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                                                            $stmt = $conn->prepare($query);
                                                            $stmt->bind_param("s", $student_no);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();

                                                            if($result->num_rows > 0)
                                                            {
                                                                while($row = $result->fetch_assoc())
                                                                { ?>

                                                                    
                                                                    <tr>
                                                                        <td>
                                                                        <p class="s8">Specialized</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['1st']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['2nd']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['final']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['remarks']?></p>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php }
                                                            }
                                                            else
                                                            {?>
                                                                
                                                                    <tr>
                                                                        <td>
                                                                            Student has no Specialized Subject to take!
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php  }
                                                            ?>
                                                            <!-- OTHER SUBJECTS -->
                                                            <?php
                                                            $query = "SELECT * FROM other_sub_grades WHERE student_no = ? AND sem = '2nd Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                                                            $stmt = $conn->prepare($query);
                                                            $stmt->bind_param("s", $student_no);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();

                                                            if($result->num_rows > 0)
                                                            {
                                                                while($row = $result->fetch_assoc())
                                                                { ?>

                                                                    
                                                                    <tr>
                                                                        <td>
                                                                        <p class="s8">Other</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['1st']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['2nd']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['final']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['remarks']?></p>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php }
                                                            }
                                                            else
                                                            {?>
                                                                
                                                                    <tr>
                                                                        <td>
                                                                            Student has no Other Subject to take!
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php  }
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                            </tr>
                                                            <!-- OTHER SUBJECTS -->
                                                            <?php
                                                            $query = "SELECT * FROM gen_aves WHERE student_no = ? ";
                                                            $stmt = $conn->prepare($query);
                                                            $stmt->bind_param("s", $student_no);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();

                                                            if($result->num_rows > 0)
                                                            {
                                                                while($row = $result->fetch_assoc())
                                                                { ?>

                                                                    
                                                                    <tr>
                                                                        <td colspan="4" bgcolor="#BEBEBE" class="justify-content-center">
                                                                            <p class="fw-semibold text-end">General Ave. for the Semester:</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['g11_2ndSem']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['g11_2remarks']?></p>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php }
                                                            }
                                                            else
                                                            {?>
                                                                
                                                                    <tr>
                                                                        <td>
                                                                            Student has no General Average!
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php  }
                                                            ?>
                                                        </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <!-- 2nD SEMESTER VIEW GRADES -->

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal G11 GRADES -->
                                        
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                        <h3 class="card-title">1st Semester</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                        </div>
                                        <div class="card-body p-0">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Quarter</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <td>1st Quarter</td>
                                                <td class="text-danger">Ungraded</td>
                                                <td class="text-right py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#111stQuarterModal" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2nd Quarter</td>
                                                <td class="text-danger">Ungraded</td>
                                                <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a type="button" data-bs-toggle="modal" data-bs-target="#112ndQuarterModal" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                </div>
                                                </td>
                                            </tr>
                                                
                                            </tbody>
                                        </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                        <h3 class="card-title">2nd Semester</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                        </div>
                                        <div class="card-body p-0">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Quarter</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <td>3rd Quarter</td>
                                                <td class="text-danger">Ungraded</td>
                                                <td class="text-right py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#121stQuarterModal" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4th Quarter</td>
                                                <td class="text-danger">Ungraded</td>
                                                <td class="text-right py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#122ndQuarterModal" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                                
                                            </tbody>
                                        </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->

                                </div>
                                <!-- G11 GRADES CONTENTS END -->

                                <!-- G12 GRADES CONTENTS START -->
                                <div class="tab-pane fade" id="grade12" role="tabpanel" aria-labelledby="grade12-tab">

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#2ndSemModal">
                                        View Grade 12 Grades
                                    </button>

                                    <!-- Modal G12 GRADES -->
                                    <div class="modal fade" id="2ndSemModal" tabindex="-1" aria-labelledby="2ndSemModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="2ndSemModalLabel">Grade 12 Grades</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            
                                                <!-- 1ST SEMESTER VIEW GRADES -->
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">1st Semester</h5>

                                                        <table cellspacing="0" class="table table-sm table-bordered table-striped text-center align-middle">
                                                        <thead>
                                                            <tr>
                                                                <td rowspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">Indicate if Subject is CORE, APPLIED, or SPECIALIZED</p>
                                                                </td>
                                                                <td rowspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">SUBJECTS</p>
                                                                </td>
                                                                <td colspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">Quarter</p>
                                                                </td>
                                                                <td rowspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">SEM FINAL GRADE</p>
                                                                </td>
                                                                <td rowspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">ACTION TAKEN</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">1ST</p>
                                                                </td>
                                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">2ND</p>
                                                                </td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- CORE SUBJECTS -->
                                                            <?php
                                                            $query = "SELECT * FROM core_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '12'  ORDER BY subject_name ASC";
                                                            $stmt = $conn->prepare($query);
                                                            $stmt->bind_param("s", $student_no);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();

                                                            if($result->num_rows > 0)
                                                            {
                                                                while($row = $result->fetch_assoc())
                                                                { ?>

                                                                    
                                                                    <tr>
                                                                        <td>
                                                                        <p class="s8">Core</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['1st']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['2nd']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['final']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['remarks']?></p>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php }
                                                            }
                                                            else
                                                            {?>
                                                                
                                                                    <tr>
                                                                        <td>
                                                                            Student has no Core Subject to take!
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php  }
                                                            ?>
                                                            <!-- APPLIED SUBJECTS -->
                                                            <?php
                                                            $query = "SELECT * FROM applied_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '12' ORDER BY subject_name ASC";
                                                            $stmt = $conn->prepare($query);
                                                            $stmt->bind_param("s", $student_no);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();

                                                            if($result->num_rows > 0)
                                                            {
                                                                while($row = $result->fetch_assoc())
                                                                { ?>

                                                                    
                                                                    <tr>
                                                                        <td>
                                                                        <p class="s8">Applied</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['1st']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['2nd']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['final']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['remarks']?></p>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php }
                                                            }
                                                            else
                                                            {?>
                                                                
                                                                    <tr>
                                                                        <td>
                                                                            Student has no Applied Subject to take!
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php  }
                                                            ?>
                                                            <!-- SPECIALIZED SUBJECTS -->
                                                            <?php
                                                            $query = "SELECT * FROM specialized_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '12' ORDER BY subject_name ASC";
                                                            $stmt = $conn->prepare($query);
                                                            $stmt->bind_param("s", $student_no);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();

                                                            if($result->num_rows > 0)
                                                            {
                                                                while($row = $result->fetch_assoc())
                                                                { ?>

                                                                    
                                                                    <tr>
                                                                        <td>
                                                                        <p class="s8">Specialized</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['1st']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['2nd']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['final']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['remarks']?></p>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php }
                                                            }
                                                            else
                                                            {?>
                                                                
                                                                    <tr>
                                                                        <td>
                                                                            Student has no Specialized Subject to take!
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php  }
                                                            ?>
                                                            <!-- OTHER SUBJECTS -->
                                                            <?php
                                                            $query = "SELECT * FROM other_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '12' ORDER BY subject_name ASC";
                                                            $stmt = $conn->prepare($query);
                                                            $stmt->bind_param("s", $student_no);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();

                                                            if($result->num_rows > 0)
                                                            {
                                                                while($row = $result->fetch_assoc())
                                                                { ?>

                                                                    
                                                                    <tr>
                                                                        <td>
                                                                        <p class="s8">Other</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['1st']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['2nd']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['final']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['remarks']?></p>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php }
                                                            }
                                                            else
                                                            {?>
                                                                
                                                                    <tr>
                                                                        <td>
                                                                            Student has no Other Subject to take!
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php  }
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                            </tr>
                                                            <!-- OTHER SUBJECTS -->
                                                            <?php
                                                            $query = "SELECT * FROM gen_aves WHERE student_no = ?";
                                                            $stmt = $conn->prepare($query);
                                                            $stmt->bind_param("s", $student_no);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();

                                                            if($result->num_rows > 0)
                                                            {
                                                                while($row = $result->fetch_assoc())
                                                                { ?>

                                                                    
                                                                    <tr>
                                                                        <td colspan="4" bgcolor="#BEBEBE" class="justify-content-center">
                                                                            <p class="fw-semibold text-end">General Ave. for the Semester:</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['g12_1stSem']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['g12_1remarks']?></p>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php }
                                                            }
                                                            else
                                                            {?>
                                                                
                                                                    <tr>
                                                                        <td>
                                                                            Student has no General Average!
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php  }
                                                            ?>
                                                        </tbody>
                                                    </table>

                                                    </div>
                                                </div>
                                                <!-- 1ST SEMESTER VIEW GRADES -->

                                                <!-- 2ND SEMESTER VIEW GRADES -->
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">2nd Semester</h5>

                                                        <table cellspacing="0" class="table table-sm table-bordered table-striped text-center align-middle">
                                                        <thead>
                                                            <tr>
                                                                <td rowspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">Indicate if Subject is CORE, APPLIED, or SPECIALIZED</p>
                                                                </td>
                                                                <td rowspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">SUBJECTS</p>
                                                                </td>
                                                                <td colspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">Quarter</p>
                                                                </td>
                                                                <td rowspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">SEM FINAL GRADE</p>
                                                                </td>
                                                                <td rowspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">ACTION TAKEN</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">3RD</p>
                                                                </td>
                                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                                    <p class="fw-semibold">4TH</p>
                                                                </td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- CORE SUBJECTS -->
                                                            <?php
                                                            $query = "SELECT * FROM core_sub_grades WHERE student_no = ? AND sem = '2nd Semester' AND grade_level = '12' ORDER BY subject_name ASC";
                                                            $stmt = $conn->prepare($query);
                                                            $stmt->bind_param("s", $student_no);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();

                                                            if($result->num_rows > 0)
                                                            {
                                                                while($row = $result->fetch_assoc())
                                                                { ?>

                                                                    
                                                                    <tr>
                                                                        <td>
                                                                        <p class="s8">Core</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['1st']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['2nd']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['final']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['remarks']?></p>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php }
                                                            }
                                                            else
                                                            {?>
                                                                
                                                                    <tr>
                                                                        <td>
                                                                            Student has no Core Subject to take!
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php  }
                                                            ?>
                                                            <!-- APPLIED SUBJECTS -->
                                                            <?php
                                                            $query = "SELECT * FROM applied_sub_grades WHERE student_no = ? AND sem = '2nd Semester' AND grade_level = '12' ORDER BY subject_name ASC";
                                                            $stmt = $conn->prepare($query);
                                                            $stmt->bind_param("s", $student_no);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();

                                                            if($result->num_rows > 0)
                                                            {
                                                                while($row = $result->fetch_assoc())
                                                                { ?>

                                                                    
                                                                    <tr>
                                                                        <td>
                                                                        <p class="s8">Applied</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['1st']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['2nd']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['final']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['remarks']?></p>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php }
                                                            }
                                                            else
                                                            {?>
                                                                
                                                                    <tr>
                                                                        <td>
                                                                            Student has no Applied Subject to take!
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php  }
                                                            ?>
                                                            <!-- SPECIALIZED SUBJECTS -->
                                                            <?php
                                                            $query = "SELECT * FROM specialized_sub_grades WHERE student_no = ? AND sem = '2nd Semester' AND grade_level = '12' ORDER BY subject_name ASC";
                                                            $stmt = $conn->prepare($query);
                                                            $stmt->bind_param("s", $student_no);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();

                                                            if($result->num_rows > 0)
                                                            {
                                                                while($row = $result->fetch_assoc())
                                                                { ?>

                                                                    
                                                                    <tr>
                                                                        <td>
                                                                        <p class="s8">Specialized</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['1st']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['2nd']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['final']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['remarks']?></p>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php }
                                                            }
                                                            else
                                                            {?>
                                                                
                                                                    <tr>
                                                                        <td>
                                                                            Student has no Specialized Subject to take!
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php  }
                                                            ?>
                                                            <!-- OTHER SUBJECTS -->
                                                            <?php
                                                            $query = "SELECT * FROM other_sub_grades WHERE student_no = ? AND sem = '2nd Semester' AND grade_level = '12' ORDER BY subject_name ASC";
                                                            $stmt = $conn->prepare($query);
                                                            $stmt->bind_param("s", $student_no);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();

                                                            if($result->num_rows > 0)
                                                            {
                                                                while($row = $result->fetch_assoc())
                                                                { ?>

                                                                    
                                                                    <tr>
                                                                        <td>
                                                                        <p class="s8">Other</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['1st']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['2nd']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['final']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['remarks']?></p>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php }
                                                            }
                                                            else
                                                            {?>
                                                                
                                                                    <tr>
                                                                        <td>
                                                                            Student has no Other Subject to take!
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php  }
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p>&nbsp;</p>
                                                                </td>
                                                            </tr>
                                                            <!-- OTHER SUBJECTS -->
                                                            <?php
                                                            $query = "SELECT * FROM gen_aves WHERE student_no = ? ";
                                                            $stmt = $conn->prepare($query);
                                                            $stmt->bind_param("s", $student_no);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();

                                                            if($result->num_rows > 0)
                                                            {
                                                                while($row = $result->fetch_assoc())
                                                                { ?>

                                                                    
                                                                    <tr>
                                                                        <td colspan="4" bgcolor="#BEBEBE" class="justify-content-center">
                                                                            <p class="fw-semibold text-end">General Ave. for the Semester:</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['g12_2ndSem']?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="text-danger"><?=$row['g12_2remarks']?></p>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php }
                                                            }
                                                            else
                                                            {?>
                                                                
                                                                    <tr>
                                                                        <td>
                                                                            Student has no General Average!
                                                                        </td>
                                                                    </tr>
                                                                    
                                                            <?php  }
                                                            ?>
                                                        </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <!-- 2nD SEMESTER VIEW GRADES -->

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal G11 GRADES -->
                                        
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                        <h3 class="card-title">1st Semester</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                        </div>
                                        <div class="card-body p-0">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Quarter</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <td>1st Quarter</td>
                                                <td class="text-danger">Ungraded</td>
                                                <td class="text-right py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#211stQuarterModal" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2nd Quarter</td>
                                                <td class="text-danger">Ungraded</td>
                                                <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a type="button" data-bs-toggle="modal" data-bs-target="#212ndQuarterModal" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                </div>
                                                </td>
                                            </tr>
                                                
                                            </tbody>
                                        </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                        <h3 class="card-title">2nd Semester</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                        </div>
                                        <div class="card-body p-0">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Quarter</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <td>3rd Quarter</td>
                                                <td class="text-danger">Ungraded</td>
                                                <td class="text-right py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#221stQuarterModal" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4th Quarter</td>
                                                <td class="text-danger">Ungraded</td>
                                                <td class="text-right py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#222ndQuarterModal" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                                
                                            </tbody>
                                        </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->

                                </div>
                                <!-- G12 GRADES CONTENTS END -->

                            </div>

                            <!-- G11 1ST SEM MODALSZ STARTSSASDAFSAOFAS -->

                            <!-- Modal 1st Quarter-->
                            <div class="modal fade" id="111stQuarterModal" tabindex="-1" aria-labelledby="111stQuarterModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="111stQuarterModalLabel">1st Semester - 1st Quarter</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    
                                    <table cellspacing="0" class="table table-sm table-bordered table-striped text-center align-middle">
                                        <thead>
                                            <tr>
                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold">Indicate if Subject is CORE, APPLIED, or SPECIALIZED</p>
                                                </td>
                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold">SUBJECTS</p>
                                                </td>
                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold">1st Quarter</p>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <!-- CORE SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM core_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Core</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['1st']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Core Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>
                                            <!-- APPLIED SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM applied_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Applied</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['1st']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Applied Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>
                                            <!-- SPECIALIZED SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM specialized_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Specialized</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['1st']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Specialized Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>
                                            <!-- OTHER SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM other_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Other</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['1st']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Other Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>

                                            <tr>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                                <td colspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold text-end">General Ave. for the Quarter:</p>
                                                </td>
                                                <td>
                                                    <p>99</p>
                                                </td>
                                                <td>
                                                    <p>Promoted</p>
                                                </td>
                                            </tr> -->
                                        </tbody>
                                      </table>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal 1st Quarter-->

                            <!-- Modal 2nd Quarter-->
                            <div class="modal fade" id="112ndQuarterModal" tabindex="-1" aria-labelledby="112ndQuarterModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="112ndQuarterModalLabel">1st Semester - 2nd Quarter</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    
                                    <table cellspacing="0" class="table table-sm table-bordered table-striped text-center align-middle">
                                        <thead>
                                            <tr>
                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold">Indicate if Subject is CORE, APPLIED, or SPECIALIZED</p>
                                                </td>
                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold">SUBJECTS</p>
                                                </td>
                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold">2nd Quarter</p>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <!-- CORE SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM core_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Core</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['2nd']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Core Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>
                                            <!-- APPLIED SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM applied_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Applied</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['2nd']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Applied Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>
                                            <!-- SPECIALIZED SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM specialized_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Specialized</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['2nd']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Specialized Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>
                                            <!-- OTHER SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM other_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Other</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['2nd']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Other Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>

                                            <tr>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                                <td colspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold text-end">General Ave. for the Quarter:</p>
                                                </td>
                                                <td>
                                                    <p>99</p>
                                                </td>
                                                <td>
                                                    <p>Promoted</p>
                                                </td>
                                            </tr> -->
                                        </tbody>
                                      </table>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal 2nd Quarter-->

                            <!-- G11 1ST SEM MODALSZ ENDSAJDKAHDWQ -->


                            <!-- G11 2ND SEM MODALSZ STARTSSASDAFSAOFAS -->

                            <!-- Modal 1st Quarter-->
                            <div class="modal fade" id="121stQuarterModal" tabindex="-1" aria-labelledby="121stQuarterModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="121stQuarterModalLabel">2nd Semester - 3rd Quarter</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    
                                    <table cellspacing="0" class="table table-sm table-bordered table-striped text-center align-middle">
                                        <thead>
                                            <tr>
                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold">Indicate if Subject is CORE, APPLIED, or SPECIALIZED</p>
                                                </td>
                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold">SUBJECTS</p>
                                                </td>
                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold">3rd Quarter</p>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <!-- CORE SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM core_sub_grades WHERE student_no = ? AND sem = '2nd Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Core</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['1st']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Core Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>
                                            <!-- APPLIED SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM applied_sub_grades WHERE student_no = ? AND sem = '2nd Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Applied</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['1st']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Applied Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>
                                            <!-- SPECIALIZED SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM specialized_sub_grades WHERE student_no = ? AND sem = '2nd Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Specialized</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['1st']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Specialized Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>
                                            <!-- OTHER SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM other_sub_grades WHERE student_no = ? AND sem = '2nd Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Other</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['1st']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Other Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>

                                            <tr>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                                <td colspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold text-end">General Ave. for the Quarter:</p>
                                                </td>
                                                <td>
                                                    <p>99</p>
                                                </td>
                                                <td>
                                                    <p>Promoted</p>
                                                </td>
                                            </tr> -->
                                        </tbody>
                                      </table>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal 1st Quarter -->

                            <!-- Modal 2nd Quarter-->
                            <div class="modal fade" id="122ndQuarterModal" tabindex="-1" aria-labelledby="122ndQuarterModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="112ndQuarterModalLabel">2nd Semester - 4th Quarter</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    
                                    <table cellspacing="0" class="table table-sm table-bordered table-striped text-center align-middle">
                                        <thead>
                                            <tr>
                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold">Indicate if Subject is CORE, APPLIED, or SPECIALIZED</p>
                                                </td>
                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold">SUBJECTS</p>
                                                </td>
                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold">4th Quarter</p>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <!-- CORE SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM core_sub_grades WHERE student_no = ? AND sem = '2nd Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Core</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['2nd']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Core Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>
                                            <!-- APPLIED SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM applied_sub_grades WHERE student_no = ? AND sem = '2nd Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Applied</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['2nd']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Applied Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>
                                            <!-- SPECIALIZED SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM specialized_sub_grades WHERE student_no = ? AND sem = '2nd Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Specialized</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['2nd']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Specialized Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>
                                            <!-- OTHER SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM other_sub_grades WHERE student_no = ? AND sem = '2nd Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Other</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['2nd']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Other Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>

                                            <tr>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                                <td colspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold text-end">General Ave. for the Quarter:</p>
                                                </td>
                                                <td>
                                                    <p>99</p>
                                                </td>
                                                <td>
                                                    <p>Promoted</p>
                                                </td>
                                            </tr> -->
                                        </tbody>
                                      </table>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal 2nd Quarter-->

                            <!-- G11 2ND SEM MODALSZ ENDSAJDKAHDWQ -->

                            <!-- G12 1ST SEM MODALSZ STARTSSASDAFSAOFAS -->

                            <!-- Modal 1st Quarter-->
                            <div class="modal fade" id="211stQuarterModal" tabindex="-1" aria-labelledby="211stQuarterModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="111stQuarterModalLabel">1st Semester - 1st Quarter</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    
                                    <table cellspacing="0" class="table table-sm table-bordered table-striped text-center align-middle">
                                        <thead>
                                            <tr>
                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold">Indicate if Subject is CORE, APPLIED, or SPECIALIZED</p>
                                                </td>
                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold">SUBJECTS</p>
                                                </td>
                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold">1st Quarter</p>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <!-- CORE SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM core_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '12' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Core</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['1st']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Core Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>
                                            <!-- APPLIED SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM applied_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '12' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Applied</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['1st']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Applied Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>
                                            <!-- SPECIALIZED SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM specialized_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '12' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Specialized</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['1st']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Specialized Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>
                                            <!-- OTHER SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM other_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '12' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Other</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['1st']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Other Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>

                                            <tr>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                                <td colspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold text-end">General Ave. for the Quarter:</p>
                                                </td>
                                                <td>
                                                    <p>99</p>
                                                </td>
                                                <td>
                                                    <p>Promoted</p>
                                                </td>
                                            </tr> -->
                                        </tbody>
                                      </table>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal 1st Quarter-->

                            <!-- Modal 2nd Quarter-->
                            <div class="modal fade" id="212ndQuarterModal" tabindex="-1" aria-labelledby="212ndQuarterModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="112ndQuarterModalLabel">1st Semester - 2nd Quarter</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    
                                    <table cellspacing="0" class="table table-sm table-bordered table-striped text-center align-middle">
                                        <thead>
                                            <tr>
                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold">Indicate if Subject is CORE, APPLIED, or SPECIALIZED</p>
                                                </td>
                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold">SUBJECTS</p>
                                                </td>
                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold">2nd Quarter</p>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <!-- CORE SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM core_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '12' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Core</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['2nd']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Core Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>
                                            <!-- APPLIED SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM applied_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '12' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Applied</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['2nd']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Applied Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>
                                            <!-- SPECIALIZED SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM specialized_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '12' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Specialized</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['2nd']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Specialized Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>
                                            <!-- OTHER SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM other_sub_grades WHERE student_no = ?  AND sem = '1st Semester' AND grade_level = '12' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Other</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['2nd']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Other Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>

                                            <tr>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                                <td colspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold text-end">General Ave. for the Quarter:</p>
                                                </td>
                                                <td>
                                                    <p>99</p>
                                                </td>
                                                <td>
                                                    <p>Promoted</p>
                                                </td>
                                            </tr> -->
                                        </tbody>
                                      </table>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal 2nd Quarter-->

                            <!-- G12 1ST SEM MODALSZ ENDSAJDKAHDWQ -->

                            <!-- G12 2ND SEM MODALSZ STARTSSASDAFSAOFAS -->

                            <!-- Modal 1st Quarter-->
                            <div class="modal fade" id="221stQuarterModal" tabindex="-1" aria-labelledby="221stQuarterModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="121stQuarterModalLabel">2nd Semester - 3rd Quarter</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    
                                    <table cellspacing="0" class="table table-sm table-bordered table-striped text-center align-middle">
                                        <thead>
                                            <tr>
                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold">Indicate if Subject is CORE, APPLIED, or SPECIALIZED</p>
                                                </td>
                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold">SUBJECTS</p>
                                                </td>
                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold">3rd Quarter</p>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <!-- CORE SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM core_sub_grades WHERE student_no = ? AND sem = '2nd Semester' AND grade_level = '12' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Core</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['1st']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Core Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>
                                            <!-- APPLIED SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM applied_sub_grades WHERE student_no = ? AND sem = '2nd Semester' AND grade_level = '12' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Applied</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['1st']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Applied Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>
                                            <!-- SPECIALIZED SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM specialized_sub_grades WHERE student_no = ? AND sem = '2nd Semester' AND grade_level = '12' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Specialized</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['1st']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Specialized Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>
                                            <!-- OTHER SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM other_sub_grades WHERE student_no = ? AND sem = '2nd Semester' AND grade_level = '12' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Other</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['1st']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Other Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>

                                            <tr>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                                <td colspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold text-end">General Ave. for the Quarter:</p>
                                                </td>
                                                <td>
                                                    <p>99</p>
                                                </td>
                                                <td>
                                                    <p>Promoted</p>
                                                </td>
                                            </tr> -->
                                        </tbody>
                                      </table>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal 1st Quarter -->

                            <!-- Modal 2nd Quarter-->
                            <div class="modal fade" id="222ndQuarterModal" tabindex="-1" aria-labelledby="222ndQuarterModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="112ndQuarterModalLabel">2nd Semester - 4th Quarter</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    
                                    <table cellspacing="0" class="table table-sm table-bordered table-striped text-center align-middle">
                                        <thead>
                                            <tr>
                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold">Indicate if Subject is CORE, APPLIED, or SPECIALIZED</p>
                                                </td>
                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold">SUBJECTS</p>
                                                </td>
                                                <td bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold">4th Quarter</p>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <!-- CORE SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM core_sub_grades WHERE student_no = ? AND sem = '2nd Semester' AND grade_level = '12' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Core</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['2nd']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Core Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>
                                            <!-- APPLIED SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM applied_sub_grades WHERE student_no = ? AND sem = '2nd Semester' AND grade_level = '12' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Applied</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['2nd']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Applied Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>
                                            <!-- SPECIALIZED SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM specialized_sub_grades WHERE student_no = ? AND sem = '2nd Semester' AND grade_level = '12' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Specialized</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['2nd']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Specialized Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>
                                            <!-- OTHER SUBJECTS -->
                                            <?php
                                                $query = "SELECT * FROM other_sub_grades WHERE student_no = ? AND sem = '2nd Semester' AND grade_level = '12' ORDER BY subject_name ASC";
                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param("s", $student_no);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if($result->num_rows > 0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    { ?>

                                                        
                                                        <tr>
                                                            <td>
                                                            <p class="s8">Other</p>
                                                            </td>
                                                            <td>
                                                                <p class="s8 text-start"><?=$row['subject_name']?></p>
                                                            </td>
                                                            <td>
                                                                <p class="text-danger"><?=$row['2nd']?></p>
                                                            </td>
                                                        </tr>
                                                        
                                                   <?php }
                                                }
                                                else
                                                {?>
                                                    
                                                        <tr>
                                                            <td>
                                                                Student has no Other Subject to take!
                                                            </td>
                                                        </tr>
                                                        
                                              <?php  }
                                            ?>

                                            <tr>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>&nbsp;</p>
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                                <td colspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                                                    <p class="fw-semibold text-end">General Ave. for the Quarter:</p>
                                                </td>
                                                <td>
                                                    <p>99</p>
                                                </td>
                                                <td>
                                                    <p>Promoted</p>
                                                </td>
                                            </tr> -->
                                        </tbody>
                                      </table>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal 2nd Quarter-->

                            <!-- G12 2ND SEM MODALSZ ENDSAJDKAHDWQ -->

                        </div>
                        <!-- col -->
                    </div>
                    

                  </div>
                <!-- CONTENT -->
                <!-- GRADES -->
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>

          <div>
            <br> <br> <br> <br><br><br><br><br> <br>
          </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer text-center ms-0">
    <img src="a/logo-re.png" alt="" style="height:25pt; width:25pt;">
    <strong>Clark College of Scince and Technology. Since 2005.</strong>
    SNS BLDG, Samsonville Subdivision, Aurea, Dau, Mabalacat, Pampanga
    <div class="float-right d-none d-sm-inline-block">
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<!-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard3.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
<input type="submit" value="">

<script>
        $(document).ready(function() 
        {

            $('.nav-tabs a').click(function() {
                $(this).tab('show');
            });

            $('#updateprofile').click(function(e) {
        e.preventDefault(); // Prevent default form submission

        // Enable all input fields
        $('input').prop('readonly', false);
        $('#sex').prop('disabled', false);

        var newAddress = "\
            <div class='row mt-2'>\
                <div class='col-md-3'>\
                    <label for='province' class='form-label'>Province <span class='text-danger'>*</span></label>\
                    <select id='province' class='form-select' required>\
                        <option disabled selected>Select Province</option>\
                    </select>\
                    <input type='hidden' name='provname' id='provname' value=''>\
                </div>\
                <div class='col-md-4'>\
                    <label for='municipality' class='form-label'>City/Municipality <span class='text-danger'>*</span></label>\
                    <select id='municipality' class='form-select' disabled>\
                        <option disabled selected>Select City/Municipality</option>\
                    </select>\
                    <input type='hidden' name='citymunname' id='citymunname' value=''>\
                </div>\
                <div class='col-md-3'>\
                    <label for='barangay' class='form-label'>Barangay <span class='text-danger'>*</span></label>\
                    <select id='barangay' class='form-select' disabled>\
                        <option disabled selected>Select Barangay</option>\
                    </select>\
                    <input type='hidden' name='brgyname' id='brgyname' value=''>\
                </div>\
            </div>\
            <div class='row mt-2'>\
                <div class='col-md-6'>\
                    <label for='house_num' class='form-label'>House number, Street <span class='text-danger'>*</span></label>\
                    <input type='text' name='house_num' class='form-control' id='house_num' placeholder='Enter your Street' required>\
                </div>\
            </div>\
        ";

        var newButton = "<input type='submit' value='Update Profile' name='updateProfile' class='btn btn-primary'>";

        $('#updatePdiv').html(newButton);
        $('#addressDiv').html(newAddress);

        // Load address data from JSON file
        $.getJSON('refaddress.json', function(data) {
            // Sort and populate province select box
            data.provinces.sort((a, b) => a.provDesc.localeCompare(b.provDesc));
            $.each(data.provinces, function(index, province) {
                $('#province').append('<option value="' + province.provCode + '">' + province.provDesc + '</option>');
            });

            // Populate municipality and barangay select boxes based on province selection
            $('#province').on('change', function() {
                var provinceId = $(this).val();
                $('#provname').val($('#province option:selected').text());
                $('#municipality').prop("disabled", false).empty().append('<option disabled selected>Select City/Municipality</option>');

                // Sort and populate municipality select box
                data.citymun.sort((a, b) => a.citymunDesc.localeCompare(b.citymunDesc));
                $.each(data.citymun, function(index, municipality) {
                    if (municipality.provCode == provinceId) {
                        $('#municipality').append('<option value="' + municipality.citymunCode + '">' + municipality.citymunDesc + '</option>');
                    }
                });
            });

            // Populate barangay select boxes based on municipality selection
            $('#municipality').on('change', function() {
                var municipalityId = $(this).val();
                $('#citymunname').val($('#municipality option:selected').text());
                $('#barangay').prop("disabled", false).empty().append('<option disabled selected>Select Barangay</option>');

                // Sort and populate barangay select box
                data.barangays.sort((a, b) => a.brgyDesc.localeCompare(b.brgyDesc));
                $.each(data.barangays, function(index, barangay) {
                    if (barangay.citymunCode == municipalityId) {
                        $('#barangay').append('<option value="' + barangay.brgyDesc + '">' + barangay.brgyDesc + '</option>');
                    }
                });
            });

            // Update hidden input for barangay
            $('#barangay').on('change', function() {
                $('#brgyname').val($('#barangay option:selected').text());
            });
        });
    });


            

            $("#search").keyup(function(){
                var input = $(this).val();

                // if(input != "")
                // {
                    $.ajax({
                        url: "searchdata.php",
                        method: "POST",
                        data: {input:input},

                        success:function(data){
                            $("#tbody").html(data);
                        }
                    });
                // }
                // else
                // {
                //     $("#tbody").css("display", "block");
                // }
            });
        });
 
    </script>
</body>
</html>
