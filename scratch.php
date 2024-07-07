<?php

//QUERY FOR FETCHING STRANDS INFO
$sql = "SELECT * FROM strand WHERE track = 'Academic' AND school_year = '$currentSchoolYear'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();


if($result->num_rows > 0)
{
  while($strandsui = $result->fetch_assoc())
  {
    $sql2 = "SELECT * FROM student_info WHERE strand = ? AND school_year = ?";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("ss", $strandsui['strand_name'], $currentSchoolYear);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
  ?>
  

          <div class="col-2 card ms-4 me-4">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-gradient-info px-0">
                <h3 class="widget-user-username fw-bold fs-4"><?=$strandsui['abbreviation']?></h3>
                <figcaption class="" style="font-size: 9pt;"><?=$strandsui['strand_name']?></figcaption>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="a/stem.png" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 ">
                    <div class="description-block">
                      <h5 class="description-header"></h5>
                      <span class="description-text"></span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 ">
                    <div class="description-block">
                      <h5 class="description-header"><?=$result2->num_rows?></h5>
                      <span class="" style="font-size: 9pt;">Students</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header"></h5>
                      <span class="description-text"></span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>

  <?php
  }
}
?>