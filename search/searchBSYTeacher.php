<?php
    include __DIR__ . '/../connection.php';

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //CODE FOR SEARCH
    if(isset($_POST['schoolYear']))
    {
        $schoolYear = $_POST['schoolYear'];

        
        // Prepare the SQL statement with a placeholder for the input
        $sql = "SELECT * FROM teachers_info WHERE school_year = ?";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error in preparing statement: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param("s", $schoolYear); // Assuming all columns are strings, adjust "sss" accordingly

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
            echo "
                <tr>
                    <td colspan='5'>
                        <h6 style='color:red;'>No Records Found on Academic Year ".$schoolYear."!</h6>
                    </td>
                </tr>
            ";
        }
    }
?>