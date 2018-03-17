<!--
	Author: sj
	Author URL: http://marsj.xyz
-->
<!DOCTYPE html>
<html>



<!-- Head -->
<head>

<title>sj天气预报系统</title>

<!-- For-Mobile-Apps -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Monaco Weather Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //For-Mobile-Apps -->

<!-- Index-Page-CSS -->	  <link rel="stylesheet" href="css/style.css"		 type="text/css" media="all">
<!-- Owl-Carousel-CSS --> <link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all">

<!-- Fonts -->
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" 						type="text/css" media="all">
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" type="text/css" media="all">
<!-- //Fonts -->

<!-- Font-Awesome-File-Links -->
<!-- CSS --> <link rel="stylesheet" href="css/font-awesome.css" 	 	 type="text/css" media="all">
<!-- TTF --> <link rel="stylesheet" href="fonts/fontawesome-webfont.ttf" type="text/css" media="all">
<!-- //Font-Awesome-File-Links -->


</head>
<!-- Head -->

<!-- Body -->
<body onload="startTime()">
<?php
$town=$_GET["town"];
include 'class.juhe.weather.php'; 
require_once "weather.php";
$appkey = '36af0ea617fa3b69e0da47d8e7531a94';
$weather = new weather($appkey); 
$cityWeatherResult = $weather->getWeather($town);  
if($cityWeatherResult['error_code'] == 0){  
    $data = $cityWeatherResult['result'];
}
else{
    echo "<script>alert('暂无<$town>有关数据,请查询其他城市');window.location.href='city.php?town=绍兴'</script>";
}
?>


	<!-- Heading -->
	<h1>sj天气预报系统</h1>



	<!-- Container -->
	<div class="container">
    <div class="content">
        <div class="city">          
            <select id="province">
                         
            </select>
           <select id="city">
               
           </select>
           <select id="town">
               
           </select>
            <input type="button" value="查询" class="citybtn" id="require" onclick="sendMsg()">
        </div> 
		<!-- Current-Weather-Widget -->
		<div class="weather-widget agileits w3layouts">
			<div class="place agileits w3layouts">

				<div class="city agileits-w3layouts agileits w3layouts">
					<p><?php echo $data['today']['city']; ?></p>
				</div>

				<div class="dmy agileits w3-agile w3layouts">
					<script type="text/javascript">
						var mydate=new Date()
						var year=mydate.getYear()
						if(year<1000)
						year+=1900
						var day=mydate.getDay()
						var month=mydate.getMonth()
						var daym=mydate.getDate()
						if(daym<10)
						daym="0"+daym
						var dayarray=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday")
						var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
						document.write(""+dayarray[day]+", "+montharray[month]+" "+daym+", "+year+"")
					</script>
				</div>

				<div id="txt"></div>
                
				<div class="w3temperatureaits agileits w3-agileits">
					<div class="w3temperatureaits-grid w3-agileits wthreetemp">
						<p><?php echo $data['sk']['temp']."° C";?></p>
					</div>
					<div class="w3temperatureaits-grid w3tempimg">
						<figure class="icons agileits w3layouts">
							<img src=<?php  echo getweatherbyname_sj($data,"0"); ?>  width="70" height="70"></img>
						</figure>
					</div>
					<div class="w3temperatureaits-grid w3-agile wthreestats">
						<ul>
							<li class="agiletemp agiletemppressure"><?php echo "温度：".$data['sk']['temp'];?></li>
							<li class="agiletemp wthree agiletemphumidity w3-agile"><?php echo "湿度：".$data['sk']['humidity'];?></li>
							<li class="agiletemp agileits-w3layouts agileinfo agiletempwind"><?php     echo "风向：".$data['sk']['wind_direction']."    （".$data['sk']['wind_strength']."）";?></li>
						</ul>
					</div>
					<div class="clear"></div>
				</div>

				<div id="owl-demo" class="owl-carousel agileits text-center">
					<div class="item w3threeitem w3threeitem1">
						<h3><?php  echo $data['future']['0']['date']; ?></h3>
						<h4><?php  echo $data['future']['0']['week']; ?></h4>
						<figure class="icons agileits-w3layouts agileits w3layouts">
							<img src=<?php  echo getweatherbyname_sj($data,"0"); ?>  width="70" height="70"></img>
						</figure>
						<h5><?php echo $data['future']['0']['weather']; ?></h5>
						<h6><?php echo $data['future']['0']['temperature']; ?></h6>
						
					</div>
					<div class="item w3threeitem agileinfo w3threeitem2">
						<h3><?php  echo $data['future']['1']['date']; ?></h3>
						<h4><?php  echo $data['future']['1']['week']; ?></h4>
						<figure class="icons wthree agileits w3layouts">
							<img src=<?php  echo getweatherbyname_sj($data,"1"); ?>  width="70" height="70"></img>
						</figure>
					<h5><?php echo $data['future']['1']['weather']; ?></h5>
						<h6><?php echo $data['future']['1']['temperature']; ?></h6>
					</div>
					<div class="item w3 w3threeitem w3threeitem3">
						<h3><?php  echo $data['future']['2']['date']; ?></h3>
						<h4><?php  echo $data['future']['2']['week']; ?></h4>
						<figure  class="icons agileits w3layouts">
							<img src=<?php  echo getweatherbyname_sj($data,"2"); ?>  width="70" height="70"></img>
						</figure>
						<h5><?php echo $data['future']['2']['weather']; ?></h5>
						<h6><?php echo $data['future']['2']['temperature']; ?></h6>
					</div>
					<div class="item w3threeitem w3threeitem4">
						<h3><?php  echo $data['future']['3']['date']; ?></h3>
						<h4><?php  echo $data['future']['3']['week']; ?></h4>
						<figure class="icons agileits w3layouts">
							<img src=<?php  echo getweatherbyname_sj($data,"3"); ?>  width="70" height="70"></img>
						</figure>
						<h5><?php echo $data['future']['3']['weather']; ?></h5>
						<h6><?php echo $data['future']['3']['temperature']; ?></h6>
					</div>
					<div class="item w3threeitem wthree agileinfo w3threeitem5">
						<h3><?php  echo $data['future']['4']['date']; ?></h3>
						<h4><?php  echo $data['future']['4']['week']; ?></h4>
						<figure class="icons agileits w3layouts">
							<img src=<?php  echo getweatherbyname_sj($data,"4"); ?>  width="70" height="70"></img>
						</figure>
						<h5><?php echo $data['future']['4']['weather']; ?></h5>
						<h6><?php echo $data['future']['4']['temperature']; ?></h6>
					</div>
					<div class="item w3 w3threeitem w3threeitem6">
						<h3><?php  echo $data['future']['5']['date']; ?></h3>
						<h4><?php  echo $data['future']['5']['week']; ?></h4>
						<figure class="icons agileits w3layouts">
							<img src=<?php  echo getweatherbyname_sj($data,"5"); ?>  width="70" height="70"></img>
						</figure>
						<h5><?php echo $data['future']['5']['weather']; ?></h5>
						<h6><?php echo $data['future']['5']['temperature']; ?></h6>
					</div>
					<div class="item w3l w3threeitem w3threeitem7">
						<h3><?php  echo $data['future']['6']['date']; ?></h3>
						<h4><?php  echo $data['future']['6']['week']; ?></h4>
						<figure class="icons agileits w3layouts">
							<img src=<?php  echo getweatherbyname_sj($data,"6"); ?>  width="70" height="70"></img>
						</figure>
						<h5><?php echo $data['future']['6']['weather']; ?></h5>
						<h6><?php echo $data['future']['6']['temperature']; ?></h6>
					</div>
				</div>

			</div>
		</div>
		<!-- //Current-Weather-Widget -->

	</div>
	<!-- //Container -->



	<!-- Footer -->
	<div class="footer">

		<!-- Copyright -->
		<div class="copyright ">
			<p> Design by marvelous_sj</a></p>
		</div>
		<!-- //Copyright -->

	</div>
	<!-- //Footer -->



	<!-- Custom-JavaScript-File-Links -->

		<!-- Default-JavaScript --> <script type="text/javascript" src="js/jquery-3.1.1.js"></script>

		<!-- Time-JavaScript -->
			<script>
				function startTime() {
					var today = new Date();
					var h = today.getHours();
					var m = today.getMinutes();
					var s = today.getSeconds();
					m = checkTime(m);
					s = checkTime(s);
					document.getElementById('txt').innerHTML = h + ":" + m + ":" + s;
					var t = setTimeout(startTime, 500);
				}
				function checkTime(i) {
					if (i < 10) {i = "0" + i};
					return i;
				}
			</script>
		<!-- //Time-JavaScript -->

	

		<!-- Owl-Carousel-JavaScript -->
			<script src="js/owl.carousel.js"></script>
			<script>
				$(document).ready(function() {
					$("#owl-demo").owlCarousel({
						autoPlay: 3000,
						items : 5,
						itemsDesktop : [1024,4],
						itemsDesktopSmall : [640,3]
					});
				});
			</script>
		<!-- //Owl-Carousel-JavaScript -->

	<!-- //Custom-JavaScript-File-Links -->

<script type="text/javascript">optionTemp='<option value="$(code)">$(name)</option>',p=$("#province"),c=$("#city"),t=$("#town")</script>

<script type="text/javascript">function addFavorite(){var e=window.location.href,t="360\u5929\u6c14",n=navigator.userAgent.toLowerCase().indexOf("mac")!=-1?"Command/Cmd":"CTRL";try{window.external.addFavorite(e,t)}catch(r){try{window.sidebar.addPanel(t,e,"")}catch(r){alert("\u60a8\u53ef\u4ee5\u5c1d\u8bd5\u901a\u8fc7\u5feb\u6377\u952e"+n+" + D \u52a0\u5165\u5230\u6536\u85cf\u5939~")}}return!1}function appendOption(e,t){e.children().remove();var n=new Array;for(var r=0;r<t.length;r++){var i=t[r][0],s=t[r][1],o=optionTemp.replace(/\$\(code\)/g,s).replace(/\$\(name\)/g,i);n.push(o)}e.append(n.join(""))}function selectOption(e,t){e.children("option").each(function(){var e=$(this);e.val()==t&&e.attr("selected","selected")})}function loadProvince(e){appendOption(p,e),selectOption(p,pCode)}function loadCity(e){appendOption(c,e),selectOption(c,cCode)}function loadTown(e){appendOption(t,e),selectOption(t,tCode)}function loadCity2(e){loadCity(e),c.trigger("change")}function dataFill(e,t){t.html(e)}function fillRealtime(e){var t=e.time,n=t.split(":")[0],r=t.split(":")[1];dataFill(n+" : "+r+" \u53d1\u5e03",$(".wethertime"));var i=e.weather.temperature;dataFill(i+"\u00b0",$("#temperature"));var s=e.weather,o=s.info;dataFill(o,$("#weathertype"));var u=s.humidity;dataFill(u,$("#humidity"));var a=e.wind,f=a.direct;dataFill(f,$("#winddir"));var l=a.power;dataFill(l,$("#windpower")),$(".wetherdetail").children("ul").show(),$("#cityinfo").show()}function fillForeast(e){var t=$("#foreast");t.children().remove();for(var n=0;n<5;n++){var r=e[n],i=r.date.split("-"),s=i[0],o=i[1].indexOf("0")==0?i[1].substr(1):i[1],u=i[2].indexOf("0")==0?i[2].substr(1):i[2],a="",f=$(this);if(n==0)a="\u4eca\u5929";else{var l=new Date(parseInt(s),parseInt(o)-1,parseInt(u));a="\u5468"+weekChina[l.getDay()]}var c=f.children(),h=r.info.day,p=r.info.night,d=h[1],v=h[1],m=d==v?d:d+"\u8f6c"+v,g=weatherClass[d]?weatherClass[d]:"icon-wuxinxi",y=h[2],b=p[2],w=h[4],E=foreastTemp.replace(/\$\(week\)/g,a).replace(/\$\(month\)/g,o).replace(/\$\(day\)/g,u).replace(/\$\(icon\)/g,g).replace(/\$\(weatherType\)/g,m).replace(/\$\(lowT\)/g,b).replace(/\$\(highT\)/g,y).replace(/\$\(windpower\)/g,w);t.append($(E))}}function fillAQI(e){var t=["zhongdu","\u91cd\u5ea6\u6c61\u67d3"];for(var n=0;n<aqiLevel.length;n++)if(e>=aqiLevel[n][0]&&e<aqiLevel[n][1]){t=alertMap[n];break}$("#aqi").attr("class","wethericon"),$("#aqi").addClass(t[0]),$("#aqi").html(t[1]+" "+e),$("#aqi").show()}function renderData(e){$("body").hide();var t=e.area[2][0],n=e.area[2][1];dataFill(t,$(".wethercity"));var r=e.realtime;fillRealtime(r);var i=r.weather.info;i=="\u9634"?$(".skinmore").hide():$(".skinmore").show();var s=skins[i]?skins[i]:"skin1";$("body").attr("class",s);var o=e.weather;fillForeast(o),e.pm25&&e.pm25.aqi?fillAQI(e.pm25.aqi):$("#aqi").hide(),$("body").show(),document.cookie="citycode="+n+"; "}function getCityCode(e){var t=e.area;pCode=t[0][1],cCode=t[1][1],tCode=t[2][1],setSelector(),loadWeather(tCode)}function setSelector(){$.getScript("http://cdn.weather.hao.360.cn/sed_api_area_query.php?grade=province&_jsonp=loadProvince"),$.getScript("http://cdn.weather.hao.360.cn/sed_api_area_query.php?grade=city&_jsonp=loadCity&code="+pCode),$.getScript("http://cdn.weather.hao.360.cn/sed_api_area_query.php?grade=town&_jsonp=loadTown&code="+cCode)}function noinfo(){$("#weathertype").html("\u6682\u65e0\u6570\u636e"),$("#temperature").html(""),$("#foreast").children().remove(),$(".wetherdetail").children("ul").hide(),$("#cityinfo").hide()}function codeselect(e){var t=(new Date).getTime(),n=parseInt(e)+(new Date).getTime(),r=[t,n];return r}function loadWeather(e){var t=codeselect(e);$.ajax("/api/weatherquery/querys?app=tq360&code="+e+"&t="+t[0]+"&c="+t[1],{dataType:"jsonp",jsonp:"_jsonp",jsonpCallback:"renderData",error:noinfo})}function setArea(){var e=document.cookie,t="";if(e){var n=e.split("; ");for(var r=0;r<n.length;r++){var i=n[r].split("="),s=i[0];if(s!="citycode")continue;t=i[1];break}}t?(pCode=t.substr(3,2),pCode=="01"||pCode=="02"||pCode=="03"||pCode=="04"?cCode=pCode+"01":cCode=t.substr(3,4),tCode=t,setSelector(),loadWeather(tCode)):$.getScript("http://weather.hao.360.cn/sed_api_weather_info.php?app=clockWeather&_jsonp=getCityCode")}function changeCity(){loadWeather(t.val())}var weekChina=["\u65e5","\u4e00","\u4e8c","\u4e09","\u56db","\u4e94","\u516d"],weatherClass={"\u6674":"icon-qing","\u591a\u4e91":"icon-duoyun","\u9634":"icon-yintian","\u96fe":"icon-wu","\u51b0\u96f9":"icon-bingbao","\u626c\u6c99":"icon-shachen","\u6c99\u5c18":"icon-shachen","\u6d6e\u5c18":"icon-shachen","\u973e":"icon-shachen","\u5927\u96e8-\u66b4\u96e8":"icon-dayu","\u96f7\u9635\u96e8":"icon-leizhenyu","\u9635\u96e8":"icon-zhenyu","\u96e8":"icon-xiaoyu","\u5c0f\u96e8":"icon-xiaoyu","\u4e2d\u96e8":"icon-zhongyu","\u5927\u96e8":"icon-dayu","\u66b4\u96e8":"icon-baoyu","\u96e8\u5939\u96ea":"icon-yujiaxue","\u9635\u96ea":"icon-chenxue","\u5c0f\u96ea":"icon-xiaoxue","\u96ea":"icon-xiaoxue","\u4e2d\u96ea":"icon-zhongxue","\u5927\u96ea":"icon-daxue","\u66b4\u96ea":"icon-baoxue","\u9635\u96ea":"icon-baoyu"},foreastTemp='<li><p class="colora">$(week) $(month)\u6708$(day)\u65e5</p><p class="icon-tu"><i class="$(icon)"></i><br>$(weatherType)</p><p class="otherinfo"><span>$(lowT)~$(highT)\u00b0</span>$(windpower)</p></li>',aqiLevel=[[0,50],[50,100],[100,150],[150,200],[200,300],[300,Number.MAX_VALUE]],alertMap=[["youxiu","\u7a7a\u6c14\u4f18"],["liang","\u7a7a\u6c14\u826f"],["qing","\u8f7b\u5ea6\u6c61\u67d3"],["zhong","\u4e2d\u5ea6\u6c61\u67d3"],["zhongdu","\u91cd\u5ea6\u6c61\u67d3"],["yanzhong","\u4e25\u91cd\u6c61\u67d3"]],skins={"\u6674":"skin1","\u591a\u4e91":"skin1","\u9634":"skin6","\u96fe":"skin4","\u51b0\u96f9":"skin5","\u626c\u6c99":"skin3","\u6c99\u5c18":"skin3","\u6d6e\u5c18":"skin3","\u973e":"skin3","\u70df\u973e":"skin3","\u96f7\u9635\u96e8":"skin2","\u96f7\u96e8":"skin2","\u9635\u96e8":"skin6","\u96e8":"skin6","\u5c0f\u96e8":"skin6","\u4e2d\u96e8":"skin6","\u5927\u96e8":"skin6","\u66b4\u96e8":"skin6","\u96e8\u5939\u96ea":"skin5","\u9635\u96ea":"skin5","\u5c0f\u96ea":"skin5","\u96ea":"skin5","\u4e2d\u96ea":"skin5","\u5927\u96ea":"skin5","\u66b4\u96ea":"skin5","\u9635\u96ea":"skin5"}</script> 
<script></script>
<script type="text/javascript">$(function(){setArea(),p.change(function(){$.getScript("http://cdn.weather.hao.360.cn/sed_api_area_query.php?grade=city&_jsonp=loadCity2&code="+p.val())}),c.change(function(){$.getScript("http://cdn.weather.hao.360.cn/sed_api_area_query.php?grade=town&_jsonp=loadTown&code="+c.val())}),$(".citybtn").click(changeCity)})</script>
<script type="text/javascript">
function clickButton()
  {
  document.getElementById('require').click()
  }
  function sendMsg()
  {
  var txt = document.getElementById("town");
  window.location.href='city.php?town='+txt.options[txt.selectedIndex].innerText;
  }
  </script>

</body>
<!-- //Body -->



</html>