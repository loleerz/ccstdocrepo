<?php
include ('connection.php');
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //CODE FOR FETCHING SECTIONS
    if (isset($_POST['grade_level'])) {
        $grade_level = $_POST['grade_level'];
        $school_year = $_POST['school_year'];
    
        $query = "SELECT * FROM section WHERE grade_level = '$grade_level' AND school_year = '$school_year'";
        $result = $conn->query($query);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "
                    <div class='input-group mt-1'>
                        <div class='input-group-prepend'>
                            <span class='input-group-text'>
                                <input type='checkbox' name='sections[]' id='".$row['strand'].$row['grade_level']."-".$row['section']."' value = '".$row['strand'].$row['grade_level']."-".$row['section']."'>
                            </span>
                        </div>
                        <input type='text' class='form-control text-wrap' value='".$row['strand'].$row['grade_level']."-".$row['section']."' disabled>
                    </div>
                ";
            }
        } else {
            echo '<option value="">No subjects available</option>';
        }
    } else {
        echo '<option value="">Select all criteria first!</option>';
    }

?>