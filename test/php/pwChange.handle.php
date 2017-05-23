<?php 
require ("../include.php");
$opw=$_POST['opassword'];
$pw=$_POST['password'];
$pwt=$_POST['passwordtoo'];
$uid=$_POST['uid'];
$sql="select * from user where id=$uid";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($result);
$ipw=$row['password'];

if($ipw==$opw){
	if($pw==$pwt){
		$sql1="update user set password=$pw where id=$uid";
		$result1=mysqli_query($link,$sql1);
		echo "<script>alert('修改成功！');location.href='../index.php';</script>";
	} else {
		echo "<script>alert('两次密码不一致！');history.go(-1);</script>";
	}
}else{
	echo "<script>alert('原密码错误！');history.go(-1);</script>";
}
?>