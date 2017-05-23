<?php
require ("../include.php");
$filename=$_FILES['lost-pet-modify']['name'];
$data=$_FILES['lost-pet-modify']['tmp_name'];
$id=$_POST['id'];

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

$sql="update lost_pet set bin_data='$n',category='$cate',place='$place',time='$time',property='$property',other='$other' where id =$id";
$result=mysqli_query($link, $sql);
if($result){
	echo "<script>alert('宠物修改成功！');window.location.href='../lostPet-main.php';</script>";
}else{
	echo "<script>alert('宠物修改失败！');history.go(-1);</script>";
}
?>