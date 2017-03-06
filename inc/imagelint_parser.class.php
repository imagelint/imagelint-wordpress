<?php
use voku\helper\HtmlDomParser;

class ImageLint_Parser {

  static function parseHook() {
    ob_start(__CLASS__ . '::parseHandler');
  }

  static function parseHandler($input) {
    $html = HtmlDomParser::str_get_html($input);
    $output = '';

    foreach($html->find('img') as $element) {
      $output .= $element->src . '<br>';
    }

    return $output;
  }

  // Placeholder Method, this will be replaced by an external library
  static function getUrl($url) {
    return base64_encode($url);
  }

}

?>
