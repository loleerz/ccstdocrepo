<?php
include __DIR__ . '/../connection.php';

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// CODE FOR SEARCH
if (isset($_POST['schoolYear'])) {
    $schoolYear = $_POST['schoolYear'];

    // Prepare the SQL statement with placeholders for the input
    $sql = "
        SELECT 
            (@row_number := @row_number + 1) AS row_number, 
            strand.* 
        FROM 
            strand 
        CROSS JOIN 
            (SELECT @row_number := 0) AS init 
        WHERE 
            strand.school_year = ? 
        ORDER BY 
            strand.track;
    ";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error in preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("s", $schoolYear);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Output table rows with retrieved data
            echo "
            <tr>
                <td>
                    " . htmlspecialchars($row['row_number']) . "
                </td>
                <td>
                    " . htmlspecialchars($row['strand_name']) . "
                </td>
                <td>
                    " . htmlspecialchars($row['track']) . "
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
        echo "<tr><td colspan='5'><h6 style='color:red;'>No Records Found for Academic Year " . htmlspecialchars($schoolYear) . "!</h6></td></tr>";
    }
}
?>