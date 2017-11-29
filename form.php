<?php
$hostname="localhost";
$username="root";
$password="";
$databasename="school";

$conn=new mysqli($hostname,$username,$password,$databasename);

$name=$_POST['name'];
$class=$_POST['class'];
$city=$_POST['city'];
//$photo=$_POST['photo'];


$target_dir = "upload/";

$target_file = $target_dir . basename($_FILES['photo']['name']);

$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

$status=move_uploaded_file($_FILES['photo']['tmp_name'], $target_file);

$q="insert into principal (name,class,city,image) values('$name','$class','$city','$target_file')";
    
if($conn->query($q))
{
echo " row inserted. {$status}<br>";
}
else{
    echo "not insert.{$status}<br>";
    echo $conn->error;
    echo $q;
}
?>