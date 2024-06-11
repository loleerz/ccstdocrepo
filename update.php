<?php
    include ('connection.php');
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $student_no = $_GET['student_no'];

    //CODE FOR UPDATING 1ST QUARTER GRADES
    if (isset($_POST['1stSem1Quarter']))
    {
        
        // Collecting the data from the input fields
        // Loop through the subjects' types and update each record in the respective tables
        $subject_types = ['core', 'applied', 'specialized', 'other'];

        // Loop through each subject type and update the respective tables
        foreach ($subject_types as $subject_type) {
            if (isset($_POST['marks'][$subject_type])) {
                $marks = $_POST['marks'][$subject_type];
                print_r($marks);

                foreach ($marks as $subject_sem => $mark) {
                    // Extract subject_name and sem from the key $subject_sem
                    list($subject_name, $sem) = explode('__', $subject_sem);

                    if($mark == 0)
                    {
                        $mark = "INC";
                    }

                    $status = "Graded";

                    // Prepare the SQL query to update the data for the respective table
                    $sql = "UPDATE {$subject_type}_sub_grades SET 1st = ?, status1 = ? WHERE subject_name = ? AND sem = ? AND student_no = ?";

                    // Using prepared statements for security
                    if ($stmt = $conn->prepare($sql)) {
                        $stmt->bind_param("sssss", $mark, $status, $subject_name, $sem, $student_no);

                        // Execute the statement
                        if ($stmt->execute()) {
                            // echo "Marks updated successfully for $subject_type subject $subject_name in semester $sem.<br>";
                        } else {
                            echo "Error updating $subject_type marks: " . $stmt->error . "<br>";
                        }

                        $stmt->close();
                    } else {
                        echo "Error preparing $subject_type update: " . $conn->error . "<br>";
                    }
                }
            }
        }
        
        header('Location: teacherStudInfo.php?student_no='.$student_no.'');

        // Close the database connection
        $conn->close();
    }

    //CODE FOR UPDATING 2ND QUARTER GRADES
    $total_g = 0;
    $total_subs = 0;
    if (isset($_POST['1stSem2Quarter']))
    {
        
        // Collecting the data from the input fields
        // Loop through the subjects' types and update each record in the respective tables
        $subject_types = ['core', 'applied', 'specialized', 'other'];

        // Loop through each subject type and update the respective tables
        foreach ($subject_types as $subject_type) {
            if (isset($_POST['marks'][$subject_type])) {
                $marks = $_POST['marks'][$subject_type];
                // echo "<script>
                //         console.log($marks)
                // </script>";

                foreach ($marks as $subject_sem => $mark) {
                    // Extract subject_name and sem from the key $subject_sem
                    list($subject_name, $sem) = explode('__', $subject_sem);
                    
                    if($mark == 0 )
                    {
                        $mark = "INC";
                    }

                    // Prepare the SQL query to update the data for the respective table
                    $sql = "UPDATE {$subject_type}_sub_grades SET 2nd = ? WHERE subject_name = ? AND sem = ? AND student_no = ?";

                    // Using prepared statements for security
                    if ($stmt = $conn->prepare($sql)) {
                        $stmt->bind_param("ssss", $mark, $subject_name, $sem, $student_no);

                        // Execute the statement
                        if ($stmt->execute()) {
                            $stmt->close();

                            //CODE FOR COMPUTING GRADES
                            $query= "SELECT * FROM {$subject_type}_sub_grades WHERE student_no = ?";
                            $stmt2 = $conn->prepare($query);
                            $stmt2->bind_param("s", $student_no);
                            $stmt2->execute();
                            $result = $stmt2->get_result();
                            if($result->num_rows > 0)
                            {
                                $row = $result->fetch_assoc();

                                $fqmark = $row['1st'];

                                if($fqmark == "INC" || $mark == "INC")
                                {
                                    $fqmark = 0;
                                    $mark = 0;
                                }

                                //COMPUTE FINAL GRADE
                                $final = ($fqmark + $mark)/2;
                                $finalg = number_format($final);

                                $total_g += $finalg;
                                $total_subs ++;

                                if ($finalg > 74)
                                {
                                    $remarks = "PASSED";
                                    $status = "Graded";
                                }
                                else if ($finalg == 0)
                                {
                                    $finalg = "INC";
                                    $remarks = "FAILED";
                                    $status = "Graded";
                                }
                                else
                                {
                                    $remarks = "FAILED";
                                    $status = "Graded";
                                }

                                $query2 = "UPDATE {$subject_type}_sub_grades SET final = ?, remarks = ?, status = ?  WHERE subject_name = ? AND sem = ? AND student_no = ?";
                                $stmt3 = $conn->prepare($query2);
                                $stmt3->bind_param("ssssss", $finalg, $remarks, $status, $subject_name, $sem, $student_no);

                                // Execute the statement
                                if ($stmt3->execute()) {
                                    $stmt3->close(); // Close the third statement object
                                } else {
                                    echo "Error updating $subject_type final grade and remarks: " . $stmt3->error . "<br>";
                                }



                            }
                            else
                            {
                                echo "Student Does Not Exist!";
                            }

                            $stmt2->close(); // Close the second statement object

                        } else {
                            echo "Error updating $subject_type marks: " . $stmt->error . "<br>";
                        }

                    } else {
                        echo "Error preparing $subject_type update: " . $conn->error . "<br>";
                    }
                }
            }
        }

        $ave = $total_g/$total_subs; 
        $gen_ave = number_format($ave);

        if ($gen_ave > 74)
        {
            $ave_remarks = "PASSED";
        }
        else
        {
            $ave_remarks = "FAILED";
        }

        $query = "UPDATE gen_aves SET g11_1stSem = ?, g11_1remarks = ? WHERE student_no = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $gen_ave, $ave_remarks, $student_no);
        $stmt->execute();

        
        header('Location: teacherStudInfo.php?student_no='.$student_no.'');

        // Close the database connection
        $conn->close();
    }

?>