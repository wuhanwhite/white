<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>太和OCR图片自动识别文字工具</title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta http-equiv=Content-Language content=zh-cn> 
		<meta http-equiv=”Content-Type” content=”text/html; charset=gb2312″> 
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="description" content="武汉太和OCR图片自动识别文字工具 支持普通图片识别，银行卡，身份证，营业执照自动识别，调用百度AI接口" />
		<meta name="keywords" content="武汉太和OCR图片自动识别文字工具 支持普通图片识别，银行卡，身份证，营业执照自动识别，调用百度AI接口" />

		<!--标准mui.css-->
		<link rel="stylesheet" type="text/css" href="./css/mui.min.css">
		<link rel="stylesheet" type="text/css" href="./css/icons-extra.css" />
		<!--App自定义的css-->
		<!--<link rel="stylesheet" type="text/css" href="../css/app.css"/>-->
	</head>

	<body>

		<header class="mui-bar mui-bar-nav">
		    <a class="mui-action-back mui-icon  "></a>
		    <h1 class="mui-title">武汉太和OCR图片自动识别文字工具</h1></br>
			
		</header>
		
		<div class="mui-content">
		
		        <ul class="mui-table-view mui-grid-view mui-grid-9">
			    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-6"><a href="http://weixin.tahanmall.com/baiduocr/accurate_file.php" title="图片OCR识别(高精度)">
		                    <span class="mui-icon mui-icon-image"></span>
		                    <div class="mui-media-body" style="color:red;font-weight:bolder">图片识别(高精度版)</div></a></li>
			    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-6"><a href="http://weixin.tahanmall.com/baiduocr/readstorynew.php" title="图片OCR识别(高精度)">
		                    <span class="mui-icon mui-icon-mic"></span>
		                    <div class="mui-media-body" style="color:red;font-weight:bolder">文字识别并朗读</div></a></li>
		        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-6"><a href="http://weixin.tahanmall.com/baiduocr/webimg_file.php" title="普通图片OCR识别">
		                    <span class="mui-icon mui-icon-image"></span>
		                    <div class="mui-media-body" style="color:red;">普通图片识别</div></a></li>
				<li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-6"><a href="table_file.php">
		                    <span class="mui-icon-extra mui-icon-extra-order"></span>
		                    <div class="mui-media-body" style="color:red;">表格文字识别</div></a></li>			
			    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-6"><a href="http://weixin.tahanmall.com/baiduocr/idcard_file.php" title="身份证OCR识别">
		                    <span class="mui-icon mui-icon-extra mui-icon-extra-card"></span>
		                    <div class="mui-media-body" style="color:red;">身份证识别</div></a></li>
		        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-6"><a href="http://weixin.tahanmall.com/baiduocr/bankcard_file.php" title="银行卡OCR识别">
		                    <span class="mui-icon mui-icon-extra mui-icon-extra-card"></span>
		                    <div class="mui-media-body" style="color:red;">银行卡识别</div></a></li>
		        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-6"><a href="http://weixin.tahanmall.com/baiduocr/driving_file.php">
		                    <span class="mui-icon mui-icon-extra mui-icon-extra-express"></span>
		                    <div class="mui-media-body" style="color:red;">驾驶证识别</div></a></li>
		        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-6"><a href="#">
		                    <span class="mui-icon mui-icon-extra mui-icon-extra-express"></span>
		                    <div class="mui-media-body">行驶证识别(开发中)</div></a></li>
		        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-6"><a href="#">
		                    <span class="mui-icon mui-icon-extra mui-icon-extra-express"></span>
		                    <div class="mui-media-body">车牌识别(开发中)</div></a></li>
		        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-6"><a href="http://weixin.tahanmall.com/baiduocr/business_file.php" title="营业执照OCR识别">
		                    <span class="mui-icon mui-icon-extra mui-icon-extra-topic"></span>
		                    <div class="mui-media-body" style="color:red;">营业执照识别</div></a></li>
		            
		        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-6"><a href="#">
		                    <span class="mui-icon mui-icon-extra mui-icon-extra-xiaoshuo"></span>
		                    <div class="mui-media-body">通用票据识别(开发中)</div></a></li>
		        </ul> 
		</div>
	<?php
	include 'footer.html';
	?>
	</body>
	<script src="./js/mui.min.js"></script>
	<script>
		mui.init({
			swipeBack:true //启用右滑关闭功能
		});
	</script>
</html>