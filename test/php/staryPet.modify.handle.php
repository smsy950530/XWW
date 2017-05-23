<?php
require_once ("../include.php");
$id=$_GET['id'];
$cate=$_POST['category'];
$place=$_POST['place'];
$safe=$_POST['safe'];
$mes=$_POST['message'];
$jd=$_POST['jing'];
$wd=$_POST['wei'];
//修改流浪宠物信息
$data=$_FILES['stary-pet-modify']['tmp_name'];
$filename=$_FILES['stary-pet-modify']['name'];
//移动图片
$destination="../uploads/".$filename;
move_uploaded_file($data, $destination);
$n="uploads/".$filename;

$sql="update stary_pet set bin_data='$n',category='$cate',place='$place',safe='$safe',message='$mes',jing_du='$jd',wei_du=$wd where id =$id;";
$result=mysqli_query($link, $sql);
if($result){
	echo "<script>alert('修改成功！');window.location.href='../pet-main.php';</script>";
}else {
	echo "<script>alert('修改失败！');history.go(-1);</script>";
}
