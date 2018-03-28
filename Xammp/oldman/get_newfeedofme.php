<?php 
include 'db_connect.php';
$id=null;
if ($_POST['id']!=null) {
	$id=$_POST['id'];
	$SQL="SELECT * FROM `newfeed` WHERE newfeed.id_user='$id'";
	$data=mysqli_query($conn,$SQL);
	$rs=array();
	while ($row=mysqli_fetch_array($data,MYSQLI_ASSOC)) {

	array_push($rs,$row);
	}
	echo json_encode($rs);
}
else{
	echo "0";
}


 ?>