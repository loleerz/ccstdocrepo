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
        $row = $result->fetch_assoc();

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
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
    <title>FORM137</title>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>  -->
    <!-- <link rel="stylesheet" href="form137.css"> -->
    <!-- <meta name="author" content="Sabrina Ongkiko;Yong Barba"/> -->
</head>
<body>
    <style>
        *{
            margin:0; 
            padding:0; 
            text-indent:0; 
            /* border: 1px solid red; */
        `}
        #page1{
            background-color: #fff;
        }
        header, .signatorees{
            display: flex;
            flex-flow: row;
        }
        .s1 { 
            color: black; 
            font-family:"Arial Narrow", sans-serif; 
            font-style: normal; 
            font-weight: normal; 
            text-decoration: none; 
            font-size: 9.5pt; 
            padding-left: 20pt;
            }
        .s2 { 
            color: black; 
            font-family:"Arial Narrow", sans-serif; 
            font-style: normal; 
            font-weight: bold; 
            text-decoration: none; 
            font-size: 7pt; 
            }
        .s3 { 
            color: black; 
            font-family:"Arial Narrow", sans-serif; 
            font-style: normal; 
            font-weight: bold; 
            text-decoration: none; 
            font-size: 10.5pt; 
            padding-left: 20pt;
            }
        .s4 { 
            color: black; 
            font-family:"Arial Narrow", sans-serif; 
            font-style: normal; 
            font-weight: bold; 
            text-decoration: none; 
            font-size: 7pt; 
            }
        p, label, .label { 
            color: black; 
            font-family:"Arial Narrow", sans-serif; 
            font-style: normal; 
            font-weight: normal; 
            text-decoration: none; 
            font-size: 7pt; 
            margin:0pt; 
        }
        h1, .h1 { 
            color: black; 
            font-family:"Arial Narrow", sans-serif; 
            font-style: normal; 
            font-weight: bold; 
            text-decoration: underline; 
            font-size: 7pt; 
        }
        .s6 { 
            color: black; 
            font-family:"Arial Narrow", sans-serif; 
            font-style: italic; 
            font-weight: normal; 
            text-decoration: none; 
            font-size: 5.5pt; 
        }
        .s7 { 
            color: black; 
            font-family:"Arial Narrow", sans-serif; 
            font-style: normal; 
            font-weight: bold; 
            text-decoration: none; 
            font-size: 7pt; 
        }
        .s8 { 
            color: black; 
            font-family:"Arial Narrow", sans-serif; 
            font-style: normal; 
            font-weight: normal; 
            text-decoration: none; 
            font-size: 7pt; 
        }
        table, tbody {
            vertical-align: top; 
            overflow: visible; 
        }

        .checkbox-wrapper-33 {
        --s-xsmall: 0.625em;
        --s-small: 1.2em;
        --border-width: 1px;
        --c-primary: #000000;
        --t-base: 0.4s;
        --t-fast: 0.2s;
        --e-in: ease-in;
        --e-out: cubic-bezier(0.11, 0.29, 0.18, 0.98);
        }

        .checkbox-wrapper-33 .visuallyhidden {
        border: 0;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
        }

        .checkbox-wrapper-33 .checkbox {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        color: white;
        }

        .checkbox-wrapper-33 .checkbox + .checkbox {
        margin-top: var(--s-small);
        }

        .checkbox-wrapper-33 .checkbox__symbol {
        display: inline-block;
        display: flex;
        margin-right: calc(var(--s-small) * 0.7);
        border: var(--border-width) solid var(--c-primary);
        position: relative;
        border-radius: 0em;
        width: 1.5em;
        height: 1.5em;
        transition: box-shadow var(--t-base) var(--e-out),
            background-color var(--t-base);
        /* box-shadow: 0 0 0 0 var(--c-primary-10-percent-opacity); */
        }

        .checkbox-wrapper-33 .checkbox__symbol:after {
        content: "";
        position: absolute;
        top: 0.5em;
        left: 0.5em;
        width: 0.25em;
        height: 0.25em;
        background-color: var(--c-primary-20-percent-opacity);
        opacity: 0;
        border-radius: 3em;
        transform: scale(1);
        transform-origin: 50% 50%;
        }

        .checkbox-wrapper-33 .checkbox .icon-checkbox {
        width: 1em;
        height: 1em;
        margin: auto;
        fill: none;
        stroke-width: 3;
        stroke: currentColor;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke-miterlimit: 10;
        color: var(--c-primary);
        display: inline-block;
        }

        .checkbox-wrapper-33 .checkbox .icon-checkbox path {
        transition: stroke-dashoffset var(--t-fast) var(--e-in);
        stroke-dasharray: 30px, 31px;
        stroke-dashoffset: 31px;
        }

        .checkbox-wrapper-33 .checkbox__textwrapper {
        margin: 0;
        }

        .checkbox-wrapper-33 .checkbox__trigger:checked + .checkbox__symbol:after {
        -webkit-animation: ripple-33 1.5s var(--e-out);
        animation: ripple-33 1.5s var(--e-out);
        }

        .checkbox-wrapper-33
        .checkbox__trigger:checked
        + .checkbox__symbol
        .icon-checkbox
        path {
        transition: stroke-dashoffset var(--t-base) var(--e-out);
        stroke-dashoffset: 0px;
        }

        .checkbox-wrapper-33 .checkbox__trigger:focus + .checkbox__symbol {
        box-shadow: 0 0 0 0.25em var(--c-primary-20-percent-opacity);
        }

        @-webkit-keyframes ripple-33 {
        from {
            transform: scale(0);
            opacity: 1;
        }

        to {
            opacity: 0;
            transform: scale(20);
        }
        }

        @keyframes ripple-33 {
        from {
            transform: scale(0);
            opacity: 1;
        }

        to {
            opacity: 0;
            transform: scale(20);
        }
        }
    </style>
<div id="content">
<div id="page1">
    <header>
        <p style="padding-left: 85pt;text-indent: 0pt;text-align: left;">
            <span>
                <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <img width="64" height="62" src="a/kagawaran ng eduk.png">
                        </td>
                    </tr>
                </table>
            </span>
            <span style=" color: black; font-family:&quot;Times New Roman&quot;, serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 10pt;">
                
            </span>
        </p>
        <table style="border-collapse:collapse" cellspacing="0">
            <tr style="height:12pt">
                <td style="width:300pt">
                    <p class="s1" style="padding-right: 20pt;text-indent: 0pt;line-height: 10pt;text-align: center;">
                        REPUBLIC OF THE PHILIPPINES
                    </p>
                </td>
            </tr>
            <tr style="height:16pt">
                <td style="width:300pt">
                    <p class="s1" style="padding-right: 20pt;text-indent: 0pt;text-align: center;">
                        DEPARTMENT OF EDUCATION
                    </p>
                </td>
            </tr>
            <tr style="height:17pt">
                <td style="width:300pt">
                    <p class="s3" style="padding-top: 4pt;padding-right: 20pt;text-indent: 0pt;line-height: 11pt;text-align: center;">
                        SENIOR HIGH SCHOOL STUDENT PERMANENT RECORD
                    </p>
                </td>
            </tr>
        </table>
                
        <p style="padding-top: 1pt;text-indent: 0pt;text-align: left;">
            <br/>
        </p>
        <p style="text-indent: 0pt;text-align: left;">
            <span>
                <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td style="width:126pt">
                            <p class="s2" style="padding-left: 81pt;text-indent: 0pt;text-align: left;">
                                FORM 137-SHS
                            </p>
                            <img width="112" height="62" src="a/deped.png" style="padding-left: 43pt;text-indent: 0pt;text-align: left;">
                        </td>
                    </tr>
                </table>
            </span>
        </p>
    </header>
                <p style="padding-left: 6pt;text-indent: 0pt;text-align: center;background-color: #BEBEBE;">
                    <span class="s4">
                        LEARNER'S INFORMATION                          
                    </span>
                </p>
                <p style="padding-top: 2pt;text-indent: 0pt;text-align: left;">
                    LAST NAME: 
                    <u> 
                        <?=pad_text(strtoupper($row['Lname']), 83)?>
                    </u> 
                    <span style="padding-left: 5pt;">FIRST NAME:</span> 
                    <u>
                    <?=pad_text(strtoupper($row['Fname']), 84)?>
                    </u> 
                    <span style="padding-left: 10pt;">MIDDLE NAME: </span>
                    <u>
                        <?=pad_text(strtoupper($row['Mname']), 65)?>
                    </u>
                </p>
                <p style="padding-top: 1pt;text-indent: 0pt;text-align: left;">
                    LRN: 
                    <u style="margin-right: 3pt;">
                        <?=pad_text(strtoupper($row['LRN']), 84)?> 
                    </u> 
                    Date of Birth (MM/DD/YYYY): 
                    <u style="margin-right: 3pt;"> 
                        <?=pad_text(format_birthday($row['birthday']), 35)?>
                    </u> 
                    Sex: 
                    <u style="margin-right: 3pt;"> 
                        <?=pad_text(strtoupper($row['Gender']), 31)?> 
                    </u> 
                    Date of SHS Admission (MM/DD/YYYY): 
                    <u>
                        <b> 
                            <?=pad_text(format_birthday($row['shs_admission_date']), 17)?>
                        </b>
                    </u>
                </p>
                <p style="margin-top: 6pt;padding-left: 6pt;text-indent: 0pt;text-align: center;background-color: #BEBEBE;">
                    <span class="s4" style=" background-color: #BEBEBE;">
                        ELIGIBILITY FOR SHS ENROLMENT                         
                    </span>
                </p>
                <p style="padding-top: 2pt;text-indent: 0pt;text-align: left;">
                    <span>
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="padding-top: 1pt;text-indent: 0pt;text-align: left;">
                                    <?php
                                        if($row['HScompleter'] != '')
                                        { ?>
                                            <div class="checkbox-wrapper-33">
                                                <label class="checkbox">
                                                    <input class="checkbox__trigger visuallyhidden" type="checkbox" name="HSCompleter" id="HSCompleter" checked>
                                                    <span class="checkbox__symbol">
                                                    <svg
                                                        aria-hidden="true"
                                                        class="icon-checkbox"
                                                        width="28px"
                                                        height="28px"
                                                        viewBox="0 0 28 28"
                                                        version="1"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <path d="M4 14l8 7L24 7"></path>
                                                    </svg>
                                                    </span>
                                                    <label for="HSCompleter" class="checkbox__textwrapper">High School Completer* </label>
                                                    <span style="margin-left:7pt;" class="label">Gen. Ave:</span>
                                                    <u style="color: #000000; font-weight:700;">
                                                        <?=pad_text(strtoupper($row['HS_genave']), 13)?> 
                                                    </u>
                                                </label>
                                            </div>
                                    <?php }
                                        else
                                        {?>
                                            <div class="checkbox-wrapper-33">
                                                <label class="checkbox">
                                                    <input class="checkbox__trigger visuallyhidden" type="checkbox" name="HSCompleter" id="HSCompleter">
                                                    <span class="checkbox__symbol">
                                                    <svg
                                                        aria-hidden="true"
                                                        class="icon-checkbox"
                                                        width="28px"
                                                        height="28px"
                                                        viewBox="0 0 28 28"
                                                        version="1"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <path d="M4 14l8 7L24 7"></path>
                                                    </svg>
                                                    </span>
                                                    <label for="HSCompleter" class="checkbox__textwrapper">High School Completer* </label>
                                                    <span style="margin-left:7pt;" class="label">Gen. Ave:</span>
                                                    <u style="color: #000000; font-weight:700;">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                                    </u>
                                                </label>
                                            </div>
                                  <?php }
                                    ?>
                                </td>

                                <td style="padding-left: 10pt;text-indent: 0pt;text-align: left;">
                                    <?php
                                        if($row['JHScompleter'] != '')
                                        {?>
                                            <div class="checkbox-wrapper-33">
                                                <label class="checkbox">
                                                    <input class="checkbox__trigger visuallyhidden" type="checkbox" name="JHSCompleter" id="JHSCompleter" checked>
                                                    <span class="checkbox__symbol">
                                                    <svg
                                                        aria-hidden="true"
                                                        class="icon-checkbox"
                                                        width="28px"
                                                        height="28px"
                                                        viewBox="0 0 28 28"
                                                        version="1"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <path d="M4 14l8 7L24 7"></path>
                                                    </svg>
                                                    </span>
                                                    <label for="JHSCompleter" class="checkbox__textwrapper">Junior High School Completer* </label>
                                                    <span style="margin-left:7pt;" class="label">Gen. Ave:</span>
                                                    <u style="color: #000000; font-weight:700;">
                                                        <?=pad_text(strtoupper($row['JHS_genave']), 10)?>  
                                                    </u>
                                                </label>
                                            </div>
                                  <?php }
                                        else
                                        {?>
                                            <div class="checkbox-wrapper-33">
                                                <label class="checkbox">
                                                    <input class="checkbox__trigger visuallyhidden" type="checkbox" name="JHSCompleter" id="JHSCompleter">
                                                    <span class="checkbox__symbol">
                                                    <svg
                                                        aria-hidden="true"
                                                        class="icon-checkbox"
                                                        width="28px"
                                                        height="28px"
                                                        viewBox="0 0 28 28"
                                                        version="1"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <path d="M4 14l8 7L24 7"></path>
                                                    </svg>
                                                    </span>
                                                    <label for="JHSCompleter" class="checkbox__textwrapper">Junior High School Completer* </label>
                                                    <span style="margin-left:7pt;" class="label">Gen. Ave:</span>
                                                    <u style="color: #000000; font-weight:700;">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                                    </u>
                                                </label>
                                            </div>
                                  <?php } 
                                    ?>
                                    
                                </td>
                            </tr>
                        </table>
                    </span>
                </p>
                <p style="text-indent: 0pt;text-align: left;"/>
                <p style="text-indent: 0pt;text-align: left;"/>
                <p style="text-indent: 0pt;text-align: left;">
                    Date of Graduation/Completion (MM/DD/YYYY): 
                    <u style="margin-right: 3pt;">
                        <?=pad_text(format_birthday($row['graduation_date']), 18)?>
                    </u> 
                    Name of School: 
                    <u style="margin-right: 3pt;">
                        <?=pad_text(strtoupper($row['school_name']), 75)?> 
                    </u>
                    School Address: 
                    <u>
                        <?=pad_text(strtoupper($row['school_address']), 81)?> 
                    </u>
                </p>
                <p style="text-indent: 0pt;text-align: left;"/>
                <p style="padding-top: 2pt;text-indent: 0pt;text-align: left;">
                    <span>
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="padding-top: 1pt;text-indent: 0pt;text-align: left;">
                                    <div class="checkbox-wrapper-33">
                                        <label class="checkbox">
                                            <input class="checkbox__trigger visuallyhidden" type="checkbox" name="JHSCompleter" id="PEPTPasser">
                                            <span class="checkbox__symbol">
                                            <svg
                                                aria-hidden="true"
                                                class="icon-checkbox"
                                                width="28px"
                                                height="28px"
                                                viewBox="0 0 28 28"
                                                version="1"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path d="M4 14l8 7L24 7"></path>
                                            </svg>
                                            </span>
                                            <label for="JHSCompleter" class="checkbox__textwrapper">PEPT Passer**</label>
                                            <span style="margin-left:7pt;" class="label">Rating:</span>
                                            <u style="color: #000000; font-weight:700;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                            </u>
                                        </label>
                                    </div>
                                </td>
                                <td style="padding-left: 10pt;text-indent: 0pt;text-align: left;">
                                    <div class="checkbox-wrapper-33">
                                        <label class="checkbox">
                                            <input class="checkbox__trigger visuallyhidden" type="checkbox" name="JHSCompleter" id="ALSPasser">
                                            <span class="checkbox__symbol">
                                            <svg
                                                aria-hidden="true"
                                                class="icon-checkbox"
                                                width="28px"
                                                height="28px"
                                                viewBox="0 0 28 28"
                                                version="1"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path d="M4 14l8 7L24 7"></path>
                                            </svg>
                                            </span>
                                            <label for="JHSCompleter" class="checkbox__textwrapper">ALS A&E Passer***</label>
                                            <span style="margin-left:7pt;" class="label">Rating:</span>
                                            <u style="color: #000000; font-weight:700;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                            </u>
                                        </label>
                                    </div>
                                </td>
                                <td style="padding-left: 10pt;text-indent: 0pt;text-align: left;">
                                    <div class="checkbox-wrapper-33">
                                        <label class="checkbox">
                                            <input class="checkbox__trigger visuallyhidden" type="checkbox" name="JHSCompleter" id="OtherSpecify">
                                            <span class="checkbox__symbol">
                                            <svg
                                                aria-hidden="true"
                                                class="icon-checkbox"
                                                width="28px"
                                                height="28px"
                                                viewBox="0 0 28 28"
                                                version="1"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path d="M4 14l8 7L24 7"></path>
                                            </svg>
                                            </span>
                                            <label for="JHSCompleter" class="checkbox__textwrapper">Others (Pls. Specify):</label>
                                            <u style="color: #000000; font-weight:700;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                            </u>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </span>
                </p>
                <p style="padding-top: 1pt;text-indent: 0pt;text-align: left;">
                    Date of Examination/Assessment (MM/DD/YYYY):  
                    <u>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    </u>  
                    Name and Address of Community Learning Center: 
                    <u>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </u>
                </p>
                <p class="s6" style="padding-top: 1pt;text-indent: 0pt;text-align: left;">
                    *High School Completers are students who graduated from secondary school under the old curriculum              ***ALS A&amp;E - Alternative Learning System Accreditation and Equivalency Test for JHS
                </p>
                <p class="s6" style="padding-top: 1pt;text-indent: 0pt;text-align: left;">
                    **PEPT - Philippine Educational Placement Test for JHS
                </p>
                <p style="padding-left: 6pt;text-indent: 0pt;text-align: center;background-color: #BEBEBE;">
                    <span class="s4" style=" background-color: #BEBEBE;">                                                   
                        SCHOLASTIC RECORD                         
                    </span>
                </p>
                <p class="s7" style="padding-top: 2pt;text-indent: 0pt;text-align: left;">
                    SCHOOL: 
                    <u>
                        &nbsp;CLARK COLLEGE OF SCIENCE AND TECHNOLOGY &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    </u> 
                    SCHOOL ID: 
                    <u>
                        &nbsp;401878 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </u> GRADE LEVEL: 
                    <u>
                        &nbsp;11 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    </u> 
                    SY: 
                    <u>
                        <?=pad_text(strtoupper($row['school_year']), 21)?> 
                    </u> 
                    SEM: <u>&nbsp;1ST &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
                </p>
                <p class="s7" style="padding-top: 2pt;padding-bottom: 1pt;text-indent: 0pt;text-align: left;">
                    TRACK/STRAND:
                    <u> 
                        <?=pad_text(strtoupper($row['track']."/ ".$row['strand']), 79)?>
                    </u> 
                    SECTION: 
                    <u>
                        <?=pad_text(strtoupper($row['section']), 41)?>
                    </u>
                </p>
                <table style="border-collapse:collapse;" cellspacing="0">
                    <tr style="height:13pt">
                        <td style="width:71pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt border-right-style:solid;border-right-width:1pt" rowspan="2" bgcolor="#BEBEBE">
                            <p class="s2" style="padding-left: 1pt;text-indent: 0pt;line-height: 109%;text-align: center;">
                                Indicate if Subject is CORE, APPLIED, or
                            </p>
                            <p class="s2" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                SPECIALIZED
                            </p>
                        </td>
                        <td style="width:331pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" rowspan="2" bgcolor="#BEBEBE">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                            <p class="s2" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                SUBJECTS
                            </p>
                        </td>
                        <td style="width:76pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" colspan="2" bgcolor="#BEBEBE">
                            <p class="s2" style="padding-top: 1pt;padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                Quarter
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" rowspan="2" bgcolor="#BEBEBE">
                            <p class="s2" style="padding-top: 4pt;padding-left: 13pt;padding-right: 6pt;text-indent: -5pt;line-height: 109%;text-align: left;">
                                SEM FINAL GRADE
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt" rowspan="2" bgcolor="#BEBEBE">
                            <p class="s2" style="padding-top: 4pt;padding-left: 10pt;text-indent: -1pt;line-height: 109%;text-align: left;">
                                ACTION TAKEN
                            </p>
                        </td>
                    </tr>
                    <tr style="height:14pt">
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                            <p class="s2" style="padding-top: 1pt;padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                1ST
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                            <p class="s2" style="padding-top: 1pt;padding-left: 13pt;text-indent: 0pt;text-align: left;">
                                2ND
                            </p>
                        </td>
                    </tr>
                    
                    <!-- CORE SUBJECTS -->
                    <?php
                        $rowCount = 0;

                        $query = "SELECT * FROM core_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("s", $student_no);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc())
                            { 
                                $rowCount++;
                                ?>                   
                                <tr style="height:11pt">
                                    <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                        <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                            Core
                                        </p>
                                    </td>
                                    <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                        <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                                            <?=$row['subject_name']?>
                                        </p>
                                    </td
                                    ><td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                        <p style="text-indent: 0pt;text-align: left;">
                                            <?=$row['1st']?>
                                        </p>
                                    </td>
                                    <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                        <p style="text-indent: 0pt;text-align: left;">
                                            <?=$row['2nd']?>
                                        </p>
                                    </td>
                                    <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                        <p style="text-indent: 0pt;text-align: left;">
                                            <?=$row['final']?>
                                        </p>
                                    </td>
                                    <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                                        <p style="text-indent: 0pt;text-align: left;">
                                            <?=$row['remarks']?>
                                        </p>
                                    </td>
                                </tr>
                    <?php }
                            }
                            else
                            {?>
                                
                                    <tr>
                                        <td>
                                            Student has no Core Subject to take!
                                        </td>
                                    </tr>
                                    
                            <?php  }
                            ?>
                    <!-- APPLIED SUBJECTS -->
                    <?php
                        $rowCount1 = 0;

                        $query = "SELECT * FROM applied_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("s", $student_no);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc())
                            { 
                                $rowCount1++;
                                ?>                   
                                <tr style="height:11pt">
                                    <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                        <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                            Applied
                                        </p>
                                    </td>
                                    <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                        <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                                            <?=$row['subject_name']?>
                                        </p>
                                    </td
                                    ><td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                        <p style="text-indent: 0pt;text-align: left;">
                                            <?=$row['1st']?>
                                        </p>
                                    </td>
                                    <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                        <p style="text-indent: 0pt;text-align: left;">
                                            <?=$row['2nd']?>
                                        </p>
                                    </td>
                                    <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                        <p style="text-indent: 0pt;text-align: left;">
                                            <?=$row['final']?>
                                        </p>
                                    </td>
                                    <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                                        <p style="text-indent: 0pt;text-align: left;">
                                            <?=$row['remarks']?>
                                        </p>
                                    </td>
                                </tr>
                    <?php }
                            }
                            else
                            {?>
                                
                                    <tr>
                                        <td>
                                            Student has no Applied Subject to take!
                                        </td>
                                    </tr>
                                    
                            <?php  }
                            ?>
                    <!-- SPECIALIZED SUBJECTS -->
                    <?php
                        $rowCount2 = 0;

                        $query = "SELECT * FROM specialized_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("s", $student_no);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc())
                            { 
                                $rowCount2++;
                                ?>                   
                                <tr style="height:11pt">
                                    <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                        <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                            Specialized
                                        </p>
                                    </td>
                                    <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                        <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                                            <?=$row['subject_name']?>
                                        </p>
                                    </td
                                    ><td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                        <p style="text-indent: 0pt;text-align: left;">
                                            <?=$row['1st']?>
                                        </p>
                                    </td>
                                    <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                        <p style="text-indent: 0pt;text-align: left;">
                                            <?=$row['2nd']?>
                                        </p>
                                    </td>
                                    <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                        <p style="text-indent: 0pt;text-align: left;">
                                            <?=$row['final']?>
                                        </p>
                                    </td>
                                    <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                                        <p style="text-indent: 0pt;text-align: left;">
                                            <?=$row['remarks']?>
                                        </p>
                                    </td>
                                </tr>
                    <?php }
                            }
                            else
                            {?>
                                
                                    <tr>
                                        <td>
                                            Student has no Specialized Subject to take!
                                        </td>
                                    </tr>
                                    
                            <?php  }
                            ?>
                    <!-- Other SUBJECTS -->
                    <?php
                        $rowCount3 = 0;

                        $query = "SELECT * FROM other_sub_grades WHERE student_no = ? AND sem = '1st Semester' AND grade_level = '11' ORDER BY subject_name ASC";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("s", $student_no);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc())
                            { 
                                $rowCount3++;
                                ?>                   
                                <tr style="height:11pt">
                                    <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                        <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                            Other Subject
                                        </p>
                                    </td>
                                    <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                        <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                                            <?=$row['subject_name']?>
                                        </p>
                                    </td
                                    ><td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                        <p style="text-indent: 0pt;text-align: left;">
                                            <?=$row['1st']?>
                                        </p>
                                    </td>
                                    <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                        <p style="text-indent: 0pt;text-align: left;">
                                            <?=$row['2nd']?>
                                        </p>
                                    </td>
                                    <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                        <p style="text-indent: 0pt;text-align: left;">
                                            <?=$row['final']?>
                                        </p>
                                    </td>
                                    <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                                        <p style="text-indent: 0pt;text-align: left;">
                                            <?=$row['remarks']?>
                                        </p>
                                    </td>
                                </tr>
                    <?php }
                            }
                            else
                            {?>
                                
                                    <tr>
                                        <td>
                                            Student has no Other Subject Subject to take!
                                        </td>
                                    </tr>
                                    
                            <?php  }

                                $requiredRow = 12;
                                $t_rowCount = $rowCount + $rowCount1 + $rowCount2 + $rowCount3;

                                // Add blank rows if necessary
                                for ($i = $t_rowCount; $i < $requiredRow; $i++) 
                                {?>
                                    <tr style="height:11pt">
                                        <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                            <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                                <br/>
                                            </p>
                                        </td>
                                        <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                            <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                                                <br/>
                                            </p>
                                        </td
                                        ><td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                            <p style="text-indent: 0pt;text-align: left;">
                                                <br/>
                                            </p>
                                        </td>
                                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                            <p style="text-indent: 0pt;text-align: left;">
                                                <br/>
                                            </p>
                                        </td>
                                        <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                            <p style="text-indent: 0pt;text-align: left;">
                                                <br/>
                                            </p>
                                        </td>
                                        <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                                            <p style="text-indent: 0pt;text-align: left;">
                                                <br/>
                                            </p>
                                        </td>
                                    </tr>
                        <?php }
                            ?>

                    <tr style="height:10pt">
                        <td style="width:478pt;border-top-style:solid;border-top-width:2pt;border-top-color:#3E3E3E;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:1pt" colspan="4" bgcolor="#BEBEBE">
                            <p class="s2" style="padding-top: 1pt;text-indent: 0pt;line-height: 8pt;text-align: right;">
                                General Ave. for the Semester:
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                    </tr>
                </table>
                
                <!-- REMARKS starts Here -->
                <p class="s7" style="padding-top: 1pt;text-indent: 0pt;text-align: left;">
                    REMARKS:
                    <u> 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </u>
                </p>
                <p class="s7" style="padding-top: 2pt;text-indent: 0pt;text-align: left;">
                    <span class="s7"> 
                        Prepared by: 
                    </span>
                    <span class="s7" style="padding-left: 160pt;">
                        Certified True and Correct:
                    </span>
                    <span class="s7" style="padding-left: 180pt;">
                        Date Checked (MM/DD/YYYY):
                    </span>
                </p>
                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
                <table class="signatorees" style="border-bottom: none; padding-top: 6pt;text-indent: 0pt;text-align: left;">
                    <tr>
                        <td style="text-align: center;">
                            <u class ="h1" style="padding-top: 5pt;padding-left: 0pt;text-indent: 0pt;">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NAME OF ADVISER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                            </u>
                            <p style="text-indent: 0pt;text-align: left;">
                            <p style="padding-top: 1pt;text-indent: 0pt;text-align: left;">
                                Signature of Authorized Person over Printed Name, Designation
                            </p>
                        </td>
                        <td>
                            <h1 style="padding-top: 5pt;padding-left: 40pt;text-indent: 0pt;text-align: left;">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CHRISCEL IVY A. CARANZA, SHS REGISTRAR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </h1>
                            <p style="text-indent: 0pt;text-align: left;">
                            <p style="padding-top: 1pt;padding-left: 50pt;text-indent: 0pt;text-align: left;">
                                Signature of Authorized Person over Printed Name, Designation
                            </p>
                        </td>
                        <td>
                            <h1 style="padding-top: 5pt;padding-left: 40pt;text-indent: 0pt;text-align: left;">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PUT DATE CHECK HERE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </h1>
                        </td>
                    </tr>
                </table>

                <p class="s7" style="padding-top: 2pt;text-indent: 0pt;text-align: left;">
                    <span class="s7" style="padding-top: 6pt;text-indent: 0pt;text-align: left;">
                        REMEDIAL CLASSES
                    </span>
                    <span class="s7" style="padding-top: 6pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                        Conducted from (MM/DD/YYYY): 
                        <u>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </u>
                        to (MM/DD/YYYY): 
                        <u>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </u>
                    </span>
                    <span class="s7" style="padding-top: 6pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                        SCHOOL: 
                        <u>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                        </u> 
                        SCHOOL ID: 
                        <u>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </u>
                    </span>
                    <span style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </span>
                </p>
                <table style="border-collapse:collapse;" cellspacing="0">
                    <tr style="height:27pt">
                        <td style="width:71pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                            <p class="s2" style="padding-left: 1pt;text-indent: 0pt;line-height: 109%;text-align: center;">
                                Indicate if Subject is CORE, APPLIED, or
                            </p>
                            <p class="s2" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                SPECIALIZED
                            </p>
                        </td>
                        <td style="width:330pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                            <p class="s2" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                SUBJECTS
                            </p>
                        </td>
                        <td style="width:39pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                            <p class="s2" style="padding-top: 4pt;padding-left: 8pt;padding-right: 2pt;text-indent: -5pt;line-height: 109%;text-align: left;">
                                SEM FINAL GRADE
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                            <p class="s2" style="padding-left: 1pt;text-indent: 0pt;line-height: 109%;text-align: center;">
                                REMEDIAL CLASS
                            </p>
                            <p class="s2" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                MARK
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                            <p class="s2" style="padding-top: 4pt;padding-left: 4pt;text-indent: 0pt;line-height: 109%;text-align: left;">
                                RECOMPUTED FINAL GRADE
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt" bgcolor="#BEBEBE">
                            <p class="s2" style="padding-top: 4pt;padding-left: 10pt;text-indent: -1pt;line-height: 109%;text-align: left;">
                                ACTION TAKEN
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11pt">
                        <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:330pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:39pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11pt">
                        <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:330pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:39pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11pt">
                        <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:330pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:39pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:10pt">
                        <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:330pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:39pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                    </tr>
                </table>
                <p style="padding-top: 5pt;text-indent: 0pt;text-align: left;">
                    Name of Teacher/Adviser: 
                    <u>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </u> 
                    <span style="padding-left: 26pt;">
                        Signature: 
                    </span>
                    <u>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </u>
                </p>

                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
                
                <!-- 2nd Sem Starts Here -->
                <p class="s7" style="padding-top: 2pt;text-indent: 0pt;text-align: left;">
                    SCHOOL: 
                    <u>
                        &nbsp;CLARK COLLEGE OF SCIENCE AND TECHNOLOGY &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    </u> 
                    SCHOOL ID: 
                    <u>
                        &nbsp;401878 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </u> GRADE LEVEL: 
                    <u>
                        &nbsp;11 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    </u> 
                    SY: 
                    <u>
                        &nbsp;2022-2023 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    </u> 
                    SEM: <u>&nbsp;1ST &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
                </p>
                <p class="s7" style="padding-top: 2pt;padding-bottom: 1pt;text-indent: 0pt;text-align: left;">
                    TRACK/STRAND:
                    <u> 
                        ACADEMIC TRACK/ ACCOUNTANCY, BUSINESS AND MANAGEMENT STRAND &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </u> 
                    SECTION: 
                    <u>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </u>
                </p>
                
                <table style="border-collapse:collapse;margin-left:6.59pt" cellspacing="0">
                    <tr style="height:13pt">
                        <td style="width:71pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" rowspan="2" bgcolor="#BEBEBE">
                            <p class="s2" style="padding-left: 1pt;text-indent: 0pt;line-height: 109%;text-align: center;">
                                Indicate if Subject is CORE, APPLIED, or
                            </p>
                            <p class="s2" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                SPECIALIZED
                            </p>
                        </td>
                        <td style="width:331pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" rowspan="2" bgcolor="#BEBEBE">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>   
                            </p>
                            <p class="s2" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                SUBJECTS
                            </p>
                        </td>
                        <td style="width:76pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" colspan="2" bgcolor="#BEBEBE">
                            <p class="s2" style="padding-top: 1pt;padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                Quarter
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" rowspan="2" bgcolor="#BEBEBE">
                            <p class="s2" style="padding-top: 4pt;padding-left: 13pt;padding-right: 6pt;text-indent: -5pt;line-height: 109%;text-align: left;">
                                SEM FINAL GRADE
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt" rowspan="2" bgcolor="#BEBEBE">
                            <p class="s2" style="padding-top: 4pt;padding-left: 10pt;text-indent: -1pt;line-height: 109%;text-align: left;">
                                ACTION TAKEN
                            </p>
                        </td>
                    </tr>
                    <tr style="height:14pt">
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                            <p class="s2" style="padding-top: 1pt;padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                1ST
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                            <p class="s2" style="padding-top: 1pt;padding-left: 13pt;text-indent: 0pt;text-align: left;">
                                2ND
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11pt">
                        <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                Core
                            </p>
                        </td>
                        <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                                Reading and Writing Skills
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11pt">
                        <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                Core
                            </p>
                        </td>
                        <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                                Pagbasa at Pagsusuri ng Iba’t-Ibang Teksto Tungo sa Pananaliksik
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11pt">
                        <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                Core
                            </p>
                        </td>
                        <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                                Personal Development
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11pt">
                        <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                Core
                            </p>
                        </td>
                        <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                                Physical Science
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11pt">
                        <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                Core
                            </p>
                        </td>
                        <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                                Statistics and Probability
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11pt">
                        <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                Core
                            </p>
                        </td>
                        <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                                Physical Education and Health
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11pt">
                        <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                Applied
                            </p>
                        </td>
                        <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                                Research in Daily Life 1
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11pt">
                        <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                Specialized
                            </p>
                        </td>
                        <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                                Business Mathematics
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11pt">
                        <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                Specialized
                            </p>
                        </td>
                        <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                                Organization and Management
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11pt">
                        <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                Other Subject
                            </p>
                        </td>
                        <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                                Homeroom Guidance
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11pt">
                        <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11pt">
                        <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11pt">
                        <td style="width:478pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:1pt" colspan="4" bgcolor="#BEBEBE">
                            <p class="s2" style="padding-top: 2pt;text-indent: 0pt;line-height: 8pt;text-align: right;">
                                General Ave. for the Semester:
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                    </tr>
                </table>
                
                <p class="s7" style="padding-top: 1pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                    REMARKS:
                    <u> 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </u>
                </p>
                <p class="s7" style="padding-top: 2pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                    <span class="s7"> 
                        Prepared by: 
                    </span>
                    <span class="s7" style="padding-left: 160pt;">
                        Certified True and Correct:
                    </span>
                    <span class="s7" style="padding-left: 180pt;">
                        Date Checked (MM/DD/YYYY):
                    </span>
                </p>
                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
                <table class="signatorees" style="border-bottom: none; padding-top: 6pt;text-indent: 0pt;text-align: left;">
                    <tr>
                        <td style="text-align: center;">
                            <u class ="h1" style="padding-top: 5pt;padding-left: 0pt;text-indent: 0pt;">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NAME OF ADVISER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                            </u>
                            <p style="text-indent: 0pt;text-align: left;">
                            <p style="padding-top: 1pt;padding-left: 10pt;text-indent: 0pt;text-align: left;">
                                Signature of Authorized Person over Printed Name, Designation
                            </p>
                        </td>
                        <td>
                            <h1 style="padding-top: 5pt;padding-left: 40pt;text-indent: 0pt;text-align: left;">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CHRISCEL IVY A. CARANZA, SHS REGISTRAR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </h1>
                            <p style="text-indent: 0pt;text-align: left;">
                            <p style="padding-top: 1pt;padding-left: 50pt;text-indent: 0pt;text-align: left;">
                                Signature of Authorized Person over Printed Name, Designation
                            </p>
                        </td>
                        <td>
                            <h1 style="padding-top: 5pt;padding-left: 40pt;text-indent: 0pt;text-align: left;">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PUT DATE CHECK HERE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </h1>
                        </td>
                    </tr>
                </table>

                <p class="s7" style="padding-top: 2pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                    <span class="s7" style="padding-top: 6pt;text-indent: 0pt;text-align: left;">
                        REMEDIAL CLASSES
                    </span>
                    <span class="s7" style="padding-top: 6pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                        Conducted from (MM/DD/YYYY): 
                        <u>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </u>
                        to (MM/DD/YYYY): 
                        <u>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </u>
                    </span>
                    <span class="s7" style="padding-top: 6pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                        SCHOOL: 
                        <u>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                        </u> 
                        SCHOOL ID: 
                        <u>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </u>
                    </span>
                    <span style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </span>
                </p>
                <table style="border-collapse:collapse;margin-left:6.59pt" cellspacing="0">
                    <tr style="height:27pt">
                        <td style="width:71pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                            <p class="s2" style="padding-left: 1pt;text-indent: 0pt;line-height: 109%;text-align: center;">
                                Indicate if Subject is CORE, APPLIED, or
                            </p>
                            <p class="s2" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                SPECIALIZED
                            </p>
                        </td>
                        <td style="width:330pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                            <p class="s2" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                SUBJECTS
                            </p>
                        </td>
                        <td style="width:39pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                            <p class="s2" style="padding-top: 4pt;padding-left: 8pt;padding-right: 2pt;text-indent: -5pt;line-height: 109%;text-align: left;">
                                SEM FINAL GRADE
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                            <p class="s2" style="padding-left: 1pt;text-indent: 0pt;line-height: 109%;text-align: center;">
                                REMEDIAL CLASS
                            </p>
                            <p class="s2" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                                MARK
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                            <p class="s2" style="padding-top: 4pt;padding-left: 4pt;text-indent: 0pt;line-height: 109%;text-align: left;">
                                RECOMPUTED FINAL GRADE
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt" bgcolor="#BEBEBE">
                            <p class="s2" style="padding-top: 4pt;padding-left: 10pt;text-indent: -1pt;line-height: 109%;text-align: left;">
                                ACTION TAKEN
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11pt">
                        <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:330pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:39pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11pt">
                        <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:330pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:39pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11pt">
                        <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:330pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:39pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:10pt">
                        <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:330pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:39pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:1pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                        <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                            <p style="text-indent: 0pt;text-align: left;">
                                <br/>
                            </p>
                        </td>
                    </tr>
                </table>
                
                <p style="padding-top: 5pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                    Name of Teacher/Adviser: 
                    <u>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </u> 
                    <span style="padding-left: 26pt;">
                        Signature: 
                    </span>
                    <u>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </u>
                </p>
</div>
        <br><br><br><br>
<div id="page2">
    <table>
        <tr>
            <td>
                <p><b>Page 2</b></p>
            </td>
            <td>
            <p><b>Form 137-SHS</b></p>
            </td>
        </tr>
    </table>
        <p class="s7" style="padding-top: 2pt;padding-left: 9pt;text-indent: 0pt;text-align: left;">
            SCHOOL: 
            <u>
                &nbsp;CLARK COLLEGE OF SCIENCE AND TECHNOLOGY &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            </u> 
            SCHOOL ID: 
            <u>
                &nbsp;401878 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </u> GRADE LEVEL: 
            <u>
                &nbsp;12 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            </u> 
            SY: 
            <u>
                &nbsp;2022-2023 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            </u> 
            SEM: <u>&nbsp;1ST &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
        </p>
        <p class="s7" style="padding-top: 2pt;padding-bottom: 1pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
            TRACK/STRAND:
            <u> 
                ACADEMIC TRACK/ ACCOUNTANCY, BUSINESS AND MANAGEMENT STRAND &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </u> 
            SECTION: 
            <u>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </u>
        </p>
        <table style="border-collapse:collapse;margin-left:6.59pt" cellspacing="0">
            <tr style="height:13pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt border-right-style:solid;border-right-width:1pt" rowspan="2" bgcolor="#BEBEBE">
                    <p class="s2" style="padding-left: 1pt;text-indent: 0pt;line-height: 109%;text-align: center;">
                        Indicate if Subject is CORE, APPLIED, or
                    </p>
                    <p class="s2" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        SPECIALIZED
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" rowspan="2" bgcolor="#BEBEBE">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                    <p class="s2" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        SUBJECTS
                    </p>
                </td>
                <td style="width:76pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" colspan="2" bgcolor="#BEBEBE">
                    <p class="s2" style="padding-top: 1pt;padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        Quarter
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" rowspan="2" bgcolor="#BEBEBE">
                    <p class="s2" style="padding-top: 4pt;padding-left: 13pt;padding-right: 6pt;text-indent: -5pt;line-height: 109%;text-align: left;">
                        SEM FINAL GRADE
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt" rowspan="2" bgcolor="#BEBEBE">
                    <p class="s2" style="padding-top: 4pt;padding-left: 10pt;text-indent: -1pt;line-height: 109%;text-align: left;">
                        ACTION TAKEN
                    </p>
                </td>
            </tr>
            <tr style="height:14pt">
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                    <p class="s2" style="padding-top: 1pt;padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        1ST
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                    <p class="s2" style="padding-top: 1pt;padding-left: 13pt;text-indent: 0pt;text-align: left;">
                        2ND
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        Core
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                        Understanding Culture, Society and Politics
                    </p>
                </td
                ><td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        Core
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                        Introduction to the Philosophy of the Human Person
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        Core
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                        Physical Education and Health
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        Core
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                        Media and Information Literacy
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        Applied
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                        Research in Daily Life 2
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        Applied
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                        Pagsulat sa Filipino sa Piling Larangan
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        Specialized							
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                        Business Finance
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        Specialized
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                        Fundamentals of Accounting, Business and Management 2
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        Other Subject
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                        Homeroom Guidance
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-bottom-color:#3E3E3E;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:10pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt;border-right-color:#3E3E3E">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-top-color:#3E3E3E;border-left-style:solid;border-left-width:1pt;border-left-color:#3E3E3E;border-bottom-style:solid;border-bottom-width:1pt;border-bottom-color:#3E3E3E;border-right-style:solid;border-right-width:1pt;border-right-color:#3E3E3E">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-left-color:#3E3E3E;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:10pt">
                <td style="width:478pt;border-top-style:solid;border-top-width:2pt;border-top-color:#3E3E3E;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:1pt" colspan="4" bgcolor="#BEBEBE">
                    <p class="s2" style="padding-top: 1pt;text-indent: 0pt;line-height: 8pt;text-align: right;">
                        General Ave. for the Semester:
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
        </table>
        
        <!-- REMARKS starts Here -->
        <p class="s7" style="padding-top: 1pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
            REMARKS:
            <u> 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </u>
        </p>
        <p class="s7" style="padding-top: 2pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
            <span class="s7"> 
                Prepared by: 
            </span>
            <span class="s7" style="padding-left: 160pt;">
                Certified True and Correct:
            </span>
            <span class="s7" style="padding-left: 180pt;">
                Date Checked (MM/DD/YYYY):
            </span>
        </p>
        <p style="text-indent: 0pt;text-align: left;">
            <br/>
        </p>
        <table class="signatorees" style="border-bottom: none; padding-top: 6pt;text-indent: 0pt;text-align: left;">
            <tr>
                <td style="text-align: center;">
                    <u class ="h1" style="padding-top: 5pt;padding-left: 0pt;text-indent: 0pt;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NAME OF ADVISER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    </u>
                    <p style="text-indent: 0pt;text-align: left;">
                    <p style="padding-top: 1pt;padding-left: 10pt;text-indent: 0pt;text-align: left;">
                        Signature of Authorized Person over Printed Name, Designation
                    </p>
                </td>
                <td>
                    <h1 style="padding-top: 5pt;padding-left: 40pt;text-indent: 0pt;text-align: left;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CHRISCEL IVY A. CARANZA, SHS REGISTRAR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </h1>
                    <p style="text-indent: 0pt;text-align: left;">
                    <p style="padding-top: 1pt;padding-left: 50pt;text-indent: 0pt;text-align: left;">
                        Signature of Authorized Person over Printed Name, Designation
                    </p>
                </td>
                <td>
                    <h1 style="padding-top: 5pt;padding-left: 40pt;text-indent: 0pt;text-align: left;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PUT DATE CHECK HERE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </h1>
                </td>
            </tr>
        </table>

        <p class="s7" style="padding-top: 2pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
            <span class="s7" style="padding-top: 6pt;text-indent: 0pt;text-align: left;">
                REMEDIAL CLASSES
            </span>
            <span class="s7" style="padding-top: 6pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                Conducted from (MM/DD/YYYY): 
                <u>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </u>
                to (MM/DD/YYYY): 
                <u>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </u>
            </span>
            <span class="s7" style="padding-top: 6pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                SCHOOL: 
                <u>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                </u> 
                SCHOOL ID: 
                <u>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </u>
            </span>
            <span style="text-indent: 0pt;text-align: left;">
                <br/>
            </span>
        </p>
        <table style="border-collapse:collapse;margin-left:6.59pt" cellspacing="0">
            <tr style="height:27pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                    <p class="s2" style="padding-left: 1pt;text-indent: 0pt;line-height: 109%;text-align: center;">
                        Indicate if Subject is CORE, APPLIED, or
                    </p>
                    <p class="s2" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        SPECIALIZED
                    </p>
                </td>
                <td style="width:330pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                    <p class="s2" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        SUBJECTS
                    </p>
                </td>
                <td style="width:39pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                    <p class="s2" style="padding-top: 4pt;padding-left: 8pt;padding-right: 2pt;text-indent: -5pt;line-height: 109%;text-align: left;">
                        SEM FINAL GRADE
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                    <p class="s2" style="padding-left: 1pt;text-indent: 0pt;line-height: 109%;text-align: center;">
                        REMEDIAL CLASS
                    </p>
                    <p class="s2" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        MARK
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                    <p class="s2" style="padding-top: 4pt;padding-left: 4pt;text-indent: 0pt;line-height: 109%;text-align: left;">
                        RECOMPUTED FINAL GRADE
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt" bgcolor="#BEBEBE">
                    <p class="s2" style="padding-top: 4pt;padding-left: 10pt;text-indent: -1pt;line-height: 109%;text-align: left;">
                        ACTION TAKEN
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:330pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:39pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:330pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:39pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
        </table>
        <p style="padding-top: 5pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
            Name of Teacher/Adviser: 
            <u>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </u> 
            <span style="padding-left: 26pt;">
                Signature: 
            </span>
            <u>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </u>
        </p>

        <p style="text-indent: 0pt;text-align: left;">
            <br/>
        </p>
        
        <!-- 2nd Sem Starts Here -->
        <p class="s7" style="padding-top: 2pt;padding-left: 9pt;text-indent: 0pt;text-align: left;">
            SCHOOL: 
            <u>
                &nbsp;CLARK COLLEGE OF SCIENCE AND TECHNOLOGY &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            </u> 
            SCHOOL ID: 
            <u>
                &nbsp;401878 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </u> GRADE LEVEL: 
            <u>
                &nbsp;12 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            </u> 
            SY: 
            <u>
                &nbsp;2022-2023 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            </u> 
            SEM: <u>&nbsp;1ST &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
        </p>
        <p class="s7" style="padding-top: 2pt;padding-bottom: 1pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
            TRACK/STRAND:
            <u> 
                ACADEMIC TRACK/ ACCOUNTANCY, BUSINESS AND MANAGEMENT STRAND &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </u> 
            SECTION: 
            <u>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </u>
        </p>
        
        <table style="border-collapse:collapse;margin-left:6.59pt" cellspacing="0">
            <tr style="height:13pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" rowspan="2" bgcolor="#BEBEBE">
                    <p class="s2" style="padding-left: 1pt;text-indent: 0pt;line-height: 109%;text-align: center;">
                        Indicate if Subject is CORE, APPLIED, or
                    </p>
                    <p class="s2" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        SPECIALIZED
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" rowspan="2" bgcolor="#BEBEBE">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>   
                    </p>
                    <p class="s2" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        SUBJECTS
                    </p>
                </td>
                <td style="width:76pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" colspan="2" bgcolor="#BEBEBE">
                    <p class="s2" style="padding-top: 1pt;padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        Quarter
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" rowspan="2" bgcolor="#BEBEBE">
                    <p class="s2" style="padding-top: 4pt;padding-left: 13pt;padding-right: 6pt;text-indent: -5pt;line-height: 109%;text-align: left;">
                        SEM FINAL GRADE
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt" rowspan="2" bgcolor="#BEBEBE">
                    <p class="s2" style="padding-top: 4pt;padding-left: 10pt;text-indent: -1pt;line-height: 109%;text-align: left;">
                        ACTION TAKEN
                    </p>
                </td>
            </tr>
            <tr style="height:14pt">
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                    <p class="s2" style="padding-top: 1pt;padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        1ST
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                    <p class="s2" style="padding-top: 1pt;padding-left: 13pt;text-indent: 0pt;text-align: left;">
                        2ND
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        Core
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                        Contemporary Philippine Arts from the Regions																																				
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        Core
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                        Physical Education and Health																																				
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        Applied							
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                        English for Academic and Professional Purposes																																				
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        Applied
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                        Research Project																																				
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        Applied
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                        Entrepreneurship																																				
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        Specialized							
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                        Business Marketing																																				
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        Specialized							
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                        Applied Economics																																				
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        Specialized
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                        Business Enterprise Simulation																																				
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        Specialized
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                        Business Ethics and Social Responsibility																																				
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        Other Subject
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">
                        Homeroom Guidance
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:331pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:478pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:1pt" colspan="4" bgcolor="#BEBEBE">
                    <p class="s2" style="padding-top: 2pt;text-indent: 0pt;line-height: 8pt;text-align: right;">
                        General Ave. for the Semester:
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
        </table>
        
        <p class="s7" style="padding-top: 1pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
            REMARKS:
            <u> 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </u>
        </p>
        <p class="s7" style="padding-top: 2pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
            <span class="s7"> 
                Prepared by: 
            </span>
            <span class="s7" style="padding-left: 160pt;">
                Certified True and Correct:
            </span>
            <span class="s7" style="padding-left: 180pt;">
                Date Checked (MM/DD/YYYY):
            </span>
        </p>
        <p style="text-indent: 0pt;text-align: left;">
            <br/>
        </p>
        <table class="signatorees" style="border-bottom: none; padding-top: 6pt;text-indent: 0pt;text-align: left;">
            <tr>
                <td style="text-align: center;">
                    <u class ="h1" style="padding-top: 5pt;padding-left: 0pt;text-indent: 0pt;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NAME OF ADVISER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    </u>
                    <p style="text-indent: 0pt;text-align: left;">
                    <p style="padding-top: 1pt;padding-left: 10pt;text-indent: 0pt;text-align: left;">
                        Signature of Authorized Person over Printed Name, Designation
                    </p>
                </td>
                <td>
                    <h1 style="padding-top: 5pt;padding-left: 40pt;text-indent: 0pt;text-align: left;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CHRISCEL IVY A. CARANZA, SHS REGISTRAR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </h1>
                    <p style="text-indent: 0pt;text-align: left;">
                    <p style="padding-top: 1pt;padding-left: 50pt;text-indent: 0pt;text-align: left;">
                        Signature of Authorized Person over Printed Name, Designation
                    </p>
                </td>
                <td>
                    <h1 style="padding-top: 5pt;padding-left: 40pt;text-indent: 0pt;text-align: left;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PUT DATE CHECK HERE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </h1>
                </td>
            </tr>
        </table>

        <p class="s7" style="padding-top: 2pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
            <span class="s7" style="padding-top: 6pt;text-indent: 0pt;text-align: left;">
                REMEDIAL CLASSES
            </span>
            <span class="s7" style="padding-top: 6pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                Conducted from (MM/DD/YYYY): 
                <u>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </u>
                to (MM/DD/YYYY): 
                <u>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </u>
            </span>
            <span class="s7" style="padding-top: 6pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                SCHOOL: 
                <u>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                </u> 
                SCHOOL ID: 
                <u>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </u>
            </span>
            <span style="text-indent: 0pt;text-align: left;">
                <br/>
            </span>
        </p>
        <table style="border-collapse:collapse;margin-left:6.59pt" cellspacing="0">
            <tr style="height:27pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                    <p class="s2" style="padding-left: 1pt;text-indent: 0pt;line-height: 109%;text-align: center;">
                        Indicate if Subject is CORE, APPLIED, or
                    </p>
                    <p class="s2" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        SPECIALIZED
                    </p>
                </td>
                <td style="width:330pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                    <p class="s2" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        SUBJECTS
                    </p>
                </td>
                <td style="width:39pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                    <p class="s2" style="padding-top: 4pt;padding-left: 8pt;padding-right: 2pt;text-indent: -5pt;line-height: 109%;text-align: left;">
                        SEM FINAL GRADE
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                    <p class="s2" style="padding-left: 1pt;text-indent: 0pt;line-height: 109%;text-align: center;">
                        REMEDIAL CLASS
                    </p>
                    <p class="s2" style="padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        MARK
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" bgcolor="#BEBEBE">
                    <p class="s2" style="padding-top: 4pt;padding-left: 4pt;text-indent: 0pt;line-height: 109%;text-align: left;">
                        RECOMPUTED FINAL GRADE
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt" bgcolor="#BEBEBE">
                    <p class="s2" style="padding-top: 4pt;padding-left: 10pt;text-indent: -1pt;line-height: 109%;text-align: left;">
                        ACTION TAKEN
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:330pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:39pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:71pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:330pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:39pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:38pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:47pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:41pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
            </tr>
        </table>
        
        <p style="padding-top: 5pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
            Name of Teacher/Adviser: 
            <u>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </u> 
            <span style="padding-left: 26pt;">
                Signature: 
            </span>
            <u>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </u>
        </p>

        <div class="footer">
            <p style="padding-left: 6pt;text-indent: 0pt;text-align: center;background-color: #BEBEBE; margin-top: 3pt;">
                <span class="s4">
                   <br>                        
                </span>
            </p>
            <p class="s7" style="padding-top: 1pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                <span>
                    Track/Strand Accomplished:
                    <u> 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </u>
                </span>
                <span>
                    SHS General Average:
                    <u> 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </u>
                </span>
            </p>
            <p class="s7" style="padding-top: 1pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                <span>
                    Awards/Honors Received:
                    <u> 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </u>
                </span>
                <span>
                    Date of SHS Graduation (MM/DD/YYYY):
                    <u> 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </u>
                </span>
            </p>
            <!-- <style>
                tr, td{
                    border: 1px solid red;
                }
            </style> -->
            <table>
                <tr>
                    <td>
                        <p>
                            Certified by:
                        </p>
                    </td>
                    <td>
                        <p>
                            Place School Seal Here:
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr align="center">
                                <td>
                                    <h1 style="padding-top: 5pt;padding-left: 0pt;text-indent: 0pt;text-align: left;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ARVIN MARK D. SERRANO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </h1>
                                    <p style="text-indent: 0pt;text-align: left;">
                                    <p style="padding-top: 1pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">
                                        Signature of School Head over Printed Name
                                    </p>
                                </td>
                                <td>
                                    <h1 style="padding-top: 5pt;padding-left: 20pt;text-indent: 0pt;text-align: left;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PUT DATE CHECK HERE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </h1>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td rowspan="2" style="border-left: 1px solid black;">
                        <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table border="1px solid black" style="border-collapse: collapse;">
                            <tr>
                                <td>
                                    <p>
                                        <b>NOTE:</b> <br>
                                        <p> 
                                            <i>
                                                This permanent record or a photocopy of this permanent record that bears the seal of the school and the original <br>
                                                signature in ink of the School Head shall be considered valid for all legal purposes. Any erasure or alteration <br>
                                                made on this copy should be validated by the School Head. <br>
                                                If the student transfers to another school, the originating school should produce one (1) certified true copy of this <br>
                                                permanent record for safekeeping. The receiving school shall continue filling up the original form.  <br>
                                                Upon graduation, the school from which the student graduated should keep the original form and produce one <br>
                                                (1) certified true copy for the Division Office.
                                            </i>
                                        </p>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <p>
                <span class="s7">
                    REMARKS:
                </span>
                <span class="s8">
                    <i>
                        (Please indicate the purpose for which this permanent record will be used)
                    </i>
                </span>
            </p>
            <p>
                <span class="s7">
                    Date Issued (MM/DD/YYYY): 
                    <u>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </u>
                </span>
            </p>
            <p>
                This is to certify that is eligible for Senior High School graduation this S.Y. 2023-2024. This document further certifies that the grades entered therein are a true and correct copy of his/her original grades.
            </p>

            <table>
                <tr align="left">
                    <td>
                        <p>
                            Prepared by:
                        </p>
                    </td>
                    <td style="padding-left: 150pt;">
                        <p>
                            Noted by:
                        </p>
                    </td>
                </tr>
                <tr align="center">
                    <td>
                        <h1 style="padding-top: 5pt;padding-left: 0pt;text-indent: 0pt;text-align: center;">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CHRISCEL IVY A. CARANZA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </h1>
                        <p style="text-indent: 0pt;text-align: center;">
                        <p style="padding-top: 1pt;padding-left: 5pt;text-indent: 0pt;text-align: center;">
                            School Registrar
                        </p>
                    </td>
                    <td style="padding-left: 165pt;">
                    <h1 style="padding-top: 5pt;padding-left: 0pt;text-indent: 0pt;text-align: center;">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ARVIN MARK D. SERRANO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </h1>
                        <p style="text-indent: 0pt;text-align: center;">
                        <p style="padding-top: 1pt;padding-left: 5pt;text-indent: 0pt;text-align: center;">
                            SHS Focal
                        </p>
                    </td>
                </tr>
            </table>
        </div>
</div>
</div>
</body>
</html>
<?php
 }
 else 
 {
    echo "Error: student_no parameter is not set";
 }
 ?>