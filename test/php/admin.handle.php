<?php
require_once ("../include.php");
$mes=$_POST['submit'];
$pid=$_GET['pid'];
if ($mes=='拒绝'){
	$sql="delete from pet where id=$pid";
	$result=mysqli_query($link, $sql);
	
	if ($result){
		echo "<script>alert('成功！');window.location.href='../admin/admin.php'</script>";
	}else {
		echo "<script>alert('失败！');window.location.href='../admin/admin.php'</script>";
	}
	
}else {
	$che="select * from pet where id=$pid";
	$result=mysqli_query($link, $che);
	$row=mysqli_fetch_assoc($result);
	if ($row){
		$uid=$row['uid'];
		$data=$row['bin_data'];
		$cate=$row['category'];
		$place=$row['place'];
		$sex=$row['sex'];
		$age=$row['age'];
		$vacc=$row['vacc'];
		$mes=$row['message'];
//将审核信息表pet中数据提取到home_pet中，并删除pet数据		
		$add="insert into home_pet(uid,bin_data,category,place,sex,age,vacc,message)
		values($uid,'$data','$cate','$place','$sex',$age,'$vacc','$mes')";
		$res=mysqli_query($link, $add);
		if ($res){
			$sql="delete from pet where id=$pid";
			$del=mysqli_query($link, $sql);
			if($del){
				echo "<script>alert('成功！');window.location.href='../admin/admin.php'</script>";
			}else {
				echo "<script>alert('失败！');window.location.href='../admin/admin.php'</script>";
			}
			
		}else {
			echo "添加失败。";
		}
		
	} else {
		echo "读取失败。";
	}
	
}