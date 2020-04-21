<?php
//print_r($_POST);
$CorrectAnswers = $_SESSION['CorrectAnswers'];
//print_r($CorrectAnswers);
$Num = $_SESSION['NumberAnswers'];

?>


<script>
    let num = '<?php $Num?>'
    
    alert(num);
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    
</body>
</html>