<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<style type="text/css">
		body, html{width: 100%;height: 100%;margin:0;font-family:"微软雅黑";font-size:14px;}
		#allmap {width:100%;height:500px;}
	</style>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=BNvwzx4vXN5L1d9wbNGgZNjXFwifBf0K"></script>
	<title>逆地址解析</title>
</head>
<body>
	
	<div id="allmap"></div>
	<p>点击地图展示详细地址</p>
	
</body>
</html>
<script type="text/javascript">
	// 百度地图API功能
	var map = new BMap.Map("allmap");
	
	var point = new BMap.Point(116.331398,39.897445);
	map.centerAndZoom(point,14);
	var geoc = new BMap.Geocoder();    
	var a;
	var b;
	
	map.addEventListener("click", function(e){        
		var pt = e.point;
		geoc.getLocation(pt, function(rs){
			var addComp = rs.addressComponents;
			alert(addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber);
		});        
	});
	
	setTimeout(function(){
		map.setZoom(16);   
	}, 2000); 
	map.enableScrollWheelZoom(true);
	//获取经纬度
	function get(){
			a=parent.document.getElementById('jing').value;
			b=parent.document.getElementById('wei').value;
			
		}
	get();
	function theLocation(){
		
			map.clearOverlays(); 
			var new_point = new BMap.Point(a,b);
			var marker = new BMap.Marker(new_point);  // 创建标注
			map.addOverlay(marker);              // 将标注添加到地图中
			map.panTo(new_point);      
			
	}
	theLocation();
	
</script>
