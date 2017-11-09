<?php
require_once 'AipSpeech.php';

// 你的 APPID AK SK
const APP_ID = '10281916';
const API_KEY = 'fsbab3hZ2tIOCdOnGS8RWUmY';
const SECRET_KEY = 'scBONQVi0E7sHtSw8vGE83j16w3sFoiE';

$aipSpeech = new AipSpeech(APP_ID, API_KEY, SECRET_KEY);
$str="你好刘皓";
$result = $aipSpeech->synthesis($str, 'zh', 1, array(
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
?>