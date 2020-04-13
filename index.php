<?php
require_once 'Source/Connection.php';
require_once 'Source/Form.php';
require_once 'Source/Questions.php';


$connect = mysqli_connect($host, $user, $password, $database);
$query = "SELECT * FROM Forms"; //Можно юзать тот же шаблон только c WHERE, если нужен конкретный тест
$result = mysqli_query($connect, $query);
$rows = mysqli_num_rows($result);

$Test = [];

for ($i=0; $i < $rows; $i++) { 
    //MAIN GETTER
    $row = mysqli_fetch_row($result);
    
    //Get Form type
    $Row = mysqli_query($connect,"SELECT * FROM Types WHERE ID = ".$row[2]."");
    $testType = mysqli_fetch_row($Row);

    //Get Form
    $Form = new Form($row[0],$row[1],$testType[1]);

    //Get Questions
    $ExpSTR = '('.$row[3].')';
    $innerQuery = mysqli_query($connect,"SELECT * FROM Questions WHERE ID IN $ExpSTR");

    while ($innerRow = mysqli_fetch_assoc($innerQuery)) {
        $Form->Questions[] = new Questions($innerRow["ID"],$innerRow["Name"],$innerRow["EntityTo"]);
    }

    //Set Answer
    $Form->setCorrectAnswer($row[4]);

    //Add To Test
    $Test[] = $Form;
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
    form {
        width: auto;
        height: auto;
        /* Размеры */
        padding: 10px 10px 10px 10px;
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
    <?for ($i=0; $i < 1; $i++):?>  <!-- Далее надо прописать класс Tests и уже массивом перекидывать, это чисто на старт-->
    <form name="test" method="post" action="input1.php">
        <!--Сюда вопрос -->
        <?php
        echo "<p><b>".$Test[0]->getName()."</b></br></p>";

        foreach($Test[0]->Questions as $qo) {
            echo '<input type="radio" name="answer" value="$j">'.$qo->getName().'<Br>';
        }
        ?>
        <p><input type="submit" value="Отправить">
            <input type="reset" value="Очистить"></p>
    </form>
    <?endfor?>
</body>

</html>