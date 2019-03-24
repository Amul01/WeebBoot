<?php
function upload($rid,$name){
echo $rid;
$target_dir = "../assets/img/r".$rid."/";
$target_file = $_FILES['url']['name'];
//echo "hello ".$target_file;
$uploadOk = 1;

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$final_dir=$target_dir.$name.".".$imageFileType;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["url"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["url"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["url"]["tmp_name"],$final_dir )) {
        echo "The file ". basename( $_FILES["url"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
?>