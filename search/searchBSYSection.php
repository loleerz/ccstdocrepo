<?php
include __DIR__ . '/../connection.php';

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// CODE FOR SEARCH
if (isset($_POST['schoolYear'])) {
    $schoolYear = $_POST['schoolYear'];

    // Prepare the SQL statement with a placeholder for the school year
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
        ORDER BY 
            section.adviser;
    ";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error in preparing statement: " . $conn->error);
    }

    // Bind parameter
    $stmt->bind_param("s", $schoolYear);

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
        echo "<tr><td colspan='5'><h6 style='color:red;'>No Records Found for Academic Year " . htmlspecialchars($schoolYear) . "!</h6></td></tr>";
    }
}
?>