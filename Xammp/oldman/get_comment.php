<?php 
include 'db_connect.php';
 $id_newfeed=$_POST['id'];
$SQL="SELECT comment.id,user.username,comment.status FROM `comment`,`user`,`newfeed` WHERE comment.id_user=user.id AND newfeed.id=comment.id_newfeed AND comment.id_newfeed='$id_newfeed'";
$data=mysqli_query($conn,$SQL);
$rs=array();
while ($row=mysqli_fetch_array($data,MYSQLI_ASSOC)) {

	array_push($rs,$row);
}
echo json_encode($rs);

 ?>