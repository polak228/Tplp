<?php
include_once("../autoload.php");

/**
 * Директива `use` не указана в autoload.php.
 * При необходимости можно изменить псевдоним
 * класса в autoload.php
 */

$tmp = array(
  "name" => "Roman",
  "surname" => "Zharov",
  "age" => "16",
  "text" => "просто текст"
);

// $tmp = "name = Kir, surname = Sosichka, age = 100500, text = test text";

$tpl = new Tplp("test.tpl");
$tpl -> render($tmp); // false, вторым аргументом, если не нужно выводить результат.
$tpl -> clearTpl();