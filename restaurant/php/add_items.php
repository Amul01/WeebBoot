<?php
require 'connection.php';
include 'fileupload.php';
session_start();
if(!isset($_SESSION['sid'])){
       $_SESSION['sid']=session_id();
}
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
$name = $_POST["name"];
$category=$_POST["category"];
$description=$_POST["description"];
$price=$_POST["price"];


$sql = "select * from food where name like '$name'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
    echo "Item already Exists";
}
else {
	$rid=$_SESSION['uid'];
	$imageFileType = strtolower(pathinfo($_FILES["url"]["name"],PATHINFO_EXTENSION));
	$url = "/r".$rid."/". $name.".".$imageFileType;
	//$rid=	(int)$_COOKIE[$cookie_name];
	 $stmt = $conn->prepare("INSERT INTO food(rid,name,category,ingredients,cost,url) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("isssis",$rid,$name,$category,$description,$price,$url);
    $stmt->execute();
	echo $rid;
	upload($rid,$name);
	echo "Item Added";
}


?>
