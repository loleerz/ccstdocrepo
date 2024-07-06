<?php
    include ('connection.php');

    //Get value from url
    $student_no = $_GET['student_no'];

    //Delete from student_info
    $sql = "DELETE FROM student_info WHERE student_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $student_no);

    if($stmt->execute())
    {
        $stmt->close();
    }

    //Delete from core_sub_grades
    $sql = "DELETE FROM core_sub_grades WHERE student_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $student_no);

    if($stmt->execute())
    {
        $stmt->close();
    }
    //Delete from applied_sub_grades
    $sql = "DELETE FROM applied_sub_grades WHERE student_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $student_no);

    if($stmt->execute())
    {
        $stmt->close();
    }
    //Delete from specialized_sub_grades
    $sql = "DELETE FROM specialized_sub_grades WHERE student_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $student_no);

    if($stmt->execute())
    {
        $stmt->close();
    }
    //Delete from other_sub_grades
    $sql = "DELETE FROM other_sub_grades WHERE student_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $student_no);

    if($stmt->execute())
    {
        $stmt->close();
    }
    else
    {
        echo "<script>
                alert('Something went wrong!: '. $conn->connect_error');
            </script>";
    }
        header('Location: regularStudents.php?status');

?>


<?php
    include ('connection.php');

    //Get value from url
    $employeenumber = $_GET['employeenumber'];

    //Delete from teacher_info
    $sql = "DELETE FROM teachers_info WHERE employeenumber = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $employeenumber);

    if($stmt->execute())
    {
        $stmt->close();
    }
   
    //Delete from section
    $sql = "DELETE FROM section WHERE adviser = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $employeenumber);
   
    if($stmt->execute())
    {
        $stmt->close();
    }

    //Delete from subject_teachers
    $sql = "DELETE FROM subject_teachers WHERE subj_teacher = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $employeenumber);

    if($stmt->execute())
    {
        $stmt->close();
    }
    else
    {
        echo "<script>
                alert('Something went wrong!: '. $conn->connect_error');
            </script>";
    }
        header('Location: Teachers.php?status');

?>

 
 

