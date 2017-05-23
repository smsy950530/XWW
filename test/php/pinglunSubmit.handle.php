<?php
require_once ("../include.php");
date_default_timezone_set("Asia/Shanghai");
//将评论信息放入数据库
$pid=$_POST['pid'];
$uid=$_POST['uid'];
$username=$_POST['username'];
$message=$_POST['message'];
$time=date("Y-m-d H:i:s");
$sql="insert into comment(pid,uid,username,message,time) values($pid,$uid,'$username','$message','$time')";
$result=mysqli_query($link, $sql);
if($result){
	echo "<script>alert('评论成功！');history.go(-1)</script>";
}