<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>小窝网</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<script>
	function up(a){
		a.style.bottom="0";
		a.style.lineHeight="350px";
		}
	function down(a){
		a.style.bottom="-300px";
		a.style.lineHeight="30px";
		}
</script>
<body>
	<div class="header">
		<div class="container">
			<div class="header-top">
				<div class="htitle"><h1><a href="#">小窝网</a></h1></div>
				<div class="hbtn">
					<ul>
					<li><a href="#">首页</a></li>
					<li><?php 
						session_start();
						if(isset($_SESSION['uid'])){
							echo "欢迎您";
							echo $_SESSION['username'];
						}else{
							$htmlCode="<a href='login.php'>登陆</a>";
							echo $htmlCode;
						}
					?></li>
					<li><a href="#">帮助</a></li>
					<li><a href="php/out.php">登出</a></li>
				</ul>
				</div>
				
			</div>
			<div class="slider">
				<div class="sli-inner">
					
					<ul class="infoList">
						<li><h2>欢迎进入一个小窝</h2><p>这是一个关于宠物与主人的故事</p></li>
						<li><h2>欢迎进入一个小窝</h2><p>这是一个温暖的小窝</p></li>
						<li><h2>欢迎进入一个小窝</h2><p>这是需要我们携手共建的家园</p></li>
					</ul>
					
				</div>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="banner">
			
		</div>
		<div class="about">
			<div class="container">
				<div class="about-title"><h2>关于</h2></div>
				<div class="about-img">
					<div class="col">
						<img src="img/col1.jpg" />
						<a href="pet-main.php"><div class="col-bottom" onmouseover="up(this)" onmouseout="down(this)">宠物领养</div></a>
					</div>
					
					<div class="col">
						<img src="img/col2.jpg" />
						<a href="pet-main.php"><div class="col-bottom" onmouseover="up(this)" onmouseout="down(this)">流浪宠物发布</div></a>
					</div>
					
					<div class="col">
						<img src="img/col3.jpg" />
						<a href="lostPet-main.php"><div class="col-bottom" onmouseover="up(this)" onmouseout="down(this)">走失宠物招领</div></a>
					</div>
					
				</div>
			</div>
			
		</div>
	</div>
	<div class="footer">
		<div class="container">
			<ul class="infoList">
				<li class="icon1">福州市鼓楼区</li>
				<li class="icon2">13950900000</li>
				<li class="icon3">364838439@qq.com</li>
			</ul>
		</div>
	</div>
<script type="text/javascript" src="static/jquery1.42.min.js"></script>
<script type="text/javascript" src="static/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript">
 jQuery(".sli-inner").slide({mainCell:".infoList",autoPage:true,effect:"left",autoPlay:true,scroll:1,vis:1,trigger:"click"});
</script>
</body>
</html>