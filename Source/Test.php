<?php

/*
Класс: Test
Иерархия: Высший
Назначение: Класс предоставляет из себя сборку из форм.
Кроме как это более не имеет функций.
Предоставляет функцию отрисовки формы в формате html
*/
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

    
    //возвращает массив правильных ответов
    //
    public function getCorrectAnswersToArray(){
        $arr = array();
        foreach($this->Forms as $cor){
            $arr[] = $cor->getCorrectAnswer();
        }
        return $arr;
    }

}


?>