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

    function wrapLineInParagraph($html, $line)
    {
      if ($line == "") return $html;
      return $html .= "<p>".$line."</p>";
    }

    $lines = explode("\n", $string);
    return array_reduce($lines, "wrapLineInParagraph", "");
     
  }


}

?>