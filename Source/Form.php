<?php
class Form
{
    public $Questions = [];
    private $CorrectAnswer;
    private $ID, $Name, $Type;

    public function __construct($ID = 0, $Name = NULL, $Type = 0)
    {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->Type = $Type;
    }

    public function getID()
    {
        return $this->ID;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function getTestName()
    {
        return $this->TestName;
    }

    public function getType()
    {
        return $this->Type;
    }
    /*
    public function getQuestionByID($id)
    {
        return $this->Questions[$id];
    }

    public function setQuestions($Question)
    {
        $this->Question[] = $Questions;

        return $this;
    }
*/


    public function getCorrectAnswer()
    {
        return $this->CorrectAnswer;
    }

    public function setCorrectAnswer($CorrectAnswer)
    {
        $this->CorrectAnswer = $CorrectAnswer;

        return $this;
    }

    public function drawForm($ID = 0)
    {
        echo '<div name="form'.$ID.'" id="'.$ID.'">';
        //<!--Сюда вопрос -->
        echo "<p><b>" . $this->getName() . "</b></br></p>";

        switch ($this->Type) {
            case 1:
                $i = 0;
                foreach ($this->Questions as $qo) {
                    echo '<input type="checkbox" name="answerTo'.$ID.'[]" value="'.$i.'">' . $qo->getName() . '<Br>';
                    $i+=1;
                }
                break;
            case 2:
                $i = 0;
                foreach ($this->Questions as $qo) {
                    echo '<input type="radio" name="answerTo'.$ID.'" value="'.$i.'">' . $qo->getName() . '<Br>';
                    $i+=1;
                }
                break;
            case 3:
                echo '<textarea type="text" name="answerTo'.$ID.'"></textarea> <Br>';
                break;
            default:
                # code...
                break;
        }
        echo '</div>';
    }
}
