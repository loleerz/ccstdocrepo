<?php
    include __DIR__ . '/../connection.php';

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //CODE FOR SEARCH
    if((isset($_POST['strand'])) && (isset($_POST['schoolYear'])))
    {
        $strand = $_POST['strand'];
        $schoolYear = $_POST['schoolYear'];

        
        // Prepare the SQL statement with a placeholder for the input
        $sql = "SELECT * FROM student_info WHERE strand = ? AND school_year = ?";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error in preparing statement: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param("ss", $strand, $schoolYear); // Assuming all columns are strings, adjust "sss" accordingly

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc()) {
                $mname = $row['Mname'];
                $minitial = strtoupper(substr($mname, 0, 1));

                // Output table rows with retrieved data
                echo "
                <tr>
                    <td>".$row['student_no']."</td>
                    <td>".$row['Lname'].$row['Suffix'].", ".$row['Fname']." ".$minitial."</td>
                    <td>".$row['strand']." - ".$row['grade_level'].$row['section']."</td>
                    <td>".$row['school_year']."</td>
                    <td>
                        <button class='btn btn-success generate-btn' data-student-no='".$row['student_no']."' data-bs-toggle='modal' data-bs-target='#exampleModal'>Generate</button>
                    </td>
                </tr>";
            }
        }
        else
        {
            echo "
                <tr>
                    <td colspan='5'>
                        <h6 style='color:red;'>No Records Found on ".$strand." strand on Academic Year ".$schoolYear."!</h6>
                    </td>
                </tr>
            ";
        }
    }
?>