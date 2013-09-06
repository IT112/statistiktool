<?php

class Html
{
  public function escape($text)
  {
    return htmlspecialchars($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
  }
  
  public function escapeUri($text)
  {
    return urlencode($text);
  }
}

?>