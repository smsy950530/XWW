<?php 
require_once 'include.php';

if(!isset($_SESSION['uid'])){
	header("Location:login.php");
	exit();
}
$sql="select * from lost_pet";
$result=mysqli_query($link, $sql);

if($result&&mysqli_num_rows($result))	{
	while($row=mysqli_fetch_assoc($result)){
		$data[]=$row;
	}	
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>小窝网</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/lostPet-main.css">
<link rel="stylesheet" type="text/css" href="static/pageGroup.css">
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
					<li><a href="index.php">返回</a></li>
					<li><a href="php/out.php">登出</a></li>
				</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="cont-inner">
			<div class="cont-title">
				<h2>走失宠物招领</h2>
			</div>
			<ul class="news">
<?php 
	if(!empty($data)){
		foreach($data as $value){
?>	
			<li>
			<div class="int-inner">
				<div class="top" id="first">
					<a href="lost-pet-detail.php?id=<?php echo $value['id']?>">
						<img src="<?php echo $value['bin_data'];?>"/>
					</a>
				</div>
				<div class="bottom">
					<p>走失时间：<?php echo $value['time'];?><br/>走失地点：<?php echo $value['place'];?><br/>特征：<?php echo $value['property'];?>
					</p>
				</div>
			</div>
			</li>
<?php }}?>
			</ul>
		</div>
		<div class="page">
			<input type="hidden" id="start_page">
	        <input type="hidden" id="current_page" />
	        <input type="hidden" id="show_per_page" />
	        <input type="hidden" id="end_page">
	     
			<div id="pageGro" class="cb">
			    <div class="pagestart">首页</div>
				<div class="pageUp">上一页</div>
			    <div class="pageList">
			        <ul>
			            <li>1</li>
			            <li>2</li>
			            <li>3</li>
			            <li>4</li>
			            <li>5</li>
			        </ul>
			    </div>
			    <div class="pageDown">下一页</div>
			    <div class="pageend">尾页</div>
			</div>

		</div>
		<div class="cont-btn">
			<input type="button" class="button" value="发布" onclick="location.href='lostPetSubmit.php'" />
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
<script type="text/javascript" src="static/jquery1.42.min.js"></script>
<script type="text/javascript" src="static/pageGroup1.js"></script>
</body>
</html>