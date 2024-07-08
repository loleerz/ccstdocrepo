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
            strand.* 
        FROM 
            strand 
        CROSS JOIN 
            (SELECT @row_number := 0) AS init 
        WHERE 
            strand.school_year = ? 
            AND (
                strand.strand_name LIKE ? 
                OR strand.track LIKE ? 
                OR strand.school_year LIKE ? 
            )
        ORDER BY 
            strand.track;
    ";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error in preparing statement: " . $conn->error);
    }

    // Bind parameters
    $searchParam = "%" . $input . "%"; // Add '%' wildcard to search for values containing the input
    $stmt->bind_param("ssss", $schoolYear, $searchParam, $searchParam, $searchParam);

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
            </tr>";
        }
    } else {
        echo "<h6 style='color:red;'>No Records Found!</h6>";
    }
}
?>