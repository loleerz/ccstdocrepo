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
                        <a href='studentGrades.php' class='btn btn-primary'>
                            View
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
?>