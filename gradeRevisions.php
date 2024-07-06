<?php
    session_start();
    //para ma-check if nag log in ba si user
    if(!isset($_SESSION['username']))
    {
        header("Location: index.php");
    }
    include ('connection.php');
    // Function to get the school year based on start and end dates
    function getSchoolYear($startDate, $endDate) {
        $currentDate = date('Y-m-d'); // Get current date
        
        if ($currentDate >= $startDate && $currentDate <= $endDate) {
            return date('Y', strtotime($startDate)) . '-' . date('Y', strtotime($endDate)); // Format as "YYYY-YYYY"
        } else {
            return false; // Return false if not within a school year
        }
    }

    // Example usage:
    $startYear = 2016; // Starting year when school started accepting students
    $currentYear = date('Y'); // Current year
    $schoolYears = array();

    for ($year = $startYear; $year <= $currentYear; $year++) {
        $startDate = $year . '-09-01'; // Start date of the school year
        $endDate = date('Y-m-d', strtotime('+1 year', strtotime($startDate))); // End date of the school year (1 year from start date)
        
        $schoolYear = getSchoolYear($startDate, $endDate);
        if ($schoolYear) {
            $schoolYears[] = $schoolYear;
        }
    }

    //Fetching datas from grade_revision table
    $query = "SELECT * FROM grade_revision";
    $stmt1 = $conn->prepare($query);
    $stmt1->execute();
    $result = $stmt1->get_result();

    

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

    .image-container {
    height: 33vh;
    overflow: hidden;
    /* border: 2px solid #000; */
    /* position: relative; */
    cursor: grab;
    }

    .image-viewer {
        width: 100%;
        height: 100%;
        object-fit: contain;
        transition: transform 0.25s ease;
    }

    .image-container:active {
        cursor: grabbing;
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
                <a href="Teachers.php" class="nav-link">
                  <i class="fas fa-user-tie nav-icon"></i>
                  <p>Teachers</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="gradeRevisions.php" class="nav-link active">
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
                <a href="subjectTeacher.php" class="nav-link">
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

        <?php
          //EXISTING REASON
          if(isset($_GET['existing']))
          {
            echo "
              <script src='plugins/sweetalert2/sweetalert2.min.js'></script>
              <script>
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Reason already exist!'
                });
              </script>
            ";
          }
          //REASON ADDED
          if (isset($_GET['added'])) {
            echo "
              <script src='plugins/sweetalert2/sweetalert2.min.js'></script>
              <script>
                Swal.fire({
                  icon: 'success',
                  title: 'Revision Reason Added Successfully!',
                });
              </script>
            ";
          }
        ?>


            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 fw-bold fs-4">Grade Revisions Requests</h1>
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#revisionReasonzModal">
                      View Revision Reasons
                    </button>
                </div>
                <!-- /.col -->
            </div><!-- /.row -->
            <div class="row mt-2 mb-0">
                <div class="col-sm-6">
                    <h1 class="m-0 fw-bold fs-6">Total Revisions Requests: <?= $result->num_rows ?></h1>
                </div>
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- MODAL REVISIONS REASONS START -->
      <div class="modal fade" id="revisionReasonzModal" tabindex="-1" aria-labelledby="revisionReasonzModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="revisionReasonzModalLabel">Revision Reasons</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table class="table table-striped table-bordered">
              <thead>
                  <tr>
                    <th>Revision Reason</th>
                  </tr>
                </thead>
                <tbody id="tbody">
                  
                    <?php
                          //Fetching datas for outputting student infos
                          $sql = "SELECT * FROM revision_reason";
                          $stmt = $conn->prepare($sql);
                          $stmt->execute();
                          $result1 = $stmt->get_result();
                          
                          if($result1->num_rows > 0)
                          {
                          while($row1 = $result1->fetch_assoc())
                          {
                               ?>

                              
                              <tr>
                                  <td>
                                      <?=$row1['reason']?>
                                  </td>
                              </tr>
                              
                      <?php
                          }
                        }
                      else
                      {?>
                        <tr>
                            <td>
                                No record found!
                            </td>
                        </tr>
                              
                      <?php
                          }
                    ?>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#AddrevisionReasonzModal">
                Add Revision Reason
              </button>
            </div>
          </div>
        </div>
      </div>
    <!-- MODAL REVISIONS REASONS END -->

    <!-- MODAL ADD REVISIONS REASONS START -->
     <form action="input.php" method="post">
      <div class="modal fade" id="AddrevisionReasonzModal" tabindex="-1" aria-labelledby="AddrevisionReasonzModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="AddrevisionReasonzModalLabel">Add Revision Reasons</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <label for="revisionReason">Revision Reason:</label>
              <input type="text" class="form-control" name="revisonReason" id="revisonReason">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-info" name="addRevisR">Add Reason</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- MODAL ADD REVISIONS REASONS END -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <?php
                if(isset($_GET['revisionreq_app']))
                {
                    echo "
                    <script src='plugins/sweetalert2/sweetalert2.min.js'></script>
                    <script>
                        Swal.fire({
                        icon: 'success',
                        title: 'Revision request approved!',
                        });
                    </script>
                    ";
                }
            ?>

            <div class="card col-10">
                <div class="card-header">
                    <div class="row">
                        <div class="col-2">
                            <h4 class="card-title fs-4 fw-semibold">Students</h4>
                        </div>
                        <div class="col-4">
                            <select name="school_year" class="form-select col-4" id="">
                                <?php foreach ($schoolYears as $year) { ?>
                                    <option value="<?=$year?>"><?=$year?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-6 text-end">
                            <!-- SEARCH BAR -->
                            <input type="text" name="search" id="search" class="form-control col-3" placeholder="Search" style="align: right; border: 1px solid black">
                        </div>
                    </div>
                </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
              <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
                    <th>Student No.</th>
                    <th>Student Name</th>
                    <th>Section</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="tbody">
                  
                    <?php
                      if($result->num_rows > 0)
                      {
                        while($row = $result->fetch_assoc())
                        {
                          //Fetching datas for outputting student infos
                          $sql = "SELECT * FROM student_info WHERE student_no = ?";
                          $stmt = $conn->prepare($sql);
                          $stmt->bind_param("s", $row['student_no']);
                          $stmt->execute();
                          $result1 = $stmt->get_result();

                          while($row1 = $result1->fetch_assoc())
                          {
                              $mname = $row1['Mname'];
                              $minitial = strtoupper(substr($mname, 0, 1)); ?>

                              
                              <tr>
                                  <td>
                                      <?=$row1['student_no']?>
                                  </td>
                                  <td>
                                      <?=$row1['Lname']."".$row1['Suffix'].", ".$row1['Fname']." ".$minitial?>
                                  </td>
                                  <td>
                                      <?=$row1['strand']." - ".$row1['grade_level'].$row1['section']?>
                                  </td>
                                  <td>
                                    <a type="button" 
                                      data-bs-toggle="modal" 
                                      data-bs-target="#approval" 
                                      class="btn btn-primary" 
                                      data-student-no="<?= $row['student_no'] ?>"
                                      data-student-name="<?=$row1['Lname']."".$row1['Suffix'].", ".$row1['Fname']." ".$minitial?>"
                                      data-strand="<?= $row1['strand'] ?>" 
                                      data-grade-level="<?= $row1['grade_level']?>"
                                      data-section="<?= $row1['section'] ?>"
                                      data-quarter="<?= $row['quarter'] ?>"
                                      data-semester="<?= $row['sem'] ?>"
                                      data-subject-name="<?= $row['subject_name'] ?>" 
                                      data-subject-category="<?= $row['subject_category'] ?>" 
                                      data-iGrade="<?= $row['initial_grade'] ?>"
                                      data-rGrade="<?= $row['revised_grade'] ?>"
                                      data-rDate="<?= $row['date_revision'] ?>"
                                      data-reason="<?= $row['reason'] ?>"
                                      data-sTeacher="<?= $row['subject_teacher'] ?>"
                                      data-schoolYear="<?= $row['school_year'] ?>"
                                      data-proof="<?= $row['proof'] ?>"
                                      >
                                      <i class="fas fa-eye"></i> View
                                    </a>
                                  </td>
                              </tr>
                              
                      <?php
                          }
                        }
                    }
                    else
                    {?>
                      <tr>
                          <td>
                              No pending revisions request!
                          </td>
                          <td>
                              <br>
                          </td>
                          <td>
                              <br>
                          </td>
                          <td>
                              <br>
                          </td>
                      </tr>
                            
                     <?php
                        }
                    ?>
                </tbody>
              </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

        <!-- Modal Approval -->
        <div class="modal fade" id="approval" tabindex="-1" aria-labelledby="approval" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="">Grade Revision Request</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="input.php" method="post">
                        <div class="row">
                            <div class="col col-3">
                                <label for="student_no" class="col-form-label">Student No.</label>
                                <input type="text" class="form-control" id="student_no" name="student_no" disabled>
                            </div>
                            <div class="col col-6">
                                <label for="student_name" class="col-form-label">Student Name</label>
                                <input type="text" class="form-control" min="60" max="100" id="student_name" name="student_name" disabled>
                            </div>
                            <div class="col col-3">
                                <label for="strand_section" class="col-form-label">Strand & Section</label>
                                <input type="text" class="form-control" min="60" max="100" id="strand_section" name="strand_section" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-8">
                                <label for="subjTeacher" class="col-form-label">Subject Teacher</label>
                                <input type="text" class="form-control" id="subjTeacher" name="subjTeacher" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-7">
                                <label for="subjName" class="col-form-label">Subject Name</label>
                                <input type="text" class="form-control" id="subjName" name="subjName" disabled>
                            </div>
                            <div class="col col-2">
                                <label for="quarter" class="col-form-label">Quarter</label>
                                <input type="text" class="form-control" id="quarter" name="quarter" disabled>
                            </div>
                            <div class="col col-3">
                                <label for="sem" class="col-form-label">Semester</label>
                                <input type="text" class="form-control" id="sem" name="sem" disabled>
                            </div>
                        </div>

                        <!-- Hidden fields -->
                        <input type="hidden" id="rstudent_no" name="rstudent_no">
                        <input type="hidden" id="grade_levelH" name="grade_levelH">
                        <input type="hidden" id="quarterH" name="quarterH">
                        <input type="hidden" id="semesterH" name="semesterH">
                        <input type="hidden" id="subject_nameH" name="subject_nameH">
                        <input type="hidden" id="subject_category" name="subject_category">
                        <input type="hidden" id="initialGradeH" name="initialGradeH">
                        <input type="hidden" id="revisedGradeH" name="revisedGradeH">
                        <input type="hidden" id="rDateH" name="rDateH">
                        <input type="hidden" id="reasonH" name="reasonH">
                        <input type="hidden" id="subjTeacherH" name="subjTeacherH">
                        <input type="hidden" id="school_year" name="school_yearH">
                        
                        <div class="row g-3">
                            <div class="col col-4">
                                <label for="initialGrade" class="col-form-label">Initial Grade</label>
                                <input type="text" class="form-control" id="initialGrade" name="initialGrade" disabled>
                            </div>
                            <div class="col col-4">
                                <label for="revisedGrade" class="col-form-label">Revised Grade</label>
                                <input type="text" class="form-control" id="revisedGrade" name="revisedGrade" disabled>
                            </div>
                            <div class="col col-4">
                                <label for="rDate" class="col-form-label">Revision Date</label>
                                <input type="date" class="form-control" id="rDate" name="rDate" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-8">
                                <label for="reason" class="col-form-label">Reason of Revision</label>
                                <input type="text" class="form-control" id="reason" name="reason" disabled>
                            </div>
                        </div>

                        
                        <!-- PROOF UPLOAD -->
                        <div class="row">
                            <div class="col">
                                <label for="proof" class="col-form-label">Revision Form</label> <br>
                                <div class="image-container col-12">
                                    <img src="" alt="" id="proof" class="image-viewer">
                                </div>
                            </div>
                        </div>
                        <!-- PROOF UPLOAD -->
                                
                </div>
                <div class="modal-footer justify-content-center">
                    <input type="submit" name="reject" class="btn btn-danger" value="Reject">
                    <input type="submit" name="approve" class="btn btn-success" value="Approve">
                </div>
                </form>
                </div>
            </div>
        </div>
        <!-- Modal Approval -->

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>
<!-- Bootstrap 4 -->
<!-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var approvalModal = document.getElementById('approval');
    approvalModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget;

        // Extract info from data-* attributes
        var student_no = button.getAttribute('data-student-no');
        var student_name = button.getAttribute('data-student-name');
        var strand = button.getAttribute('data-strand');
        var gradeLevel = button.getAttribute('data-grade-level');
        var section = button.getAttribute('data-section');
        var quarter = button.getAttribute('data-quarter');
        var semester = button.getAttribute('data-semester');
        var subjectName = button.getAttribute('data-subject-name');
        var subjectCategory = button.getAttribute('data-subject-category');
        var initialGrade = button.getAttribute('data-iGrade');
        var revisedGrade = button.getAttribute('data-rGrade');
        var rDate = button.getAttribute('data-rDate');
        var reason = button.getAttribute('data-reason');
        var sTeacher = button.getAttribute('data-sTeacher');
        var proof = button.getAttribute('data-proof');
        var school_year = button.getAttribute('data-schoolYear');

        console.log(student_no);
        console.log(student_name);
        console.log(strand);
        console.log(gradeLevel);
        console.log(section);
        console.log(quarter);
        console.log(semester);
        console.log(subjectName);
        console.log(initialGrade);
        console.log(revisedGrade);
        console.log(rDate);
        console.log(reason);
        console.log(sTeacher);
        console.log(proof);
        console.log(school_year);

        // Assuming 'text' is a variable containing the input string
        let text = strand;

        // Function to get the words from the text
        function getWords(text) {
            return text.match(/\b\w+\b/g);
        }

        // Function to check if a character is uppercase
        function isUpperCase(char) {
            return char === char.toUpperCase();
        }

        // Main code
        let words = getWords(text);
        let firstLetters = [];

        words.forEach(function(word) {
            if (isUpperCase(word[0])) {
                firstLetters.push(word[0]);
            }
        });

        let abbreStrand = firstLetters.join("");
        console.log(abbreStrand);  // Output the abbreviation string

        var strand_section = abbreStrand;

        // Update the modal's content
        var modalBodyInputStudentNo = document.getElementById('student_no');
        var modalBodyInputStudentName = document.getElementById('student_name');
        var modalBodyInputStrandSec = document.getElementById('strand_section');
        var modalBodyInputSTeacher = document.getElementById('subjTeacher');
        var modalBodyInputrDate = document.getElementById('rDate');
        var modalBodyInputSubject = document.getElementById('subjName');
        var modalBodyInputQuarter = document.getElementById('quarter');
        var modalBodyInputSemester = document.getElementById('sem');
        var modalBodyInputInitialGrade = document.getElementById('initialGrade');
        var modalBodyInputRevisedGrade = document.getElementById('revisedGrade');
        var modalBodyInputReason = document.getElementById('reason');
        var modalBodyImgProof = document.getElementById('proof');
        
        var modalBodyInputGradeLevelH = document.getElementById('grade_levelH');
        var modalBodyInputQuarterH = document.getElementById('quarterH');
        var modalBodyInputSemesterH = document.getElementById('semesterH');
        var modalBodyInputSubjectH = document.getElementById('subject_nameH');
        var modalBodyInputSubjectCategory = document.getElementById('subject_category');
        var modalBodyInputInitialGradeH = document.getElementById('initialGradeH');
        var modalBodyInputRevisedGradeH = document.getElementById('revisedGradeH');
        var modalBodyInputrDateH = document.getElementById('rDateH');
        var modalBodyInputReasonH = document.getElementById('reasonH');
        var modalBodyInputSTeacherH = document.getElementById('subjTeacherH');
        var modalBodyInputSchoolYearH = document.getElementById('school_year');
        var modalBodyInputStudentNoH = document.getElementById('rstudent_no');

        //SET VALUES AND PLACEHOLDERS
        modalBodyInputStudentNo.placeholder = student_no;
        modalBodyInputStudentName.placeholder = student_name;
        modalBodyInputStrandSec.placeholder = strand_section + " - " + gradeLevel + section;
        modalBodyInputSTeacher.placeholder = sTeacher;
        modalBodyInputSubject.placeholder = subjectName;
        modalBodyInputQuarter.placeholder = quarter;
        modalBodyInputSemester.placeholder = semester;
        modalBodyInputInitialGrade.placeholder = initialGrade;
        modalBodyInputRevisedGrade.placeholder = revisedGrade;
        modalBodyInputrDate.value = rDate;
        modalBodyInputReason.placeholder = reason;
        modalBodyImgProof.src = proof;

        modalBodyInputGradeLevelH.value = gradeLevel;
        modalBodyInputQuarterH.value = quarter;
        modalBodyInputSemesterH.value = semester;
        modalBodyInputSubjectH.value = subjectName;
        modalBodyInputSubjectCategory.value = subjectCategory;
        modalBodyInputInitialGradeH.value = initialGrade;
        modalBodyInputRevisedGradeH.value = revisedGrade;
        modalBodyInputrDateH.value = rDate;
        modalBodyInputReasonH.value = reason;
        modalBodyInputSTeacherH.value = sTeacher;
        modalBodyInputSchoolYearH.value = school_year;
        modalBodyInputStudentNoH.value = student_no;

        console.log(subjectName);
        console.log(initialGrade);
        console.log(gradeLevel);
        console.log(quarter);
        console.log(semester);
        console.log(school_year);
        console.log(student_no);
    });
});
</script>

<script src="image.js"></script>

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
