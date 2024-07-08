<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include('connection.php');

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

$sections = isset($_GET['section']) ? $_GET['section'] : '';
$pattern = '/^([A-Za-z, ]+)(\d{2})-(\w)$/';
$result = null;
if (preg_match($pattern, $sections, $matches)) {
    $strand = $matches[1];
    $gradeLevel = $matches[2];
    $section = $matches[3];

    // Fetching data for outputting student info
    $sql = "SELECT (@row_number:=@row_number + 1) AS row_number, student_info.* 
            FROM student_info 
            CROSS JOIN (SELECT @row_number := 0) AS init 
            WHERE strand = ? AND grade_level = ? AND section = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters: "s" for string, "i" for integer
        $stmt->bind_param("sis", $strand, $gradeLevel, $section);

        // Execute the prepared statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Close the statement
        $stmt->close();
    } else {
        echo "Failed to prepare the SQL statement.";
    }
} else {
    echo "Invalid section format.";
}

// Close the connection
$conn->close();
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
          <a href="#" class="d-block text-decoration-none text-secondary">Adviser</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="teacherIndex.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="teacherAdvisories.php" class="nav-link active">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Advisories
              </p>
            </a>
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
            <h1 class="m-0 fw-bold fs-4">Master List</h1>
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
            <div class="row justify-content-end">
              <div class="col-4 justify-content-end">
                <div class="form-floating">
                  <!-- SEARCH BAR -->
                  <input type="text" name="search" id="search" class="form-control col-7" placeholder="Search">
                  <label for="search">Search</label>
                </div>
                <!-- form-floating -->
              </div>
              <!-- col -->
            </div>
            <!-- row -->
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table id="example2" class="table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Student No.</th>
                  <th>Name</th>
                  <th>Strand and Section</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="tbody">
                <?php
                if ($result) {
                    while ($row = $result->fetch_assoc()) 
                    {
                        $minitial = !empty($row['Minitial']) ? $row['Minitial'] . '.' : '';
                        ?>
                        <tr>
                          <td><?= htmlspecialchars($row['row_number']) ?></td>
                          <td><?= htmlspecialchars($row['student_no']) ?></td>
                          <td><?= htmlspecialchars($row['Lname'] . ' ' . $row['Suffix'] . ', ' . $row['Fname'] . ' ' . $minitial) ?></td>
                          <td><?= htmlspecialchars($row['strand'] . ' - ' . $row['grade_level'].$row['section']) ?></td>
                          <td>
                            <a href='teacherStudInfo.php?student_no=<?= htmlspecialchars($row['student_no']) ?>'>
                              <button class="btn btn-primary">View</button>
                            </a>
                          </td>
                        </tr>
                        <?php
                    }
                }
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
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
    <strong>Clark College of Science and Technology. Since 2005.</strong>
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
  $(document).ready(function() {
    $('#cancel').on('click', function() {
      // Add your cancel action here
    });

    $("#search").keyup(function() {
      var input = $(this).val();
      var strand = "<?php echo addslashes($strand); ?>";
      var gradeLevel = "<?php echo addslashes($gradeLevel); ?>";
      var section = "<?php echo addslashes($section); ?>";

      $.ajax({
        url: "search/searchTeacherStudent.php",
        method: "POST",
        data: { input: input,
                strand: strand,
                gradeLevel: gradeLevel,
                section: section },
        success: function(data) {
          $("#tbody").html(data);
        }
      });
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
