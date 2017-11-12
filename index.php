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
				$men = mysqli_query($connection, "SELECT * FROM `users` WHERE `phone` = '".$adress."'");
				$men = mysqli_fetch_assoc($men);
				
				switch ($men['favorite']){
					#email
					case 0:
						
						include $_SERVER['DOCUMENT_ROOT']."email.php";
						mail();
					#VK
					case 1:
						

				}
				
			} else if(preg_match("/@/i", $adress) == 1){
				# обработка получателя по emai
			}	
		}
	}
}


?>