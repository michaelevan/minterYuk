<?php
if(isset($_FILES["files-upload"])){
    if($_FILES['file-upload']['error'] === UPLOAD_ERR_OK){
        echo"File ke Upload";
    }
    else{
        echo"File corupt/tidak terupload";
    }
}
?>
<form action="" method="POST" enctype="multipart/form-data">
<input type="file" name="file">
<button type="submit">Upload</button>
</form>