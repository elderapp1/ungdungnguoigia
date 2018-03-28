<?php 
include 'db_connect.php';

$username=$_POST['username'];
$password=$_POST['password'];
$info=$_POST['info'];
$sql1="SELECT * FROM `user` WHERE user.username='$username'";
$data=mysqli_query($conn,$sql1);
if (mysqli_num_rows($data)==0) {
	
	$sql2="INSERT INTO `user`(`id`, `username`, `password`, `avatar`, `email`, `date`, `introduce`, `status`, `created_at`) VALUES ('','$username','$password','','','','$info','',NOW()) ";
	$rs=mysqli_query($conn, $sql2);
	if ($rs!=null) {
    echo "1";
	}
	else{
		echo mysqli_error($conn);

	}

}

	else{
		echo "0";
	}

// mysqli_close($conn);
?>