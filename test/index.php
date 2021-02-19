<?php
/**
 * Директива `use` уже указана в autoload.php.
 * При необходимости можно изменить псевдоним
 * класса в autoload.php
 */

include_once("../autoload.php");

$tmp = array(
  "name" => "Roman",
  "surname" => "Zharov",
  "age" => "16",
  "text" => "просто текст"
);

//$tmp = "aziza = 0, name = Kir,   surname =Sosichka    ,   age=100500";

$tpl = new Tplp("test.tpl");
$tpl -> render($tmp);