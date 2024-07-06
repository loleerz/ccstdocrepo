<?php
include('connection.php');
include('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\IOFactory;

// Check if the form is submitted
if (isset($_POST['importStuds'])) 
{
    $file = $_FILES['studsExcel']['tmp_name'];
    $spreadsheet = IOFactory::load($file);

    // Get the first sheet
    $sheet = $spreadsheet->getActiveSheet();
    $numRows = $sheet->getHighestRow();
    $numSuccess = 0;

    // Loop through each row
    foreach ($sheet->getRowIterator(2) as $row) 
    {
        $data = array();
        foreach ($row->getCellIterator() as $cell) 
        {
            $value = $cell->getValue();
            $data[] = empty($value) ? "" : $value;
        }

        // Insert data into the database
        $sql1 = "INSERT INTO student_info (student_no, Lname, Fname, Mname, Suffix, LRN, birthday, age, Gender, contact_num, email, status, house_num, brgy_name, citymun_name, prov_name, shs_admission_date, HScompleter, HS_genave, JHScompleter, JHS_genave, graduation_date, school_name, school_address, PEPTpasser, PEPT_rating, ALSpasser, ALS_rating, OTHERSpasser, OTHERSspecify, date_examination, address_learning_center, school_year, grade_level, track, strand, section) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql1);
        $stmt->bind_param("sssssisisissssssssisissssisisssssisss", $data[1], $data[4], $data[2], $data[3], $data[5], $data[15], $data[6], $data[7], $data[8], $data[10], $data[9], $data[22], $data[14], $data[13], $data[12], $data[11], $data[16], $data[23], $data[24], $data[25], $data[26], $data[27], $data[28], $data[29], $data[30], $data[31], $data[32], $data[33], $data[34], $data[35], $data[36], $data[37], $data[21], $data[17], $data[19], $data[20], $data[18]);
        if (!$stmt->execute()) {
            die("Execute failed: " . $stmt->error);
        }
        $stmt->close(); // Close the statement for the first insert

        // Insert guardian info
        $sql2 = "INSERT INTO guardian_info (student_employee_no, g_name, g_contact_no, g_house_num, g_brgyname, g_citymunname, g_provname) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql2);
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("ssissss", $data[1], $data[38], $data[39], $data[43], $data[42], $data[41], $data[40]);
        if ($stmt->execute()) {
            $stmt->close();
        }

        // Insert subjects into core_sub_grades
        $insert_subject = "INSERT INTO core_sub_grades (student_no, strand, grade_level, section, sem, subject_name, school_year) SELECT ?, strand, grade_level, ?, semester, subject_name, school_year FROM core_subjects WHERE strand = ?";
        $stmt = $conn->prepare($insert_subject);
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("sss", $data[1], $data[18], $data[20]);
        if (!$stmt->execute()) {
            die("Execute failed: " . $stmt->error);
        }
        $stmt->close();

        // Insert subjects into applied_sub_grades
        $insert_asubject = "INSERT INTO applied_sub_grades (student_no, strand, grade_level, section, sem, subject_name, school_year)
        SELECT ?, strand, grade_level, ?, semester, subject_name, school_year
        FROM applied_subjects
        WHERE strand = ?";
        $stmt = $conn->prepare($insert_asubject);
        if ($stmt === false) {
            die("Prepare failed for applied_sub_grades: " . $conn->error);
        }
        $stmt->bind_param("sss", $data[1], $data[18], $data[20]);
        if ($stmt->execute()) {
            $stmt->close();
        }

        // Insert subjects into specialized_sub_grades
        $insert_asubject = "INSERT INTO specialized_sub_grades (student_no, strand, grade_level, section, sem, subject_name, school_year)
        SELECT ?, strand, grade_level, ?, semester, subject_name, school_year
        FROM specialized_subjects
        WHERE strand = ?";
        $stmt = $conn->prepare($insert_asubject);
        if ($stmt === false) {
            die("Prepare failed for specialized_sub_grades: " . $conn->error);
        }
        $stmt->bind_param("sss", $data[1], $data[18], $data[20]);
        if ($stmt->execute()) {
            $stmt->close();
        }

        // Insert subjects into other_sub_grades
        $insert_asubject = "INSERT INTO other_sub_grades (student_no, strand, grade_level, section, sem, subject_name, school_year)
        SELECT ?, strand, grade_level, ?, semester, subject_name, school_year
        FROM other_subjects
        WHERE strand = ?";
        $stmt = $conn->prepare($insert_asubject);
        if ($stmt === false) {
            die("Prepare failed for other_sub_grades: " . $conn->error);
        }
        $stmt->bind_param("sss", $data[1], $data[18], $data[20]);
        if ($stmt->execute()) {
            $stmt->close();
        }

        // Insert Student to Gen_Ave Table
        $insert = "INSERT INTO gen_aves (student_no, school_year) VALUES (?, ?)";
        $stmt = $conn->prepare($insert);
        $stmt->bind_param("ss", $data[1], $data[21]);
        if ($stmt->execute()) {
            $numSuccess++;
        }
    }

    // Display a message indicating whether all data has been imported successfully
    if ($numSuccess == $numRows - 1) 
    {
        header('Location: addstudent.php?status=success');
        exit();
    } 
    else 
    {
        echo "<script>
                alert('Some data failed to import. ' . ($numRows - $numSuccess) . ' rows were skipped.');
              </script>";
    }
}
?>