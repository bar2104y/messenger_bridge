<?php

function sendmessege($str){
	$mes = explode("---", $str);
	$adresses = explode(" ", $mes[0]);
	
	foreach($adresses as $adress){
		if($adress != ''){
			$adress = ' '.$adress;
			if(preg_match("/( \+7| 8)/i", $adress) == 1){
				#Обработка получателя через телефон
				#выделить получателя из бд
				//отправить ему сообщение
				$men = mysqli_query($connection, "SELECT * FROM `users` WHERE `phone` = '".$adress."'")
			} else if(preg_match("/@/i", $adress) == 1){
				# обработка получателя по emai
			}	
		}
	}
}
$str = '+7979792490 +79194567899  sdnmfdsbgsb@kbxcvx.ds      --- .kvhds kfd gsfdh ';
$mes = explode("---", $str);
var_dump($mes);
echo '<br><br>';

$adresses = explode(" ", $mes[0]);

foreach($adresses as $adress){
	#echo $adress.'<br>';
	if($adress != ''){
		$adress = ' '.$adress;
		if(preg_match("/( \+7| 8)/i", $adress) == 1){
			echo 'tel '.$adress.'<br>';	
		} else if(preg_match("/@/i", $adress) == 1){
			echo 'email '.$adress.'<br>';
		}

		
	}
}



echo '<br><br>';

$text = trim($mes[1]);



echo $text.'<br><br>';

var_dump($adresses);
?>


