<?php
session_start();
ini_set('display_errors',1);
error_reporting(E_ALL);

//print_r($_POST);
$CorrectAnswers = $_SESSION['CorrectAnswers'];
//print_r($CorrectAnswers);
$Num = $_SESSION['NumberAnswers'];

?>

<script>
let same = '<?php echo json_encode($CorrectAnswers);?>'; //передача массива из php в js

alert(same);
</script>

<!DOCTYPE html>
<html lang="en">
<script type="text/javascript"></script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    
</body>
</html>