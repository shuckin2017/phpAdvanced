<?php

class Computer // Общий класс компьютер (родитель)
{
    protected $processor; // Процессор
    protected $memory; // Память
    protected $graphic; // Видеокарта

    protected function __construct($processor = null, $memory = null, $graphic = null)
    {
        $this->processor = $processor;
        $this->memory = $memory;
        $this->graphic = $graphic;
    }

    public function aboutMe() // Функция формирует информацию о компьютере
    {
        echo $this->prepareContent();
    }

    protected function prepareContent()
    {
        return "<p>Процессор: {$this->processor}</p>
                <p>Память: {$this->memory} GB</p>
                <p>Видеокарта: {$this->graphic}</p>";
    }

    public function compareCharacteristic(Computer $computer) // Функция сравнения характеристик
    {
        echo "<h3>Сравнение:</h3>
              {$this->processor} - {$computer->processor}<br>
              {$this->memory} - {$computer->memory}<br>
              {$this->graphic} - {$computer->graphic}";
    }
}

class Notebook extends Computer // Ветвь класса компьютер - ноутбук (наследник)
{
    protected $mobility; // Дополнительное свойство наследника ноутбук (наследование - расширение функционала)

    public function __construct($processor = null, $memory = null, $graphic = null, $mobility = null)
    {
        parent::__construct($processor, $memory, $graphic);
        $this->mobility = $mobility;
    }

    public function aboutMe()
    {
        parent::aboutMe();
        echo "<p>Мобильность: {$this->mobility}</p>"; // (наследование - расширение функционала)
    }
}

class PersonalComputer extends Computer // Ветвь класса компьютер - персональный компьютер (наследник)
{
    protected $noiseLevel; // Дополнительное свойство наследника персональный компьютер (наследование - расширение функционала)

    public function __construct($processor = null, $memory = null, $graphic = null, $noiseLevel = null)
    {
        parent::__construct($processor, $memory, $graphic);
        $this->noiseLevel = $noiseLevel;
    }

    public function aboutMe()
    {
        parent::aboutMe();
        echo "<p>Уровень шума: {$this->noiseLevel} дБ</p>"; // (наследование - расширение функционала)
    }
}

function showOptions(Computer $options) // Метод для пользователя (внешка) (покажи но, не говори кто ты и откуда это взял)
{
    $options->aboutMe();
}

$notebook = new Notebook("Intel", 32, "Nvidia", "Да"); // Экземпляр класса Ноутбук
showOptions($notebook); // Запуск функции в контексте класса Notebook (полиморфизм)
var_dump($notebook);

$personalComputer = new PersonalComputer("AMD", 16, "AMD Radeon", 51); // Экземпляр класса Персональный компьютер
showOptions($personalComputer); // Запуск функции в контексте класса PersonalComputer (полиморфизм)
var_dump($personalComputer);

$notebook->compareCharacteristic($personalComputer);