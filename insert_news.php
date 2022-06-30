<?php
include 'header_back.php';
include 'connectdb.php';
if (isset($_POST["submit"])) {
    $caption = $_POST['caption'];
    $content = $_POST['content'];

    $path = "../cscm/upload/document/news";
    if (isset($_FILES["image"])) {

        $filename           = $_FILES["image"]["name"];
        $file_basename      = substr($filename, 0, strripos($filename, '.')); // get file name
        $file_ext           = substr($filename, strripos($filename, '.')); // get file extension
        $filesize           = $_FILES["image"]["size"];
        $allowed_file_types = array('.png', '.jpg');

        if (in_array($file_ext, $allowed_file_types)) {

            $newfilename = $caption . $file_ext;
            if (file_exists($path . $newfilename)) {
                // file already exists error
                echo "You have already uploaded this file.", "<br>";
                unlink($path . $newfilename); //delete file
                move_uploaded_file($_FILES["image"]["tmp_name"], $path . $newfilename);
                echo "File uploaded replace.";
            } else {
                move_uploaded_file($_FILES["image"]["tmp_name"], $path . $newfilename);
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

    $date = date("Y/m/d H:i:s");

    $sql = "INSERT INTO news (id, caption, content, image, date) VALUES ('" . " " . "', '" . $caption . "', '" . $content . "', '" . $file_ext . "', '" . $date . "')";
    $dbquery = mysqli_query($connection, $sql);
    if ($dbquery) {

        echo "<div align='center'><font color=green size='10pt'><b>DATA INSERTED<b></font></div>";
    } else {

        echo "<div align='center'><font color=red size='10pt'><b>DATA NOT INSERTED<b></font></div>";
    }
    echo "<meta http-equiv='refresh' content='1; url=backend_insert.php'>";
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSCM System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <form method="post" action="" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" autocomplete="off">
            <h1>Insert News</h1>
            <div class="input-group mb-3 mt-5">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Caption</span>
                </div>
                <input type="text" class="form-control" aria-label="Default" name="caption">
            </div>
            <div>
                <div class="input-group-prepend text-center">

                    <span class="input-group-text" id="inputGroup-sizing-default" aria-label="With textarea">Conetent</span>
                    <textarea class="form-control" name="content" aria-label="With textarea" rows="5" cols="1000"></textarea>
                </div>
                <div class="input-group-prepend text-center mt-5">
                    <label for="exampleFormControlFile1">Choose Image</label>
                    <input type="file" class="form-control-file" name="image">
                </div>
            </div>
            <button name="submit" type="submit" value="submit" class="btn btn-success mt-5">Success</button>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>