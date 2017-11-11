<?php 

if (!isset($_REQUEST)) { 
  return; 
} 

//Строка для подтверждения адреса сервера из настроек Callback API 
$confirmation_token = '2d7a335f'; 

//Ключ доступа сообщества 
$token = 'a06a34e9bfec7e5dd28be3c5fef12f291c6bda681285cc73836c363ffc71fd634dfaf8d0d4bb9828b0c46'; 

//Получаем и декодируем уведомление 
$data = json_decode(file_get_contents('php://input')); 

//Проверяем, что находится в поле "type" 
switch ($data->type) { 
  case 'confirmation': 
    echo $confirmation_token; 
    break; 


        
        
        //Если это уведомление о новом сообщении... 
  case 'message_new': 
    //...получаем id его автора 
    $user_id = $data->object->user_id; 
    //затем с помощью users.get получаем данные об авторе 
    $user_info = json_decode(file_get_contents("https://api.vk.com/method/users.get?user_ids={$user_id}&v=5.0")); 
    
        
    $user_name = $user_info->response[0]->first_name; 
    
    #$title = 'Message bridge '.$username;
    
    $message = $data->object->body;
    
    $message = trim($message);
    $message = ' '.$message;
    
    $message .= '<br>От:'.$user_name.'<br>Отправлено из Вконтакте<br>'.date("d/m/Y  g:i");
    $message .= '<br> MB 2017';
        
    
    
        
    $adr = 'bar2104y@yandex.ru';
    /*$connection = mysqli_connect('localhost','admin','');
    $user_data = mysqli_query($connection, "SELECT * FROM `users` WHERE `vk` = '".$user_id."'");
    mysqli_close($connection);*/
    
    
        
    #mail($adr,$title,$message);
    
        
    //и извлекаем из ответа его имя 
    $user_name = $user_info->response[0]->first_name; 

    //С помощью messages.send отправляем ответное сообщение 
    $request_params = array( 
      'message' => "{$message}", 
      'user_id' => $user_id, 
      'access_token' => $token, 
      'v' => '5.0' 
    ); 

        
        
        
        
            
        
$get_params = http_build_query($request_params); 

file_get_contents('https://api.vk.com/method/messages.send?'. $get_params); 


        


echo('ok'); 

break; 

} 
?>