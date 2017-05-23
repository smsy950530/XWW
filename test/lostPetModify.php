<?php

require_once ("include.php");
if(!isset($_SESSION['uid'])){
	header("Location:login.php");
	exit();
}
$id=$_GET['id'];
$sql="select * from lost_pet where id = $id";
$result=mysqli_query($link, $sql);
$row=mysqli_fetch_assoc($result);

$place=$row['place'];
$time=$row['time'];
$cate=$row['category'];
$prop=$row['property'];
$other=$row['other'];
$data=$row['bin_data'];
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
			<h2>走失宠物修改</h2>
		</div>
		<div class="cont-inner">
		<form method="post" action="php/lostPetModify.handle.php" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $id;?>">
			<div class="map">
				<iframe class="map" src="map/map.change.php"style="margin:20px auto;color:#fff;width:600px;height:400px; frameborder="0" scrolling="no" "></iframe>
			</div>
			<div class="col">
				<table>
					<tr class="inner-main">
						<td>插入图片：</td>
						<td><input type="file" name="lost-pet-modify"/></td>
					</tr>
					<tr class="inner-main">
						<td>走失地点：</td>
						<td><input type="text" name="place" id="map" value="<?php echo $place;?>"/></td>
					</tr>
					<tr class="inner-main">
						<td>走失时间：</td>
						<td><input type="date" name="time" value="<?php echo $time;?>" /></td>
					</tr>
					<tr class="inner-main">
						<td>宠物类型：</td>
						<td><input type="text" name="category" value="<?php echo $cate?>"/></td>
					</tr>
					<tr class="inner-main">
						<td>外表特征：</td>
						<td><input type="text" name="property" value="<?php echo $prop;?>"/></td>
					</tr>
					<tr class="inner-main">
						<td>其它：</td>
						<td><input type="text" name="other" value="<?php echo $other;?>"/></td>
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
			<input class="button" type="submit" value="修改" />
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