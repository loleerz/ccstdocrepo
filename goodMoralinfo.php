<?php
    include ('connection.php');
    
    if(isset($_GET['student_no']))
    {
        $student_no = $_GET['student_no'];
      
        $sql = "SELECT * FROM student_info WHERE student_no = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $student_no);
        $stmt->execute();
        $result = $stmt->get_result();
        $studentRow = $result->fetch_assoc();

        $mname = $studentRow['Mname'];
        if($mname == "")
        {
            $mname = "";
            $minitial = "";
        }
        else
        {
            $minitial = strtoupper(substr($mname, 0, 1)).".";
        }
        $suffix = $studentRow['Suffix'];
        if($suffix == "")
        {
            $suffix = "";
        }

        if($studentRow['Gender'] == "Male")
        {
            $sex = "He";
        }
        else
        {
            $sex = "She";
        }

        //TODAY'S DATE
        $currentDayNumber = date('d');
        $currentMonth = date('F');
        $currentYear = date('Y');
        
        //DAY SUBSCRIPT
        function getDayWithSuffix($dayNumber) 
        {
            // Last two digits of the day number
            $lastTwoDigits = substr($dayNumber, -2);
        
            // Determine the suffix based on the last two digits
            if ($lastTwoDigits == '11' || $lastTwoDigits == '12' || $lastTwoDigits == '13') 
            {
                $suffix = 'th';
            } 
            else 
            {
                $lastDigit = substr($dayNumber, -1); // Get the last digit
        
                switch ($lastDigit) {
                    case '1':
                        $suffix = 'st';
                        break;
                    case '2':
                        $suffix = 'nd';
                        break;
                    case '3':
                        $suffix = 'rd';
                        break;
                    default:
                        $suffix = 'th';
                        break;
                }
            }
        
            return $dayNumber . "<span class='s4'>".$suffix."</span>";
        }
        $dayWithSuffixHTML = getDayWithSuffix($currentDayNumber);

        $studentName = $studentRow['Fname']." ".$minitial." ".$studentRow['Lname']." ".$suffix;

        // Function to pad the text
        function pad_text($inputText, $maxLength) 
        {
            $inputLength = strlen($inputText);
            $padding = $maxLength - $inputLength;
            return '&nbsp;' . $inputText . str_repeat('&nbsp;', $padding - 1);
        }

        function format_birthday($birthday) 
        {
            return date('m/d/Y', strtotime($birthday));
        }

        function pad_text_mid($inputText, $maxLength) 
        {
            $inputLength = strlen($inputText);
            $padding = $maxLength - $inputLength;
            
            // Calculate how many non-breaking spaces are needed
            $leftPadding = floor($padding / 2);
            $rightPadding = ceil($padding / 2);
            
            // Construct padded text with non-breaking spaces
            $paddedText = str_repeat('&nbsp;', $leftPadding) . $inputText . str_repeat('&nbsp;', $rightPadding);
            
            return $paddedText;
        }

    ?>
<!DOCTYPE  html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><title>Certificate-of-Good-Moral</title><meta name="author" content="Windows User"/><style type="text/css"> * {margin:0; padding:0; text-indent:0; }
 h2 { color: #001F5F; font-family:Tahoma, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 16pt; }
 .s1 { color: #001F5F; font-family:Tahoma, sans-serif; font-style: italic; font-weight: normal; text-decoration: none; font-size: 10.5pt; }
 .s2 { color: #001F5F; font-family:Tahoma, sans-serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 10pt; }
 h4 { color: #001F5F; font-family:Tahoma, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 10pt; }
 h1 { color: black; font-family:Verdana, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 20pt; }
 .s3 { color: black; font-family:Arial, sans-serif; font-style: italic; font-weight: normal; text-decoration: none; font-size: 14pt; }
 p { color: black; font-family:Arial, sans-serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 12pt; margin:0pt; }
 h3 { color: black; font-family:Arial, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 12pt; }
 .s4 { color: black; font-family:Arial, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 8pt; vertical-align: 4pt; }
 .s5 { color: black; font-family:Arial, sans-serif; font-style: italic; font-weight: normal; text-decoration: none; font-size: 12pt; }
 .s6 { color: black; font-family:Tahoma, sans-serif; font-style: italic; font-weight: normal; text-decoration: none; font-size: 9.5pt; }
</style>
    </head>
<body>
    <table>
        <tr>
            <td>
            <p style="text-indent: 0pt;text-align: left;">
                <span>
                    <img width="90" height="95" alt="image" src="a/logo-re.png"/>
                </span>
            </p>
            </td>
            <td>
                <h2 style="padding-left: 5pt;text-indent: 0pt;line-height: 19pt;text-align: left;">
                    Clark College of Science and Technology
                </h2>
                <p class="s1" style="padding-left: 5pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                    Formerly: Clark International College of Science and Technology
                </p>
                <p class="s2" style="padding-left: 5pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                    SNS Bldg., Aurea St., Samsonville Subdivision, Dau, Mabalacat City, Pampanga. Tel. 624 – 0215
                </p>
                <h4 style="padding-left: 5pt;text-indent: 0pt;text-align: left;">
                    Office of the Registrar
                </h4>
            </td>
        </tr>
    </table>
    
    <div class="blue-line" style="height: 3pt; background-color: #001F5F;"></div>
    <br>
    <h1 style="padding-left: 4pt;text-indent: 0pt;text-align: center;">
        C E R T I F I C A T I O N
    </h1>
    <p class="s3" style="padding-top: 15pt;padding-left: 4pt;text-indent: 0pt;text-align: center;">
        Good Moral Character
    </p>
    <p style="text-indent: 0pt;text-align: left;">
        <br/>
    </p>
        <p style="padding-left: 50pt; padding-right: 50pt; text-indent: 35pt;line-height: 150%;text-align: justify;">
        This is to certify <b>
        <?=$studentName?> </b>
        was a student under the <b>
        Senior High School Department, </b>
        has never been charged of any derogatory or misbehavior in and out of the school during his stay in this institution. <?=$sex?> is declared with a <b>
        Good Moral Character.</b>
        </p>
    <p style="text-indent: 0pt;text-align: left;">
        <br/>
    </p>
         <p style="padding-left: 50pt; padding-right: 50pt;text-indent: 35pt;line-height: 150%;text-align: justify;">
        Issued this <b>
        <?=$dayWithSuffixHTML?></b>
        day of <b>
        <?=$currentMonth?> <?=$currentYear?> </b>
        upon the request of the name above for any legal purpose(s) that may serve him/her.
            </p>
    <p style="padding-top: 7pt;text-indent: 0pt;text-align: left;">
        <br/>
    </p>
    <!-- <p style="text-indent: 0pt;text-align: left;">
         <span>
            <img width="141" height="88" alt="Josefina Crisanta V" id="jpsign" title="Josefina Crisanta V" src="a/e_signs/e_sign(jPontillas).png">
            <style>
                #jpsign{
                    position: absolute;
                    top: 290pt;
                    left: 120pt;
                }
            </style>
        </span>
    </p> -->
    <p class="s5" style="padding-left: 50pt; padding-right: 50pt;text-indent: 0pt;text-align: left;">
        Issued by:
    </p>
    <p style="text-indent: 0pt;text-align: left;">
        <br/> <br>
         </p>
    <h3 style="padding-left: 50pt; padding-right: 50pt;text-indent: 0pt;text-align: left;">
        Ms. JOSEFINA CRISANTA V. PONTILLAS
    </h3>
    <p class="s5" style="padding-left: 50pt; padding-right: 50pt;text-indent: 0pt;text-align: left;">
        Guidance Counselor
    </p>
    <p class="s5" style="padding-left: 50pt; padding-right: 50pt;text-indent: 0pt;text-align: left;">
        Clark College of Science and Technology
    </p>
    <p style="text-indent: 0pt;text-align: left;">
        <br/> <br>
    </p>
    <!-- <p style="text-indent: 0pt;text-align: left;">
        <span>
            <img width="149" height="112" alt="Arvin Mark D" id="sirAsign" title="Arvin Mark D" src="a/e_signs/e_sign(sirArvin).png"/>
            <style>
                #sirAsign{
                    position: absolute;
                    top: 390pt;
                    left: 105pt;
                }
            </style>
          </span>
    </p> -->
    <!-- <br> -->
    <p class="s5" style="padding-left: 50pt; padding-right: 50pt;text-indent: 0pt;text-align: left;">
        Noted by:
    </p>
    <p style="padding-top: 13pt;text-indent: 0pt;text-align: left;">
        <br/>
    </p>
    <h3 style="padding-left: 50pt; padding-right: 50pt;text-indent: 0pt;text-align: left;">
        Mr. ARVIN MARK D. SERRANO
    </h3>
    <p class="s5" style="padding-left: 50pt; padding-right: 50pt;text-indent: 0pt;text-align: left;">
        School Principal
    </p>
    <p style="text-indent: 0pt;text-align: left;">
        <br/> <br> <br>
    </p>
    <p class="s6" style="padding-left: 50pt; padding-right: 50pt;text-indent: 0pt;line-height: 11pt;text-align: left;">
        Not valid without the
    </p>
    <p class="s6" style="padding-left: 50pt; padding-right: 50pt;text-indent: 0pt;line-height: 11pt;text-align: left;">
        school’s official seal
    </p>
</body>
</html>
<?php
}
 else 
 {
    echo "Error: student_no parameter is not set";
 }
 ?>
    
