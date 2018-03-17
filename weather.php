<!--
	Author: sj
	Author URL: http://marsj.xyz
-->
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<?php

function getweatherbyname_sj($data,$index){
	
$weather=mb_substr($data['future'][$index]['weather'],0,2,'utf-8');
if($weather=="小雨"||$weather=="阵雨"){
	return "images/smallrian.png";
}else if($weather=="中雨"||$weather=="大雨"||$weather=="暴雨"){
	return "images/rain.png";
}else if($weather=="阴转"||$weather=="阴"){
	return "images/cloudy.png";
}else if($weather=="晴"||$weather=="晴转"){
	return "images/sun.png";
}else if($weather=="多云"){
	return "images/partly-cloudy-day.png";
}else if($weather=="阵雪"||$weather=="小雪"||$weather=="中雪"||$weather=="大雪"){
	return "images/snow.png";
}

else{
return "images/fog.png";;
}
}



?>