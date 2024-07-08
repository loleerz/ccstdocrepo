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
            AND (
                subject_teachers.subj_teacher LIKE ? 
                OR teachers_info.lname LIKE ? 
                OR teachers_info.fname LIKE ? 
                OR teachers_info.mname LIKE ? 
                OR subject_teachers.school_year LIKE ?
                OR subject_teachers.strand LIKE ?
                OR subject_teachers.grade_level LIKE ?
                OR subject_teachers.section LIKE ?
            )
        ORDER BY 
            subject_teachers.subj_teacher;
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
                    " . htmlspecialchars($row['lname'] . $row['suffix'] . ", " . $row['fname'] . " " . $minitial) . "
                </td>
                <td>
                    " . htmlspecialchars($row['subject_name']) . "
                </td>
                <td>
                    " . htmlspecialchars($row['strand'] . "-" . $row['grade_level'] . $row['section']) . "
                </td>
                <td>
                    " . htmlspecialchars($row['semester']) . "
                </td>
                <td>
                    " . htmlspecialchars($row['school_year']) . "
                </td>
                <td>
                    <a href='' class='btn btn-primary'>
                        Edit
                    </a>
                </td>
            </tr>";
        }
    } else {
        echo "<h6 style='color:red;'>No Records Found!</h6>";
    }
}
?>