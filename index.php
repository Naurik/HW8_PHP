<?php

//SQL
//include_once "db_helpers.php";

//$rows = db_select('lesson.books', "*",['Name'=>"Harry Potter"]);


/*db_insert('lesson.books',[
    'name' => 'Lolita'
    ]);*/
//db_update('lesson.books','Lolita','LOX');

//SELECT, INSERT, UPDATE, DELETE

/*class MyClass
{
    private $name = "John";

    public function __construct($name = '')
    {
        $this ->setName($name);
    }

    public function foo()
    {
        return 'bar';
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    /*
    private function  priv(){

    }
    protected  function prot(){

    }*/

//}

//$myClass = new MyClass('John');
//echo $myClass->foo();
//$myClass->name = "Bob";
//echo $myClass->name;
//$myClass->setName('Sarah');
//echo $myClass->getName();*/

//class Number {
//
//    private $num;
//    public function __construct($num )
//    {
//        $this->setNumber($num);
//    }
//    public function setNumber($num){
//        $this->num=$num;
//    }
//    public function getNumber()
//    {
//        if($this->num % 2 == 0 )
//        {
//           return $this->num*3;
//        }
//        else
//        {
//            return $this->num*2;
//        }
//    }
//}
//$num = new Number(3);
//echo $num->getNumber();
//class Number {
//    private $number;
//
//
//    public function getNumber()
//    {
//        return $this->number;
//    }
//
//    public function setNumber($number): void
//    {
//        $this->number = $number;
//    }
//
//
//
//
//
//
//    public function __construct($number)
//    {
//        $this->set($number);
//    }
//    public function set($number)
//    {
//        $this->number=$number;
//    }
//    public function get()
//    {
//        return $this->number;
//    }
//    public function add($number)
//    {
//        return $this->set($this->get()+$number);
//    }
//    public function sub($number)
//    {
//        return $this->number-=$number;
//    }
//    public function mult($number)
//    {
//        return $this->number*=$number;
//    }
//    public function div($number)
//    {
//        return $this->number/=$number;
//    }
//    public function mod($number)
//    {
//        return $this->number%=$number;
//    }
//
//}
//
//$number = new Number(3);
//echo $number->get();
////Инкапсуляция способы взаимодействия между свойствами и методами внутри класса(сокрытие)
////Наследование способы создания дочернего класса на основе базового или родительского(наследование от родительского класса)
////Полиморфизм способы вызова методов дочернего класса которые не существовали на момент базового

//include_once "classes/Tag.php";
//$tag = new Tag('a');
//$tag->appendBody('body');
//$tag->setAttribute('href','/');
//$tag->__construct('div');
//echo $tag->__toString();
//$form = new Tag('form');
////$form->setAttribute('method','POST');
////
////echo $form->start();
////
////echo $form->end();
//$tag=new Tag('div');
//$tag->addClass('first');
//$tag->addClass('second');
//$tag->removeClass('first');
//
//print_r($tag->classesAsArray());

//class Str{
//    static  $name = "STRING";
//    public $age = 20;
//}
//echo Str::$name;

//class Str{
//    public static function upper($str)
//    {
//        return mb_strtoupper($str);
//    }
//    public static function slug($str){
//        $str=str_replace(' ', '-',$str);
//        return self::upper($str);
//        echo Str::upper($str);
//    }
//}
//
//echo Str::slug('Hello world good place');

//class MyStatic{
//    public static $counter = 0;
//    //CODE
//    public function __construct() {
//       self::incrementCounter();
//    }
//    protected static function incrementCounter(){
//        $file = "counter";
//
//        if(!file_exists($file)|| !is_file($file))
//        self::$counter=0;
//        else{
//            self::$counter=file_get_contents($file);
//        }
//        self::$counter++;
//        file_put_contents($file,self::$counter);
//    }
//}
//
////Сколько раз вызывался конструктор
////CODE
//new MyStatic();
//
//echo MyStatic::$counter;
//class MyStatic{
//    const name = 1.4;
//    static $name = "Bob";
//}
//echo MyStatic::name;
include_once  "classes/Tag.php";
$html = Tag::html(['land'=>'ru']);
$head = Tag::head()->appendTo($html);
$body = Tag::body()->appendTo($html);

$ul=Tag::ul()->appendTo($body);
$items = ['first','second','third'];
foreach ($items as $item){
    Tag::li()
        ->appendBody($item)
        ->appendTo($ul);
}
//$body->addClass('clear');

echo $html;




//$tag = Tag::div();
//echo Tag::table()
//    ->appendBody('hello')
//    ->prependBody(['asd','123']);
//$link = Tag::make('a');
//$link->id('main')
//    ->disabled();
//
//echo $link;
//
//echo Tag::html()->start();
//echo Tag::head()->start();
//echo Tag::head()->end();
//echo Tag::html()->end();

////$tag = Tag::input(['class'=>'hello', 'disabled'=>null]);
//$link->id();
//echo Tag::form()->start();
//echo Tag::input();
//echo Tag::form()->end();

//__call($name, $attributes) -> вызывается при отсуствие метода
//__callStatic($name, $attributes) -> вызывается при отсутсвие static метода
//class Test{
//    public function __call($name, $arguments)
//    {
//        var_dump($name); echo "\n";
//        var_dump($arguments);
//    }
//}
//$test= new Test();
//$test->hello('world', ['school']);