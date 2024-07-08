<?php
include __DIR__ . '/../connection.php';

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// CODE FOR SEARCH
if (isset($_POST['input']) && isset($_POST['schoolYear'])) {
    $input = $_POST['input'];
    $schoolYear = $_POST['schoolYear'];

    // Prepare the SQL statement with placeholders for the input
    $sql = "
        SELECT 
            (@row_number := @row_number + 1) AS row_number, 
            section.*, 
            teachers_info.lname, 
            teachers_info.suffix, 
            teachers_info.fname, 
            teachers_info.mname 
        FROM 
            section 
        CROSS JOIN 
            (SELECT @row_number := 0) AS init 
        LEFT JOIN 
            teachers_info 
        ON 
            section.adviser = teachers_info.employeenumber 
        WHERE 
            section.school_year = ? 
            AND (
                section.adviser LIKE ? 
                OR teachers_info.lname LIKE ? 
                OR teachers_info.fname LIKE ? 
                OR teachers_info.mname LIKE ? 
                OR section.school_year LIKE ?
                OR section.strand LIKE ?
                OR section.grade_level LIKE ?
                OR section.section LIKE ?
            )
        ORDER BY 
            section.adviser;
    ";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error in preparing statement: " . $conn->error);
    }

    // Bind parameters
    $searchParam = "%" . $input . "%"; // Add '%' wildcard to search for values containing the input
    $stmt->bind_param("sssssssss", $schoolYear, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $mname = $row['mname'];
            $minitial = strtoupper(substr($mname, 0, 1));

            // Output table rows with retrieved data
            echo "
            <tr>
                <td>
                    " . htmlspecialchars($row['row_number']) . "
                </td>
                <td>
                    " . htmlspecialchars($row['strand'] . "-" . $row['grade_level'] . $row['section']) . "
                </td>
                <td>
                    " . htmlspecialchars($row['lname'] . $row['suffix'] . ", " . $row['fname'] . " " . $minitial) . "
                </td>
                <td>
                    " . htmlspecialchars($row['school_year']) . "
                </td>
            </tr>";
        }
    } else {
        echo "<h6 style='color:red;'>No Records Found!</h6>";
    }
}
?>