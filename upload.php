<?php
// Include the database configuration file 
include_once 'connectdb.php';

if (isset($_POST['submit'])) {
    // File upload configuration 
    $targetDir = "upload/document/";
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    $fileNames = array_filter($_FILES['files']['name']);


    if (!empty($fileNames)) {
        foreach ($_FILES['files']['name'] as $key => $val) {

            // File upload path 
            $fileName           = "NEWS" . "-" . "0001" . "-" . basename($_FILES['files']['name'][$key]);
            $targetFilePath     = $targetDir . $fileName;
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_BASENAME);
            $fileType = substr($fileType, 10);
            $fileType = explode(".", $fileType);
            if (in_array($fileType[1], $allowTypes)) {
                // Upload file to server 
                if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
                    // Image db insert sql 
                    $date = date("Y/m/d H:i:s");
                    $insertValuesSQL .= "(NULL,'" . $fileName . "', '" . $date . "'),";
                } else {
                    $errorUpload .= $_FILES['files']['name'][$key] . ' | ';
                }
            } else {
                $errorUploadType .= $_FILES['files']['name'][$key] . ' | ';
            }
        }

        // Error message 
        $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
        $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
        $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;

        if (!empty($insertValuesSQL)) {
            $insertValuesSQL = trim($insertValuesSQL, ',');
            // Insert image file name into database 
            $sql = "INSERT INTO images (image_id,image_name,image_date) VALUES $insertValuesSQL";
            $dbquery = mysqli_query($connection, $sql);
            if ($dbquery) {
                echo "<div align='center'><font color=green size='10pt'><b>DATA INSERTED<b></font></div>";
            } else {
                echo "<div align='center'><font color=red size='10pt'><b>DATA NOT INSERTED<b></font></div>";
            }
            echo "<meta http-equiv='refresh' content='1; url=upload.php'>";
        }
    } else {
        echo "<div align='center'><font color=red size='10pt'><b>Please select a file to upload.<b></font></div>";
    }
}

?>



<form action="upload.php" method="post" enctype="multipart/form-data">
    Select Image Files to Upload:
    <input type="file" name="files[]" multiple>
    <input type="submit" name="submit" value="UPLOAD">
</form>