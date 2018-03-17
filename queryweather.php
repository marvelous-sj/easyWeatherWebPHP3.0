<!--
	Author: sj
	Author URL: http://marsj.xyz
-->
<HTML>    
<HEAD>    
<TITLE>sj天气预报系统</TITLE> 
<meta http-equiv="content-type" content="text/html;charset=utf-8">   
</HEAD>    
<BODY>    
<script src="http://pv.sohu.com/cityjson?ie=utf-8"></script>   
<script>   
	window.location.href='city.php?town='+returnCitySN["cname"].slice(3,5);	  
</script>  
</BODY>    
</HTML>    