<?php
trait Singleton
{
    private static $instance; // экземпляр объекта
// Защищаем от создания через new Singleton
    private function __construct() { /* ... @return Singleton */ }
// Защищаем от создания через клонирование
    private function __clone() { /* ... @return Singleton */ }
// Защищаем от создания через unserialize
    private function __wakeup() { /* ... @return Singleton */ }
// Возвращает единственный экземпляр класса. @return Singleton
    public static function getInstance() {
        if ( empty(self::$instance) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public $x;
}
class Plus1 {
    use Singleton;

    public function getX()
    {
        return $this->x + 1;
    }
}
class Plus2 {
    use Singleton;

    public function getX()
    {
        return $this->x + 2;
    }
}

$a = Plus1::getInstance();
$a->x = 10;
echo $a->getX(); // 11
$b = Plus1::getInstance();
echo $b->getX(); // 11

$c = Plus2::getInstance();
$c->x = 20;
echo $c->getX(); // 22
$d = Plus2::getInstance();
echo $d->getX(); // 22
