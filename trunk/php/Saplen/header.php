<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Header</title>
<style type="text/css">
body {background: #686868; font-family:Arial, Helvetica, sans-serif; font-size:12px; margin:0px; margin-bottom:2px;border-bottom: 1px #ccc solid;}
h1 {color: #FFF;}
a {color: #FFF; text-decoration: none;/*防止滤镜下链接失效*/position:relative;}
ul { list-style:none;}
#all {width: 100%;}
#banner {margin-top: 8px; margin-left: 32px;}
#main {width: 100%; margin-bottom: 2px; background:#eeeeee; margin-left: 0px; margin-right:0px; height: 30px; color: #000; line-height: 2.4;overflow: auto;}
#main a {color:#000;}
#welcome { float:left; width: 40%; font-weight: 800; padding-left: 8px; position:relative;}
#adminop { float:left; width: 59%; position:relative; text-align:right; line-height:1; *line-height:2.2;}
#adminop ul li {float: right; width: 80px;}
#nav {width: 100%; clear: both;}
#nav ul li {float: right; width:82px; height:25px; line-height: 2.1; text-align: center;}
.inactive { background-image/**/:url(images/admin/nav_bg_inactive2.png) !important;background: none; margin-left: 2px; margin-right:2px;filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src=images/admin/nav_bg_inactive2.png);}
.inactive a {color: #000;}
.inactive:hover { background: #1376c9 url(topnav_active.gif) repeat-x; }
.inactive span {
	float: left;
	padding: 63px 0px 0px 520px;
	position: absolute;
	left: 0px;
	top:35px;
	display: none;
	width: 500px;
	background: transparent;
	color: #fff;
}
.inactive span a { display: inline; }
.inactive span a:hover {text-decoration: underline;}

.active {
	background:url(images/admin/nav_bg_active2.png) !important;
	background: none; margin-left: 2px; margin-right:2px;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src=images/admin/nav_bg_active2.png);
}
.active a {color:#fff;}

.spanactive {
	background:url(images/admin/nav_bg_active2.png) !important;
	background: none; margin-left: 2px; margin-right:2px;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src=images/admin/nav_bg_active2.png);
}
.spanactive a {color:#fff;}
.spanactive span {
	float: left;
	padding: 63px 0px 0px 520px;
	position: absolute;
	left: 0px;
	top:35px;
	display: none;
	width: 500px;
	background: transparent;
	color: #fff;
}
.spanactive span a {color: #000;}

.blankgray {background:#bbb; height:2px; width:100%; margin:0; padding:0; clear:both; font-size:2px;}
</style>
<script type="text/javascript" language="javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript">
var oplist = new Array('bring', 'store', 'news', 'summary', 'homepage');
$(document).ready(function() {
	$('#nav ul li:not(:has(span))').find("a").click(function() {
		var id = $(this).attr('id');
		$.each(oplist, function(i, n) {
			$('#'+n).attr('class', 'inactive');
		});
		$(this).parents("li").attr('class', 'active');
	});
	
	$('#nav ul li span').find("a").click(function() {
		var id = $(this).parents("li").attr('id');
		$.each(oplist, function(i, n) {
			$('#'+n).attr('class', 'inactive');
		});
		$(this).parents("li").attr('class', 'spanactive');
	});
	
	$("#nav ul li").hover(function() { //Hover over event on list item
		$(this).find("span").show(); //Show the subnav
	} , function() { //on hover out...
		$(this).find("span").hide(); //Hide the subnav
	});
});
</script>
</head>

<body>
<div id="all">
	<div id="banner"><h1>SAPLEN后台管理</h1></div>
    <div id="nav">
    	<ul>
            <li class="inactive" id="bring">
            	<a href="menu.html" target="main">招聘</a>
            </li>
            <li class="inactive" id="store">
            	<a title="afirchi">店铺信息</a>
                <span>
                	<a href="http://www.865171.cn/" target="main">店铺</a>
                    <a href="http://www.865171.cn/" target="main">区域</a>
            	</span>
            </li>
            <li class="inactive" id="news">
            	<a title="afirchi">最新活动</a>
                <span>
                	<a href="http://www.865171.cn/" target="main">公司动态</a>
                    <a href="http://www.865171.cn/" target="main">促销信息</a>
            	</span>
            </li>
            <li class="inactive" id="summary">
            	<a title="afirchi">产品目录</a>
                <span>
                	<a href="http://www.865171.cn/" target="main">2010秋冬季</a>
                    <a href="http://www.865171.cn/" target="main">2010春夏季</a>
            	</span>
            </li>
            <li class="inactive" id="homepage">
            	<a href="menu.html" target="main">首页</a>
            </li>
        </ul>
    </div>
    <div id="main">
    	<div id="welcome">欢迎你回来,Admin! <img src="images/clock.gif" /> 
    	<?php
    		echo date('Y-m-d H:i:s');
    	?>
    	<a href="javascript:void(0);" onclick="top.location.href='logout.php'">登出</a>
    	</div>
    </div>
</div>
</body>
</html>
