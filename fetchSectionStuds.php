<?php
include ('connection.php');
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //CODE FOR FETCHING SECTIONS
    if (isset($_POST['grade_level'])) {
        $grade_level = $_POST['grade_level'];
        $strand = $_POST['strand'];
        $school_year = $_POST['school_year'];
    
        $query = "SELECT * FROM section WHERE grade_level = '$grade_level' AND strand = '$strand' AND school_year = '$school_year'";
        $result = $conn->query($query);
    
        if ($result->num_rows > 0) {
            echo "<option disabled selected>Select Section</option>";
            while ($row = $result->fetch_assoc()) {
                echo "
                    <option value = '".$row['section']."'>".$row['section']."</option>
                ";
            }
        } else {
            echo '<option value="">No section available</option>';
        }
    } else {
        echo '<option value="">Select all criteria first!</option>';
    }

?>