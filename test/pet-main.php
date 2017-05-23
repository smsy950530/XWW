<?php 
		require_once 'include.php';
		
		if(!isset($_SESSION['uid'])){
			header("Location:login.php");
			exit();
		}
		$sql="select * from home_pet  order by id asc";
		$result=mysqli_query($link, $sql);
		if($result&&mysqli_num_rows($result))	{
			while($row=mysqli_fetch_assoc($result)){
				$data[]=$row;
			}
		
			
		}
		$sql1="select * from stary_pet order by id asc";
		$result1=mysqli_query($link, $sql1);
			
		if($result1&&mysqli_num_rows($result1))	{
			while($row1=mysqli_fetch_assoc($result1)){
				$data1[]=$row1;
			}
				
				
		}		
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>小窝网</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/pet-main.css">
<link rel="stylesheet" type="text/css" href="static/pageGroup.css">
</head>
<script>
	function up (a){
		a.style.opacity="0.8";
		a.style.top="20px"
		}
	function down (a){
		a.style.opacity="0";
		a.style.top="0px"
		}
</script>
<body>
	<div class="header">
		<div class="container">
			<div class="header-top">
				<div class="htitle"><h1><a href="#">小窝网</a></h1></div>
				<div class="hbtn">
					<ul>
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
					<li><a href="index.php">首页</a></li>
					<li><a href="#">帮助</a></li>
					<li><a href="php/out.php">登出</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="cont-inner">
			<div class="cotinnerl">
				<div class="innerl-title">
					<h2>宠物领养</h2>
				</div>
				
				<div class="innerl-col">
				<ul class="news">
					
<?php 
if(!empty($data)){
foreach($data as $value){
?>
					<li>
					<div class="innerl-main bd" >
						<img src="<?php echo $value['bin_data']?>"/></a>
						<div class="innerl-bottom" onmouseover="up(this)" onmouseout="down(this)">
							<a href="pet-detail.php?id=<?php echo $value['id']?>">
							<ul>
								<li>种类：<?php echo $value['category']?></li>
								<li>地点：<?php echo $value['place']?></li>
								<li>年龄：<?php echo $value['age']?></li>
								<li>疫苗注射情况：<?php echo $value['vacc']?></li>
							</ul>
							</a>
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
				
			</div>
			<div class="cotinnerr">
				<div class="innerr-title">
					<h2>流浪宠物发布</h2>
				</div>
				<div class="contr-inner">
<?php 
	if(!empty($data1)){
	foreach($data1 as $value1){
?>
					<div class="innerr-main">
						<a href="staryPet-detail.php?id=<?php echo $value1['id']?>">
						<img src="<?php echo $value1['bin_data']?> "></a>
							<ul>
								<li>安全情况：<?php echo $value1['safe']?></li>	
								<li>地点：<?php echo $value1['place']?></li>	
								<li>种类：<?php echo $value1['category']?></li>	
							</ul>
						</a>
					</div>
<?php }}?>				
				</div>
			</div>
			<div class="cot1-btn">
				<input type="button" class="button" value="上架" onclick="location.href='homePetSubmit.php'" />
			</div>
			<div class="cot2-btn">
				<input type="button" class="button" value="发布" onclick="location.href='staryPetSubmit.php'" />
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
<script type="text/javascript" src="static/jquery1.42.min.js"></script>
<script type="text/javascript" src="static/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="static/pageGroup.js"></script>

<script type="text/javascript">
jQuery(".cotinnerr").slide({mainCell:".contr-inner",autoPlay:true,effect:"topMarquee",vis:3,interTime:50});

</script>	
</body>
</html>