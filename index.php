<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

require 'Source/Connection.php';
require 'Source/Form.php';
require 'Source/Questions.php';


$query = "SELECT * FROM Tests"; //Можно юзать тот же шаблон только c WHERE, если нужен конкретный тест
$result = mysqli_query($connect, $query);
$tests = mysqli_num_rows($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="testGenerator.php" method="post">
<?php
    while ($row = mysqli_fetch_assoc($result)) {
    echo '<split>';
    echo '<label name="ID" value='.$row['ID'].'>'.$row['ID'].'. </label>';
    echo '<label name="Name" value='.$row['Name'].'>'.$row['Name'].'</label>';
    echo '</split></br>';
    echo '<button name="Test" id="'.$row['ID'].'" value="'.$row['Forms'].'">Get into it!</button>';
    }
?>
</form>
</body>
</html>