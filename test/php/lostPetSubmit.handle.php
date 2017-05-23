<?php
require_once("../include.php");
header("content-type:text/html;charset=utf-8");

$filename=$_FILES['lost-pet-submit']['name'];
$data=$_FILES['lost-pet-submit']['tmp_name'];

$username=$_SESSION['username'];
$uid=$_SESSION['uid'];
$cate=$_POST['category'];
$t=$_POST['time'];
$place=$_POST['place'];
$property=$_POST['property'];
$other=$_POST['other'];
$jd=$_POST['jing'];
$wd=$_POST['wei'];
//将时间转化为字符串
$time=strval($t);
$destination="E:/demo/test/uploads/".$filename;
move_uploaded_file($data, $destination);
$n="uploads/".$filename;
//将走失宠物信息放入数据库
$insert="insert into lost_pet(uid,bin_data,category,place,time,property,other,jing_du,wei_du)
values($uid,'$n','$cate','$place','$time','$property','$other',$jd,$wd)";
$result=mysqli_query($link, $insert);

		
		if($result){
			
			echo "<script>alert('上架请求成功');window.location.href='../lostPet-main.php';</script>";
		}else {
			echo "<script>alert('上架失败');window.location.href='../lostPetSubmit.php' </script>";
		}
			
?>