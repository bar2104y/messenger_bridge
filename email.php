<?php

$user = mysqli_query($connection,"SELECT * FROM `users` * WHERE `id` = '".$_GET['id']."'");
$user = mysqli_fetch_assoc($user);
mysqli_close($connection);


$mail = $men['email'];

$title = 'MessendgerBridge'.;

$message = '<html><head><title>MessendgerBridge</title></head><body>';
$message .= '<br><br>От: '.$user['name'].' '.$user['surname'].'<br>';
$message .= '</body></html>';

$header  = 'MIME-Version: 1.0' . "\r\n";
$header .= "Content-type: text/html; charset=utf-8 \r\n";


mail($mail,$title,$messedge,$header);

?>