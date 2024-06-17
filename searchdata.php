<?php
    include ('connection.php');

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //CODE FOR SEARCH
    if(isset($_POST['input']))
    {
        $input = $_POST['input'];

        
        // Prepare the SQL statement with a placeholder for the input
        $sql = "SELECT * FROM student_info WHERE Lname LIKE ? OR Fname LIKE ? OR Mname LIKE ? OR strand LIKE ?";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error in preparing statement: " . $conn->error);
        }

        // Bind parameters
        $searchParam = "%". $input . "%"; // Add '%' wildcard to search for values starting with the input
        $stmt->bind_param("ssss", $searchParam, $searchParam, $searchParam, $searchParam); // Assuming all columns are strings, adjust "sss" accordingly

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $mname = $row['Mname'];
                $minitial = strtoupper(substr($mname, 0, 1));

                echo "
                <tr>
                    <td>
                        ".$row['student_no']."
                    </td>
                    <td>
                        ".$row['Lname']."".$row['Suffix'].", ".$row['Fname']." ".$minitial.".
                    </td>
                    <td>
                        ".$row['strand']." - ".$row['grade_level'].$row['section']."
                    </td>
                    <td>
                        <a href='studentGrades.php'>
                            <button>View</button>
                        </a>
                    </td>
                </tr>
                ";
            }
        }
        else
        {
            echo "<h6 style='color:red;'>No Records Found!</h6>";
        }
    }

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