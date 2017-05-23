<?php 
require_once ("include.php");

if(!isset($_SESSION['uid'])){
	header("Location:login.php");
	exit();
}
$id=$_GET['id'];
$uid=$_SESSION['uid'];
$username=$_SESSION['username'];

$sql="select * from stary_pet where id = $id";
$result=mysqli_query($link, $sql);
$row=mysqli_fetch_assoc($result);
$puid=$row['uid'];
//查询评论
$sql1="select * from stary_comment where pid=$id";
$result1=mysqli_query($link, $sql1);
		if($result1&&mysqli_num_rows($result1))	{
			while($row1=mysqli_fetch_assoc($result1)){
				$data1[]=$row1;
			}
		}
//查询发布者
$sql2="select * from user where id=$puid";
$result2=mysqli_query($link, $sql2);
$row2=mysqli_fetch_assoc($result2);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>小窝网</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/pet-detail.css">
<link rel="stylesheet" type="text/css" href="css/staryPet-detail.css">
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
		<div class="cont-main">
			<div class="main-title"><h2>流浪宠物详情</h2><h5>发布者：<?php echo $row2['username'];?></h5></div>
			
				<input type="hidden" name='jing' id='jing' value="<?php echo $row['jing_du']?>"/>
			
				<input type="hidden" name='wei' id='wei' value="<?php echo $row['wei_du']?>"/>
				<div class="main-map">
					<iframe src="map/map.php" width="600" height="300" frameborder="0" scrolling="no" style="text-align:center;"></iframe>
				</div>
				<div class="main-img"><img src="<?php echo $row['bin_data']?>"></div>
				<div class="main-inner">
					<ul>
						<li>宠物种类：<?php echo $row['category'];?></li>
						<li>发现地点：<?php echo $row['place'];?></li>
						<li>安全情况：<?php echo $row['safe'];?></li>
						<li>其他信息：<?php echo $row['message'];?></li>
						
					</ul>
				</div>
				
		
		</div>
		<div class="cont-com">
<?php 
		if(!empty($data1)){
			foreach($data1 as $value1){
	?>
			<div class="com-user">
				用户：<?php echo $value1['username']?>
			</div>
			<div class="com-main">
				评论：<?php echo $value1['message']?>
			</div>
<?php }} ?>
		</div>
		<div class="pinglun">
			<form method="post" action="php/staryPinglunSubmit.handle.php">
				<input type="hidden" name="pid" value="<?php echo $id?>"/>
				<input type="hidden" name="uid" value="<?php echo $uid?>"/>
				<input type="hidden" name="username" value="<?php echo $username?>" />
				<div class="pinglun_text">
					<textarea name="message"></textarea>
				</div>
				<div class="pinglun_btn">
					<input type="submit" class="button" value="提交"/>
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