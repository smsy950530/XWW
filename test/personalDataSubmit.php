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
<link rel="stylesheet" type="text/css" href="css/personDataSubmit.css">
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="header-top">
				<div class="htitle"><h1><a href="#">小窝网</a></h1></div>
				<div class="hbtn">
					<ul>
					<li><a href="index.php">首页</a></li>
					<li><a href="#">帮助</a></li>
					<li><a href="php/out.php">登出</a></li>
				</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="cot-title">
			<h2>真实信息填写</h2>
		</div>
		<div class="cot-inner">
			<form method="post" action="php/personalSub.handle.php" onsubmit="checkform()">
				<ul>
					<li>真实姓名：<span><input id="real-name" type="text" name="real-name" /></span></li>
					<li class="tc">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：<span><input id="sex" type="text" name="sex" /></span></li>
					<li class="tc">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址：<span><input id="place" type="text" name="place" /></span></li>
					<li>联系电话：<span><input id="phone" type="text" name="phone" /></span></li>
				</ul>
				<div>
					<input class="button" type="submit" name="submit" value="提交"/>	
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