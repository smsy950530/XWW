<?php
require_once ("../include.php");
//发布流浪宠物信息
$cate=$_POST['category'];
$place=$_POST['place'];
$safe=$_POST['safe'];
$mes=$_POST['message'];
$jd=$_POST['jing'];
$wd=$_POST['wei'];
$uid=$_SESSION['uid'];

$data=$_FILES['stary-pet-submit']['tmp_name'];
$filename=$_FILES['stary-pet-submit']['name'];
//移动图片
$destination="../uploads/".$filename;
move_uploaded_file($data, $destination);
$n="uploads/".$filename;

$sql="insert into stary_pet(uid,bin_data,category,place,safe,message,jing_du,wei_du) 
values($uid,'$n','$cate','$place','$safe','$mes',$jd,$wd)";

$result=mysqli_query($link, $sql);

if($result){
	echo "<script>alert('发布成功！');window.location.href='../pet-main.php'</script>";
}else {
	echo "<script>alert('发布失败！');history.go(-1);</script>";
}