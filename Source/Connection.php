<?php
$host = 'localhost';
$database = 'TestDB';
$user = 'root';
$password = 'qwerty';

$connect = mysqli_connect($host, $user, $password, $database);

if ($connect->connect_error) {
    trigger_error('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
?>