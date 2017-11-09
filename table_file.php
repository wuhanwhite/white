<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>太和OCR图片自动识别文字工具</title>
		<meta name="description" content="太和OCR图片自动识别文字工具" />
		<meta name="keywords" content="太和OCR图片自动识别文字工具" />
		<meta name="author" content="white" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
		<script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
	</head>
	
	<style>
	body{
		background-color: white;
		opacity:0.9
	}
	</style>
	
<body >
<h2>太和OCR图片自动识别文字工具(表格识别)</h2>
<form enctype="multipart/form-data" method="post" action="table.php">  
  
<div id="addCommodityIndex">
   
            
             <!--input-group start-->
            <div class="input-group row">
                <div class="col-sm-3">
                    <label>请点击下图上传需要识别的图片<span style="color:red;">(请耐心等待几秒钟，识别出来后会自动跳转)<span></label>
                </div>
                <div class="col-sm-9 big-photo">
                	<div id="preview">
                        <img id="imghead" border="0" src="img/upload.png" width="90" height="90" onclick="$('#previewImg').click();">
                     </div>         
                    <input type="file" onchange="previewImage(this)" style="display: none;" id="previewImg" name="myfile">
                	<!--<input id="uploaderInput" class="uploader__input" style="display: none;" type="file" accept="" multiple="">-->
                </div>
            </div>
            <!--input-group end-->
       
</div>
 
  



<div class="box">
					<!-- progress button -->
					<div class="progress-button">
					    
						<button type="submit" value="文件上传"><span>开始上传</span></button>
						<svg class="progress-circle" width="70" height="70"><path d="m35,2.5c17.955803,0 32.5,14.544199 32.5,32.5c0,17.955803 -14.544197,32.5 -32.5,32.5c-17.955803,0 -32.5,-14.544197 -32.5,-32.5c0,-17.955801 14.544197,-32.5 32.5,-32.5z"/></svg>
						<svg class="checkmark" width="70" height="70"><path d="m31.5,46.5l15.3,-23.2"/><path d="m31.5,46.5l-8.5,-7.1"/></svg>
						<svg class="cross" width="70" height="70"><path d="m35,35l-9.3,-9.3"/><path d="m35,35l9.3,9.3"/><path d="m35,35l-9.3,9.3"/><path d="m35,35l9.3,-9.3"/></svg>
					</div><!-- /progress-button -->
					
				</div>
				
 
</form>


<script src="js/classie.js"></script>
<script src="js/uiProgressButton.js"></script>
<script>
			[].slice.call( document.querySelectorAll( '.progress-button' ) ).forEach( function( bttn, pos ) {
				new UIProgressButton( bttn, {
					callback : function( instance ) {
						var progress = 0,
							interval = setInterval( function() {
								progress = Math.min( progress + Math.random() * 0.1, 1 );
								instance.setProgress( progress );

								if( progress === 1 ) {
									instance.stop( pos === 1 || pos === 3 ? -1 : 1 );
									clearInterval( interval );
								}
							}, 350 );
					}
				} );
			} );
</script>

<!--图片上传预览脚本-->
<script>
      //图片上传预览    IE是用了滤镜。
        function previewImage(file)
        {
          var MAXWIDTH  = 90; 
          var MAXHEIGHT = 90;
          var div = document.getElementById('preview');
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead onclick=$("#previewImg").click()>';
              var img = document.getElementById('imghead');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
              }
              var reader = new FileReader();
              reader.onload = function(evt){img.src = evt.target.result;}
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead>';
            var img = document.getElementById('imghead');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
          }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight ){
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                
                if( rateWidth > rateHeight ){
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else{
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }
    </script>

</body> 
</html>  