# Tplp

<<<<<<< HEAD
Для полключения библиотеки -`require("autoload.php");`
=======
Для полключения библиотеки - `require("autoload.php");`
>>>>>>> 349619d1ea42a445522c2a08f1b55a05c0cce099

В конструктор класса, первым параметром, 
передаётся сам файл .tpl; вторым и третьим -
разделители для шаблонных строк. По умолчанию - {{ и }}.

Для шаблонизации  `public function render()`, с
массивом, или строкой входных данных (см. тест),
для подставления значений в шаблон .tpl файла.

Функция `returnTpl()` выводит содержимое .tpl файла.
Функция `cleanTpl()` очищает .tpl файл с конструктора.
