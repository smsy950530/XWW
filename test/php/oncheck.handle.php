<?php
require_once '../include.php';
//删除请求领养的信息
$pid=$_GET['pid'];
$sql="delete from oncheck where pid= $pid";
if(mysqli_query($link, $sql)){
	echo "<script>alert('成功！');window.location.href='../pet-main.php';</script>";
}else {
	echo "<script>alert('失败！');window.location.href='../pet-main.php';</script>";
}