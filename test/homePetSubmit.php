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
					<li class="php">欢迎您<?php 
					$uid=$_SESSION['uid'];
				if ($_SESSION['policy']==1){
					$htmlCode="<a href=\"personal/personal.php?id=$uid\">";
					echo $htmlCode;
				} else {
					$htmlCode="<a href=\"admin/admin.php\">";
					echo $htmlCode;
				}
					?> <?php echo $_SESSION['username']?></a>
					</li>
					<li><a href="pet-main.php">返回</a></li>
					<li><a href="php/out.php">登出</a></li>
				</ul>
				</div>
				
			</div>
			
		</div>
	</div>
	<div class="content">
			<div class="cont-title">
				<h2>上架宠物</h2>
			</div>
			<div class="cont-inner">
			<form action="php/petSubmit.handle.php" method="post" enctype="multipart/form-data">
				<table>
					<tr class="inner-main">
						<td>插入图片：</td>
						<td><input type="file" name="pet-submit"></td>
					</tr>
					<tr class="inner-main">
						<td>种类：</td>
						<td><input type="text" name="category"/></td>
					</tr>
					<tr class="inner-main">
						<td>地点：</td>
						<td><input type="text" name="place"/></td>
					</tr>
					<tr class="inner-main">
						<td>性别：</td>
						<td><input type="text" name="sex"/></td>
					</tr>
					<tr class="inner-main">
						<td>年龄：</td>
						<td><input type="text" name="age"/></td>
					</tr>
					<tr class="inner-main">
						<td>是否注射疫苗：</td>
						<td><input type="text" name="vacc"/></td>
					</tr>
					<tr class="inner-main">
						<td>特征：</td>
						<td><input type="text" name="message"/></td>
					</tr>
				</table>
				<div class="cont-btn">
					<input class="button" type="submit" value="上架">
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