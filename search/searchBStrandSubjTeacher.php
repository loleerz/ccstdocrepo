<?php
include __DIR__ . '/../connection.php';

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// CODE FOR SEARCH
if (isset($_POST['strand']) && isset($_POST['schoolYear'])) {
    $strand = $_POST['strand'];
    $schoolYear = $_POST['schoolYear'];

    // Prepare the SQL statement with placeholders for the input
    $sql = "
        SELECT 
            (@row_number := @row_number + 1) AS row_number, 
            subject_teachers.*, 
            teachers_info.lname, 
            teachers_info.suffix, 
            teachers_info.fname, 
            teachers_info.mname 
        FROM 
            subject_teachers 
        CROSS JOIN 
            (SELECT @row_number := 0) AS init 
        LEFT JOIN 
            teachers_info 
        ON 
            subject_teachers.subj_teacher = teachers_info.employeenumber 
        WHERE 
            subject_teachers.school_year = ? 
            AND subject_teachers.strand = ?
        ORDER BY 
            subject_teachers.subj_teacher;
    ";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error in preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("ss", $schoolYear, $strand);

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
                <td>" . htmlspecialchars($row['row_number']) . "</td>
                <td>" . htmlspecialchars($row['lname'] . $row['suffix'] . ", " . $row['fname'] . " " . $minitial) . "</td>
                <td>" . htmlspecialchars($row['subject_name']) . "</td>
                <td>" . htmlspecialchars($row['strand'] . " - " . $row['grade_level'] . $row['section']) . "</td>
                <td>" . htmlspecialchars($row['semester']) . "</td>
                <td>" . htmlspecialchars($row['school_year']) . "</td>
                <td>
                    <a href='' class='btn btn-primary'>
                        Edit
                    </a>
                </td>
            </tr>";
        }
    } else {
        echo "
            <tr>
                <td colspan='7'>
                    <h6 style='color:red;'>No Records Found for the strand '" . htmlspecialchars($strand) . "' in Academic Year " . htmlspecialchars($schoolYear) . "!</h6>
                </td>
            </tr>
        ";
    }
}
?>