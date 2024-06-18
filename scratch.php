                            <!-- G11 2ND SEM MODALSZ STARTSSASDAFSAOFAS -->

                            <!-- Modal 1st Quarter-->
                            <div class="modal fade" id="111stQuarterModal" tabindex="-1" aria-labelledby="121stQuarterModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="121stQuarterModalLabel">2nd Semester - 1st Quarter</h1>
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
                                                $query = "SELECT * FROM core_sub_grades WHERE student_no = ? ORDER BY subject_name ASC";
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
                                                $query = "SELECT * FROM applied_sub_grades WHERE student_no = ? ORDER BY subject_name ASC";
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
                                                $query = "SELECT * FROM specialized_sub_grades WHERE student_no = ? ORDER BY subject_name ASC";
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
                                                $query = "SELECT * FROM other_sub_grades WHERE student_no = ? ORDER BY subject_name ASC";
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
                            <!-- Modal -->

                            <!-- Modal Edit-->
                            <div class="modal fade" id="111stQuarterEModal" tabindex="-1" aria-labelledby="111stQuarterEModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="111stQuarterEModalLabel">1st Semester - 1st Quarter</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                <form action="update.php?student_no=<?= htmlspecialchars($student_no)?>" method="post">
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
                                                    //FETCHING SUBJECTS INFO
                                                    $query = "SELECT * FROM core_sub_grades WHERE student_no = ? ORDER BY subject_name ASC";
                                                    $stmt = $conn->prepare($query);
                                                    $stmt->bind_param("s", $student_no);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();
                                                    
                                                    if ($result->num_rows > 0) 
                                                    {
                                                        while ($row = $result->fetch_assoc()) 
                                                        {
                                                            //FETCHING SUBJECT TEACHER INFO
                                                            $query1 = "SELECT * FROM subject_teachers WHERE strand = ? AND grade_level = ? AND section = ? AND subject_name = ?";
                                                            $stmt1 = $conn->prepare($query1);
                                                            $stmt1->bind_param("siss", $row['strand'], $row['grade_level'], $row['section'], $row['subject_name']);
                                                            $stmt1->execute();
                                                            $result1 = $stmt1->get_result();
                                                            $row1 = $result1->fetch_assoc();

                                                            //FETCHING SUBJECT TEACHER NAME
                                                            $query2 = "SELECT * FROM teachers_info WHERE employeenumber = ? ";
                                                            $stmt2 = $conn->prepare($query2);
                                                            $stmt2->bind_param("s", $row1['subj_teacher']);
                                                            $stmt2->execute();
                                                            $result2 = $stmt2->get_result();
                                                            $row2 = $result2->fetch_assoc();

                                                            $STmname = $row2['mname'];
                                                            $STminitial = strtoupper(substr($STmname, 0, 1)); 

                                                            if ($row['status1'] == "Graded") 
                                                            {
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <p class="s8">Core</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="s8 text-start"><?= $row['subject_name'] ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <input type="number" class="form-control" disabled placeholder="<?= $row['1st'] ?>">
                                                                    </td>
                                                                    <td>
                                                                        <a type="button" 
                                                                            data-bs-toggle="modal" 
                                                                            data-bs-target="#reviseGrade" 
                                                                            class="btn btn-warning" 
                                                                            data-subject-name="<?= $row['subject_name'] ?>" 
                                                                            data-subject-teacher="<?= $row2['fname']." ".$STminitial.". ".$row2['lname']." ".$row2['suffix'] ?>" 
                                                                            data-subject-category="core" 
                                                                            data-iGrade="<?= $row['1st'] ?>"
                                                                            data-grade-level="<?= $row['grade_level'] ?>"
                                                                            data-quarter="1st"
                                                                            data-semester="<?= $row['sem'] ?>"
                                                                            data-schoolYear="<?= $row['school_year'] ?>"
                                                                            data-student-no="<?= $row['student_no'] ?>"
                                                                            data-status="Pending"
                                                                            >
                                                                            <i class="fas fa-pencil-alt"></i> Revise
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                    <?php
                                                            } 
                                                            else 
                                                            {
                                                    ?>
                                                                <tr>
                                                                    <td>
                                                                        <p class="s8">Core</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="s8 text-start"><?= $row['subject_name'] ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <input type="number" class="form-control" min="0" max="100" name="marks[core][<?= $row['subject_name'] . '__' . $row['sem'] ?>]" id="">
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
                                                                    Student has no Core Subject to take!
                                                                </td>
                                                            </tr>
                                                            
                                                <?php  }
                                                ?>
                                                <!-- APPLIED SUBJECTS -->
                                                <?php
                                                    //FETCHING SUBJECTS INFO
                                                    $query = "SELECT * FROM applied_sub_grades WHERE student_no = ? ORDER BY subject_name ASC";
                                                    $stmt = $conn->prepare($query);
                                                    $stmt->bind_param("s", $student_no);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();
                                                    
                                                    if ($result->num_rows > 0) 
                                                    {
                                                        while ($row = $result->fetch_assoc()) 
                                                        {
                                                            //FETCHING SUBJECT TEACHER INFO
                                                            $query1 = "SELECT * FROM subject_teachers WHERE strand = ? AND grade_level = ? AND section = ? AND subject_name = ?";
                                                            $stmt1 = $conn->prepare($query1);
                                                            $stmt1->bind_param("siss", $row['strand'], $row['grade_level'], $row['section'], $row['subject_name']);
                                                            $stmt1->execute();
                                                            $result1 = $stmt1->get_result();
                                                            $row1 = $result1->fetch_assoc();

                                                            //FETCHING SUBJECT TEACHER NAME
                                                            $query2 = "SELECT * FROM teachers_info WHERE employeenumber = ? ";
                                                            $stmt2 = $conn->prepare($query2);
                                                            $stmt2->bind_param("s", $row1['subj_teacher']);
                                                            $stmt2->execute();
                                                            $result2 = $stmt2->get_result();
                                                            $row2 = $result2->fetch_assoc();

                                                            $STmname = $row2['mname'];
                                                            $STminitial = strtoupper(substr($STmname, 0, 1)); 

                                                            if ($row['status1'] == "Graded") 
                                                            {
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <p class="s8">Applied</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="s8 text-start"><?= $row['subject_name'] ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <input type="number" class="form-control" disabled placeholder="<?= $row['1st'] ?>">
                                                                    </td>
                                                                    <td>
                                                                        <a type="button" 
                                                                            data-bs-toggle="modal" 
                                                                            data-bs-target="#reviseGrade" 
                                                                            class="btn btn-warning" 
                                                                            data-subject-name="<?= $row['subject_name'] ?>" 
                                                                            data-subject-teacher="<?= $row2['fname']." ".$STminitial.". ".$row2['lname']." ".$row2['suffix'] ?>" 
                                                                            data-subject-category="applied" 
                                                                            data-iGrade="<?= $row['1st'] ?>"
                                                                            data-grade-level="<?= $row['grade_level'] ?>"
                                                                            data-quarter="1st"
                                                                            data-semester="<?= $row['sem'] ?>"
                                                                            data-schoolYear="<?= $row['school_year'] ?>"
                                                                            data-student-no="<?= $row['student_no'] ?>"
                                                                            data-status="Pending"
                                                                            >
                                                                            <i class="fas fa-pencil-alt"></i> Revise
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                    <?php
                                                            } 
                                                            else 
                                                            {
                                                    ?>
                                                                <tr>
                                                                    <td>
                                                                        <p class="s8">Applied</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="s8 text-start"><?= $row['subject_name'] ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <input type="number" class="form-control" min="0" max="100" name="marks[applied][<?= $row['subject_name'] . '__' . $row['sem'] ?>]" id="">
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
                                                                    Student has no Core Subject to take!
                                                                </td>
                                                            </tr>
                                                            
                                                <?php  }
                                                ?>
                                                <!-- SPECIALIZED SUBJECTS -->
                                                <?php
                                                    //FETCHING SUBJECTS INFO
                                                    $query = "SELECT * FROM specialized_sub_grades WHERE student_no = ? ORDER BY subject_name ASC";
                                                    $stmt = $conn->prepare($query);
                                                    $stmt->bind_param("s", $student_no);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();
                                                    
                                                    if ($result->num_rows > 0) 
                                                    {
                                                        while ($row = $result->fetch_assoc()) 
                                                        {
                                                            //FETCHING SUBJECT TEACHER INFO
                                                            $query1 = "SELECT * FROM subject_teachers WHERE strand = ? AND grade_level = ? AND section = ? AND subject_name = ?";
                                                            $stmt1 = $conn->prepare($query1);
                                                            $stmt1->bind_param("siss", $row['strand'], $row['grade_level'], $row['section'], $row['subject_name']);
                                                            $stmt1->execute();
                                                            $result1 = $stmt1->get_result();
                                                            $row1 = $result1->fetch_assoc();

                                                            //FETCHING SUBJECT TEACHER NAME
                                                            $query2 = "SELECT * FROM teachers_info WHERE employeenumber = ? ";
                                                            $stmt2 = $conn->prepare($query2);
                                                            $stmt2->bind_param("s", $row1['subj_teacher']);
                                                            $stmt2->execute();
                                                            $result2 = $stmt2->get_result();
                                                            $row2 = $result2->fetch_assoc();

                                                            $STmname = $row2['mname'];
                                                            $STminitial = strtoupper(substr($STmname, 0, 1)); 

                                                            if ($row['status1'] == "Graded") 
                                                            {
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <p class="s8">Specialized</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="s8 text-start"><?= $row['subject_name'] ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <input type="number" class="form-control" disabled placeholder="<?= $row['1st'] ?>">
                                                                    </td>
                                                                    <td>
                                                                        <a type="button" 
                                                                            data-bs-toggle="modal" 
                                                                            data-bs-target="#reviseGrade" 
                                                                            class="btn btn-warning" 
                                                                            data-subject-name="<?= $row['subject_name'] ?>" 
                                                                            data-subject-teacher="<?= $row2['fname']." ".$STminitial.". ".$row2['lname']." ".$row2['suffix'] ?>" 
                                                                            data-subject-category="specialized" 
                                                                            data-iGrade="<?= $row['1st'] ?>"
                                                                            data-grade-level="<?= $row['grade_level'] ?>"
                                                                            data-quarter="1st"
                                                                            data-semester="<?= $row['sem'] ?>"
                                                                            data-schoolYear="<?= $row['school_year'] ?>"
                                                                            data-student-no="<?= $row['student_no'] ?>"
                                                                            data-status="Pending"
                                                                            >
                                                                            <i class="fas fa-pencil-alt"></i> Revise
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                    <?php
                                                            } 
                                                            else 
                                                            {
                                                    ?>
                                                                <tr>
                                                                    <td>
                                                                        <p class="s8">Specialized</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="s8 text-start"><?= $row['subject_name'] ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <input type="number" class="form-control" min="0" max="100" name="marks[specialized][<?= $row['subject_name'] . '__' . $row['sem'] ?>]" id="">
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
                                                                    Student has no Specialized Subject to take!
                                                                </td>
                                                            </tr>
                                                            
                                                <?php  }
                                                ?>
                                                <!-- OTHER SUBJECTS -->
                                                <?php
                                                    //FETCHING SUBJECTS INFO
                                                    $query = "SELECT * FROM other_sub_grades WHERE student_no = ? ORDER BY subject_name ASC";
                                                    $stmt = $conn->prepare($query);
                                                    $stmt->bind_param("s", $student_no);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();
                                                    
                                                    if ($result->num_rows > 0) 
                                                    {
                                                        while ($row = $result->fetch_assoc()) 
                                                        {
                                                            //FETCHING SUBJECT TEACHER INFO
                                                            $query1 = "SELECT * FROM subject_teachers WHERE strand = ? AND grade_level = ? AND section = ? AND subject_name = ?";
                                                            $stmt1 = $conn->prepare($query1);
                                                            $stmt1->bind_param("siss", $row['strand'], $row['grade_level'], $row['section'], $row['subject_name']);
                                                            $stmt1->execute();
                                                            $result1 = $stmt1->get_result();
                                                            $row1 = $result1->fetch_assoc();

                                                            //FETCHING SUBJECT TEACHER NAME
                                                            $query2 = "SELECT * FROM teachers_info WHERE employeenumber = ? ";
                                                            $stmt2 = $conn->prepare($query2);
                                                            $stmt2->bind_param("s", $row1['subj_teacher']);
                                                            $stmt2->execute();
                                                            $result2 = $stmt2->get_result();
                                                            $row2 = $result2->fetch_assoc();

                                                            $STmname = $row2['mname'];
                                                            $STminitial = strtoupper(substr($STmname, 0, 1)); 

                                                            if ($row['status1'] == "Graded") 
                                                            {
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <p class="s8">Other</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="s8 text-start"><?= $row['subject_name'] ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <input type="number" class="form-control" disabled placeholder="<?= $row['1st'] ?>">
                                                                    </td>
                                                                    <td>
                                                                        <a type="button" 
                                                                            data-bs-toggle="modal" 
                                                                            data-bs-target="#reviseGrade" 
                                                                            class="btn btn-warning" 
                                                                            data-subject-name="<?= $row['subject_name'] ?>" 
                                                                            data-subject-teacher="<?= $row2['fname']." ".$STminitial.". ".$row2['lname']." ".$row2['suffix'] ?>" 
                                                                            data-subject-category="other" 
                                                                            data-iGrade="<?= $row['1st'] ?>"
                                                                            data-grade-level="<?= $row['grade_level'] ?>"
                                                                            data-quarter="1st"
                                                                            data-semester="<?= $row['sem'] ?>"
                                                                            data-schoolYear="<?= $row['school_year'] ?>"
                                                                            data-student-no="<?= $row['student_no'] ?>"
                                                                            data-status="Pending"
                                                                            >
                                                                            <i class="fas fa-pencil-alt"></i> Revise
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                    <?php
                                                            } 
                                                            else 
                                                            {
                                                    ?>
                                                                <tr>
                                                                    <td>
                                                                        <p class="s8">Other</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="s8 text-start"><?= $row['subject_name'] ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <input type="number" class="form-control" min="0" max="100" name="marks[other][<?= $row['subject_name'] . '__' . $row['sem'] ?>]" id="">
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

                                            </tbody>
                                        </table>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <input type="submit" class="btn btn-primary" name="1stSem1Quarter" value="Save Changes">
                                        </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <!-- Modal Edit-->


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
                                                $query = "SELECT * FROM core_sub_grades WHERE student_no = ? ORDER BY subject_name ASC";
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
                                                $query = "SELECT * FROM applied_sub_grades WHERE student_no = ? ORDER BY subject_name ASC";
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
                                                $query = "SELECT * FROM specialized_sub_grades WHERE student_no = ? ORDER BY subject_name ASC";
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
                                                $query = "SELECT * FROM other_sub_grades WHERE student_no = ? ORDER BY subject_name ASC";
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
                            <!-- Modal -->

                            <!-- Modal Edit-->
                            <div class="modal fade" id="112ndQuarterEModal" tabindex="-1" aria-labelledby="112ndQuarterEModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="112ndQuarterEModalLabel">1st Semester - 2nd Quarter</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                <form action="update.php?student_no=<?= htmlspecialchars($student_no)?>" method="post">
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
                                                    //FETCHING SUBJECTS INFO
                                                    $query = "SELECT * FROM core_sub_grades WHERE student_no = ? ORDER BY subject_name ASC";
                                                    $stmt = $conn->prepare($query);
                                                    $stmt->bind_param("s", $student_no);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();
                                                    
                                                    if ($result->num_rows > 0) 
                                                    {
                                                        while ($row = $result->fetch_assoc()) 
                                                        {
                                                            //FETCHING SUBJECT TEACHER INFO
                                                            $query1 = "SELECT * FROM subject_teachers WHERE strand = ? AND grade_level = ? AND section = ? AND subject_name = ?";
                                                            $stmt1 = $conn->prepare($query1);
                                                            $stmt1->bind_param("siss", $row['strand'], $row['grade_level'], $row['section'], $row['subject_name']);
                                                            $stmt1->execute();
                                                            $result1 = $stmt1->get_result();
                                                            $row1 = $result1->fetch_assoc();

                                                            //FETCHING SUBJECT TEACHER NAME
                                                            $query2 = "SELECT * FROM teachers_info WHERE employeenumber = ? ";
                                                            $stmt2 = $conn->prepare($query2);
                                                            $stmt2->bind_param("s", $row1['subj_teacher']);
                                                            $stmt2->execute();
                                                            $result2 = $stmt2->get_result();
                                                            $row2 = $result2->fetch_assoc();

                                                            $STmname = $row2['mname'];
                                                            $STminitial = strtoupper(substr($STmname, 0, 1)); 

                                                            if ($row['status'] == "Graded") 
                                                            {
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <p class="s8">Core</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="s8 text-start"><?= $row['subject_name'] ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <input type="number" class="form-control" disabled placeholder="<?= $row['2nd'] ?>">
                                                                    </td>
                                                                    <td>
                                                                        <a type="button" 
                                                                            data-bs-toggle="modal" 
                                                                            data-bs-target="#reviseGrade" 
                                                                            class="btn btn-warning" 
                                                                            data-subject-name="<?= $row['subject_name'] ?>" 
                                                                            data-subject-teacher="<?= $row2['fname']." ".$STminitial.". ".$row2['lname']." ".$row2['suffix'] ?>" 
                                                                            data-subject-category="core" 
                                                                            data-iGrade="<?= $row['2nd'] ?>"
                                                                            data-grade-level="<?= $row['grade_level'] ?>"
                                                                            data-quarter="2nd"
                                                                            data-semester="<?= $row['sem'] ?>"
                                                                            data-schoolYear="<?= $row['school_year'] ?>"
                                                                            data-student-no="<?= $row['student_no'] ?>"
                                                                            data-status="Pending"
                                                                            >
                                                                            <i class="fas fa-pencil-alt"></i> Revise
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                    <?php
                                                            } 
                                                            else 
                                                            {
                                                    ?>
                                                                <tr>
                                                                    <td>
                                                                        <p class="s8">Core</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="s8 text-start"><?= $row['subject_name'] ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <input type="number" class="form-control" min="0" max="100" name="marks[core][<?= $row['subject_name'] . '__' . $row['sem'] ?>]" id="">
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
                                                                    Student has no Core Subject to take!
                                                                </td>
                                                            </tr>
                                                            
                                                <?php  }
                                                ?>
                                            <!-- APPLIED SUBJECTS -->
                                                <?php
                                                    //FETCHING SUBJECTS INFO
                                                    $query = "SELECT * FROM applied_sub_grades WHERE student_no = ? ORDER BY subject_name ASC";
                                                    $stmt = $conn->prepare($query);
                                                    $stmt->bind_param("s", $student_no);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();
                                                    
                                                    if ($result->num_rows > 0) 
                                                    {
                                                        while ($row = $result->fetch_assoc()) 
                                                        {
                                                            //FETCHING SUBJECT TEACHER INFO
                                                            $query1 = "SELECT * FROM subject_teachers WHERE strand = ? AND grade_level = ? AND section = ? AND subject_name = ?";
                                                            $stmt1 = $conn->prepare($query1);
                                                            $stmt1->bind_param("siss", $row['strand'], $row['grade_level'], $row['section'], $row['subject_name']);
                                                            $stmt1->execute();
                                                            $result1 = $stmt1->get_result();
                                                            $row1 = $result1->fetch_assoc();

                                                            //FETCHING SUBJECT TEACHER NAME
                                                            $query2 = "SELECT * FROM teachers_info WHERE employeenumber = ? ";
                                                            $stmt2 = $conn->prepare($query2);
                                                            $stmt2->bind_param("s", $row1['subj_teacher']);
                                                            $stmt2->execute();
                                                            $result2 = $stmt2->get_result();
                                                            $row2 = $result2->fetch_assoc();

                                                            $STmname = $row2['mname'];
                                                            $STminitial = strtoupper(substr($STmname, 0, 1)); 

                                                            if ($row['status'] == "Graded") 
                                                            {
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <p class="s8">Applied</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="s8 text-start"><?= $row['subject_name'] ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <input type="number" class="form-control" disabled placeholder="<?= $row['2nd'] ?>">
                                                                    </td>
                                                                    <td>
                                                                        <a type="button" 
                                                                            data-bs-toggle="modal" 
                                                                            data-bs-target="#reviseGrade" 
                                                                            class="btn btn-warning" 
                                                                            data-subject-name="<?= $row['subject_name'] ?>" 
                                                                            data-subject-teacher="<?= $row2['fname']." ".$STminitial.". ".$row2['lname']." ".$row2['suffix'] ?>" 
                                                                            data-subject-category="applied" 
                                                                            data-iGrade="<?= $row['2nd'] ?>"
                                                                            data-grade-level="<?= $row['grade_level'] ?>"
                                                                            data-quarter="2nd"
                                                                            data-semester="<?= $row['sem'] ?>"
                                                                            data-schoolYear="<?= $row['school_year'] ?>"
                                                                            data-student-no="<?= $row['student_no'] ?>"
                                                                            data-status="Pending"
                                                                            >
                                                                            <i class="fas fa-pencil-alt"></i> Revise
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                    <?php
                                                            } 
                                                            else 
                                                            {
                                                    ?>
                                                                <tr>
                                                                    <td>
                                                                        <p class="s8">Applied</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="s8 text-start"><?= $row['subject_name'] ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <input type="number" class="form-control" min="0" max="100" name="marks[applied][<?= $row['subject_name'] . '__' . $row['sem'] ?>]" id="">
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
                                                                    Student has no Applied Subject to take!
                                                                </td>
                                                            </tr>
                                                            
                                                <?php  }
                                                ?>
                                            <!-- SPECIALIZED SUBJECTS -->
                                                <?php
                                                    //FETCHING SUBJECTS INFO
                                                    $query = "SELECT * FROM specialized_sub_grades WHERE student_no = ? ORDER BY subject_name ASC";
                                                    $stmt = $conn->prepare($query);
                                                    $stmt->bind_param("s", $student_no);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();
                                                    
                                                    if ($result->num_rows > 0) 
                                                    {
                                                        while ($row = $result->fetch_assoc()) 
                                                        {
                                                            //FETCHING SUBJECT TEACHER INFO
                                                            $query1 = "SELECT * FROM subject_teachers WHERE strand = ? AND grade_level = ? AND section = ? AND subject_name = ?";
                                                            $stmt1 = $conn->prepare($query1);
                                                            $stmt1->bind_param("siss", $row['strand'], $row['grade_level'], $row['section'], $row['subject_name']);
                                                            $stmt1->execute();
                                                            $result1 = $stmt1->get_result();
                                                            $row1 = $result1->fetch_assoc();

                                                            //FETCHING SUBJECT TEACHER NAME
                                                            $query2 = "SELECT * FROM teachers_info WHERE employeenumber = ? ";
                                                            $stmt2 = $conn->prepare($query2);
                                                            $stmt2->bind_param("s", $row1['subj_teacher']);
                                                            $stmt2->execute();
                                                            $result2 = $stmt2->get_result();
                                                            $row2 = $result2->fetch_assoc();

                                                            $STmname = $row2['mname'];
                                                            $STminitial = strtoupper(substr($STmname, 0, 1)); 

                                                            if ($row['status'] == "Graded") 
                                                            {
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <p class="s8">Specialized</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="s8 text-start"><?= $row['subject_name'] ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <input type="number" class="form-control" disabled placeholder="<?= $row['2nd'] ?>">
                                                                    </td>
                                                                    <td>
                                                                        <a type="button" 
                                                                            data-bs-toggle="modal" 
                                                                            data-bs-target="#reviseGrade" 
                                                                            class="btn btn-warning" 
                                                                            data-subject-name="<?= $row['subject_name'] ?>" 
                                                                            data-subject-teacher="<?= $row2['fname']." ".$STminitial.". ".$row2['lname']." ".$row2['suffix'] ?>" 
                                                                            data-subject-category="specialized" 
                                                                            data-iGrade="<?= $row['2nd'] ?>"
                                                                            data-grade-level="<?= $row['grade_level'] ?>"
                                                                            data-quarter="2nd"
                                                                            data-semester="<?= $row['sem'] ?>"
                                                                            data-schoolYear="<?= $row['school_year'] ?>"
                                                                            data-student-no="<?= $row['student_no'] ?>"
                                                                            data-status="Pending"
                                                                            >
                                                                            <i class="fas fa-pencil-alt"></i> Revise
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                    <?php
                                                            } 
                                                            else 
                                                            {
                                                    ?>
                                                                <tr>
                                                                    <td>
                                                                        <p class="s8">Specialized</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="s8 text-start"><?= $row['subject_name'] ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <input type="number" class="form-control" min="0" max="100" name="marks[specialized][<?= $row['subject_name'] . '__' . $row['sem'] ?>]" id="">
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
                                                                    Student has no Specialized Subject to take!
                                                                </td>
                                                            </tr>
                                                            
                                                <?php  }
                                                ?>
                                                <!-- OTHER SUBJECTS -->
                                                <?php
                                                    //FETCHING SUBJECTS INFO
                                                    $query = "SELECT * FROM other_sub_grades WHERE student_no = ? ORDER BY subject_name ASC";
                                                    $stmt = $conn->prepare($query);
                                                    $stmt->bind_param("s", $student_no);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();
                                                    
                                                    if ($result->num_rows > 0) 
                                                    {
                                                        while ($row = $result->fetch_assoc()) 
                                                        {
                                                            //FETCHING SUBJECT TEACHER INFO
                                                            $query1 = "SELECT * FROM subject_teachers WHERE strand = ? AND grade_level = ? AND section = ? AND subject_name = ?";
                                                            $stmt1 = $conn->prepare($query1);
                                                            $stmt1->bind_param("siss", $row['strand'], $row['grade_level'], $row['section'], $row['subject_name']);
                                                            $stmt1->execute();
                                                            $result1 = $stmt1->get_result();
                                                            $row1 = $result1->fetch_assoc();

                                                            //FETCHING SUBJECT TEACHER NAME
                                                            $query2 = "SELECT * FROM teachers_info WHERE employeenumber = ? ";
                                                            $stmt2 = $conn->prepare($query2);
                                                            $stmt2->bind_param("s", $row1['subj_teacher']);
                                                            $stmt2->execute();
                                                            $result2 = $stmt2->get_result();
                                                            $row2 = $result2->fetch_assoc();

                                                            $STmname = $row2['mname'];
                                                            $STminitial = strtoupper(substr($STmname, 0, 1)); 

                                                            if ($row['status1'] == "Graded") 
                                                            {
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <p class="s8">Other</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="s8 text-start"><?= $row['subject_name'] ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <input type="number" class="form-control" disabled placeholder="<?= $row['2nd'] ?>">
                                                                    </td>
                                                                    <td>
                                                                        <a type="button" 
                                                                            data-bs-toggle="modal" 
                                                                            data-bs-target="#reviseGrade" 
                                                                            class="btn btn-warning" 
                                                                            data-subject-name="<?= $row['subject_name'] ?>" 
                                                                            data-subject-teacher="<?= $row2['fname']." ".$STminitial.". ".$row2['lname']." ".$row2['suffix'] ?>" 
                                                                            data-subject-category="other" 
                                                                            data-iGrade="<?= $row['2nd'] ?>"
                                                                            data-grade-level="<?= $row['grade_level'] ?>"
                                                                            data-quarter="2nd"
                                                                            data-semester="<?= $row['sem'] ?>"
                                                                            data-schoolYear="<?= $row['school_year'] ?>"
                                                                            data-student-no="<?= $row['student_no'] ?>"
                                                                            data-status="Pending"
                                                                            >
                                                                            <i class="fas fa-pencil-alt"></i> Revise
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                    <?php
                                                            } 
                                                            else 
                                                            {
                                                    ?>
                                                                <tr>
                                                                    <td>
                                                                        <p class="s8">Other</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="s8 text-start"><?= $row['subject_name'] ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <input type="number" class="form-control" min="0" max="100" name="marks[other][<?= $row['subject_name'] . '__' . $row['sem'] ?>]" id="">
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

                                            </tbody>
                                        </table>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <input type="submit" class="btn btn-primary" name="1stSem2Quarter" value="Save Changes">
                                        </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <!-- Modal Edit-->

                            <!-- G11 2ND SEM MODALSZ ENDSAJDKAHDWQ -->