<?php


class Test{
    private $Name,$ID;
    public $Forms = array();
    
    public function __construct($ID = 0,$Name = "")
    {
        $this->ID = $ID;
        $this->Name = $Name;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function setName($Name)
    {
        $this->Name = $Name;

        return $this;
    }

    public function getID()
    {
        return $this->ID;
    }

    ///

    public function getCorrectAnswersToArray(){
        $arr = array();
        foreach($this->Forms as $cor){
            $arr[] = $cor->getCorrectAnswer();
        }
        return $arr;
    }
}


?>