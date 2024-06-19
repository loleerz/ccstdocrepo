<?php
    session_start();
    //para ma-check if nag log in ba si user
    if(!isset($_SESSION['username']))
    {
        header("Location: index.php");
    }
    include ('connection.php');

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
            <a href="#" class="nav-link">
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
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Add People
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addstudent.php" class="nav-link active">
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
                <a href="Strand.php" class="nav-link">
                  <i class="fas fa-book-open nav-icon"></i>
                  <p>Strand</p>
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
            <h1 class="m-0 fw-bold fs-4">Student Registration</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

          <?php
            //SUBJECT ADDED
            if (isset($_GET['status'])) {
              echo "
                <script src='plugins/sweetalert2/sweetalert2.min.js'></script>
                <script>
                  Swal.fire({
                    icon: 'success',
                    title: 'Student Added Successfully!',
                  });
                </script>
              ";
            }
          ?>
        
                <div class="row">
                    <div class="col mb-3">
                        <span class="fs-5 fw-semibold">Learner's Information</span>
                    </div>
                </div>
                  <form action="input.php" method="post">
                    <div class="row g-3">
                        <div class="col-md-2">
                            <label for="student_no" class="form-label">Student Number</label>
                            <input type="text" name="student_no" class="form-control" id="student_no" oninput="formatNumber(event)" maxlength="7" placeholder="Enter student number" required>
                            <!-- CODE FOR ACCEPTING ONLY NUMBERS IN STUDENT NUMBER -->
                            <script>
                            function formatNumber(e) {
                                    var input = e.target;
                                    var value = input.value;

                                    // Only allow numbers and dashes
                                    value = value.replace(/[^0-9-]/g, '');

                                    // Add a dash after the second digit
                                    if (value.length > 0) 
                                    {
                                            value = value.replace(/-/g, ''); // remove all existing dashes
                                            if (value.length > 2) {
                                            value = value.slice(0, 2) + '-' + value.slice(2); // add a dash after the second digit
                                            }
                                    }
                                    input.value = value;
                                }
                            </script>
                        </div>
                        <div class="col-md-2">
                            <label for="fname" class="form-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter First name" required>
                        </div>

                        <div class="col-md-2">
                            <label for="mname" class="form-label">Middle Name</label>
                            <input type="text" name="mname" class="form-control" id="mname" placeholder="Enter Middle name">
                        </div>
                        <div class="col-md-2">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" name="lname" class="form-control" id="lname" placeholder="Enter Last name" required>
                        </div>
                        <div class="col-md-2">
                            <label for="suffix" class="form-label">Suffix</label>
                            <input type="text" name="suffix" class="form-control" id="suffix" placeholder="Enter Suffix">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <label for="birthday" class="form-label">Birthday</label>
                            <input type="date" name="birthday" class="form-control" id="birthday" placeholder="Enter Birthdate" required>
                        </div>
                        <div class="col-md-2">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" name="age" id="age" class="form-control" placeholder="Enter Age" required>
                        </div>
                        <div class="col-md-2">
                            <label for="sex" class="form-label">Sex</label>
                            <select name="sex" id="sex" class="form-select" required>
                                <option disabled selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email" required>
                        </div>
                        <div class="col-md-2">
                            <label for="contact_no" class="form-label">Contact Number</label>
                            <input type="number" name="contact_no" id="contact_no" class="form-control" placeholder="Enter your Contact Number" minlength="11" maxlength="11" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <label for="province" class="form-label">Province</label>
                            <select id="province" class="form-select" required>
                            <option disabled selected>Select Province</option>
                            </select>
                            <input type="hidden" name="provname" id="provname" value="">
                        </div> 
                        <div class="col-md-2">
                            <label for="municipality" class="form-label">City/Municipality</label>
                            <select id="municipality" class="form-select" disabled>
                                <option disabled selected>Select City/Municipality </option>
                            </select>
                            <input type="hidden" name="citymunname" id="citymunname" value="">
                        </div>  
                        <div class="col-md-2">
                            <label for="barangay" class="form-label">Barangay</label>
                            <select  id="barangay" class="form-select" disabled>
                                <option disabled selected>Select Barangay</option>
                            </select>
                            <input type="hidden" name="brgyname" id="brgyname" value="">
                        </div>  
                        <div class="col-md-2">
                            <label for="house_num" class="form-label">House number, Street</label>
                            <input type="text" name="house_num" class="form-control" id="house_num" placeholder="Enter your Street" required>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col mt-3 mb-3">
                            <span class="fs-5 fw-semibold">Scholastic Records</span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <label for="lrn" class="form-label">LRN</label>
                            <input type="number" name="lrn" class="form-control" id="lrn" placeholder="Enter LRN" minlength="12" maxlength="12" required>
                        </div>
                        <div class="col-md-2">
                            <label for="shs_admit" class="form-label">Date of SHS Admission</label>
                            <input type="date" id="shs_admit" class="form-control" name="date_shs_admission" required>
                        </div>
                        <div class="col-md-2">
                            <label for="grade_level" class="form-label">Grade Level</label>
                            <select name="grade_level" id="grade_level" class="form-select" required>
                                <option disabled selected>Select Grade level</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="section" class="form-label">Section</label>
                            <select name="section" id="section" class="form-select" required>
                                <option disabled selected>Select Section</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-2">
                            <label for="track" class="form-label">Track</label>
                            <select name="track" id="track" class="form-select" required>
                                <option disabled selected>Select Track</option>
                                <option>Academic Track</option>
                                <option>TVL</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="strand" class="form-label">Strand</label>
                            <select name="strand" class="form-select" id="strand" required>
                                <option disabled selected>Select Strand</option>
                                <option>STEM</option>
                                <option>ABM</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="sem" class="form-label">Term</label>
                            <select name="sem" class="form-select" id="sem" required>
                                <option disabled selected>Select Term</option>
                                <option>1st Semester</option>
                                <option>2nd Semester</option>
                            </select>
                        </div>  
                        <div class="col-md-2">
                            <label for="school_year" class="form-label">School Year</label>
                            <select name="school_year" id="school_year" class="form-select" required>
                                <option disabled selected>Select School year </option>
                                <option>2023-2024</option>
                                <option>2024-2025</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option disabled selected>Select Status </option>
                                <option>Regular</option>
                                <option>Irregular</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2 mt-4 ms-3" style="flex-direction: row; align-items:center;">
                            <input type="checkbox" class="form-check-input" name="HScompleter" id="HScompleter" value="High School Completer">
                            <label for="HScompleter" class="form-label" style="font-size:12pt; padding-left:2pt;">High School Completer</label>
                        </div>
                        <div class="col-md-2">
                            <label for="HSgen_ave" class="form-label">High School Gen. Ave</label>
                            <input type="number" id="HSgen_ave" class="form-control" name="HSgen_ave" placeholder="Enter Gen. Ave" min="60" max="100">
                        </div>
                        <div class="col-md-2 mt-4 ms-4" style="flex-direction: row; align-items:center;">
                            <input type="checkbox" name="JHScompleter" class="form-check-input" id="JHScompleter" value="Junior High School Completer" required>
                            <label for="JHScompleter" class="form-label" style="font-size:12pt; padding-left:2pt;">Junior High School Completer</label>
                        </div>
                        <div class="col-md-2">
                            <label for="JHSgen_ave" class="form-label">Junior High School Gen. Ave</label>
                            <input type="number" id="JHSgen_ave" class="form-control" name="JHSgen_ave" placeholder="Enter Gen. Ave" min="60" max="100" required>
                        </div>
                        <div class="col-md-2">
                            <label for="date_graduation" class="form-label">Date of Graduation/Completion</label>
                            <input type="date" class="form-control" id="date_graduation" name="date_graduation" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-5">
                            <label for="name_school" class="form-label">Name of School</label>
                            <input type="text" class="form-control" id="name_school" name="name_school" placeholder="School Name" required>
                        </div>
                        <div class="col-md-5">
                            <label for="school_address" class="form-label">School Address</label>
                            <input type="text" class="form-control" id="school_address" name="school_address" placeholder="School Address" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-1 ms-3 mt-4" style="flex-direction: row; align-items:center;">
                            <input type="checkbox" class="form-check-input" name="PEPTpasser" id="PEPTpasser" value="PEPT Passer">
                            <label for="PEPTpasser" class="form-label" style="font-size:12pt; padding-left:2pt;">PEPT Passer**</label>
                        </div>
                        <div class="col-md-2">
                            <label for="PEPTrating" class="form-label">PEPT Rating</label>
                            <input type="number" id="PEPTrating" class="form-control" name="PEPTrating" placeholder="Enter Rating" min="60" max="100">
                        </div>
                        <div class="col-md-2 mt-4 ms-3" style="flex-direction: row; align-items:center;">
                            <input type="checkbox" class="form-check-input" name="ALSpasser" id="ALSpasser" value="ALS A&E Passer">
                            <label for="ALSpasser" class="form-label" style="font-size:12pt; padding-left:2pt;">ALS A&E Passer***</label>
                        </div>
                        <div class="col-md-2">
                            <label for="ALSrating" class="form-label">ALS A&E Rating</label>
                            <input type="number" name="ALSrating" id="ALSrating" class="form-control" placeholder="Enter Rating" min="60" max="100">
                        </div>
                        <div class="col-md-2 mt-4 ms-3" style="flex-direction: row; align-items:center;">
                            <input type="checkbox" class="form-check-input" name="Otherspasser" id="Otherspasser" value="ALS A&E Passer">
                            <label for="Otherspasser" class="form-label" style="font-size:12pt; padding-left:2pt;">Other Assessment Passer*</label>
                        </div>
                        <div class="col-md-2">
                            <label for="Others_specify" class="form-label">Others (Pls. Specify)</label>
                            <input type="text" id="Others_specify" class="form-control" name="Others_specify" placeholder="Enter Other Assessment">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-5">
                            <label for="date_examination" class="form-label">Date of Examination</label>
                            <input type="date" id="date_examination" class="form-control" name="date_examination">
                        </div>
                        <div class="col-md-5">
                            <label for="address_learningcenter" class="form-label">Name and Address of Learning Center</label>
                            <input type="text" id="address_learningcenter" class="form-control" name="address_learningcenter" placeholder="Enter Name and Address of Learning Center">
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="col mt-3 mb-3">
                            <span class="fs-5 fw-semibold">Guardian Information</span>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <label for="g_name" class="form-label">Contact Person</label>
                            <input type="text" id="g_name" class="form-control" name="g_name" placeholder="Enter name of contact person" required>
                        </div>
                        <div class="col-md-2">
                            <label for="g_contact_no" class="form-label">Contact Number</label>
                            <input type="number" id="g_contact_no" class="form-control" name="g_contact_no" placeholder="Enter Contact Number" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <label for="g_province" class="form-label">Province</label>
                            <select  id="g_province" class="form-select" required>
                                <option disabled selected>Select Province </option>
                            </select>
                            <input type="hidden" name="g_provname" id="g_provname" value="">
                        </div> 
                        <div class="col-md-2">
                            <label for="g_municipality" class="form-label">City</label>
                            <select  id="g_municipality" class="form-select" disabled>
                                <option disabled selected>Select City </option>
                            </select>
                            <input type="hidden" name="g_citymunname" id="g_citymunname" value="">
                        </div>  
                        <div class="col-md-2">
                            <label for="g_barangay" class="form-label">Barangay</label>
                            <select  id="g_barangay" class="form-select" disabled>
                                <option disabled selected>Select City </option>
                            </select>
                            <input type="hidden" name="g_brgyname" id="g_brgyname" value="">
                        </div>
                        <div class="col-md-4">
                            <label for="g_house_num" class="form-label">House Number, Street Address</label>
                            <input type="text" name="g_house_num" id="g_house_num" class="form-control" placeholder="House Number, Street Address" required>
                        </div>                
                        <div class="row mt-3 mb-3">
                            <div class="col">
                                <a href="adminIndex.php" id="cancel" class="btn btn-secondary btn-lg me-2">Cancel</a>
                                <input type="submit" class="btn btn-info btn-lg" id="addstudent" name="addstudent" value="Add Record">
                            </div>
                        </div>
                    </div>
                  </form>
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
            // Load address data from JSON file
            $.getJSON('refaddress.json', function(data) 
            {
              //STUDENT PROVINCE
                data.provinces.sort((a, b) => {
                if (a.provDesc < b.provDesc) {
                    return -1;
                }
                if (a.provDesc > b.provDesc) {
                    return }});
                // Populate province select box
                $.each(data.provinces, function(index, province) {
                $('#province').append('<option value="' + province.provCode + '">' + province.provDesc + '</option>');
                $('#g_province').append('<option value="' + province.provCode + '">' + province.provDesc + '</option>');
                });
                
                // Populate municipality and barangay select boxes based on province selection
                $('#province').on('change', function() {
                var provinceId = $(this).val();
                console.log(provinceId);
                console.log($('#province option:selected').text());
                $('#provname').val($('#province option:selected').text());
                $('#municipality').prop("disabled", false);
                $('#municipality').empty(); // Clear existing options
                $('#municipality').prepend('<option disabled selected>Select City/Municipality</option>');

                //GUARDIAN PROVINCE
                data.citymun.sort((a, b) => {
                    if (a.citymunDesc < b.citymunDesc) {
                        return -1;
                    }
                    if (a.citymunDesc > b.citymunDesc) {
                        return }});
                    $.each(data.citymun, function(index, municipality) {
                        if (municipality.provCode == provinceId) {
                        $('#municipality').append('<option value="' + municipality.citymunCode + '">' + municipality.citymunDesc + '</option>');
                        }
                    });
                });
                // Populate municipality and barangay select boxes based on province selection
                $('#g_province').on('change', function() {
                var provinceId = $(this).val();
                console.log(provinceId);
                console.log($('#g_province option:selected').text());
                $('#g_provname').val($('#g_province option:selected').text());
                $('#g_municipality').prop("disabled", false);
                $('#g_municipality').empty(); // Clear existing options
                $('#g_municipality').prepend('<option disabled selected>Select City/Municipality</option>');

                data.citymun.sort((a, b) => {
                    if (a.citymunDesc < b.citymunDesc) {
                        return -1;
                    }
                    if (a.citymunDesc > b.citymunDesc) {
                        return }});
                    $.each(data.citymun, function(index, municipality) {
                        if (municipality.provCode == provinceId) {
                          $('#g_municipality').append('<option value="' + municipality.citymunCode + '">' + municipality.citymunDesc + '</option>');
                        }
                    });
                });

                //STUDENT MUNICIPALITY
                $('#municipality').on('change', function() {
                    var municipalityId = $(this).val();
                    console.log(municipalityId);
                    console.log($('#municipality option:selected').text());
                    $('#citymunname').val($('#municipality option:selected').text());
                    $('#barangay').prop("disabled", false);
                    $('#barangay').empty();
                    $('#barangay').prepend('<option disabled selected>Select Barangay</option>');
                    
                data.barangays.sort((a, b) => {
                    if (a.brgyDesc < b.brgyDesc) {
                        return -1;
                    }
                    if (a.brgyDesc > b.brgyDesc) {
                        return }});
                    $.each(data.barangays, function(index, barangay) {
                    if (barangay.citymunCode == municipalityId) {
                        $('#barangay').append('<option value="' + barangay.brgyDesc + '">' + barangay.brgyDesc + '</option>');
                    }
                    });
                    
                });
                //GUARDIAN MUNICIPALITY
                $('#g_municipality').on('change', function() {
                    var municipalityId = $(this).val();
                    console.log(municipalityId);
                    console.log($('#g_municipality option:selected').text());
                    $('#g_citymunname').val($('#g_municipality option:selected').text());
                    $('#g_barangay').prop("disabled", false);
                    $('#g_barangay').empty();
                    $('#g_barangay').prepend('<option disabled selected>Select Barangay</option>');
                    
                data.barangays.sort((a, b) => {
                    if (a.brgyDesc < b.brgyDesc) {
                        return -1;
                    }
                    if (a.brgyDesc > b.brgyDesc) {
                        return }});
                    $.each(data.barangays, function(index, barangay) {
                    if (barangay.citymunCode == municipalityId) {
                        $('#g_barangay').append('<option value="' + barangay.brgyDesc + '">' + barangay.brgyDesc + '</option>');
                    }
                    });
                    
                });
                //STUDENT BARANGAY
                $('#barangay').on('change', function() {
                    $('#brgyname').val($('#barangay option:selected').text());
                    console.log($('#barangay option:selected').text());
                });

                //GUARDIAN BARANGAY
                $('#g_barangay').on('change', function() {
                    $('#g_brgyname').val($('#g_barangay option:selected').text());
                    console.log($('#g_barangay option:selected').text());
                });
            });
        

            // Submit form data to PHP script
            // Get selected values and send as POST variables
            $('form').on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData($('form')[1]);
                $.ajax({
                    type: 'POST',
                    url: 'input.php',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log('Address Added Successfully!');
                        console.log(data);
                        var url = "addstudent.php?status=success";
                        // window.location = url;
                    }
                });
            });
        });
 
    </script>
</body>
</html>
