<?php 
require_once("include.php");

if(!isset($_SESSION['uid'])){
	header("Location:login.php");
	exit();
}
mysqli_query($link,'set names utf8 ');
$pid=$_GET['id'];
$uid=$_SESSION['uid'];
$username=$_SESSION['username'];

$sql="select * from home_pet where id=$pid";
$result=mysqli_query($link, $sql);
$row=mysqli_fetch_assoc($result);
	
	$data=$row['bin_data'];
	
	$cate=$row['category'];
	$place=$row['place'];
	$sex=$row['sex'];
	$age=$row['age'];
	$vacc=$row['vacc'];
	$mes=$row['message'];
	$puid=$row['uid'];
//查询评论
$sql1="select * from comment where pid=$pid";
$result1=mysqli_query($link, $sql1);
		if($result1&&mysqli_num_rows($result1))	{
			while($row1=mysqli_fetch_assoc($result1)){
				$data1[]=$row1;
			}
		}
//查找发布者
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
			<div class="main-title"><h2>宠物详情</h2><h5>发布者：<?php echo $row2['username'];?></h5></div>

			<form method="post" action="php/get.handle.php?id=<?php echo $pid ?>">
				<input type="hidden" name="bin-data" value="<?php echo $data?>" />
				<input type="hidden" name="pet-user-id" value="<?php echo $puid?>" />
				<input type="hidden" name="username" value="<?php echo $username?>" />
				<div class="main-img"><img src="<?php echo $data?>"></div>
				<div class="main-inner">
					<ul>
						<li>种类：<?php echo $cate?></li>
						<li>地点：<?php echo $place?></li>
						<li>性别：<?php echo $sex?></li>
						<li>年龄：<?php echo $age?></li>
						<li>是否注射疫苗：<?php echo $vacc?></li>
						<li>特征：<?php echo $mes?></li>
					</ul>
				</div>
				<div class="main-btn">
					<input class="button" type="submit" value="领养">
				</div>
			</form>
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
				<span id="time">时间：<?php echo $value1['time'] ?></span>
				<span id="del"> <a href="php/pinglun.del.php?id=<?php echo $value1['id']?>"><input type="button" value="删除"></a></span>
			</div>
<?php }} ?>
		</div>
		<div class="pinglun">
			<form method="post" action="php/pinglunSubmit.handle.php">
				<input type="hidden" name="pid" value="<?php echo $pid?>"/>
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