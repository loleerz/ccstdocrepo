<div class="card">
  <div class="card-header">
    Add Strand
  </div>
  <div class="card-body">
    <h5 class="card-title">Strand Details</h5>

        <div class="row">
            <div class="col mb-3">
                <span class="fs-5 fw-semibold">Strand Information</span>
            </div>
        </div>
        <form action="input.php" method="post">
            <div class="row g-3">
                <div class="col-md-4">
                    <label for="strandname" class="form-label">Strand Name</label>
                    <input type="text" name="strandname" class="form-control" id="strandname" placeholder="Enter strand name" required>
                </div>
            </div>
        
            <div class="row">
                <div class="col-6 mt-3 mb-3">
                    <span class="fs-5 fw-semibold">Grade 11 Subjects</span>
                </div>
            </div>
            <div class="row">
                <div class="col-6 border-end border-dark">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <span class="fs-5 fw-semibold">First Semester</span>
                        </div>
                    </div>
                    <!-- Advisories Card -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-primary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title fw-semibold">Core Subjects</h3>
                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- row -->
                                <input type="hidden" name="c111grade_level" value="11">
                                <input type="hidden" name="c111semester" value="1st Semester">
                                <?php
                                    $sql = "SELECT DISTINCT subject_name FROM core_subjects WHERE grade_level = '11' AND semester = '1st Semester'";
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
                                                                        <input type='checkbox' name='c111subjects[]' id='".$row['subject_name']."' value = '".$row['subject_name']."'>
                                                                    </span>
                                                                </div>
                                                                <input type='text' class='form-control text-wrap' value='".$row['subject_name']."' disabled>
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
                        <div class="col-md-4">
                            <div class="card card-primary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title fw-semibold">Applied Subjects</h3>
                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- row -->
                                <input type="hidden" name="a111grade_level" value="11">
                                <input type="hidden" name="a111semester" value="1st Semester">
                                <?php
                                    $sql = "SELECT DISTINCT subject_name FROM applied_subjects WHERE grade_level = '11' AND semester = '1st Semester'";
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
                                                                        <input type='checkbox' name='a111subjects[]' id='".$row['subject_name']."' value = '".$row['subject_name']."'>
                                                                    </span>
                                                                </div>
                                                                <input type='text' class='form-control' value='".$row['subject_name']."' disabled>
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
                        <div class="col-md-4">
                            <div class="card card-primary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title fw-semibold">Specialized Subjects</h3>
                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- row -->
                                <input type="hidden" name="s111grade_level" value="11">
                                <input type="hidden" name="s111semester" value="1st Semester">
                                <?php
                                    $sql = "SELECT DISTINCT subject_name FROM specialized_subjects WHERE grade_level = '11' AND semester = '1st Semester'";
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
                                                                        <input type='checkbox' name='s111subjects[]' id='".$row['subject_name']."' value = '".$row['subject_name']."'>
                                                                    </span>
                                                                </div>
                                                                <input type='text' class='form-control' value='".$row['subject_name']."' disabled>
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
                </div>
                <!-- .col -->
                <div class="col-6">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <span class="fs-5 fw-semibold">Second Semester</span>
                        </div>
                    </div>
                    <!-- Advisories Card -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-primary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title fw-semibold">Core Subjects</h3>
                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- row -->
                                <input type="hidden" name="c112grade_level" value="11">
                                <input type="hidden" name="c112semester" value="2nd Semester">
                                <?php
                                    $sql = "SELECT DISTINCT subject_name FROM core_subjects WHERE grade_level = '11' AND semester = '2nd Semester'";
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
                                                                        <input type='checkbox' name='c112subjects[]' id='".$row['subject_name']."' value = '".$row['subject_name']."'>
                                                                    </span>
                                                                </div>
                                                                <input type='text' class='form-control text-wrap' value='".$row['subject_name']."' disabled>
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
                        <div class="col-md-4">
                            <div class="card card-primary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title fw-semibold">Applied Subjects</h3>
                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- row -->
                                <input type="hidden" name="a112grade_level" value="11">
                                <input type="hidden" name="a112semester" value="2nd Semester">
                                <?php
                                    $sql = "SELECT DISTINCT subject_name FROM applied_subjects WHERE grade_level = '11' AND semester = '2nd Semester'";
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
                                                                        <input type='checkbox' name='a112subjects[]' id='".$row['subject_name']."' value = '".$row['subject_name']."'>
                                                                    </span>
                                                                </div>
                                                                <input type='text' class='form-control' value='".$row['subject_name']."' disabled>
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
                        <div class="col-md-4">
                            <div class="card card-primary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title fw-semibold">Specialized Subjects</h3>
                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- row -->
                                <input type="hidden" name="s112grade_level" value="11">
                                <input type="hidden" name="s112semester" value="2nd Semester">
                                <?php
                                    $sql = "SELECT DISTINCT subject_name FROM specialized_subjects WHERE grade_level = '11' AND semester = '2nd Semester'";
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
                                                                        <input type='checkbox' name='s112subjects[]' id='".$row['subject_name']."' value = '".$row['subject_name']."'>
                                                                    </span>
                                                                </div>
                                                                <input type='text' class='form-control' value='".$row['subject_name']."' disabled>
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
                </div>
                <!-- .col -->
            </div>
            <!-- .row -->
            <div class="row">
                <div class="col-6 mt-3 mb-3">
                    <span class="fs-5 fw-semibold">Grade 12 Subjects</span>
                </div>
            </div>
            <div class="row">
                <div class="col-6 border-end border-dark">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <span class="fs-5 fw-semibold">First Semester</span>
                        </div>
                    </div>
                    <!-- Advisories Card -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-primary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title fw-semibold">Core Subjects</h3>
                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- row -->
                                <input type="hidden" name="c121grade_level" value="12">
                                <input type="hidden" name="c121semester" value="1st Semester">
                                <?php
                                    $sql = "SELECT DISTINCT subject_name FROM core_subjects WHERE grade_level = '12' AND semester = '1st Semester'";
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
                                                                        <input type='checkbox' name='c121subjects[]' id='".$row['subject_name']."' value = '".$row['subject_name']."'>
                                                                    </span>
                                                                </div>
                                                                <input type='text' class='form-control text-wrap' value='".$row['subject_name']."' disabled>
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
                        <div class="col-md-4">
                            <div class="card card-primary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title fw-semibold">Applied Subjects</h3>
                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- row -->
                                <input type="hidden" name="a121grade_level" value="12">
                                <input type="hidden" name="a121semester" value="1st Semester">
                                <?php
                                    $sql = "SELECT DISTINCT subject_name FROM applied_subjects WHERE grade_level = '12' AND semester = '1st Semester'";
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
                                                                        <input type='checkbox' name='a121subjects[]' id='".$row['subject_name']."' value = '".$row['subject_name']."'>
                                                                    </span>
                                                                </div>
                                                                <input type='text' class='form-control' value='".$row['subject_name']."' disabled>
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
                        <div class="col-md-4">
                            <div class="card card-primary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title fw-semibold">Specialized Subjects</h3>
                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- row -->
                                <input type="hidden" name="s121grade_level" value="12">
                                <input type="hidden" name="s121semester" value="1st Semester">
                                <?php
                                    $sql = "SELECT DISTINCT subject_name FROM specialized_subjects WHERE grade_level = '12' AND semester = '1st Semester'";
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
                                                                        <input type='checkbox' name='s121subjects[]' id='".$row['subject_name']."' value = '".$row['subject_name']."'>
                                                                    </span>
                                                                </div>
                                                                <input type='text' class='form-control' value='".$row['subject_name']."' disabled>
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
                </div>
                <!-- .col -->
                <div class="col-6">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <span class="fs-5 fw-semibold">Second Semester</span>
                        </div>
                    </div>
                    <!-- Advisories Card -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-primary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title fw-semibold">Core Subjects</h3>
                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- row -->
                                <input type="hidden" name="c122grade_level" value="12">
                                <input type="hidden" name="c122semester" value="2nd Semester">
                                <?php
                                    $sql = "SELECT DISTINCT subject_name FROM core_subjects WHERE grade_level = '12' AND semester = '2nd Semester'";
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
                                                                        <input type='checkbox' name='c122subjects[]' id='".$row['subject_name']."' value = '".$row['subject_name']."'>
                                                                    </span>
                                                                </div>
                                                                <input type='text' class='form-control text-wrap' value='".$row['subject_name']."' disabled>
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
                        <div class="col-md-4">
                            <div class="card card-primary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title fw-semibold">Applied Subjects</h3>
                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- row -->
                                <input type="hidden" name="a122grade_level" value="12">
                                <input type="hidden" name="a122semester" value="2nd Semester">
                                <?php
                                    $sql = "SELECT DISTINCT subject_name FROM applied_subjects WHERE grade_level = '12' AND semester = '2nd Semester'";
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
                                                                        <input type='checkbox' name='a122subjects[]' id='".$row['subject_name']."' value = '".$row['subject_name']."'>
                                                                    </span>
                                                                </div>
                                                                <input type='text' class='form-control' value='".$row['subject_name']."' disabled>
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
                        <div class="col-md-4">
                            <div class="card card-primary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title fw-semibold">Specialized Subjects</h3>
                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- row -->
                                <input type="hidden" name="s122grade_level" value="12">
                                <input type="hidden" name="s122semester" value="2nd Semester">
                                <?php
                                    $sql = "SELECT DISTINCT subject_name FROM specialized_subjects WHERE grade_level = '12' AND semester = '2nd Semester'";
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
                                                                        <input type='checkbox' name='s122subjects[]' id='".$row['subject_name']."' value = '".$row['subject_name']."'>
                                                                    </span>
                                                                </div>
                                                                <input type='text' class='form-control' value='".$row['subject_name']."' disabled>
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
                </div>
                <!-- .col -->
            </div>
            <!-- .row -->

  </div>
</div>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 fw-bold fs-4">Strand Registration</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
                
                    
                        
                    <div class="row mt-3 mb-3">
                        <div class="col">
                            <a href="adminIndex.php" id="cancel" class="btn btn-secondary btn-lg me-2">Cancel</a>
                            <input type="submit" class="btn btn-info btn-lg" id="addstrand" name="addstrand" value="Add Record">
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

