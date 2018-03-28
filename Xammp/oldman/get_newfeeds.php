<?php 
include 'db_connect.php';

$SQL="SELECT newfeed.id,user.username,user.avatar,newfeed.image,newfeed.status FROM `newfeed`,user WHERE newfeed.id_user=user.id";
$data=mysqli_query($conn,$SQL);
$rs=array();
while ($row=mysqli_fetch_array($data,MYSQLI_ASSOC)) {

	array_push($rs,$row);
}
echo json_encode($rs);
 ?>