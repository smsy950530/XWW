<?php
require_once ("../include.php");

$username=$_SESSION['username'];
$pid=$_GET['id'];
$uid=$_SESSION['uid'];
$puid=$_POST['pet-user-id'];
$username=$_POST['username'];
$data=$_POST['bin-data'];
//查询oncheck表，是否存在同一个宠物的领养申请
$also="select * from oncheck where pid=$pid";
$query=mysqli_query($link, $also);
$end=mysqli_num_rows($query);
$sql="insert into oncheck(user_id,pid,puid,username,bin_data) values($uid,$pid,$puid,'$username','$data')";
//查询是不是本人领养
$per="select * from home_pet where id=$pid and uid=$uid";
$res=mysqli_query($link,$per);
$own=mysqli_num_rows($res);
//查询user表的isdata字段，是否填写个人信息
$che="select * from user where id=$uid";
$result1=mysqli_query($link, $che);
$res=mysqli_fetch_row($result1);
print_r($res[4]);
if($res[4]==0){
	echo "<script>alert('请填写真实信息!');window.location.href='../personalDataSubmit.php'</script>";
}else {
	if($own){
		echo "<script>alert('不能领养自己的宠物!');window.location.href='../pet-main.php'</script>";
	}else{
		if($end){
		echo "<script>alert('宠物正在被领养!');window.location.href='../pet-main.php'</script>";
	}else {
		$result=mysqli_query($link, $sql);
		if($result){
			echo "<script>alert('提交成功！');window.location.href='../pet-main.php'</script>";
		}else{
			echo "<script>alert('提交失败！');window.location.href='../pet-main.php'</script>";
		}
	}
	}
}


