<?php
include __DIR__ . '/../connection.php';

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// CODE FOR SEARCH
if (isset($_POST['input'])) {
    $input = $_POST['input'];
    $strand = $_POST['strand'];
    $gradeLevel = $_POST['gradeLevel'];
    $section = $_POST['section'];


        // Prepare the SQL statement with a placeholder for the input
        $sql = "SELECT (@row_number:=@row_number + 1) AS row_number, student_info.* 
                FROM student_info 
                CROSS JOIN (SELECT @row_number := 0) AS init 
                WHERE (strand = ? AND grade_level = ? AND section = ?)
                AND (student_no LIKE ? OR Lname LIKE ? OR Fname LIKE ? OR Mname LIKE ? OR strand LIKE ? OR grade_level LIKE ? OR section LIKE ?)";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error in preparing statement: " . $conn->error);
        }

        // Bind parameters
        $searchParam = "%" . $input . "%"; // Add '%' wildcard to search for values containing the input
        $stmt->bind_param("ssssssssss", $strand, $gradeLevel, $section, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam);

        // Execute the statement
        if ($stmt->execute()) {
            // Get the result
            $result = $stmt->get_result();
        } else {
            die("Error in executing statement: " . $stmt->error);
        }

    // // Pass PHP variables to JavaScript
    // echo "<script>
    //     console.log('Strand: " . addslashes($strand) . "');
    //     console.log('Grade Level: " . addslashes($gradeLevel) . "');
    //     console.log('Section: " . addslashes($section) . "');
    //     console.log('SQL Query: " . addslashes($sql) . "');
    //     console.log('Search Parameter: " . addslashes($searchParam) . "');
    // </script>";

    // Output the results
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $mname = $row['Mname'];
            $minitial = strtoupper(substr($mname, 0, 1));

            echo "
            <tr>
                <td>".$row['row_number']."</td>
                <td>".$row['student_no']."</td>
                <td>".$row['Lname']. " " .$row['Suffix'].", ".$row['Fname']." ".$minitial."</td>
                <td>".$row['strand']." - ".$row['grade_level'].$row['section']."</td>
                <td>
                    <a href='teacherStudInfo.php?student_no=" . $row['student_no']."'>
                        <button class='btn btn-primary'>View</button>
                    </a>
                </td>
            </tr>
            ";
        }
    } else {
        echo "<h6 style='color:red;'>No Records Found!</h6>";
    }
}
?>