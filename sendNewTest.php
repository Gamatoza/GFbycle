<?php
/*
*Запрос чисто теоретический
*Получаемые данные не являются действительными на момент написания скрипта
*/
$Name = $_POST['Name'];             //Имя теста
$Forms = $_POST['Forms'];           //Форма, по идее хранит индексы форм, или имена, уже хз
$NumofForms = count($Forms);        //Но нам пока что нужно только их количество
$Types = $_POST['Types'];           //Типы форм
$Questions = $_POST['Questions'];   //Получаем массив вопросов
$Answers = $_Post['Answers'];       //Получаем массив массивов? ответов, в теории реально двумерный

require 'Source/Connection.php';

$result = mysqli_query($connect,"SELECT MAX(`ID`) FROM Tests");     //Получаем последний id для Tests
$Test = new Test($result->fetch_array[0] + 1,$Name);

$result = mysqli_query($connect,"SELECT MAX(`ID`) FROM Questions");
$lastQuestionID = $result->fetch_array[0] + 1;
$result = mysqli_query($connect,"SELECT MAX(`ID`) FROM Forms");
$lastFormID = $result->fetch_array[0] + 1;

for ($i=0; $i < $NumofForms; $i++) { 
    $Test->Forms = new Form($lastFormID,$Questions[$i],$Types[$i]);
    $lastFormID++;
    for ($j=0; $j < count($Answers[$i]); $j++) { 
        $Test->Forms[$i]->Questions = new Questions($lastQuestionID,$Answers[$i][$j]);
        $lastQuestionID++;
    }
} // в теории как то так
// но нужны тесты

?>