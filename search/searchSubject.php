<?php
include __DIR__ . '/../connection.php';

if (isset($_POST['input']) && isset($_POST['schoolYear'])) {
    $input = $_POST['input'];
    $schoolYear = $_POST['schoolYear'];

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

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error in preparing statement: " . $conn->error);
    }

    $searchParam = "%" . $input . "%"; 
    $stmt->bind_param("ssss", $schoolYear, $searchParam, $searchParam, $searchParam);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "
            <tr>
                <td>" . htmlspecialchars($row['row_number']) . "</td>
                <td>" . htmlspecialchars($row['strand_name']) . "</td>
                <td>" . htmlspecialchars($row['track']) . "</td>
                <td>" . htmlspecialchars($row['school_year']) . "</td>
                <td>
                    <a href='strandSubs.php?strand=" . htmlspecialchars($row['strand_name']) . "&sy=" . htmlspecialchars($row['school_year']) . "' class='btn btn-primary'>View</a>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='5' style='color:red;'>No Records Found!</td></tr>";
    }
}
?>