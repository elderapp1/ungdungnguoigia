<?php 
include 'db_connect.php'; 
$user=$_POST['user'];
$pass=$_POST['pass'];	
if (strlen($user)>0 && strlen($pass)>0 ){
	$sql="select id,username,email,avatar from user where username='$user' and password='$pass'";
	$rs=mysqli_query($conn,$sql);
	if (!mysqli_num_rows($rs)>0) {
	echo "0";

	}
	else{
	$row=mysqli_fetch_assoc($rs);
	echo json_encode($row);
		}
}

?>