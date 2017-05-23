<?php
session_start();
if(!isset($_SESSION['uid'])){
	header("Location:login.php");
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>小窝网</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/lostPetSubmit.css">
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
					<li><a href="lostPet-main.php">返回</a></li>
					<li><a href="php/out.php">登出</a></li>
				</ul>
				</div>		
			</div>
		</div>
	</div>
	<div class="content">
		<div class="cont-title">
			<h2>走失宠物招领</h2>
		</div>
		<div class="cont-inner">
		<form method="post" action="php/lostPetSubmit.handle.php" enctype="multipart/form-data">
			<div class="map">
				<iframe class="map" src="map/map.change.php"style="margin:20px auto;color:#fff;width:600px;height:400px; frameborder="0" scrolling="no" "></iframe>
			</div>
			<div class="col">
				<table>
					<tr class="inner-main">
						<td>插入图片：</td>
						<td><input type="file" name="lost-pet-submit"/></td>
					</tr>
					<tr class="inner-main">
						<td>走失地点：</td>
						<td><input type="text" name="place" id="map" value=""/></td>
					</tr>
					<tr class="inner-main">
						<td>走失时间：</td>
						<td><input type="date" name="time"/></td>
					</tr>
					<tr class="inner-main">
						<td>宠物类型：</td>
						<td><input type="text" name="category"/></td>
					</tr>
					<tr class="inner-main">
						<td>外表特征：</td>
						<td><input type="text" name="property"/></td>
					</tr>
					<tr class="inner-main">
						<td>其它：</td>
						<td><input type="text" name="other"/></td>
					</tr>
					<tr class="inner-main">
						<td>经度：</td>
						<td><input type="text" name="jing" id="jing_du" value=""/></td>
					</tr>
					<tr class="inner-main">
						<td>纬度：</td>
						<td><input type="text" name="wei" id="wei_du" value=""/></td>
					</tr>
				</table>
			</div>
		<div class="cont-btn">
			<input class="button" type="submit" value="发布" />
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