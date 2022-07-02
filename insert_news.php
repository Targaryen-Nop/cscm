<?php
include 'header_back.php';
include 'connectdb.php';
if (isset($_POST["submit"])) {
    $caption = $_POST['caption'];
    $content = $_POST['content'];
    $category = $_POST['category_news'];
    $date = date("Y/m/d H:i:s");

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
    }
    if (!empty($insertValuesSQL)) {
        $insertValuesSQL = trim($insertValuesSQL, ',');
        // Insert image file name into database 
        $sql_image = "INSERT INTO images (image_id,image_name,image_date) VALUES $insertValuesSQL";
        $dbquery_image = mysqli_query($connection, $sql_image);
    }

    $sql = "INSERT INTO `news` (`news_id`, `caption`, `content`, `date`, `category_id`) VALUES (NULL, '".$caption."', '".$content."', '".$date."', '".$category."')";
    $dbquery = mysqli_query($connection, $sql);
    if ($dbquery) {
        echo "<div align='center'><font color=green size='10pt'><b>DATA INSERTED<b></font></div>";
    } else {
        echo "<div align='center'><font color=red size='10pt'><b>DATA NOT INSERTED<b></font></div>";
    }
    echo "<meta http-equiv='refresh' content='1; url=insert_news.php'>";
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
            <div class="input-group mb-3 mt-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Category News</span>
                </div>
                <select name="category_news">
                    <?php
                    $sql_category = "SELECT * from categories";
                    $query_category = mysqli_query($connection, $sql_category);
                    while ($row_category = mysqli_fetch_array($query_category)) {
                    ?>
                        <option value="<?php echo $row_category['category_id'] ?>"><?php echo $row_category['category_name']; ?></option>
                    <?php  } ?>
                </select>

            </div>

            <div>
                <div class="input-group-prepend text-center">

                    <span class="input-group-text" id="inputGroup-sizing-default" aria-label="With textarea">Conetent</span>
                    <textarea class="form-control" name="content" aria-label="With textarea" rows="5" cols="1000"></textarea>
                </div>
                <div class="input-group-prepend text-center mt-5">
                    Select Image Files to Upload:
                    <input type="file" name="files[]" multiple>

                </div>
            </div>
            <button name="submit" type="submit" value="submit" class="btn btn-success mt-5">Success</button>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>