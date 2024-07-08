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
    $currentSchoolYear = false;

    for ($year = $startYear; $year <= $currentYear; $year++) {
        $startDate = $year . '-09-01'; // Start date of the school year
        $endDate = date('Y-m-d', strtotime('+1 year', strtotime($startDate) - 1)); // End date of the school year (1 year from start date minus 1 day)
        
        $schoolYear = getSchoolYear($startDate, $endDate);
        if ($schoolYear) {
            $currentSchoolYear = $schoolYear;
        }
        // Store all possible school years for the dropdown
        $schoolYears[] = date('Y', strtotime($startDate)) . '-' . date('Y', strtotime($endDate));
    }

    //Fetching datas for outputting student infos
    $sql = "SELECT * FROM student_info";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

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
    #previewModal .modal-body::-webkit-scrollbar {
      display: none;  /* Safari and Chrome */
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

    <!-- GOOD MORAL TEMPLATE -->
    <iframe src="goodMoral.php" id="f137F" frameborder="0" style="height:0; border:0;"></iframe>
    <!-- GOOD MORAL TEMPLATE -->


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
            <a href="#" class="nav-link active">
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
                <a href="generateGoodMoral.php" class="nav-link active">
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
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 fw-bold fs-4">Good Moral Certificate Generationz</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="card col-10">
              <div class="card-header">
                  <div class="row">
                      <div class="col-4">
                          <div class="form-floating">
                              <select name="school_year" class="form-select col-7" id="school_year">
                                  <?php foreach ($schoolYears as $year) { ?>
                                      <option selected value="<?= $year ?>"><?= $year ?></option>
                                  <?php } ?>
                              </select>
                              <label for="school_year">School Year</label>
                          </div>
                          <!-- /.form-floating -->
                      </div>
                      <!-- /.col -->
                      <div class="col-4">
                          <div class="form-floating">
                              <select name="strand" class="form-select" id="strand">
                                <option selected disabled></option>
                                <?php 
                                  $sql = "SELECT DISTINCT strand_name FROM strand";
                                  $stmt = $conn->prepare($sql);
                                  $stmt->execute();
                                  $result1 = $stmt->get_result();

                                  if($result->num_rows > 0)
                                  {
                                      while($strands = $result1->fetch_assoc())
                                      { ?>
                                          <option value="<?=$strands['strand_name']?>"><?=$strands['strand_name']?></option>
                                      <?php }
                                  }
                                ?>
                              </select>
                              <label for="strand">Choose Strand</label>
                          </div>
                          <!-- /.form-floating -->
                      </div>
                      <!-- /.col -->
                      <div class="col-4 text-end align-end">
                          <div class="form-floating">
                              <!-- SEARCH BAR -->
                              <input type="text" name="search" id="search" class="form-control col-7" placeholder="Search" style="align: right;">
                              <label for="search">Search</label>
                          </div>
                          <!-- /.form-floating -->
                      </div>
                      <!-- /.col -->
                  </div>
                  <!-- /.row -->
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
              <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
                    <th>Student No.</th>
                    <th>Student Name</th>
                    <th>Section</th>
                    <th>School Year</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="tbody">
                  
                    <?php
                        while($row = $result->fetch_assoc())
                        {
                            $mname = $row['Mname'];
                            $minitial = strtoupper(substr($mname, 0, 1)); ?>

                            
                            <tr>
                                <td>
                                    <?=$row['student_no']?>
                                </td>
                                <td>
                                    <?=$row['Lname']."".$row['Suffix'].", ".$row['Fname']." ".$minitial?>
                                </td>
                                <td>
                                    <?=$row['strand']." - ".$row['section']?>
                                </td>
                                <td>
                                    <?=$row['school_year']?>
                                </td>
                                <td>
                                  <button class="btn btn-success generate-btn" data-student-no="<?= $row['student_no'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">Generate</button>
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

          <!-- Modal -->
          <button type="button" id="view" class="btn btn-primary d-none">View</button>
          <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable modal-xl">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h6 class="modal-title fs-4" id="previewModalLabel">Good Moral Certificate Preview</h6>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body" id="previewModalBody">
                          <div id="loading" class="text-center" style="display:none;">
                              <div class="spinner-border text-primary" role="status">
                                  <span class="visually-hidden">Loading...</span>
                              </div>
                          </div>
                          <!-- Iframe will be moved here -->
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" id="printORsave" class="btn btn-primary">Print/Save</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- MODAL -->

          <!-- Hidden iframe initially -->
          <iframe id="f137F" src="" frameborder="0" style="display:none; height:100%; width:100%; border:0;"></iframe>

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
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
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
      // Use event delegation for dynamically created elements
$(document).on('click', '.generate-btn', function() {
    var studentNo = $(this).data('student-no');

    // Update iframe src with the student number
    $('#f137F').attr('src', 'goodMoralinfo.php?student_no=' + studentNo);

    // Show loading spinner
    $('#loading').show();

    // Handle load event of the iframe
    $('#f137F').on('load', function() {
        // Hide loading spinner
        $('#loading').hide();
        // Show the iframe (in this case, we don't show it yet as it will be moved to the preview modal)
    });

    // Handle error loading iframe
    $('#f137F').on('error', function() {
        // Hide loading spinner and show error message
        $('#loading').hide();
        alert('Failed to load the document.');
    });

    // Show the SweetAlert2 modal
    Swal.fire({
        title: 'Good Moral Certificate',
        text: 'Document Generated Successfully!',
        icon: 'success',
        showCancelButton: false,
        showConfirmButton: true,
        confirmButtonText: 'View',
        allowOutsideClick: false,
        allowEscapeKey: false
    }).then((result) => {
        if (result.isConfirmed) {
            $('#view').click();
        }
    });
});

$('#view').on('click', function() {
    const iframe = document.getElementById('f137F');

    // Ensure the iframe is loaded before showing the preview modal
    if (iframe.getAttribute('src') !== '') {
        $('#exampleModal').modal('hide'); // Hide the exampleModal

        // Move the iframe to the preview modal body
        $('#previewModalBody').append(iframe);
        $(iframe).show(); // Show the iframe

        // Ensure the iframe has 100% height and width
        iframe.style.height = '100%';
        iframe.style.width = '100%';

        console.log(iframe); // Log the iframe element for debugging
        $('#previewModal').modal('show'); // Show the previewModal
    } else {
        alert('Please wait for the document to be generated.');
    }
});

function printIframeContent(iframeId) {
    const iframe = document.getElementById(iframeId);
    const iframeWindow = iframe.contentWindow;


    // Print the content
    iframeWindow.focus();
    iframeWindow.print();
}

$('#printORsave').on('click', function() {
    // Call the function with the id of the iframe
    printIframeContent('f137F');
});

      $('#cancel').on('click', function() {
          // Your cancel logic here (if any)
      });

      function fetchStudents(url, data) 
      {
        $.ajax({
            url: url,
            method: "POST",
            data: data,
            success: function(response) {
                $("#tbody").html(response);
                console.log('Students fetched successfully');
            },
            error: function(xhr, status, error) {
                console.error("AJAX error: ", status, error);
            }
        });
      }

      $("#search").keyup(function() {
          var input = $(this).val();
          var schoolYear = $("#school_year").val();
          console.log(schoolYear);
          fetchStudents("search/searchGenerateGM.php", {input: input, schoolYear: schoolYear});
      });

      $("#school_year").change(function() {
          var schoolYear = $(this).val();
          console.log("School year changed to: " + schoolYear);
          fetchStudents("search/searchBSYf137.php", {schoolYear: schoolYear});
      });
      $("#strand").change(function() {
          var strand = $(this).val();
          var schoolYear = $("#school_year").val();
          console.log("Strand changed to: " + strand);
          fetchStudents("search/searchBStrandf137.php", {strand: strand, schoolYear: schoolYear});
      });
    });
    </script>
    <!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
