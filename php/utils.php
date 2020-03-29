<?php

require_once('simple_html_dom.php');

class UTILS {

  private static $instance = null;
  private function __construct() { }
  public static function getInstance()
  {
    if (self::$instance == null) { self::$instance = new UTILS(); } 
    return self::$instance;
  }

  public function formCheckboxValueToBoolean($string) { return $string == "on"; }

  public function formStringToParagraphHtml($string)
  {
    function wrapLineInParagraph($html, $line)
    {
      // echo $line;
      if ($line == "") return $html;
      return $html .= "<p>".$line."</p>";
    }
    $lines = explode("\n", $string);
    return array_reduce($lines, "wrapLineInParagraph", "");
  }

  public function fromParagraphHtmlToString($html)
  {
    $dom = str_get_html($html);
    $str = "";
    foreach($dom->find('p') as $p) { $str .= $p->innertext . "\n"; }
    return $str;
  }

  public function isAttatchedImageValid($target_file)
  {
    $allowedExtentions = ["gif", "jpeg", "jpg", "png"];

    // check if format is allowed
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $allowedExtentions)) { echo "bad format"; return false; }

    // check if image file is a actual image or fake image
    if(getimagesize($_FILES["post-attatched_image"]["tmp_name"]) === false) { echo "not image"; return false; }

    // check file size
    if ($_FILES["post-attatched_image"]["size"] > 1500000) { echo "filesize too big"; return false; }

    return true;
  }

}

?>