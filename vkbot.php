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

		
		
	$query_params_arr = array(
		'user_id' => '209832291',
		'fields' => 'screen_name',
		'v' => '5.69'
	);
	
	//выявление сыылки на профиль вк
	$query_params = http_build_query($query_params_arr);
	$user = json_decode(file_get_contents('https://api.vk.com/method/users.get?'.$query_params));
	$user_link = $user->response[0]->screen_name;
	
	
	

    //С помощью messages.send отправляем ответное сообщение 
    $request_params = array( 
      'message' => "Принято на обработку", 
      'user_id' => $user_id, 
      'access_token' => $token, 
      'v' => '5.0' 
    ); 

        
//отправка сообщения        
$get_params = http_build_query($request_params); 

file_get_contents('https://api.vk.com/method/messages.send?'. $get_params); 


        


echo('ok'); 

break; 

} 
?>