<?php
if (isset($_GET['download'])) {
    
    $type = $_GET['download'];


    if($type == "Student")
    {
        $file = 'import/templates/importRegulars.xlsx'; // Specify the path to your Excel file

        if (file_exists($file)) {
            // Set headers to initiate a file download
            header('Content-Description: File Transfer');
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="' . basename($file) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        } else {
            echo "File not found.";
        }
    }

}
?>