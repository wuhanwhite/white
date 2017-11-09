<?php  

    // 引入文字识别OCR SDK
			require_once './AipOcr.php';
    // 定义常量
		const APP_ID = 'your appid';
		const API_KEY = 'your apI_key';
		const SECRET_KEY = 'your SECRET_KEY';
			
    const mui_tag1='<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>太和OCR图片识别系统工具</title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=3,user-scalable=yes">
		<link rel="stylesheet" href="./css/mui.min.css">
		<link href="css/style.css" rel="stylesheet">
        <link href="css/color-2.css" rel="stylesheet">
        <link href="css/typography-02.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
		
	</head>

	<body>
		<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon "></a>
			<h1 class="mui-title">太和OCR识别系统工具</h1>
		</header>
		<div class="mui-content">
			
			<div class="mui-card">
				<div class="mui-card-header">系统识别出来的内容如下</div>
				<div class="mui-card-content">
					<div class="mui-card-content-inner">';
const mui_tag2='</div>
				</div>
				<div class="mui-card-footer"><a href="http://weixin.tahanmall.com/baiduocr/file.php">回到首页<a></div>
			</div>
			
			
			
			
		</div>
		<footer>
		   <div class="gt_copyright_wrap copyright2_bg">
        <div class="container">
            <div class="gt_copyright_des">  
                <p style="color:white;">Copyright © <a href="#" style="color:white;">TAHAN </a> 1989-2017.武汉太和控股股份有限公司 All rights reserved. 鄂ICP备13000256</p>
                <span style="color:white;">Created by: <a href="#" style="color:#FF8000;">刘皓</a></span>
              </div>
          </div>
      </div>
		</footer>
		
		<script src="./js/mui.min.js"></script>
		<script type="text/javascript">
         function copyUrl2(tagid)
        {
        var Url22=document.getElementById(tagid).innerText;
        var oInput = document.createElement("input");
        oInput.value = Url22;
        document.body.appendChild(oInput);
        oInput.select(); // 选择对象
        document.execCommand("Copy"); // 执行浏览器复制命令
        oInput.className = "oInput";
        oInput.style.display="none";
        
        }
		document.getElementById("toastBtn").addEventListener(\'tap\', function() {
				mui.toast(\'复制成功\');
			});
        </script>
		
	</body>

</html>';


?>  