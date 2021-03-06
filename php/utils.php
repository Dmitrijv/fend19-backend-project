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

  public static function formCheckboxValueToBoolean($string) { return ($string == "on") ? 1 : 0; }

  public static function formStringToParagraphHtml($string)
  {
    function wrapLineInParagraph($html, $line)
    {
      if ($line == "") return $html;
      return $html .= "<p>".$line."</p>";
    }
    $lines = explode("\r\n", $string);
    return array_reduce($lines, "wrapLineInParagraph", "");
  }

  public static function fromParagraphHtmlToString($html)
  {
    $dom = str_get_html($html);
    $str = "";
    foreach($dom->find('p') as $p) { $str .= $p->innertext . "\n\r"; }
    return $str;
  }

  public static function deleteFile($fileName) {
    unlink(__DIR__ ."/../img/uploads/".$fileName);
  }

  public static function isIframeValid($iframe) {
    $regGoogleMap = '/<iframe\s*src="https:\/\/www\.google\.com\/maps\/embed\?[^"]+"*\s*[^>]+>*<\/iframe>/';
    $regYouTube = '/<iframe[^>]*src\s*=\s*"?https?:\/\/[^\s"\/]*\.youtube.com\/embed\/(?:\/[^\s"]*)?"?[^>]*>.*?<\/iframe>/';
    return preg_match($regGoogleMap, $iframe) || preg_match($regYouTube, $iframe);
  }  

}

?>