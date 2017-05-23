<?php
require_once ("include.php");
if(!isset($_SESSION['uid'])){
	header("Location:login.php");
	exit();
}
$id=$_GET['id'];
$sql="select * from stary_pet where id=$id";
$result=mysqli_query($link, $sql);
$row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>小窝网</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/staryPetSubmit.css">
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
		<div class="cont-title"><h2>流浪宠物修改</h2></div>
		<div class="cont-inner">
		<form method="post" action="php/staryPetSubmit.handle.php" enctype="multipart/form-data">
			<div class="map">
				<iframe class="map" src="map/map.change.php"style="margin:20px auto;color:#fff;width:600px;height:400px; frameborder="0" scrolling="no" "></iframe>
			</div>
			<div class="col">
				<table >
					<tr class="inner-main">
						<td>插入图片：</td>
						<td><input type="file" name="stary-pet-modify" /></td>
					</tr>
					
					<tr class="inner-main">
						<td>宠物种类：</td>
						<td><input type="text" name="category" value="<?php echo $row['category'];?>"></td>
					</tr>
					<tr class="inner-main">
						<td>发现地点：</td>
						<td><input type="text" name="place" id="map" value="<?php echo $row['place'];?>"></td>
					</tr>
					<tr class="inner-main">
						<td>安全情况：</td>
						<td><input type="text" name="safe" value="<?php echo $row['safe'];?>"/></td>
					</tr>
					<tr class="inner-main">
						<td>其它信息：</td>
						<td><input type="text" name="message" value="<?php echo $row['message'];?>"/></td>
					</tr>
					<tr class="inner-main">
						<td>经度：</td>
						<td><input type="text" name="jing" id="jing_du" value="<?php echo $row['jing_du'];?>"/></td>
					</tr>
					<tr class="inner-main">
						<td>纬度：</td>
						<td><input type="text" name="wei" id="wei_du" value="<?php echo $row['wei_du'];?>"/></td>
					</tr>
				</table>
				<div class="inner-btn">
					<input class="button" type="submit" value="修改" />
				</div>
			
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