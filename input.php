<?php
    include ('connection.php');
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////        
    // CODE FOR ADDING STUDENT
    if (!empty($_POST['student_no'])) {
    
        // Additional variables
        $student_no = $_POST['student_no'];
        $house_num = $_POST['house_num'];
        $provname = $_POST['provname'] ?? '';
        $citymunname = $_POST['citymunname'] ?? '';
        $brgyname = $_POST['brgyname'] ?? '';
        $HScompleter = $_POST['HScompleter'] ?? '';
        $JHScompleter = $_POST['JHScompleter'] ?? '';
        $PEPTpasser = $_POST['PEPTpasser'] ?? '';
        $ALSpasser = $_POST['ALSpasser'] ?? '';
        $Otherspasser = $_POST['Otherspasser'] ?? '';
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $suffix = $_POST['suffix'] ?? '';
        $lrn = $_POST['lrn'];
        $birthday = $_POST['birthday'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $contact_no = $_POST['contact_no'];
        $email = $_POST['email'];
        $status = $_POST['status'];
        $date_shs_admission = $_POST['date_shs_admission'];
        $HSgen_ave = $_POST['HSgen_ave'];
        $JHSgen_ave = $_POST['JHSgen_ave'];
        $date_graduation = $_POST['date_graduation'];
        $name_school = $_POST['name_school'];
        $school_address = $_POST['school_address'];
        $PEPTrating = $_POST['PEPTrating'];
        $ALSrating = $_POST['ALSrating'];
        $Others_specify = $_POST['Others_specify'];
        $date_examination = $_POST['date_examination'];
        $address_learningcenter = $_POST['address_learningcenter'];
        $grade_level = $_POST['selected_gradeLevel'];
        $school_year = $_POST['school_year'];
        // $sem = $_POST['sem'];
        $track = $_POST['track'];
        $strand = $_POST['selected_strand'];
        $section = $_POST['section'];
        $g_name = $_POST['g_name'];
        $g_contact_no = $_POST['g_contact_no'];
        $g_provname = $_POST['g_provname'];
        $g_municipality = $_POST['g_citymunname'];
        $g_barangay = $_POST['g_brgyname'];
        $g_house_num = $_POST['g_house_num'];
    
        // Convert strand to full form if needed
        if ($strand == "STEM") {
            $strand = "Science, Technology, Engineering, and Mathematics";
        } 
    
        // Query to check if student already exists
        $checkstudent = "SELECT * FROM student_info WHERE student_no = ?";
        $stmt = $conn->prepare($checkstudent);
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("s", $student_no);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows == 0) {
            $stmt->close();
    
            // Insert new student
            $sql1 = "INSERT INTO student_info (student_no, Lname, Fname, Mname, Suffix, LRN, birthday, age, Gender, contact_num, email, status, house_num, brgy_name, citymun_name, prov_name, shs_admission_date, HScompleter, HS_genave, JHScompleter, JHS_genave, graduation_date, school_name, school_address, PEPTpasser, PEPT_rating, ALSpasser, ALS_rating, OTHERSpasser, OTHERSspecify, date_examination, address_learning_center, school_year, grade_level, track, strand, section) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql1);
            if ($stmt === false) {
                die("Prepare failed: " . $conn->error);
            }
            $stmt->bind_param("sssssisisissssssssisissssisisssssisss", $student_no, $lname, $fname, $mname, $suffix, $lrn, $birthday, $age, $sex, $contact_no, $email, $status, $house_num, $brgyname, $citymunname, $provname, $date_shs_admission, $HScompleter, $HSgen_ave, $JHScompleter, $JHSgen_ave, $date_graduation, $name_school, $school_address, $PEPTpasser, $PEPTrating, $ALSpasser, $ALSrating, $Otherspasser, $Others_specify, $date_examination, $address_learningcenter, $school_year, $grade_level, $track, $strand, $section);
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
            $stmt->bind_param("ssissss", $student_no, $g_name, $g_contact_no, $g_house_num, $g_barangay, $g_municipality, $g_provname);
            if ($stmt->execute()) {
                $stmt->close();
            } else {
                echo "<script>alert('Something went wrong: " . $stmt->error . "');</script>";
            }
    
            // Insert subjects into core_subs_grades
            $insert_subject = "INSERT INTO core_sub_grades (student_no, strand, grade_level, section, sem, subject_name, school_year) SELECT ?, strand, grade_level, ?, semester, subject_name, school_year FROM core_subjects WHERE strand = ?";
            
            // Prepare the statement
            $stmt = $conn->prepare($insert_subject);
            if ($stmt === false) {
                die("Prepare failed: " . $conn->error);
            }
            // Bind the parameters
            $stmt->bind_param("sss", $student_no, $section, $strand);
            // Execute the statement
            if (!$stmt->execute()) {
                die("Execute failed: " . $stmt->error);
            }
            $stmt->close(); // Close the statement for the first insert

            // Insert subjects into applied_sub_grades
            $insert_asubject = "INSERT INTO applied_sub_grades (student_no, strand, grade_level, section, sem, subject_name, school_year)
            SELECT ?, strand, grade_level, ?, semester, subject_name, school_year
            FROM applied_subjects
            WHERE strand = ?";

            // Prepare the statement
            $stmt = $conn->prepare($insert_asubject);
            if ($stmt === false) {
            die("Prepare failed for applied_sub_grades: " . $conn->error);
            } else {
            echo "<script>console.log('Prepare successful for applied_sub_grades');</script>";
            }

            // Bind the parameters
            $stmt->bind_param("sss", $student_no, $section, $strand);

            // Execute the statement
            if ($stmt->execute()) {
            echo "<script>alert('Applied subject records inserted successfully');</script>";
            $stmt->close();
            } else {
            echo "<script>alert('Something went wrong for applied_sub_grades: " . $stmt->error . "');</script>";
            }

            // Debugging: check the data in the applied_subjects table
            $check_query = "SELECT * FROM applied_subjects WHERE strand = ?";
            $check_stmt = $conn->prepare($check_query);
            $check_stmt->bind_param("s", $strand);
            $check_stmt->execute();
            $check_result = $check_stmt->get_result();

            if ($check_result->num_rows > 0) {
            echo "<script>console.log('Records found in applied_subjects matching the conditions');</script>";
            while ($row = $check_result->fetch_assoc()) {
            echo "<script>console.log('Subject: " . $row['subject_name'] . "');</script>";
            }
            } else {
            echo "Strand: ".$strand." g_level: ".$grade_level." sem: ".$sem;
            echo "<script>alert('No records found in applied_subjects matching the conditions.');</script>";
            }

            $check_stmt->close();

            // Insert subjects into specialized_sub_grades
            $insert_asubject = "INSERT INTO specialized_sub_grades (student_no, strand, grade_level, section, sem, subject_name, school_year)
            SELECT ?, strand, grade_level, ?, semester, subject_name, school_year
            FROM specialized_subjects
            WHERE strand = ?";

            // Prepare the statement
            $stmt = $conn->prepare($insert_asubject);
            if ($stmt === false) {
            die("Prepare failed for specialized_sub_grades: " . $conn->error);
            } else {
            echo "<script>console.log('Prepare successful for specialized_sub_grades');</script>";
            }

            // Bind the parameters
            $stmt->bind_param("sss", $student_no, $section, $strand);

            // Execute the statement
            if ($stmt->execute()) {
            echo "<script>alert('Specialized subject records inserted successfully');</script>";
            $stmt->close();
            } else {
            echo "<script>alert('Something went wrong for specialized_sub_grades: " . $stmt->error . "');</script>";
            }

            // Debugging: check the data in the specialized_subjects table
            $check_query = "SELECT * FROM specialized_subjects WHERE strand = ?";
            $check_stmt = $conn->prepare($check_query);
            $check_stmt->bind_param("s", $strand);
            $check_stmt->execute();
            $check_result = $check_stmt->get_result();

            if ($check_result->num_rows > 0) {
            echo "<script>console.log('Records found in specialized_subjects matching the conditions');</script>";
            while ($row = $check_result->fetch_assoc()) {
            echo "<script>console.log('Subject: " . $row['subject_name'] . "');</script>";
            }
            } else {
            echo "Strand: ".$strand." g_level: ".$grade_level." sem: ".$sem;
            echo "<script>alert('No records found in specialized_subjects matching the conditions.');</script>";
            }

            $check_stmt->close();

            // Insert subjects into other_sub_grades
            $insert_asubject = "INSERT INTO other_sub_grades (student_no, strand, grade_level, section, sem, subject_name, school_year)
            SELECT ?, strand, grade_level, ?, semester, subject_name, school_year
            FROM other_subjects
            WHERE strand = ?";

            // Prepare the statement
            $stmt = $conn->prepare($insert_asubject);
            if ($stmt === false) {
            die("Prepare failed for other_sub_grades: " . $conn->error);
            } else {
            echo "<script>console.log('Prepare successful for other_sub_grades');</script>";
            }

            // Bind the parameters
            $stmt->bind_param("sss", $student_no, $section, $strand);

            // Execute the statement
            if ($stmt->execute()) {
            echo "<script>alert('Other subject records inserted successfully');</script>";
            $stmt->close();
            } else {
            echo "<script>alert('Something went wrong for other_sub_grades: " . $stmt->error . "');</script>";
            }

            // Debugging: check the data in the other_subjects table
            $check_query = "SELECT * FROM other_subjects WHERE strand = ?";
            $check_stmt = $conn->prepare($check_query);
            $check_stmt->bind_param("s", $strand);
            $check_stmt->execute();
            $check_result = $check_stmt->get_result();

            if ($check_result->num_rows > 0) {
            echo "<script>console.log('Records found in other_subjects matching the conditions');</script>";
            while ($row = $check_result->fetch_assoc()) {
            echo "<script>console.log('Subject: " . $row['subject_name'] . "');</script>";
            }
            } else {
            echo "Strand: ".$strand." g_level: ".$grade_level." sem: ".$sem;
            echo "<script>alert('No records found in other_subjects matching the conditions.');</script>";
            }

            $check_stmt->close();

            // Insert Student to Gen_Ave Table
            $insert = "INSERT INTO gen_aves (student_no, school_year) VALUES (?, ?)";
            $stmt = $conn->prepare($insert);
            $stmt->bind_param("ss", $student_no, $school_year);
            if ($stmt->execute()) {
                echo "Records inserted successfully";
                header('Location: addstudent.php?status=success');
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
            // Close the statement and connection
            $stmt->close();

            // header('Location: addstudent.php?status=success');

            $conn->close();
        } else {
            echo "<script>alert('Student number already exists!');</script>";
        }
        $stmt->close(); // Ensure the statement is closed if student already exists
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // CODE FOR ADDING TEACHER
    elseif (!empty($_POST['employee_no'])) 
    {
        $employee_no = $_POST['employee_no'];

        // Address
        $house_num = $_POST['house_num'];
        $provname = $_POST['provname'] ?? '';
        $citymunname = $_POST['citymunname'] ?? '';
        $brgyname = $_POST['brgyname'] ?? '';
        $school_year = $_POST['school_year'];


        // Checkboxes

        // Declaration of variables
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $suffix = $_POST['suffix'] ?? '';
        $tname = $lname . " " . $suffix . ", " . $fname . " " . $mname;
        $birthday = $_POST['birthday'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $contact_no = $_POST['contact_no'];
        $email = $_POST['email'];

        // Guardian Info
        $g_name = $_POST['g_name'];
        $g_contact_no = $_POST['g_contact_no'];
        $g_provname = $_POST['g_provname'];
        $g_municipality = $_POST['g_citymunname'];
        $g_barangay = $_POST['g_brgyname'];
        $g_house_num = $_POST['g_house_num'];

        // Query to check if teacher already exists
        $checkteacher = "SELECT * FROM teachers_info WHERE employeenumber = ?";
        $stmt = $conn->prepare($checkteacher);
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("s", $employee_no);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            $stmt->close();
            // Insert new teacher
            $sql1 = "INSERT INTO teachers_info (employeenumber, lname, fname, mname, suffix, bdate, age, sex, contactnumber, email, street, barangay, city, province, school_year) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql1);
            if ($stmt === false) {
                die("Prepare failed: " . $conn->error);
            }

            $stmt->bind_param("ssssssisissssss", 
                $employee_no, $lname, $fname, $mname, $suffix, $birthday, $age, $sex, $contact_no, $email, $house_num, $brgyname, $citymunname, $provname, $school_year);
            if (!$stmt->execute()) {
                die("Execute failed: " . $stmt->error);
            }
            $stmt->close();

            // Code for adding advisories
            if (isset($_POST['advisories'])) {

                foreach ($_POST['advisories'] as $advisory) {
                    // Debugging statement to check advisory value
                    echo "Processing advisory: $advisory<br>";

                    $pattern = '/^([A-Za-z]+)(\d{2})-(\w)$/';
                    if (preg_match($pattern, $advisory, $matches)) {
                        $strand = $matches[1];
                        $gradeLevel = $matches[2];
                        $section = $matches[3];

                        // Debugging statement to check parsed values
                        echo "Strand: $strand, Grade Level: $gradeLevel, Section: $section<br>";

                        $sql3 = "INSERT INTO section (strand, grade_level, section, adviser) VALUES (?, ?, ?, ?)";
                        $stmt = $conn->prepare($sql3);
                        if ($stmt === false) {
                            die("Prepare failed: " . $conn->error);
                        }

                        $stmt->bind_param("siss", $strand, $gradeLevel, $section, $tname);
                        if (!$stmt->execute()) {
                            die("Execute failed: " . $stmt->error);
                        }

                        // Debugging statement to confirm successful insert
                        echo "<script>alert('Advisory $advisory inserted successfully<br>');</script>";

                        $stmt->close();
                    } else {
                        echo "The input string format is incorrect<br>";
                    }
                }
            } 
            else {
                echo "No subjects selected<br>";
            }

            // Code for inserting guardian info
            $sql2 = "INSERT INTO guardian_info (student_employee_no, name, g_name, g_contact_no, g_house_num, g_brgyname, g_citymunname, g_provname)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql2);
            if ($stmt === false) {
                die("Prepare failed: " . $conn->error);
            }
            $stmt->bind_param("sssissss", $employee_no, $tname, $g_name, $g_contact_no, $g_house_num, $g_barangay, $g_municipality, $g_provname);
            if ($stmt->execute()) {
                $stmt->close();
                header('Location: addteacher.php?status=success');
                exit();
            } else {
                echo "<script>alert('Something went wrong: " . $stmt->error . "');</script>";
            }
        } else {
            echo "<script>alert('Employee number already exists!');</script>";
        }
        $stmt->close();
    }
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //CODE FOR ADDING SUBJECT
    if(isset($_POST['addsubject'])) {
        $subjectname = $_POST['subjectname'];
        $grade_level = $_POST['grade_level'];
        $category = $_POST['category'];
        $semester = $_POST['term'];
        $school_year = $_POST['school_year'];
    
        if(isset($_POST['strands'])) 
        {
            // Loop through each selected strand
            foreach($_POST['strands'] as $strand) {
                // Check if the subject already exists for the specified grade level, semester, and strand
                $check_query = "SELECT * FROM ".$category."_subjects WHERE subject_name = ? AND grade_level = ? AND strand = ? AND semester = ? AND school_year = ?";
                $stmt_check = $conn->prepare($check_query);
                $stmt_check->bind_param("sisss", $subjectname, $grade_level, $strand, $semester, $school_year);
                $stmt_check->execute();
                $result = $stmt_check->get_result();
    
                if($result->num_rows > 0) 
                {
                    echo "
                        <script>
                            alert('Subject already exists for grade level ".$grade_level.", semester ".$semester.", and strand ".$strand." for Academic Year".$school_year.".');
                        </script>
                            ";
                } 
                else 
                {
                    // Prepare the SQL statement for insertion
                    $insert_query = "INSERT INTO ".$category."_subjects (subject_name, grade_level, strand, semester, school_year) VALUES (?, ?, ?, ?, ?)";
                    $stmt_insert = $conn->prepare($insert_query);
                    
                    // Bind parameters and execute the statement
                    $stmt_insert->bind_param("sisss", $subjectname, $grade_level, $strand, $semester, $school_year);
                    
                    if($stmt_insert->execute()) {
                        header('Location: Subject.php?added');
                    } else {
                        echo "Error: " . $stmt_insert->error;
                    }
    
                    // Close the statement
                    $stmt_insert->close();
                }
    
                // Close the statement for checking existing subjects
                $stmt_check->close();
            }
        } 
        else 
        {
            echo "No subject selected.";
        }
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //CODE FOR ADDING SUBJECT TEACHER
    if(isset($_POST['addsubj_teacher']))
    {
        $subj_teacher = $_POST['subj_teacher'];
        $subject = $_POST['subject'];
        $grade_level = $_POST['selected_grade_level'];
        $term = $_POST['selected_term'];
        $category = $_POST['selected_category'];
        $school_year = $_POST['school_year'];

        // Code for adding sections
        if (isset($_POST['sections'])) {

            foreach ($_POST['sections'] as $section) {
                // Debugging statement to check section value
                echo "Processing section: $section<br>";

                $pattern = '/^([A-Za-z, ]+)(\d{2})-(\w)$/';
                if (preg_match($pattern, $section, $matches)) 
                {
                    $strand = $matches[1];
                    $grade_level = $matches[2];
                    $section = $matches[3];

                    // Debugging statement to check parsed values
                    echo "Strand: $strand, Grade Level: $grade_level, Section: $section<br>";

                    $check_query = "SELECT * FROM subject_teachers WHERE subject_name = ? AND subj_teacher = ? AND strand = ? AND grade_level = ? AND section = ? AND semester = ? AND school_year = ?";
                    $stmt_check = $conn->prepare($check_query);
                    $stmt_check->bind_param("sssisss", $subjectname, $subj_teacher, $strand, $grade_level, $section, $semester, $school_year);
                    $stmt_check->execute();
                    $result = $stmt_check->get_result();
        
                    if($result->num_rows == 0)
                    {
                        $sql3 = "INSERT INTO subject_teachers (subj_teacher, subject_name, section, grade_level, strand, semester, school_year) VALUES (?, ?, ?, ?, ?, ?, ?)";
                        $stmt = $conn->prepare($sql3);
                        if ($stmt === false) 
                        {
                            die("Prepare failed: " . $conn->error);
                        }

                        $stmt->bind_param("sssisss", $subj_teacher, $subject, $section, $grade_level, $strand, $term, $school_year);
                        if (!$stmt->execute()) 
                        {
                            die("Execute failed: " . $stmt->error);
                        }

                        // Debugging statement to confirm successful insert
                        header('Location: subjectTeacher.php?added');

                        $stmt->close();
                    } 
                    else 
                    {
                        header('Location: subjectTeacher.php?existing');
                    }
                } 

                    
            }
        } 
        else {
            echo "No subjects selected<br>";
        }
    }

 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //CODE FOR ADDING SECTION
    if(isset($_POST['addsection'])) {
        $section = $_POST['sectionname'];
        $grade_level = $_POST['grade_level'];
        $strand = $_POST['strand'];
        $tname = $_POST['adviser'];
        $school_year = $_POST['school_year'];

        $check_query = "SELECT * FROM section WHERE strand = ? AND grade_level = ? AND section = ? and school_year = ?";
        $stmt = $conn->prepare($check_query);
        $stmt->bind_param("siss", $strand, $grade_level, $section, $school_year);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if($result->num_rows == 0) 
        {
            $sql3 = "INSERT INTO section (strand, grade_level, section, adviser, school_year) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql3);
            if ($stmt === false) {
                die("Prepare failed: " . $conn->error);
            }

            $stmt->bind_param("sisss", $strand, $grade_level, $section, $tname, $school_year);
            if (!$stmt->execute()) {
                die("Execute failed: " . $stmt->error);
            }

            // Debugging statement to confirm successful insert
            header('Location: Section.php?added');

            $stmt->close();
        } 
        else 
        {
            header('Location: Section.php?existing');
        }
    }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
    //CODE FOR ADDING STRAND
    if(isset($_POST['addstrand']))
    {
        $strandname = $_POST['strandname'];
        $school_year = $_POST['school_year'];
        $track = $_POST['track'];
        $c111grade_level = $_POST['c111grade_level'];
        $c111semester = $_POST['c111semester'];
        $c111subjects = $_POST['c111subjects'] ?? '';
        $c112grade_level = $_POST['c112grade_level'];
        $c112semester = $_POST['c112semester'];
        $c112subjects = $_POST['c112subjects'] ?? '';

        // GETTING STRAND ABBRE
        $words = str_word_count($strandname, 1);
        $firstLetters = array();

        foreach ($words as $word) {
            if (ctype_upper($word[0])) {
                $firstLetters[] = $word[0];
            }
        }
        $abbreString = implode("", $firstLetters);

        $checkStrand = "SELECT * FROM strand WHERE strand_name = ? AND school_year = ?";
        $stmt_check = $conn->prepare($checkStrand);
        $stmt_check->bind_param("ss", $strandname, $school_year);
        $stmt_check->execute();
        $result = $stmt_check->get_result();
    
            if($result->num_rows > 0)
            {
                $stmt_check->close();
                header('Location: Strand.php?existing');
            }
            else
            {
                $stmt_check->close();

                //INSERT STRAND
                $insert_sql = "INSERT INTO strand (strand_name, abbreviation, track, school_year) VALUES (?, ?, ?, ?)" ;
                $stmt_insert = $conn->prepare($insert_sql);
                $stmt_insert->bind_param("ssss", $strandname, $abbreString, $track, $school_year);

                if($stmt_insert->execute()) {
                    header('Location: Strand.php?added=1');
                    $stmt_check->close();
                } else {
                    echo "Error: " . $stmt_insert->error;
                }

                // Close the statement
                $stmt_insert->close();
            }

        //CORE - G11 - 1ST SEMESTER
        if(isset($_POST['c111subjects'])) 
        {
            // Loop through each selected subjects
            foreach($_POST['c111subjects'] as $c111subject) {
                // Check if the strand already exists for the specified grade level, semester, and subjects
                $check_query = "SELECT * FROM core_subjects WHERE subject_name = ? AND grade_level = ? AND strand = ? AND semester = ?";
                $stmt_check = $conn->prepare($check_query);
                $stmt_check->bind_param("siss", $c111subject, $c111grade_level, $strandname, $c111semester);
                $stmt_check->execute();
                $result = $stmt_check->get_result();
    
                if($result->num_rows > 0) {
                    echo "
                        <script>
                            alert('Strand already exists for grade level ".$c111grade_level.", semester ".$c111semester.", and subject ".$c111subject.".');
                        </script>
                            ";
                } else {
                    // Prepare the SQL statement for insertion
                    $insert_query = "INSERT INTO core_subjects (subject_name, grade_level, strand, semester) VALUES (?, ?, ?, ?)";
                    $stmt_insert = $conn->prepare($insert_query);
                    
                    // Bind parameters and execute the statement
                    $stmt_insert->bind_param("siss", $c111subject, $c111grade_level, $strandname, $c111semester);
                    
                    if($stmt_insert->execute()) {
                        echo "
                        <script>
                            alert('Subject added successfully!');
                        </script>
                        ";
                    } else {
                        echo "Error: " . $stmt_insert->error;
                    }
    
                    // Close the statement
                    $stmt_insert->close();
                }
    
                // Close the statement for checking existing subjects
                $stmt_check->close();
            }
        } 
        else 
        {
            echo "No strands selected.";
        }

        //CORE - G11 - 2ND SEMESTER
        if(isset($_POST['c112subjects'])) 
        {
            // Loop through each selected subjects
            foreach($_POST['c112subjects'] as $c112subject) {
                // Check if the strand already exists for the specified grade level, semester, and subjects
                $check_query = "SELECT * FROM core_subjects WHERE subject_name = ? AND grade_level = ? AND strand = ? AND semester = ?";
                $stmt_check = $conn->prepare($check_query);
                $stmt_check->bind_param("siss", $c112subject, $c112grade_level, $strandname, $c112semester);
                $stmt_check->execute();
                $result = $stmt_check->get_result();
    
                if($result->num_rows > 0) {
                    echo "
                        <script>
                            alert('Strand already exists for grade level ".$c112grade_level.", semester ".$c112semester.", and subject ".$c112subject.".');
                        </script>
                            ";
                } else {
                    // Prepare the SQL statement for insertion
                    $insert_query = "INSERT INTO core_subjects (subject_name, grade_level, strand, semester) VALUES (?, ?, ?, ?)";
                    $stmt_insert = $conn->prepare($insert_query);
                    
                    // Bind parameters and execute the statement
                    $stmt_insert->bind_param("siss", $c112subject, $c112grade_level, $strandname, $c112semester);
                    
                    if($stmt_insert->execute()) {
                        echo "
                        <script>
                            alert('Subject added successfully!');
                        </script>
                        ";
                    } else {
                        echo "Error: " . $stmt_insert->error;
                    }
    
                    // Close the statement
                    $stmt_insert->close();
                }
    
                // Close the statement for checking existing subjects
                $stmt_check->close();
            }
        } 
        else 
        {
            echo "No strands selected.";
        }
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //CODE FOR GRADES REVISIONS
    if (isset($_POST['reviseG'])) 
    {
        $today = date("Y-m-d");
        $rstudent_no = $_POST['rstudent_no'];
        $grade_level = $_POST['grade_levelH'];
        $quarter = $_POST['quarter'];
        $semester = $_POST['semester'];
        $subject_name = $_POST['subject_name'];
        $subject_category = $_POST['subject_category'];
        $school_year = $_POST['school_yearH'];
        $initialGrade = $_POST['initialGradeH'];
        $revisedGrade = $_POST['reviseGrades'];
        $subjTeacher = $_POST['subj_teacherH'];
        $reason = $_POST['reason'];
        $status = $_POST['status'];
        $uploadOk = 1;

        echo $rstudent_no."<br>"; 
        echo $grade_level."<br>";
        echo $semester."<br>";
        echo "Initial Grade: ".$initialGrade."<br>";
        echo $revisedGrade."<br>";
        echo $school_year."<br>";
        echo $reason."<br>";
        echo $subjTeacher;
    
        // File upload
        $target_dir = "proofs/";
        $target_file = $target_dir . basename($_FILES["proof"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
        // Check if file is an image
        $check = getimagesize($_FILES["proof"]["tmp_name"]);
        if ($check === false) 
        {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    
        // Check file size
        if ($_FILES["proof"]["size"] > 3000000) 
        { // 3MB limit
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
    
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
        {
            echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
            $uploadOk = 0;
        }
    
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) 
        {
            echo "Sorry, your file was not uploaded.";
        } 
        else 
        {
            if (move_uploaded_file($_FILES["proof"]["tmp_name"], $target_file)) 
            {
                echo "The file ". htmlspecialchars(basename($_FILES["proof"]["name"])) . " has been uploaded.";
    
                // Insert data into the database
                $stmt = $conn->prepare("INSERT INTO grade_revision (student_no, grade_level, quarter, sem, subject_name, subject_category, initial_grade, revised_grade, date_revision, subject_teacher, reason, proof, school_year, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sisssssissssss", $rstudent_no, $grade_level, $quarter, $semester, $subject_name, $subject_category, $initialGrade, $revisedGrade, $today, $subjTeacher, $reason, $target_file, $school_year, $status);
    
                if ($stmt->execute()) 
                {
                    header('Location: teacherStudInfo.php?student_no='.$rstudent_no.'&revisionreq_sub');
                } 
                else 
                {
                    echo "Error: " . $stmt->error;
                }
    
                $stmt->close();
            } 
            else 
            {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 //CODE FOR GRADE REVISION APPROVAL OR REJECTION
 if(isset($_POST['approve']))
 {
    $today = date("Y-m-d");
    $rstudent_no = $_POST['rstudent_no'];
    $grade_level = $_POST['grade_levelH'];
    $quarter = $_POST['quarterH'];
    $semester = $_POST['semesterH'];
    $subject_name = $_POST['subject_nameH'];
    $subject_category = $_POST['subject_category'];
    $school_year = $_POST['school_yearH'];
    $initialGrade = $_POST['initialGradeH'];
    $revisedGrade = $_POST['revisedGradeH'];
    $subjTeacher = $_POST['subjTeacherH'];
    $reason = $_POST['reasonH'];
    $status = "Approved";

    $query = "UPDATE ".$subject_category."_sub_grades SET $quarter = ? WHERE student_no = ? AND subject_name = ? AND sem = ? AND school_year = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssss", $revisedGrade, $rstudent_no, $subject_name, $semester, $school_year);
    
    if($stmt->execute())
    {
        $stmt->close();

        //CODE FOR UPDATING FINAL GRADES
        $query = "SELECT * FROM ".$subject_category."_sub_grades WHERE student_no = ? AND subject_name= ? AND grade_level = ? AND sem = ? AND school_year = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssss", $rstudent_no, $subject_name, $grade_level, $semester, $school_year);
        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $fQuarter = $row['1st'];
            $sQuarter = $row['2nd'];
            $newFinal = ($fQuarter + $sQuarter)/2;
            $nFinal = number_format($newFinal);
            $stmt->close();

            $query = "UPDATE ".$subject_category."_sub_grades SET final = ? WHERE student_no = ? AND grade_level = ? AND subject_name = ? AND sem = ? AND school_year = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssssss", $nFinal, $rstudent_no, $grade_level, $subject_name, $semester, $school_year);
            if ($stmt->execute())
            {
                $stmt->close();
            }

            $subject_types = ['core', 'applied', 'specialized', 'other'];

            $total_final_grades = 0;
            $num_subjects = 0;

            // Retrieve all final grades for the student to calculate the general average
            foreach ($subject_types as $category) 
            {
                $query4 = "SELECT final FROM ".$category."_sub_grades WHERE student_no = ? AND grade_level = ? AND sem = ? AND school_year = ?";
                $stmt = $conn->prepare($query4);
                $stmt->bind_param("ssss", $rstudent_no, $grade_level, $semester, $school_year);
                $stmt->execute();
                $result = $stmt->get_result();
                
                while ($row = $result->fetch_assoc()) 
                {
                    if($row['final'] == "INC")
                    {
                        $row['final'] = 0;
                    }

                    $total_final_grades += $row['final'];
                    $num_subjects++;
                }
                $stmt->close();
            }
            // Calculate the general average
            if ($num_subjects > 0) 
            {
                $general_average = $total_final_grades / $num_subjects;
                $gen_ave = number_format($general_average);

                if($semester == "1st Semester")
                {
                    $semester = "1stSem";
                    $rsem = "1";
                }
                elseif($semester == "2nd Semester")
                {
                    $semester = "2ndSem";
                    $rsem = "2";
                }

                if($grade_level == 11)
                {
                    $grade_level = "g".$grade_level;
                }
                elseif($grade_level == 12)
                {
                    $grade_level = "g".$grade_level;
                }

                if($gen_ave > 74)
                {
                    $remarks = "PASSED";
                }
                elseif($gen_ave < 75)
                {
                    $remarks = "FAILED";
                }

                // Update the general average in the student's record
                $query5 = "UPDATE gen_aves SET ". $grade_level."_".$semester." = ?, ". $grade_level."_".$rsem."remarks = ?  WHERE student_no = ? AND school_year = ?";
                $stmt = $conn->prepare($query5);
                $stmt->bind_param("ssss", $gen_ave, $remarks, $rstudent_no, $school_year);
                $stmt->execute();
                $stmt->close();
            }
            
        }

        $query1 = "INSERT INTO revision_history (student_no, grade_level, quarter, sem, subject_name, subject_category, initial_grade, revised_grade, date_revision, subject_teacher, reason, status, school_year) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query1);
        $stmt->bind_param("sisssssisssss", $rstudent_no, $grade_level, $quarter, $semester, $subject_name, $subject_category, $initialGrade, $revisedGrade, $today, $subjTeacher, $reason, $status, $school_year);
        if ($stmt->execute()) 
        {
            $stmt->close();
            // Fetch the image details from the database
            $sql = "SELECT * FROM grade_revision WHERE student_no = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $rstudent_no);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) 
            {
                $row = $result->fetch_assoc();

                // Delete the image file from the local folder
                if (file_exists($row['proof'])) {
                    unlink($row['proof']);
                }

                // Delete the image record from the database
                $sql = "DELETE FROM grade_revision WHERE student_no = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $rstudent_no);

                if ($stmt->execute()) 
                {
                    header('Location: gradeRevisions.php?revisionreq_app');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } 
            else 
            {
                echo "No image found with the given ID.";
            }
        } 
        else 
        {
            echo "Error: " . $stmt->error;
        }
    }
 }
 elseif(isset($_POST['reject']))
 {

 }


 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 //ADDING REVISION REASON
 if(isset($_POST['addRevisR']))
 {
    $reason = $_POST['revisonReason'];

    $check_query = "SELECT * FROM revision_reason WHERE reason = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("s", $reason);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 0)
    {
        $insert_query = "INSERT INTO revision_reason (reason) VALUES (?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("s", $reason);
        if ($stmt->execute()) 
        {
            $stmt->close();
            header('Location: gradeRevisions.php?added');
        }
    }
    else
    {
        header('Location: gradeRevisions.php?existing');
    }
 }
?>