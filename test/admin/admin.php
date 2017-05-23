<?php
require_once '../include.php';
if(!isset($_SESSION['uid'])){
	header("Location:../login.php");
	exit();
}
if($_SESSION['uid']!=1){
	header("Location:../index.php");
	exit();
}
$uid=$_SESSION['uid'];
$username=$_SESSION['username'];
$sql="select * from pet ";
$result=mysqli_query($link, $sql);
if($result&&mysqli_num_rows($result))	{
			while($row=mysqli_fetch_assoc($result)){
				$data[]=$row;
			}
		}
//获取用户信息
$sql5="select * from user_data where uid=$uid";
$result5=mysqli_query($link, $sql5);
$res5=mysqli_fetch_row($result5);
//获取家养宠物信息
$sql = "select * from home_pet";
$result = mysqli_query ( $link, $sql );
if ($result && mysqli_num_rows ( $result )) {
	while ( $row = mysqli_fetch_assoc ( $result ) ) {
		$data [] = $row;
	}
}
//获取流浪宠物信息
$sql1 = "select * from stary_pet";
$result1 = mysqli_query ( $link, $sql1 );
if ($result1 && mysqli_num_rows ( $result1 )) {
	while ( $row1 = mysqli_fetch_assoc ( $result1 ) ) {
		$data1 [] = $row1;
	}
}
//获取走失宠物信息
$sql2 = "select * from lost_pet";
$result2 = mysqli_query ( $link, $sql2 );
if ($result2 && mysqli_num_rows ( $result2 )) {
	while ( $row2 = mysqli_fetch_assoc ( $result2 ) ) {
		$data2 [] = $row2;
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>小窝网</title>
<link rel="stylesheet" type="text/css" href="../static/pageGroup.css">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="stylesheet" type="text/css" href="../css/personal.css">
<link rel="stylesheet" type="text/css" href="../static/bootstrap.min.css">
</head>
<script>
	function act (a){
		a.style.background="#ccc";
		}
	function act2 (a){
		a.style.background="#B7E9C4";
		}
	function Tab(num)
	{
	    var i;
	    for(i=1;i<=4;i++)
	    {
	        if(i==num)
	           document.getElementById("d"+i).style.display="block";
	         else
	           document.getElementById("d"+i).style.display="none";
	    }
	}
	function Tab1(num)
	{
	    var i;
	    for(i=1;i<=4;i++)
	    {
	        if(i==num)
	           document.getElementById("t"+i).style.display="block";
	         else
	           document.getElementById("t"+i).style.display="none";
	    }
	}

</script>
<body>
	<div class="header">
		<div class="container">
			<div class="header-top">
				<div class="htitle"><h1><a href="#">小窝网</a></h1></div>
				<div class="hbtn">
					<ul>
					<li><a href="../index.php">首页</a></li>
					<li><a href="#">帮助</a></li>
					<li><a href="../login.php">登出</a></li>
				</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="container">
			<div class="cont-title">
				<h2>管理员中心	</h2>
			</div>
			<div class="cont-inner">
				<div class="inner-col">
					<ul>
						<a href="#"><li onmouseover="act(this)" onmouseout="act2(this)" onclick="Tab(1)">个人资料</li></a>
						<a href="#"><li onmouseover="act(this)" onmouseout="act2(this)" onclick="Tab(2)">审核信息</li></a>
						<a href="#"><li onmouseover="act(this)" onmouseout="act2(this)" onclick="Tab(3)">其他信息</li></a>
					</ul>
				</div>
				<div class="grzl" id="d1">
					<ul>
						<li>真实姓名：<span><?php echo $res5[1]?></span></li>
						<li>性别：<span><?php echo $res5[2]?></span></li>
						<li>地址：<span><?php echo $res5[3]?></span></li>
						<li>联系电话：<span><?php echo $res5[4]?></span></li>
					</ul>
				</div>
				<div class="fbxx" id="d2">
<?php 
	if(!empty($data)){
		foreach($data as $value){
?>
			<form method="post" action="../php/admin.handle.php?pid=<?php echo $value['id']?>">
			
			<div class="inner">
				<div class="col1l">
					<a href="#"><img src="../<?php echo $value['bin_data'];?>"></a>
				</div>
				<div class="col1r">
					<li>宠物种类：<?php echo $value['category']?></li>
					<li>上架用户：<?php echo $username?></li>
					<input type="submit" name="submit" value="同意"/>
					<input type="submit" name="submit" value="拒绝"/>
				</div>
			</div>
			</form>
<?php 
	}}
?>
				</div>
				<div class="qtxx" id="d3">
					<div class="qtxx-title">
						<ul>
							<a href="#" onclick="Tab1(1)"><li>家养宠物</li></a>
							<a href="#" onclick="Tab1(2)"><li>流浪宠物</li></a>
							<a href="#" onclick="Tab1(3)"><li>走失宠物</li></a>
						</ul>
					</div>

					<div class="col1" id="t1">
<?php
if (! empty ( $data )) {
	foreach ( $data as $value ) {
?>
						<div class="col1-inner">
							<div class="col1l">
								<a href="../homepet.root.php?id=<?php echo $value['id']?>">
									<img src="../<?php echo $value['bin_data'];?>">
								</a>
							</div>
							<div class="col1r">
								<ul>
									<li>品种：<?php echo $value['category'];?></li>
									<li>地址：<?php echo $value['place'];?></li>
									<li>疫苗注射情况：<?php echo $value['vacc'];?></li>
									<a href="../homePetModify.php?id=<?php echo $value['id']?>">修改</a> 
									<a href="../php/pet.del.handle.php?id=<?php echo $value['id']?>">删除</a>
								</ul>
							</div>
						</div>
<?php }}?>
					</div>
					<div class="col2" id="t2" style="display:none">
<?php
if (! empty ( $data1 )) {
	foreach ( $data1 as $value1 ) {
?>
						<div class="col2-inner">
							<div class="col2l">
								<a href="../pet-detail.php?id=<?php echo $value1['id'];?>">
									<img src="../<?php echo $value1['bin_data'];?>">
								</a>
							</div>
							<div class="col2r">
								<ul>
									<li>宠物种类：<?php echo $value1['category'];?></li>
									<li>发现地点：<?php echo $value1['place'];?></li>
									<li>安全情况：<?php echo $value1['safe'];?></li>
									<a href="../pet.modify.php?id=<?php echo $value1['id']?>">修改</a> 
									<a href="../php/staryPet.del.handle.php?id=<?php echo $value1['id']?>">删除</a>
								</ul>
							</div>
						</div>
<?php }}?>
					
					</div>
					<div class="col3" id="t3" style="display:none">
<?php
if (! empty ( $data2 )) {
	foreach ( $data2 as $value2 ) {
?>
					<div class="col3-inner">
						<div class="col3l">
							<a href="../lost-pet-detail.php?id=<?php echo $value2['id'];?>">
								<img src="../<?php echo $value2['bin_data'];?>">
							</a>
						</div>
						<div class="col3r">
							<ul>
								<li>宠物品种：<?php echo $value2['category'];?></li>
								<li>走失地址：<?php echo $value2['place'];?></li>
								<li>走失时间：<?php echo $value2['time'];?></li>
								<li>外貌特征：<?php echo $value2['property'];?></li>
								<a href="../lostPetModify.php?id=<?php echo $value2['id']?>">修改</a> 
								<a href="../php/lostPet.del.handle.php?id=<?php echo $value2['id']?>">删除</a>
							</ul>
						</div>
					</div>
<?php }}?>
					</div>
				</div>
			</div>
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
<script type="text/javascript" src="../static/jquery1.42.min.js"></script>
<script type="text/javascript" src="../static/pageGroup1.js"></script>
<script type="text/javascript" src="../static/pageGroup2.js"></script>
</body>
</html>