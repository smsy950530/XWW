<?php
require_once '../include.php';
//删除
$id=$_GET['id'];
$sql1="delete from comment where id= $id";
if(mysqli_query($link, $sql1)){
	
	echo "<script>alert('评论删除成功！');history.go(-1);</script>";
}else {
	echo "<script>alert('评论删除失败！');history.go(-1);</script>";
}
?>