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
                <p style="padding-top: 2pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                    LAST NAME: 
                    <u> 
                        <?=$row['Lname']?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

                    </u> 
                    <span style="padding-left: 5pt;">FIRST NAME:</span> 
                    <u>
                    <?=$row['Fname']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </u> 
                    <span style="padding-left: 15pt;">MIDDLE NAME: </span>
                    <u>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </u>
                </p>
                <p style="padding-top: 1pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                    LRN: 
                    <u>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    </u> 
                    Date of Birth (MM/DD/YYYY): 
                    <u> 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    </u> 
                    Sex: 
                    <u>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    </u> 
                    Date of SHS Admission (MM/DD/YYYY): 
                    <u>
                        <b> 
                            &nbsp;8/22/2022 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </b>
                    </u>
                </p>
                <p style="margin-top: 6pt;padding-left: 6pt;text-indent: 0pt;text-align: center;background-color: #BEBEBE;">
                    <span class="s4" style=" background-color: #BEBEBE;">
                        ELIGIBILITY FOR SHS ENROLMENT                         
                    </span>
                </p>
                <p style="padding-top: 2pt;padding-left: 6pt;text-indent: 0pt;text-align: left;">
                    <span>
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="padding-top: 1pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                                    <input type="checkbox" name="HSCompleter" id="HSCompleter"> 
                                    <label for="HSCompleter">High School Completer*</label>
                                      <span style="margin-left:7pt;" class="label">Gen. Ave:</span>
                                    <u>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                    </u>
                                </td>
                                <td style="padding-left: 10pt;text-indent: 0pt;text-align: left;">
                                    <input type="checkbox" name="HSCompleter" id="HSCompleter"> 
                                    <label for="HSCompleter">Junior High School Completer*</label>
                                    <span style="margin-left:10pt;" class="label">Gen. Ave:</span>
                                    <u>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                    </u>
                                </td>
                            </tr>
                        </table>
                    </span>
                </p>
                <p style="text-indent: 0pt;text-align: left;"/>
                <p style="text-indent: 0pt;text-align: left;"/>
                <p style="padding-left: 7pt;text-indent: 0pt;text-align: left;">
                    Date of Graduation/Completion (MM/DD/YYYY): 
                    <u>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    </u> 
                    Name of School: 
                    <u>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </u>
                    School Address: 
                    <u>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </u>
                </p>
                <p style="text-indent: 0pt;text-align: left;"/>
                <p style="padding-top: 2pt;padding-left: 6pt;text-indent: 0pt;text-align: left;">
                    <span>
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="padding-top: 1pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                                    <input type="checkbox" name="HSCompleter" id="HSCompleter"> 
                                    <label for="HSCompleter">PEPT Passer**</label>
                                      <span style="margin-left:7pt;" class="label">Rating:</span>
                                    <u>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                    </u>
                                </td>
                                <td style="padding-left: 10pt;text-indent: 0pt;text-align: left;">
                                    <input type="checkbox" name="HSCompleter" id="HSCompleter"> 
                                    <label for="HSCompleter">ALS A&E Passer***</label>
                                    <span style="margin-left:10pt;" class="label">Rating:</span>
                                    <u>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                    </u>
                                </td>
                                <td style="padding-left: 10pt;text-indent: 0pt;text-align: left;">
                                    <input type="checkbox" name="HSCompleter" id="HSCompleter"> 
                                    <label for="HSCompleter">Others (Pls. Specify):</label>
                                    <u>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                    </u>
                                </td>
                            </tr>
                        </table>
                    </span>
                </p>
                <p style="padding-top: 1pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                    Date of Examination/Assessment (MM/DD/YYYY):  
                    <u>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    </u>  
                    Name and Address of Community Learning Center: 
                    <u>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </u>
                </p>
                <p class="s6" style="padding-top: 1pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                    *High School Completers are students who graduated from secondary school under the old curriculum              ***ALS A&amp;E - Alternative Learning System Accreditation and Equivalency Test for JHS
                </p>
                <p class="s6" style="padding-top: 1pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">
                    **PEPT - Philippine Educational Placement Test for JHS
                </p>
                <p style="padding-left: 6pt;text-indent: 0pt;text-align: center;background-color: #BEBEBE;">
                    <span class="s4" style=" background-color: #BEBEBE;">                                                   
                        SCHOLASTIC RECORD                         
                    </span>
                </p>
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
                        &nbsp;11 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
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
                                Earth and Life Science
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
                                General Mathematics
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
                                Oral Communication in Context
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
                                Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino
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
                                21st Century Literature from the Philippines and the World
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
                                Empowerment Technologies
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
                                Fundamentals of Accounting, Business and Management 1
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
                        &nbsp;11 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
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