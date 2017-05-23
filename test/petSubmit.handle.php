<?php
require_once("include.php");
header("content-type:text/html;charset=utf-8");

$filename=$_FILES['pet-submit']['name'];
$data=$_FILES['pet-submit']['tmp_name'];

$username=$_SESSION['username'];
$uid=$_SESSION['uid'];
$cate=$_POST['category'];
$place=$_POST['place'];
$sex=$_POST['sex'];
$age=$_POST['age'];
$vacc=$_POST['vacc'];
$message=$_POST['message'];

$destination="uploads/".$filename;
move_uploaded_file($data, $destination);
$insert="insert into pet(uid,bin_data,category,place,sex,age,vacc,message)
values($uid,'$destination','$cate','$place','$sex',$age,'$vacc','$message')";
$result=mysqli_query($link, $insert);


		
		
		
		if($result){
			
			echo "<script>alert('上架请求成功');window.location.href='../pet-main.php';</script>";
		}else {
			echo "<script>alert('上架失败');window.location.history(-1); </script>";
		}
			
?>