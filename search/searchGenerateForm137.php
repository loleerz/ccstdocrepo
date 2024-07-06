<?php
    include __DIR__ . '/../connection.php';

    // Check if input is set
    if(isset($_POST['input'])) {
        $input = $_POST['input'];

        // Prepare the SQL statement with placeholders for the input
        $sql = "SELECT * FROM student_info 
                WHERE student_no LIKE ? 
                OR Lname LIKE ? 
                OR Fname LIKE ? 
                OR Mname LIKE ? 
                OR strand LIKE ? 
                OR grade_level LIKE ? 
                OR section LIKE ? 
                OR school_year LIKE ?";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error in preparing statement: " . $conn->error);
        }

        // Bind parameters with '%' wildcard for search
        $searchParam = "%" . $input . "%"; // Add '%' wildcard to search for values containing the input
        $stmt->bind_param("ssssssss", 
            $searchParam, 
            $searchParam, 
            $searchParam, 
            $searchParam, 
            $searchParam, 
            $searchParam, 
            $searchParam, 
            $searchParam); // Assuming all columns are strings, adjust "ssssssss" accordingly

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            // Output data of each row
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
        } else {
            // No records found message
            echo "<tr><td colspan='5'><h6 style='color:red;'>No Records Found!</h6></td></tr>";
        }
    }
?>