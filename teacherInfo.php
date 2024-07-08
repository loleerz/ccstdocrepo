<?php
    session_start();
    //para ma-check if nag log in ba si user
    if(!isset($_SESSION['username']))
    {
        header("Location: index.php");
    }
    include ('connection.php');
    

    $employee_no = $_GET['employee_no'];
    //Fetching datas for outputting student infos
    $sql = "SELECT * FROM teachers_info WHERE employeenumber = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $employee_no);
    $stmt->execute();
    $result = $stmt->get_result();
    $teacher = $result->fetch_assoc();

    //Fetching datas for outputting guardian infos
    $sql1 = "SELECT * FROM guardian_info WHERE student_employee_no = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("s", $employee_no);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    $row1 = $result1->fetch_assoc();
    
    $mname = $teacher['mname'];
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
     
    </ul>

    <!-- Right navbar links -->
    
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
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Students
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="regularStudents.php" class="nav-link">
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
                <a href="Teachers.php" class="nav-link active">
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
                <a href="subjectTeacher.php" class="nav-link ">
                  <i class="fas fa-user-tie nav-icon"></i>
                  <p>Subject Teacher</p>
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
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 fw-bold fs-4">Teachers</h1>
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
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Advisory Records</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Subjects</a>
                  </li>
                </ul>
              </div>

              <div class="card-body">

                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <!-- TEACHER PROFILE -->
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
                                    <div class="fs-4 text-start fw-semibold"><?=$teacher['lname']."".$teacher['suffix'].", ".$teacher['fname']." ".$minitial."."?></div>
                                    <figcaption class="fw-bold"><?=$teacher['employeenumber']?></figcaption>
                                    </span>
                                </div>
                                <div class="card-body text-start text-primary">
                                    <div class="col">
                                        <span><i class="bi bi-caret-right-fill me-2"></i></span>
                                        <strong class="text-uppercase fs-6"><?=" ACADEMIC YEAR ".$teacher['school_year']?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header fw-bold">Personal Information</div>
                                <div class="card-body">
                                    <form action="update.php" method="post">
                                        <!-- Form Group (username)-->
                                        <div class="row mb-3">
                                            <div class="col-md-3">
                                                <label class="small mb-1" for="inputFirstName">First Name</label>
                                                <input class="form-control" id="inputFirstName" type="text" value="<?=$teacher['fname']?>" disabled>
                                            </div>
                                            <!-- Form Group (last name)-->
                                            <div class="col-md-3">
                                                <label class="small mb-1" for="inputLastName">Middle Name</label>
                                                <input class="form-control" id="inputLastName" type="text" value="<?=$teacher['mname']?>" disabled>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="small mb-1" for="inputLastName">Last Name</label>
                                                <input class="form-control" id="inputLastName" type="text" value="<?=$teacher['lname']?>" disabled>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="small mb-1" for="inputLastName">Suffix</label>
                                                <input class="form-control" id="inputLastName" type="text" value="<?=$teacher['suffix']?>" disabled>
                                            </div>
                                        </div>
                                        <!-- Form Row-->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (first name)-->
                                            <div class="col-md-4">
                                                <label class="small mb-1" for="inputFirstName">Birthday</label>
                                                <input class="form-control" id="inputFirstName" type="date" value="<?=$teacher['bdate']?>" disabled>
                                            </div>
                                            <!-- Form Group (last name)-->
                                            <div class="col-md-4">
                                                <label class="small mb-1" for="inputLastName">Age</label>
                                                <input class="form-control" id="inputLastName" type="number" value="<?=$teacher['age']?>" disabled>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="small mb-1" for="inputLastName">Sex</label>
                                                <input class="form-control" id="inputLastName" type="text" value="<?=$teacher['sex']?>" disabled>
                                            </div>
                                        </div>
                                        <!-- Form Row        -->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (organization name)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputOrgName">Email</label>
                                                <input class="form-control" id="inputOrgName" type="email" value="<?=$teacher['email']?>" disabled>
                                            </div>
                                            <!-- Form Group (location)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLocation">Contact Number</label>
                                                <input class="form-control" id="inputLocation" type="number" value="<?=$teacher['contactnumber']?>" disabled>
                                            </div>
                                        </div>
                                        <!-- Form Group (email address)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputEmailAddress">Address</label>
                                            <input class="form-control" id="inputEmailAddress" type="text" placeholder="Enter your email address" value="<?=$teacher['street']." ".$teacher['barangay'].", ".$teacher['city'].", ".$teacher['province']?>" disabled>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-primary" type="button">Update</button>
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
                                  <div class="fs-4 text-start fw-semibold"><?=$teacher['lname']."".$teacher['suffix'].", ".$teacher['fname']." ".$minitial."."?></div>
                                  <figcaption class="fw-bold"><?=$teacher['employeenumber']?></figcaption>
                                  </span>
                              </div>
                              <div class="card-body text-start text-primary">
                                  <div class="col">
                                      <span><i class="bi bi-caret-right-fill me-2"></i></span>
                                      <strong class="text-uppercase fs-6"><?=" ACADEMIC YEAR ".$teacher['school_year']?></strong>
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
                                        <!-- Form Row        -->
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
                                            <button class="btn btn-primary" type="button">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <!-- CONTENT -->
                  <!-- GUARDIAN INFO -->

                  <!-- ADVISORIES RECORDS -->
                  <!-- CONTENT -->
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                    
                    <div class="row">
                        <div class="col-xl-5">
                          <!-- Profile picture card-->
                          <div class="card mb-3 mb-xl-0">
                              <div class="card-header d-flex align-items-center">
                                  
                                  <img class="img-account-profile rounded-circle mb-2" src="a/blankprofile.jpg" style="height:70pt; width:70pt;" alt="">
                                  <span class="ms-2">
                                  <div class="fs-4 text-start fw-semibold"><?=$teacher['lname']."".$teacher['suffix'].", ".$teacher['fname']." ".$minitial."."?></div>
                                  <figcaption class="fw-bold"><?=$teacher['employeenumber']?></figcaption>
                                  </span>
                              </div>
                              <div class="card-body text-start text-primary">
                                  <div class="col">
                                      <span><i class="bi bi-caret-right-fill me-2"></i></span>
                                      <strong class="text-uppercase fs-6"><?=" ACADEMIC YEAR ".$teacher['school_year']?></strong>
                                  </div>
                              </div>
                          </div>
                        </div>
                        <div class="col-xl-7">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header fw-bold">Advisories</div>
                                <div class="card-body">
                                    <form action="update.php" method="post">
                                        <table cellspacing="0" class="table table-sm table-bordered table-striped text-center align-middle">
                                          <thead>
                                              <tr>
                                                  <th>Strand</th>
                                                  <th>Grade Level</th>
                                                  <th>Section</th>
                                                  <th>School Year</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <!-- ADVISORIES -->
                                            <?php
                                            $query = "SELECT * FROM section WHERE adviser = ?";
                                            $stmt = $conn->prepare($query);
                                            $stmt->bind_param("s", $employee_no);
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            if($result->num_rows > 0)
                                            {
                                                while($row = $result->fetch_assoc())
                                                { ?>
                                                
                                                    <tr>
                                                        <td>
                                                            <p><?=$row['strand']?></p>
                                                        </td>
                                                        <td>
                                                            <p><?=$row['grade_level']?></p>
                                                        </td>
                                                        <td>
                                                            <p><?=$row['section']?></p>
                                                        </td>
                                                        <td>
                                                            <p><?=$row['school_year']?></p>
                                                        </td>
                                                    </tr>
                                                    
                                            <?php }
                                            }
                                            else
                                            {?>
                                                
                                                  <tr>
                                                      <td>
                                                          This teacher has no advisory class!
                                                      </td>
                                                  </tr>
                                                    
                                            <?php  }
                                            ?>
                                          </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                  </div>
                  <!-- CONTENT -->
                  <!-- SCHOLASTIC RECORDS -->


                  <!-- SUBJECTS -->
                  <!-- CONTENT -->
                  <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                    
                  <div class="row">
                        <div class="col-xl-5">
                          <!-- Profile picture card-->
                          <div class="card mb-3 mb-xl-0">
                              <div class="card-header d-flex align-items-center">
                                  
                                  <img class="img-account-profile rounded-circle mb-2" src="a/blankprofile.jpg" style="height:70pt; width:70pt;" alt="">
                                  <span class="ms-2">
                                  <div class="fs-4 text-start fw-semibold"><?=$teacher['lname']."".$teacher['suffix'].", ".$teacher['fname']." ".$minitial."."?></div>
                                  <figcaption class="fw-bold"><?=$teacher['employeenumber']?></figcaption>
                                  </span>
                              </div>
                              <div class="card-body text-start text-primary">
                                  <div class="col">
                                      <span><i class="bi bi-caret-right-fill me-2"></i></span>
                                      <strong class="text-uppercase fs-6"><?=" ACADEMIC YEAR ".$teacher['school_year']?></strong>
                                  </div>
                              </div>
                          </div>
                        </div>
                        <div class="col-xl-7">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header fw-bold">Advisories</div>
                                <div class="card-body">
                                    <form action="update.php" method="post">
                                        <table cellspacing="0" class="table table-sm table-bordered table-striped text-center align-middle">
                                          <thead>
                                              <tr>
                                                  <th>Strand</th>
                                                  <th>Grade Level</th>
                                                  <th>Section</th>
                                                  <th>School Year</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <!-- ADVISORIES -->
                                            <?php
                                            $query = "SELECT * FROM subject_teachers WHERE subj_teacher = ?";
                                            $stmt = $conn->prepare($query);
                                            $stmt->bind_param("s", $employee_no);
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            if($result->num_rows > 0)
                                            {
                                                while($row = $result->fetch_assoc())
                                                { ?>
                                                
                                                    <tr>
                                                        <td>
                                                            <p><?=$row['subject_name']?></p>
                                                        </td>
                                                        <td>
                                                            <p><?=$row['strand']?></p>
                                                        </td>
                                                        <td>
                                                            <p><?=$row['grade_level']?></p>
                                                        </td>
                                                        <td>
                                                            <p><?=$row['section']?></p>
                                                        </td>
                                                        <td>
                                                            <p><?=$row['semester']?></p>
                                                        </td>
                                                        <td>
                                                            <p><?=$row['school_year']?></p>
                                                        </td>
                                                    </tr>
                                                    
                                            <?php }
                                            }
                                            else
                                            {?>
                                                
                                                  <tr>
                                                      <td>
                                                          This teacher has no advisory class!
                                                      </td>
                                                  </tr>
                                                    
                                            <?php  }
                                            ?>
                                          </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                  </div>
                <!-- CONTENT -->
                <!-- SUBJECTS -->
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


<script>
        $(document).ready(function() 
        {

            $('.nav-tabs a').click(function() {
                $(this).tab('show');
            });

            $('#custom-tabs-one-home-tab').on('click', function () {
                console.log('Profile tab clicked');
                // Your additional code here
            });
            $('#custom-tabs-one-profile-tab').on('click', function () {
                console.log('Guardian tab clicked');
                // Your additional code here
            });
            $('#custom-tabs-one-messages-tab').on('click', function () {
                console.log('Advisories tab clicked');
                // Your additional code here
            });
            $('#custom-tabs-one-settings-tab').on('click', function () {
                console.log('Subjects tab clicked');
                // Your additional code here
            });

            $('#cancel').on('click', function() {
                
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
