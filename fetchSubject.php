<?php

    include ('connection.php');
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //CODE FOR FETCHING SUBJECTS
    if (isset($_POST['grade_level']) && isset($_POST['term']) && isset($_POST['category'])) {
        $grade_level = $_POST['grade_level'];
        $term = $_POST['term'];
        $category = $_POST['category'];
        $school_year = $_POST['school_year'];
    
        $query = "SELECT DISTINCT subject_name FROM ".$category."_subjects WHERE grade_level = '$grade_level' AND semester = '$term' AND school_year = '$school_year'";
        $result = $conn->query($query);
    
        if ($result->num_rows > 0) {
            echo '<option value="">Select Subject</option>';
            while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row['subject_name'] . '">' . $row['subject_name'] . '</option>';
            }
        } else {
            echo '<option value="">No subjects available</option>';
        }
    } else {
        echo '<option value="">Select all criteria first!</option>';
    }

?>