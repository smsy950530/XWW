<?php 
require_once("include.php");

if(!isset($_SESSION['uid'])){
	header("Location:login.php");
	exit();
}
mysqli_query($link,'set names utf8 ');
$pid=$_GET['id'];
$uid=$_SESSION['uid'];
$username=$_SESSION['username'];

$sql="select * from home_pet where id=$pid";
$result=mysqli_query($link, $sql);
$row=mysqli_fetch_assoc($result);
	
	$data=$row['bin_data'];
	
	$cate=$row['category'];
	$place=$row['place'];
	$sex=$row['sex'];
	$age=$row['age'];
	$vacc=$row['vacc'];
	$mes=$row['message'];
	$puid=$row['uid'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>小窝网</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/homePetSubmit.css">
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="header-top">
				<div class="htitle"><h1><a href="#">小窝网</a></h1></div>
				<div class="hbtn">
					<ul>
					<li><a href="index.php">首页</a></li>
					<li><a href="#">登陆</a></li>
					<li><a href="#">帮助</a></li>
					<li><a href="php/out.php">登出</a></li>
				</ul>
				</div>
				
			</div>
			
		</div>
	</div>
	<div class="content">
			<div class="cont-title">
				<h2>修改宠物</h2>
			</div>
			<div class="cont-inner">

			<form action="php/pet.modify.handle.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $pid ?>"/>
				<table>
					<tr class="inner-main">
						<td>插入图片：</td>
						<td><input type="file" name="pet-modify"></td>
					</tr>
					<tr class="inner-main">
						<td>种类：</td>
						<td><input type="text" name="category" value="<?php echo $cate?>" /></td>
					</tr>
					<tr class="inner-main">
						<td>地点：</td>
						<td><input type="text" name="place" value="<?php echo $place?>" /></td>
					</tr>
					<tr class="inner-main">
						<td>性别：</td>
						<td><input type="text" name="sex" value="<?php echo $sex?>" /></td>
					</tr>
					<tr class="inner-main">
						<td>年龄：</td>
						<td><input type="text" name="age" value="<?php echo $age?>" /></td>
					</tr>
					<tr class="inner-main">
						<td>是否注射疫苗：</td>
						<td><input type="text" name="vacc" value="<?php echo $vacc?>" /></td>
					</tr>
					<tr class="inner-main">
						<td>特征：</td>
						<td><input type="text" name="message" value="<?php echo $mes?>" /></td>
					</tr>
				</table>
				<div class="cont-btn">
					<input class="button" type="submit" value="修改">
				</div>
				</form>
		</div>
	</div>
	<div class="footer">
		<div class="container">
			<ul>
				<li class="icon1">福州市鼓楼区</li>
				<li class="icon2">13950900000</li>
				<li class="icon3">364838439@qq.com</li>
			</ul>
		</div>
	</div>
</body>
</html>