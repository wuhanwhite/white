<?php  

    // 引入文字识别OCR SDK
			require_once './AipOcr.php';
			require_once 'AipSpeech.php';
	//常量		
			const APP_ID = 'your appid';
		    const API_KEY = 'your API_KEY ';
		    const SECRET_KEY = 'your SECRET_KEY';

			
	
  
    //我们这里需要使用到 $_FILES  
    /*echo "<pre>"; 
    print_r($_FILES); 
    echo "</pre>";*/  
  
    //其实我们在上传文件时，点击上传后，数据由http协议先发送到apache服务器那边，这里apache服务器已经将上传的文件存放到了服务器下的C:\windows\Temp目录下了。这时我们只需转存到我们需要存放的目录即可。  
  
    //php中自身对上传的文件大小存在限制默认为2M  
      
    //获取文件的大小  
    $file_size=$_FILES['myfile']['size'];  
    if($file_size>2*1024*1024*1024) {  
        echo "文件过大，不能上传大于20M的文件";  
        exit();  
    }  
  
    $file_type=$_FILES['myfile']['type'];  
     
    if($file_type!="image/jpeg" && $file_type!='image/pjpeg' && $file_type!='image/png' && $file_type!='image/bmp') {  
        echo "文件类型只能为jpg格式";  
        exit();  
    }  
  
  
    //判断是否上传成功（是否使用post方式上传）  
    if(is_uploaded_file($_FILES['myfile']['tmp_name'])) {  
        //把文件转存到你希望的目录（不要使用copy函数）  
        $uploaded_file=$_FILES['myfile']['tmp_name'];  
  
        //我们给每个用户动态的创建一个文件夹  
        $user_path=$_SERVER['DOCUMENT_ROOT']."/bdspeech/upload/accurate".$username;  
        //判断该用户文件夹是否已经有这个文件夹  
        if(!file_exists($user_path)) {  
            mkdir($user_path);  
        }  
  
        //$move_to_file=$user_path."/".$_FILES['myfile']['name'];  
        $file_true_name=$_FILES['myfile']['name'];  
		$rand_for_name=time().rand(1,1000).substr($file_true_name,strrpos($file_true_name,"."));
        $move_to_file=$user_path."/".$rand_for_name;  
        //echo "$uploaded_file   $move_to_file";  
		
        if(move_uploaded_file($uploaded_file,iconv("utf-8","gb2312",$move_to_file))) {  
            //echo $_FILES['myfile']['name']."上传成功"; 
			
			$strnew= ocrstart($rand_for_name,$str);
			echo '<hr>';
			echo $strnew;
			
			//初始化语音识别		
    $aipSpeech = new AipSpeech(APP_ID, API_KEY, SECRET_KEY);
	
	$result = $aipSpeech->synthesis($strnew, 'zh', 1, array(
				'vol' => 5,
				'spd' => 3,
				'per' => 4,
			));
			
			// 识别正确返回语音二进制 错误则返回json 参照下面错误码
			if(!is_array($result)){
				file_put_contents('audio.mp3', $result);
			}
			echo '<audio controls="controls" autoplay="autoplay">
			  
			  <source src="audio.mp3" type="audio/mpeg" />
			Your browser does not support the audio element.
			</audio>';
			//语音识别播报结束
			
        } else {  
            echo "上传失败";  
        }  
    } else {  
        echo "上传失败";  
    }  
  
    function ocrstart($filename,$str){
			  


			// 初始化
			$aipOcr = new AipOcr(APP_ID, API_KEY, SECRET_KEY);
			
			//开始识别
			$url1='http://weixin.tahanmall.com/bdspeech/upload/accurate/';
			$url2='upload/accurate/'.$filename;
			
			
			$json3= json_encode($aipOcr->basicGeneral(file_get_contents($url2)), JSON_PRETTY_PRINT);
			$j3=json_decode($json3);
			

			

			function object_array($array)
			{
			   if(is_object($array))
			   {
				$array = (array)$array;
			   }
			   if(is_array($array))
			   {
				foreach($array as $key=>$value)
				{
				 $array[$key] = object_array($value);
				}
			   }
			   return $array;
			}
			$a1=object_array($j3);
			
			$str='';
			for ($i=0;$i<$a1[words_result_num];$i++){
				$str = $str.($a1[words_result][$i][words]);
				
		    }
			return $str;
			
			
			
    }
?>  