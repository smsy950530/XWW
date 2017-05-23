<?php
	require_once("../connect.php");
//注册用户
	mysqli_query($link,'set names utf8 ');
	if(!(isset($_POST['username'])&&(!empty($_POST['username'])))){
		echo "<script>alert('用户名不能为空');window.location.href='article.add.php';</script>";
	}
	$username = $_POST['username'];
	$password = $_POST['password'];
//查询数据库，用户名是否被注册
	$sql="select * from user where username = $username";
	$result=mysqli_query($link, $sql);
	if($result){
		echo "<script>alert('用户已存在');history.go(-1);</script>";
	} else {
		$insert = "insert into user(username,password) values('$username','$password')";
		if(mysqli_query($link,$insert)){
			echo "<script>alert('注册成功');window.location.href='../login.php';</script>";
		}else{
			echo "<script>alert('注册失败');window.location.href='../zhuce.php';</script>";
		}
	}
	
?>