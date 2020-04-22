<?php
/*
Файл предоставляющий подключение под базу данных
!!! Если собираешься подключать его, не забудь закрыть соединение 
mysqli mysqli_close($connect);
*/
$host = 'localhost';
$database = 'TestDB';
$user = 'root';
$password = 'qwerty';

$connect = mysqli_connect($host, $user, $password, $database);


//обработка ошибок по запросу
if ($connect->connect_error) {
    trigger_error('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
?>