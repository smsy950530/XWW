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
			<h2>注册</h2>							
		</div>
		<form method="post" action="php/signin.handle.php">
		<div class="cont-inner">
			<ul>
				<li>用户名：<input type="text" name="username" id="username" /></li>	
				<li>密码：<input type="password" name="password" required="true" id="password" /></li>
				<li>确认密码：<input type="password" name="passwordtoo" required="true" id="passwordtoo" onchange="check()"><span id="tishi"></span></li>
			</ul>
			<div class="cont-btn">
				<input class="button"type="submit" name="submit" value="注册" />
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
<script>
	function check() {
		var a=document.getElementById("password").value;
		var b=document.getElementById("passwordtoo").value;
		if(a!=b) {
			
			document.getElementById("tishi").innerHTML="两次密码不一致";
			return false;
		}
		else {
			document.getElementById("tishi").innerHTML="两次密码相同";
			return true;
		}
		
	}
</script>
</body>
</html>