<?php

/*
Класс: Questions
Иерархия: Низший
Назначение: класс вопроса в который помещаются полные данные с таблицы Qeustions с БД
*/
class Questions
{
    private $ID,$Name,$EntityTo;

    public function __construct($ID=0,$Name=NULL,$EntityTo=NULL){
        $this->ID = $ID;
        $this->Name = $Name;
        $this->EntityTo = $EntityTo;
    }

    public function getID(){
        return $this->ID;
    }
    public function getName(){
        return $this->Name;
    }

    public function getEntityTo()
    {
        return $this->EntityTo;
    }
}

?>