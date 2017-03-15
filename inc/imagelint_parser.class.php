<?php
use voku\helper\HtmlDomParser;

class ImageLint_Parser {

  const CSSURLREGEX = "|url\\(['\"]*(.*?)['\"]*\\)|i";

  static function parseHook() {
    ob_start(__CLASS__ . '::parseHandler');
  }

  static function parseHandler($input) {
    $html = HtmlDomParser::str_get_html($input);
    $output = '';

    foreach($html->find('img') as $element) {
      $element->src = self::getUrl($element->src);
    }

    foreach($html->find('*[style]') as $element) {
      $output = $element->style;
      $element->style = preg_replace_callback(self::CSSURLREGEX, __CLASS__ . '::parseCSSUrl', $element->style);
    }

    return $html;
  }

  static function parseCSSUrl($matches) {
    return 'url("' . self::getUrl($matches[1]) . '")';
  }

  static function getUrl($url) {
    return Imagelint\Imagelint::get($url);
  }

}

?>
