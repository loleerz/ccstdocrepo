                    <div class="row">
                        <div class="col-xl-5">
                          <!-- Profile picture card-->
                          <div class="card mb-3 mb-xl-0">
                              <div class="card-header d-flex align-items-center">
                                  
                                  <img class="img-account-profile rounded-circle mb-2" src="a/blankprofile.jpg" style="height:70pt; width:70pt;" alt="">
                                  <span class="ms-2">
                                  <div class="fs-4 text-start fw-semibold"><?=$row['lname']."".$row['suffix'].", ".$row['fname']." ".$minitial."."?></div>
                                  <figcaption class="fw-bold"><?=$row['employeenumber']?></figcaption>
                                  </span>
                              </div>
                              <div class="card-body text-start text-primary">
                                  <div class="col">
                                      <span><i class="bi bi-caret-right-fill me-2"></i></span>
                                      <strong class="text-uppercase fs-6"><?=" ACADEMIC YEAR ".$row['school_year']?></strong>
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
                                                            <p class="text-danger"><?=$row['strand']?></p>
                                                        </td>
                                                        <td>
                                                            <p class="text-danger"><?=$row['grade_level']?></p>
                                                        </td>
                                                        <td>
                                                            <p class="text-danger"><?=$row['section']?></p>
                                                        </td>
                                                        <td>
                                                            <p class="text-danger"><?=$row['school_year']?></p>
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
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-primary" type="button">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>