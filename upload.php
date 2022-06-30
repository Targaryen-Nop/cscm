<?php 
// Include the database configuration file 
include_once 'connectdb.php'; 
     
if(isset($_POST['submit'])){ 
    // File upload configuration 
    $targetDir = "upload/document/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
    
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
   

    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 
            
            // File upload path 
            $fileName = "NEWS"."-"."0001"."-".basename($_FILES['files']['name'][$key]); 
            $targetFilePath = $targetDir . $fileName; 
           
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_BASENAME); 
            $fileType = substr($fileType,10);
            $fileType = explode(".",$fileType);
            if(in_array($fileType[1], $allowTypes)){ 
                // Upload file to server 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                    // Image db insert sql 
                    $insertValuesSQL .= $fileName." "; 
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 
        $date = date("Y/m/d H:i:s");
        // Error message 
        $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
        $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
        $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
        $insertValuesSQL = explode(" ",$insertValuesSQL);
        print_r($insertValuesSQL);
        if(!empty($insertValuesSQL)){ 
            // Insert image file name into database 
            $insert = $connection->query("INSERT INTO images (image_id,image_name,image_file,image_date) VALUES (NULL,'" . $insertValuesSQL[0] . "','" . $insertValuesSQL[1] . "','" . $date. "')"); 
            if($insert){ 
                $statusMsg = "Files are uploaded successfully.".$errorMsg; 
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
            } 
        }else{ 
            $statusMsg = "Upload failed! ".$errorMsg; 
        } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 

   
} 
 
?>



<form action="upload.php" method="post" enctype="multipart/form-data">
    Select Image Files to Upload:
    <input type="file" name="files[]" multiple >
    <input type="submit" name="submit" value="UPLOAD">
</form>