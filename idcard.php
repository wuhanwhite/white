<?php  

    // 引入文字识别OCR SDK
			require_once './AipOcr.php';
            require_once './data.php';
			
			
    //1.接收提交文件的用户  
    $username=$_POST['username'];  
    $fileintro=$_POST['fileintro'];  
  
    //我们这里需要使用到 $_FILES  
    /*echo "<pre>"; 
    print_r($_FILES); 
    echo "</pre>";*/  
  
    //其实我们在上传文件时，点击上传后，数据由http协议先发送到apache服务器那边，这里apache服务器已经将上传的文件存放到了服务器下的C:\windows\Temp目录下了。这时我们只需转存到我们需要存放的目录即可。  
  
    //php中自身对上传的文件大小存在限制默认为2M  
      
    //获取文件的大小  
    $file_size=$_FILES['idcardfile']['size'];  
    if($file_size>2*1024*1024*1024) {  
        echo "文件过大，不能上传大于20M的文件";  
        exit();  
    }  
  
    $file_type=$_FILES['idcardfile']['type'];  
    echo $file_type;  
    if($file_type!="image/jpeg" && $file_type!='image/pjpeg' && $file_type!='image/png') {  
        echo "文件类型只能为jpg格式";  
        exit();  
    }  
  
  
    //判断是否上传成功（是否使用post方式上传）  
    if(is_uploaded_file($_FILES['idcardfile']['tmp_name'])) {  
        //把文件转存到你希望的目录（不要使用copy函数）  
        $uploaded_file=$_FILES['idcardfile']['tmp_name'];  
  
        //我们给每个用户动态的创建一个文件夹  
        $user_path=$_SERVER['DOCUMENT_ROOT']."/baiduocr/upload/idcard".$username;  
        //判断该用户文件夹是否已经有这个文件夹  
        if(!file_exists($user_path)) {  
            mkdir($user_path);  
        }  
  
        //$move_to_file=$user_path."/".$_FILES['idcardfile']['name'];  
        $file_true_name=$_FILES['idcardfile']['name'];  
		$rand_for_name=time().rand(1,1000).substr($file_true_name,strrpos($file_true_name,"."));
        $move_to_file=$user_path."/".$rand_for_name;  
        //echo "$uploaded_file   $move_to_file";  
		
        if(move_uploaded_file($uploaded_file,iconv("utf-8","gb2312",$move_to_file))) {  
            echo $_FILES['idcardfile']['name']."上传成功"; 
			
			ocrstart($rand_for_name);
        } else {  
            echo "上传失败";  
        }  
    } else {  
        echo "上传失败";  
    }  
  
    function ocrstart($filename){
			  


			// 初始化
			$aipOcr = new AipOcr(APP_ID, API_KEY, SECRET_KEY);
			
			//开始识别
			$url1='http://weixin.tahanmall.com/baiduocr/upload/';
			$url2='upload/idcard/'.$filename;
			
			
			$json3= json_encode($aipOcr->idcard(file_get_contents($url2), true), JSON_PRETTY_PRINT);
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
			$str1 = '<p style="color:blue; font-size:15px;">姓名:'.($a1[words_result][姓名][words]).'</p></br>';
			$str2 = '<p style="color:blue; font-size:15px;">性别:'.($a1[words_result][性别][words]).'</p></br>';
			$str3 = '<p style="color:blue; font-size:15px;">民族:'.($a1[words_result][民族][words]).'</p></br>';
			$str4 = '<p style="color:blue; font-size:15px;">出生:'.($a1[words_result][出生][words]).'</p></br>';
			$str5 = '<p style="color:blue; font-size:15px;">住址:'.($a1[words_result][住址][words]).'</p></br>';
			$str6 = '<p style="color:blue; font-size:15px;">身份证号码:'.($a1[words_result][公民身份号码][words]).'</p></br>';
			$str=$str1.$str2.$str3.$str4.$str5.$str6;
			echo mui_tag1.$str.mui_tag2;
			
    }
?>  