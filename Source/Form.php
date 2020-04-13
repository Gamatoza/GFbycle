<?php
class Form
{
    public $Questions = [];
    private $CorrectAnswer;
    private $ID,$Name,$Type;
    
    public function __construct($ID = 0,$Name = NULL,$Type = 0)
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


    /**
     * Get the value of CorrectAnswer
     */ 
    public function getCorrectAnswer()
    {
        return $this->CorrectAnswer;
    }

    /**
     * Set the value of CorrectAnswer
     *
     * @return  self
     */ 
    public function setCorrectAnswer($CorrectAnswer)
    {
        $this->CorrectAnswer = $CorrectAnswer;

        return $this;
    }
}
?>