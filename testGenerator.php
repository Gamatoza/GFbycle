<?php
session_start();
require 'Source/Connection.php';
require 'Source/Form.php';
require 'Source/Questions.php';
require 'Source/Test.php';

/*$Name = $_POST['Name'];
$FormsID = "(".$_POST['Test'].")";*/


$Name = 'Name';
$FormsID = '(1,2,3)';


$query = "SELECT * FROM Forms WHERE ID IN $FormsID"; //Можно юзать тот же шаблон только c WHERE, если нужен конкретный тест

//mysqli_query($connect,"set names cp1251");

$result = mysqli_query($connect, $query);
$rows = mysqli_num_rows($result);

$Test = new Test(0, $Name);

for ($i = 0; $i < $rows; $i++) {
    //MAIN GETTER
    $row = mysqli_fetch_row($result);

    //Get Form type
    $Row = mysqli_query($connect, "SELECT * FROM Types WHERE ID = " . $row[2] . "");
    $testType = mysqli_fetch_row($Row);

    //Get Form
    $Form = new Form($row[0], $row[1], $testType[0]);

    //Get Questions
    if($row[3] != null){
        $ExpSTR = '(' . $row[3] . ')';
        $innerQuery = mysqli_query($connect, "SELECT * FROM Questions WHERE ID IN $ExpSTR");

        while ($innerRow = mysqli_fetch_assoc($innerQuery)) {
            $Form->Questions[] = new Questions($innerRow["ID"], $innerRow["Name"], $innerRow["EntityTo"]);
        }
    }
    //Set Answer
    $Form->setCorrectAnswer($row[4]);

    //Add To Test
    $Test->Forms[] = $Form;
}

$_SESSION['CorrectAnswers'] = $Test->getCorrectAnswersToArray();
$_SESSION['NumberAnswers'] = $rows;

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

mysqli_close($connect);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<style>
    div {
        width: 700px;
        height: auto;
        /* Размеры */
        padding: 10px 10px 10px 10px;
        margin: 10px 10px 10px 10px;
        background: #fc0;
        /* Цвет фона */
        outline: 2px solid #000;
        /* Чёрная рамка */
        border: 3px solid #fff;
        /* Белая рамка */
        border-radius: 10px;
        /* Радиус скругления */
    }
</style>

<body>
    <form name="test" method="post" action="answerGenerator.php">
        <?php
        $i = 0;
        foreach ($Test->Forms as $fm) {
            $fm->drawForm($i);
            $i++;
        }
        ?>
        <input type="submit" value="Закончить тест" />
        <input type="reset" value="Очистить">
    </form>
</body>

</html>