<?php
namespace repo\Tplp;

/**
 * Ну что писать..
 * Шаблонизатор .tpl файлов, друзья ~
 *
 * @package default
 * @author `_polak228_`
 */

interface TplpInterface {

  static function returnError($error, $str); // возврат ошибок
  public function returnTpl(); // выдает контент с файла .tpl
  public function cleanTpl(); // очистить .tpl
  public function render($content = ""); // сама шаблонизация - array|string $content

}


class Tplp implements TplpInterface {

  public $fileTpl; // file.tpl
  public $dividers = array(); // разделители по типу {{}}

  static $errors = [ // ошибки
    "tplNameError" => "Ошибка инициализации tpl файла",
    "filePathError" => "Путь к файлу не существует",
    "emptyTemplate" => "Нет входных данных для рендеринга",
    "errorTypeTemplate" => "Данные должны быть массивом, или строкой"
  ];

  static function returnError($error, $str = "") {
    die(self::$errors[$error] . $str);
  }

  // __construct() берет только путь к файлу .tpl
  public function __construct($fileTpl, $d1 = "{{", $d2 = "}}") {
    // если файл != {file}.tpl
    if( pathinfo(substr($fileTpl, strpos($fileTpl, "/") + 1), PATHINFO_EXTENSION) !== "tpl" ) self::returnError("tplNameError", " - " . $fileTpl);
    if( !file_exists($fileTpl) ) self::returnError("filePathError", " - " . $fileTpl);
    $this -> fileTpl = $fileTpl;
    $this -> dividers = array(1 => $d1, 2 => $d2);
  }

  public function returnTpl() {
    echo ($this -> fileTpl) ? file_get_contents($this -> fileTpl) : self::returnError("emptyTemplate");
  }

  public function cleanTpl() {
    $this -> fileTpl = ""; return true;
  }

  public function render($content = "") {
    if( !$content ) self::returnError("emptyTemplate");
    if( !$this -> fileTpl ) self::returnError("emptyTemplate");
    $tplContent = file_get_contents($this -> fileTpl);
    $dividers = $this -> dividers;
    if( is_array($content) ) {
      foreach( $content as $key => $value ) {
        $key = trim($key); $value = trim($value);
        $tplContent = str_replace($dividers[1] . $key . $dividers[2], $value, $tplContent);
      }
    } else if( is_string($content) ) {
        $arr = array(); $arr2 = explode(',', $content);
        foreach($arr2 as $str) {
          list($key, $value) = explode('=', $str);
          $arr[$key] = $value;
        } foreach( $arr as $key => $value ) {
            $key = trim($key); $value = trim($value);
            $tplContent = str_replace($dividers[1] . $key . $dividers[2], $value, $tplContent);
          }
      } else self::returnError("errorTypeTemplate", ".<br>Error: " . $content);
    echo $tplContent; return true;
  } // end render()

}