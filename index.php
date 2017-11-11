<?php
$str = '+7979792490 +79194567899        --- .kvhds kfd gsfdh ';
$mes = explode("---", $str);
var_dump($mes);
echo '<br>';

$adresses = explode(" ", trim($mes[0]));

var_dump($adresses);
?>


