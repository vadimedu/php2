<?php
namespace Person;

Class Test{
    private string $name;

    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }

}