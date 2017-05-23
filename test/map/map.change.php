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
	<div id="r-result">
	<div>城市名: <input id="cityName" type="text" style="width:100px; margin-right:10px;" />
		<input type="button" value="查询" onclick="theLocation()" /></div>
		<input type="text" name="map" id="map" value=""/><input type="text" id="jing_du"/><input type="text" id="wei_du"/><input type="button" value="确认" onclick="javascript:get()"/>
	</div>
	<div id="allmap"></div>
	<p>点击地图展示详细地址</p>
	
</body>
</html>
<script type="text/javascript">
	// 百度地图API功能
	var map = new BMap.Map("allmap");
	var point = new BMap.Point(116.331398,39.897445);
	map.centerAndZoom(point,15);
	var geoc = new BMap.Geocoder();    
	var mapid;
	var stary;
	var jingdu;
	var weidu;
	var jing_du;
	var wei_du;
	var a;
	var b;
	map.addEventListener("click", function(e){        
		var pt = e.point;
		geoc.getLocation(pt, function(rs){
			var addComp = rs.addressComponents;
			//alert(addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber);
			mapid=addComp.province+ addComp.city+ addComp.city+ addComp.district+ addComp.street+ addComp.streetNumber;
			
			var mapv=document.getElementById("map");
			mapv.setAttribute('value',mapid);
			
		});        
	});
	//鼠标点击拾取坐标
	map.addEventListener("click",function(e){
		//alert(e.point.lng + "," + e.point.lat);
		jingdu=document.getElementById('jing_du');
		jingdu.setAttribute('value',e.point.lng);
		weidu=document.getElementById('wei_du');
		weidu.setAttribute('value',e.point.lat);
		
	});
	
	setTimeout(function(){
		map.setZoom(14);   
	}, 2000); 
	map.enableScrollWheelZoom(true);
	function get(){
		var stary=parent.document.getElementById('map');
		stary.setAttribute('value',mapid);
		a=document.getElementById('jing_du').value;
		b=document.getElementById('wei_du').value;
		jing_du=parent.document.getElementById('jing_du');
		jing_du.setAttribute('value',a);
		wei_du=parent.document.getElementById('wei_du');
		wei_du.setAttribute('value',b);
	}
	function theLocation(){
		var city = document.getElementById("cityName").value;
		if(city != ""){
			map.centerAndZoom(city,11);      // 用城市名设置地图中心点
		}
	}

	
</script>
