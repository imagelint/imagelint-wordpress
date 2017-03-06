<?php

class ImageLint_Parser {

  static function parseHook() {
    ob_start(__CLASS__ . '::parseHandler');
  }

  static function parseHandler($input) {
    return htmlspecialchars($input);
  }

  // Placeholder Method, this will be replaced by an external library
  static function getUrl($url) {
    return base64_encode($url);
  }

}

?>
