

<div class="card">
    <div class="card-header">
        Subject Teacher Information
    </div>
    <div class="card-body">
        <div class="row mb-2">

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">

                    <form action="input.php" method="post">

                        <input type="hidden" value="<?=$currentSchoolYear?>" id = "school_year" name="school_year">

                        <div class="row">
                            <div class="col col-8">
                                <label for="subj_teacher" class="form-label">Subject Teacher</label>
                                <select name="subj_teacher" id="subj_teacher" class="form-select" required>
                                <option disabled selected>Select Subject Teacher</option>
                                <?php
                                    $sql = "SELECT * FROM teachers_info";
                                    $stmt = $conn->prepare($sql);
                                    // $stmt->bind_param("s", $schoolYear);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    if($result->num_rows > 0)
                                    {
                                        while($row = $result->fetch_assoc())
                                        {
                                            $mname = $row['mname'];
                                            $minitial = strtoupper(substr($mname, 0, 1));

                                            echo "
                                                <option value='".$row['employeenumber']."'>".$row['lname']."".$row['suffix'].", ".$row['fname']." ".$minitial.".</option>
                                            ";
                                        }
                                    }
                                    else
                                    {
                                        echo "

                                                <option value=''>No Records Found!</option>
                                            ";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <?php
                            $query = "SELECT * FROM subj_teacher "
                        ?>

                        <div class="row">
                            <div class="col-6 mt-3 mb-3">
                                <span class="fs-5 fw-semibold">Subject Details</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="grade_level" class="form-label">Grade Level</label>
                                <select name="grade_level" id="grade_level" class="form-select" readonly>
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
                            <div class="col-md-4">
                                <label for="category" class="form-label">Subject Category</label>
                                <select name="category" id="category" class="form-select" required>
                                    <option disabled selected>Select Subject Category</option>
                                    <<option value="core">Core</option>
                                    <option value="applied">Applied</option>
                                    <option value="specialized">Specialized</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>  

                        <div class="row mt-2">
                            <div class="col-md-8">
                                <label for="subject" class="form-label">Subject Name</label>
                                <select name="subject" id="subject" class="form-select" required>
                                    <option disabled selected>Select Subject</option>
                                    
                                </select>
                            </div>
                        </div>  

                        <div class="row">
                            <div class="col-6 mt-3 mb-3">
                                <span class="fs-5 fw-semibold">Select Sections to Handle</span>
                            </div>
                        </div>

                        <!-- .row -->
                        <div class="row mt-3 mb-3">
                        <div class="col-md-9">
                            <div class="card card-primary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title fw-semibold">Sections</h3>
                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- row -->
                                <div class='row mb-2'>
                                    <!-- checkbox -->
                                        <div class='col-12' id = "sections">
                                            <div class='input-group' id='input-group'>
                                                
                                            </div>
                                        </div>
                                        <!-- /.col-lg-6 -->
                                    <!-- checkbox -->
                                </div>
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
