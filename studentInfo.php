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
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Documents
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
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
                <a href="" class="nav-link">
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
                <a href="addStrand.php" class="nav-link">
                  <i class="fas fa-book-open nav-icon"></i>
                  <p>Strand</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="addSubject.php" class="nav-link">
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
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
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
                                        <strong class="text-uppercase fs-6"><?=$row['semester']." AY ".$row['school_year']?></strong>
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
                                    <form>
                                        <!-- Form Group (username)-->
                                        <div class="row mb-3">
                                            <div class="col-md-3">
                                                <label class="small mb-1" for="inputFirstName">First Name</label>
                                                <input class="form-control" id="inputFirstName" type="text" value="Jose Marie">
                                            </div>
                                            <!-- Form Group (last name)-->
                                            <div class="col-md-3">
                                                <label class="small mb-1" for="inputLastName">Middle Name</label>
                                                <input class="form-control" id="inputLastName" type="text" value="Joy">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="small mb-1" for="inputLastName">Last Name</label>
                                                <input class="form-control" id="inputLastName" type="text" value="Batumbakal">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="small mb-1" for="inputLastName">Suffix</label>
                                                <input class="form-control" id="inputLastName" type="text" value="Female">
                                            </div>
                                        </div>
                                        <!-- Form Row-->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (first name)-->
                                            <div class="col-md-4">
                                                <label class="small mb-1" for="inputFirstName">Birthday</label>
                                                <input class="form-control" id="inputFirstName" type="date" value="2003-10-24">
                                            </div>
                                            <!-- Form Group (last name)-->
                                            <div class="col-md-4">
                                                <label class="small mb-1" for="inputLastName">Age</label>
                                                <input class="form-control" id="inputLastName" type="number" value="20">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="small mb-1" for="inputLastName">Sex</label>
                                                <input class="form-control" id="inputLastName" type="text" value="Female">
                                            </div>
                                        </div>
                                        <!-- Form Row        -->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (organization name)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputOrgName">Email</label>
                                                <input class="form-control" id="inputOrgName" type="email" value="name@example.com">
                                            </div>
                                            <!-- Form Group (location)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLocation">Contact Number</label>
                                                <input class="form-control" id="inputLocation" type="number" value="09362062524">
                                            </div>
                                        </div>
                                        <!-- Form Group (email address)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputEmailAddress">Address</label>
                                            <input class="form-control" id="inputEmailAddress" type="text" placeholder="Enter your email address" value="0776 7th St. 1st Avenue Casmor Subd. Ph.2 Mabiga, Mabalacat City, Pampanga">
                                        </div>
                                        <button class="btn btn-primary" type="button">Save changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .CONTENT -->
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                        
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                     Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">

                  <table cellspacing="0" class="table table-sm table-bordered table-striped text-center" style="align-items: center;">
                    <thead>
                        <tr>
                        <td rowspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                            <p class="fw-semibold">Indicate if Subject is CORE, APPLIED, or</p>
                            <p class="fw-semibold">SPECIALIZED</p>
                        </td>
                        <td rowspan="2" bgcolor="#BEBEBE" class="justify-content-center">
                            <p>&nbsp;</p>
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
                        <tr>
                        <td>
                            <p class="s8">Core</p>
                        </td>
                        <td>
                            <p class="s8 text-start">Earth and Life Science</p>
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
                            <p class="s8">Core</p>
                        </td>
                        <td>
                            <p class="s8 text-start">General Mathematics</p>
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
                            <p class="s8">Core</p>
                        </td>
                        <td>
                            <p class="s8 text-start">Oral Communication in Context</p>
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
                            <p class="s8">Core</p>
                        </td>
                        <td>
                            <p class="s8 text-start">Physical Education and Health</p>
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
                            <p class="s8">Core</p>
                        </td>
                        <td>
                            <p class="s8 text-start">Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</p>
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
                            <p class="s8">Core</p>
                        </td>
                        <td>
                            <p class="s8 text-start">21st Century Literature from the Philippines and the World</p>
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
                            <p class="s8">Applied</p>
                        </td>
                        <td>
                            <p class="s8 text-start">Empowerment Technologies</p>
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
                            <p class="s8">Specialized</p>
                        </td>
                        <td>
                            <p class="s8 text-start">Fundamentals of Accounting, Business and Management 1</p>
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
                            <p class="s8">Other Subject</p>
                        </td>
                        <td>
                            <p class="s8 text-start">Homeroom Guidance</p>
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
                        <tr>
                        <td colspan="4" bgcolor="#BEBEBE" class="justify-content-center">
                            <p class="fw-semibold">General Ave. for the Semester:</p>
                        </td>
                        <td>
                            <p>&nbsp;</p>
                        </td>
                        <td>
                            <p>&nbsp;</p>
                        </td>
                        </tr>
                    </tbody>
                    </table>

                  </div>
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
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
