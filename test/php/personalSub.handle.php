<?php
require_once ("../include.php");
$name=$_POST['real-name'];
$sex=$_POST['sex'];
$place=$_POST['place'];
$phone=$_POST['phone'];
$uid=$_SESSION['uid'];
//填写个人信息
$sql="insert into user_data(uid,real_name,sex,place,phone) values($uid,'$name','$sex','$place',$phone)";
$result=mysqli_query($link, $sql);
if($result){
	$upd="update user set isdata=1 where id=$uid";
	mysqli_query($link, $upd);
	echo "<script>alert('完成填写！');window.location.href='../pet-main.php'</script>";
} else {
	echo "<script>alert('请填写完整信息！');window.history.go(-1);</script>";
}