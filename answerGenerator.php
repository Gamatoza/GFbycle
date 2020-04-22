<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

print_r($_POST);
echo '<Br>';
$CorrectAnswers = $_SESSION['CorrectAnswers'];
print_r($CorrectAnswers);
$Num = $_SESSION['NumberAnswers'];

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="scripts/AnswerController.js"></script>
</head>

<body>
    <script>
        let sum = 0;
        // махинации с джонами
        let Answers = JSON.parse('<?php echo json_encode($_POST) ?>');
        let CorrectAnswers = JSON.parse('<?php echo json_encode($CorrectAnswers); ?>'); //передача массива из php в js
        let Num = Number('<?php echo $Num ?>');
        let i = 0;//рот этого казино
        for (let key in Answers) {
            
            if (Answers[key] != null && CorrectAnswers[i] != null) {
                switch (key.charAt(0)) {
                    case 'C': //если чекбокс !!! работает какой то мистикой, или не работает, я сам не понял
                        sum++;
                        let AllAnswers = ""+Answers[key];
                        AllAnswers = AllAnswers.split(',');
                        let AllCorrect = CorrectAnswers[i].split(',');
                        for (let index = 0; index < AllAnswers.length; index++) {
                            if(AllAnswers.indexOf(AllCorrect,i)===-1)sum--;
                            else if(AllCorrect.indexOf(AllAnswers,i) === -1) sum--;
                            else sum++;
                        }
                        break;
                    case 'R': //если радио
                        if (Answers[key] === CorrectAnswers[i])
                            sum++;
                        break;
                    case 'A': //если вопрос-ответ
                        let a = ""+Answers[key];
                        let b = ""+CorrectAnswers[i];
                        if (a.toLowerCase() === b.toLowerCase()) //оба в ловеркейс
                            sum++;
                        break;
                    default:
                        break;
                }
            }
            i++;
        } 

        //вывод ответа
        //в дальнейшем просто вкинуть эту функцию в переменную и можно совать в какую нибудь красивую форму с анимацией и все такое
        alert((""+(sum / Num) * 100).substr(0,4)+"%")
    </script>
</body>

</html>