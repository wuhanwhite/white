<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>图片识别工具</title>
  </head>
<body>

<p>图片识别工具</p>
<?php

// 引入文字识别OCR SDK和key文件
require_once './data.php';



// 初始化
$aipOcr = new AipOcr(APP_ID, API_KEY, SECRET_KEY);

// 身份证识别
// echo json_encode($aipOcr->idcard(file_get_contents('idcard.jpg'), true), JSON_PRETTY_PRINT);

// 银行卡识别 
// echo json_encode($aipOcr->bankcard(file_get_contents('bankcard.jpg')));

// 通用文字识别(含文字位置信息)
//echo json_encode($aipOcr->general(file_get_contents('general.png')));


// 通用文字识别(不含文字位置信息)

$json3= json_encode($aipOcr->tableRecognition(
    file_get_contents('table1.png'),
    array(
        'result_type' => 'excel',
    )
));
$j3=json_decode($json3);
var_dump ($j3);

// $json4=json_encode($aipOcr->getTableRecognitionResult('10281928_59260', array(
    // 'result_type' => 'excel',
// )));
// $j4=json_decode($json4);
// var_dump ($j4);

echo '<hr>';

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

print_r (object_array($j3));
echo '<hr>';


$a1=object_array($j3);

echo '<p style="color:blue;">社会信用代码:'.($a1[words_result][社会信用代码][words]).'</p>';
echo '</br>';
echo ($a1[words_result][出生][words]);
echo '</br>';
echo ($a1[words_result][姓名][words]);

echo '<hr>';


for ($i=0;$i<$a1[words_result_num];$i++){
	echo ($a1[words_result][$i][words]);
	echo '</br>';
}

// 网图OCR识别
// echo json_encode($aipOcr->webImage(file_get_contents('general.png')), JSON_PRETTY_PRINT);

// 生僻字OCR识别
// echo json_encode($aipOcr->enhancedGeneral(file_get_contents('general.png')), JSON_PRETTY_PRINT);

// 行驶证识别
// echo json_encode($aipOcr->vehicleLicense(file_get_contents('vehicleLicense.jpg')), JSON_PRETTY_PRINT);

// 驾驶证
// echo json_encode($aipOcr->drivingLicense(file_get_contents('drivingLicense.jpg')), JSON_PRETTY_PRINT);

// 车牌
//echo json_encode($aipOcr->licensePlate(file_get_contents('licensePlate.jpg')), JSON_PRETTY_PRINT);
?>

</body>
</html>


