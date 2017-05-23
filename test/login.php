<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>小窝网</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
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
					<li><a href="#">关于</a></li>
				</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="cont-title">
			<h2>登陆</h2>							
		</div>
		<form method="post" action="php/login.handle.php">
		<div class="cont-inner">
			<ul>
				<li>用户名：<input type="text" name="username" id="username" /></li>	
				<li>密&nbsp;&nbsp;&nbsp;码：<input type="password" name="password" id="password" /></li>
			</ul>
			<div class="cont-btn">
				<input class="button"type="submit" name="submit" value="登陆" />
				<p><a href="signin.php">没有账号？请注册</a></p>
			</div>
		</div>
		</form>
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