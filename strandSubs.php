<?php
    session_start();
    //para ma-check if nag log in ba si user
    if(!isset($_SESSION['username']))
    {
        header("Location: index.php");
    }
    include ('connection.php');

    // Function to get the school year based on start and end dates
    function getSchoolYear($startDate, $endDate) 
    {
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

    for ($year = $startYear; $year <= $currentYear; $year++) 
    {
        $startDate = $year . '-09-01'; // Start date of the school year
        $endDate = date('Y-m-d', strtotime('+1 year', strtotime($startDate))); // End date of the school year (1 year from start date)
        
        $schoolYear = getSchoolYear($startDate, $endDate);
        if ($schoolYear) {
            $schoolYears[] = $schoolYear;
        }
    }

    if(isset($_GET['strand']) && isset($_GET['sy']))
    {
        $strand = $_GET['strand'];
        $school_year = $_GET['sy'];
    }

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
                <a href="subjectTeacher.php" class="nav-link">
                  <i class="fas fa-user-tie nav-icon"></i>
                  <p>Subject Teacher</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link active">
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
                <a href="Subject.php" class="nav-link active">
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
          //EXISTING SUBJECT
          if(isset($_GET['existing']))
          {
            echo "
              <script src='plugins/sweetalert2/sweetalert2.min.js'></script>
              <script>
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Subject already exist!'
                });
              </script>
            ";
          }
          //SUBJECT ADDED
          if (isset($_GET['added'])) {
            echo "
              <script src='plugins/sweetalert2/sweetalert2.min.js'></script>
              <script>
                Swal.fire({
                  icon: 'success',
                  title: 'Subject Added Successfully!',
                });
              </script>
            ";
          }
        ?>

        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addSubject">Add Subject</button>
        
        <!-- MODAL -->
        <div class="modal fade" id="addSubject" tabindex="-1" aria-labelledby="addSubject" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="addSubjectLabel">Add Subject</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              
              <div class="card">
                <div class="card-header">
                  Subject Information
                </div>
                <div class="card-body">
                  <div class="row mb-2">

                      <!-- Main content -->
                      <div class="content">
                          <div class="container-fluid">

                              <form action="input.php" method="post">
                                  <div class="row g-3">
                                      <div class="col-md-4">
                                          <label for="strandname" class="form-label">Subject Name</label>
                                          <input type="text" name="subjectname" class="form-control" id="subjectname" placeholder="Enter subject name" required>
                                      </div>
                                  </div>
                              
                                  <div class="row">
                                      <div class="col-6 mt-3 mb-3">
                                          <span class="fs-5 fw-semibold">Subject Details</span>
                                      </div>
                                  </div>
                                  <!-- Advisories Card -->
                                  <div class="row">
                                      <div class="col-md-3">
                                          <label for="category" class="form-label">Category</label>
                                          <select name="category" id="category" class="form-select" required>
                                              <option disabled selected>Select Category</option>
                                              <<option value="core">Core</option>
                                              <option value="applied">Applied</option>
                                              <option value="specialized">Specialized</option>
                                              <option value="other">Other</option>
                                          </select>
                                      </div>
                                      <div class="col-md-3">
                                          <label for="grade_level" class="form-label">Grade Level</label>
                                          <select name="grade_level" id="grade_level" class="form-select" required>
                                              <option disabled selected>Select Grade Level</option>
                                              <option value="11">11</option>
                                              <option value="12">12</option>
                                          </select>
                                      </div>
                                      <div class="col-md-3">
                                          <label for="sem" class="form-label">Term</label>
                                          <select name="term" class="form-select" id="sem" required>
                                              <option disabled selected>Select Term</option>
                                              <option value="1st Semester">1st Semester</option>
                                              <option value="2nd Semester">2nd Semester</option>
                                          </select>
                                      </div>  
                                  </div>
                                  <!-- .row -->
                                  <div class="row mt-3 mb-3">
                                    <div class="col-md-6">
                                      <div class="card card-primary collapsed-card">
                                        <div class="card-header">
                                          <h3 class="card-title fw-semibold">Strands</h3>
                                          <div class="card-tools">
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                          </button>
                                          </div>
                                          <!-- /.card-tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                          <!-- row -->
                                          <?php
                                              $sql = "SELECT DISTINCT strand_name FROM strand";
                                              $stmt = $conn->prepare($sql);
                                              $stmt->execute();
                                              $result = $stmt->get_result();

                                              if($result->num_rows > 0)
                                              {
                                                  while($row = $result->fetch_assoc())
                                                  {
                                                      echo "
                                                          <div class='row mb-2'>
                                                              <!-- checkbox -->
                                                                  <div class='col-12'>
                                                                      <div class='input-group'>
                                                                          <div class='input-group-prepend'>
                                                                              <span class='input-group-text'>
                                                                                  <input type='checkbox' name='strands[]' id='".$row['strand_name']."' value = '".$row['strand_name']."'>
                                                                              </span>
                                                                          </div>
                                                                          <input type='text' class='form-control text-wrap' value='".$row['strand_name']."' disabled>
                                                                      </div>
                                                                  </div>
                                                                  <!-- /.col-lg-6 -->
                                                              <!-- checkbox -->
                                                          </div>
                                                      ";
                                                  }
                                              }
                                          ?>
                                          <!-- .row -->
                                        </div>
                                        <!-- /.card-body -->
                                      </div>
                                      <!-- /.card -->
                                    </div>
                                    <!-- /.col -->
                                  </div>
                                  <!-- .row -->
                              
                          </div>
                      </div>
                  </div>

                </div>
              </div>

            </div>
            <!-- MODAL CONTENT -->
              <div class="modal-footer">
                <a href="adminIndex.php" id="cancel" class="btn btn-secondary btn-lg me-2">Cancel</a>
                <input type="submit" class="btn btn-info btn-lg" id="addsubject" name="addsubject" value="Add Record">
              </div>
            </div>
          </div>
        </div>
        <!-- MODAL -->

        <div class="card mt-3">
        <div class="card-header">
          <div class="row">
            <div class="col-12">
              <h5><?=$strand?> Subjects</h5>
              </form>
            </div>
            <!-- col -->
          </div>
          <!-- row -->
        </div>
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover table-striped" >
              
            <thead>
              <tr>
                <th>Subject Name</th>
                <th>Category</th>
                <th>Grade Level</th>
                <th>Semester</th>
                <th>School Year</th>
              </tr>
            </thead>
            <tbody>
                
                <!-- CORE SUBJECTS -->
                <?php
                $query = "SELECT * FROM core_subjects WHERE strand = ? AND school_year = ? ORDER BY grade_level ASC";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ss", $strand, $school_year);
                $stmt->execute();
                $result = $stmt->get_result();

                if($result->num_rows > 0)
                {
                while($row = $result->fetch_assoc())
                { ?>

                
                <tr>
                    <td>
                    <p class="s8 text-start"><?=$row['subject_name']?></p>
                    </td>
                    <td>
                    <p class="s8">Core</p>
                    </td>
                    <td>
                        <p><?=$row['grade_level']?></p>
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
                        Student has no Core Subject to take!
                    </td>
                </tr>
                
                <?php  }
                ?>
                <!-- APPLIED SUBJECTS -->
                <?php
                $query = "SELECT * FROM applied_subjects WHERE strand = ? AND school_year = ? ORDER BY grade_level ASC";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ss", $strand, $school_year);
                $stmt->execute();
                $result = $stmt->get_result();

                if($result->num_rows > 0)
                {
                while($row = $result->fetch_assoc())
                { ?>

                
                <tr>
                    <td>
                    <p class="s8 text-start"><?=$row['subject_name']?></p>
                    </td>
                    <td>
                    <p class="s8">Applied</p>
                    </td>
                    <td>
                        <p><?=$row['grade_level']?></p>
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
                        Student has no Applied Subject to take!
                    </td>
                </tr>
                
                <?php  }
                ?>
                <!-- SPECIALIZED SUBJECTS -->
                <?php
                $query = "SELECT * FROM specialized_subjects WHERE strand = ? AND school_year = ? ORDER BY grade_level ASC";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ss", $strand, $school_year);
                $stmt->execute();
                $result = $stmt->get_result();

                if($result->num_rows > 0)
                {
                while($row = $result->fetch_assoc())
                { ?>

                
                <tr>
                    <td>
                    <p class="s8 text-start"><?=$row['subject_name']?></p>
                    </td>
                    <td>
                    <p class="s8">Specialized</p>
                    </td>
                    <td>
                        <p><?=$row['grade_level']?></p>
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
                        Student has no Specialized Subject to take!
                    </td>
                </tr>
                
                <?php  }
                ?>
                <!-- OTHER SUBJECTS -->
                <?php
                $query = "SELECT * FROM other_subjects WHERE strand = ? AND school_year = ? ORDER BY grade_level ASC";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ss", $strand, $school_year);
                $stmt->execute();
                $result = $stmt->get_result();

                if($result->num_rows > 0)
                {
                while($row = $result->fetch_assoc())
                { ?>

                
                <tr>
                    <td>
                    <p class="s8 text-start"><?=$row['subject_name']?></p>
                    </td>
                    <td>
                    <p class="s8">Other Subject</p>
                    </td>
                    <td>
                        <p><?=$row['grade_level']?></p>
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
                        Student has no Other Subject to take!
                    </td>
                </tr>
                
                <?php  }
                ?>

            </tbody>

          </table>
        </div>
        <!-- card body -->
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
<!-- Bootstrap -->
<!-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
        $(document).ready(function() 
        {
            $('#cancel').on('click', function() {
                
            });
        });
 
    </script>
    <script>
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
            });
        });
    </script>
</body>
</html>