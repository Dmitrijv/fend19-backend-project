<?php

class UTILS {

  private static $instance = null;
  private function __construct() { }
  public static function getInstance()
  {
    if (self::$instance == null)
    {
        self::$instance = new Cms();
    } 
    return self::$instance;
  }

  public function formCheckboxValueToBoolean($string) { return $string == "on"; }

  public function formStringToParagraphHtml($string)
  {

    function wrapLineInParagraph($html, $str){
      if ($str == "") return $html;
      return $html .= "<p>".$str."</p>";
    }

    $lines = explode("\n", $string);
    var_dump($lines);
    $html = array_reduce($lines, "wrapLineInParagraph", "");
    return $html;
     
  }



}

?>