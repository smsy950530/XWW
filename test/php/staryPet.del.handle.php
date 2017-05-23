<?php
require_once '../include.php';
//删除流浪宠物信息
$id=$_GET['id'];
$sql="delete from stary_pet where id= $id";
if(mysqli_query($link, $sql)){
	$del="delete from stary_comment where pid=$id";
	mysqli_query($link, $del);
	echo "<script>alert('宠物删除成功！');window.location.href='../pet-main.php';</script>";
}else {
	echo "<script>alert('宠物删除失败！')</script>";
}