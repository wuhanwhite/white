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

$arr = array(
    '0' => array('id' => 1, 'name' => 'name1'),
    '1' => array('id' => 2, 'name' => 'name2'),
    '2' => array('id' => 3, 'name' => 'name3'),
    '3' => array('id' => 4, 'name' => 'name4'),
    '4' => array('id' => 5, 'name' => 'name5'),
);

print_r (array_values($arr));

echo '<hr>';

$name = array_column($arr, 'id');
foreach ($name as $a1){
	echo $a1.'</br>';
}
//需要得到的结果：$name_list = array('name1', 'name2', 'name3', 'name4', 'name5');
?>

</body>
</html>


