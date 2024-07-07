<?php
    include __DIR__ . '/../connection.php';

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //CODE FOR SEARCH
    if(isset($_POST['input']) && isset($_POST['schoolYear']))
    {
        $input = $_POST['input'];
        $schoolYear = $_POST['schoolYear'];

        
        // Prepare the SQL statement with a placeholder for the input
        $sql = "SELECT * FROM subject_teachers WHERE school_year = ? AND (subj_teacher LIKE ? OR lname LIKE ? OR fname LIKE ? OR mname LIKE ? OR school_year LIKE ?)";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error in preparing statement: " . $conn->error);
        }

        // Bind parameters
        $searchParam = "%". $input . "%"; // Add '%' wildcard to search for values starting with the input
        $stmt->bind_param("ssssss", $schoolYear, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam); // Assuming all columns are strings, adjust "sss" accordingly

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        if($result->num_rows > 0)
        {
          while($row = $result->fetch_assoc()) {
            $mname = $row['mname'];
            $minitial = strtoupper(substr($mname, 0, 1));

            // Output table rows with retrieved data
            echo "
            <tr>
                <td>
                    ".$row['employeenumber']."
                </td>
                <td>
                    ".$row['lname']." ".$row['suffix'].", ".$row['fname']." ".$minitial."
                </td>
                <td>
                    ".$row['school_year']."
                </td>
                <td>
                    <a href='teacherInfo.php?employee_no=".$row['employeenumber']."' class='btn btn-primary'>
                        View
                    </a>
                </td>
            </tr>";
          }
        }
        else
        {
            echo "<h6 style='color:red;'>No Records Found!</h6>";
        }
    }
?>