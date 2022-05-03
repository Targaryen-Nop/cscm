<?php
include 'header_back.php';
if (isset($_POST["submit"])) {


    $path = "../cscm/upload/document/file";
    if (isset($_FILES["file"])) {

        $filename           = $_FILES["file"]["name"];
        $file_basename      = substr($filename, 0, strripos($filename, '.')); // get file name
        $file_ext           = substr($filename, strripos($filename, '.')); // get file extension
        $filesize           = $_FILES["file"]["size"];
        $allowed_file_types = array('.png', '.jpg', 'docx', 'ppt', 'xlsx');

        if (in_array($file_ext, $allowed_file_types)) {

            $newfilename = $file_basename . $file_ext;
            if (file_exists($path . $newfilename)) {
                // file already exists error
                echo "You have already uploaded this file.", "<br>";
                unlink($path . $newfilename); //delete file
                move_uploaded_file($_FILES["file"]["tmp_name"], $path . $newfilename);
                echo "File uploaded replace.";
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"], $path . $newfilename);
                echo "<p align='center' style='color:green;'>File uploaded successfully.</p>";
            }
        } else if (empty($file_basename)) {
            // file selection error
            echo "No file to be uploaded.";
        } else {
            // file type error
            echo "Only file type : " . $allowed_file_types . " can be uploaded";
            unlink($_FILES["file"]["tmp_name"]);
        }
    }

    $sql = "INSERT INTO `files` (`id`, `name`, `byename`) VALUES (NULL, '".$file_basename."', '".$file_ext."');";
    $dbquery = mysqli_query($connection, $sql);
    if ($dbquery) {

        echo "<div align='center'><font color=green size='10pt'><b>DATA INSERTED<b></font></div>";
    } else {

        echo "<div align='center'><font color=red size='10pt'><b>DATA NOT INSERTED<b></font></div>";
    }
    echo "<meta http-equiv='refresh' content='1; url=insert_file.php'>";
}
?>

<body>
    <div class="container">
        <form method="post" action="" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" autocomplete="off">
            <h1>Insert File</h1>      
            <div>
                <div class="input-group-prepend text-center mt-5">
                    <label for="exampleFormControlFile1">Choose Image</label>
                    <input type="file" class="form-control-file" name="file">
                </div>
            </div>
            <button name="submit" type="submit" value="submit" class="btn btn-success mt-5">Success</button>
        </form>
    </div>
</body>