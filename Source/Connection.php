<?php
$host = 'localhost';
$database = 'TestDB';
$user = 'root';
$password = 'qwerty';

$connect = mysqli_connect($host, $user, $password, $database);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
?>