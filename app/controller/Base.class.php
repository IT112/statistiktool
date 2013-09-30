<?php
namespace controller;

class Base
{
  private $args;
  private $includedJavascripts = array();
  
  public function __construct()
  {
  }
  
  protected function includeJavascript($name)
  {
    $this->includedJavascripts[] = $name;
  }
  
  protected function render($___file_, array $___args_ = array())
  {
    $this->args = $___args_;
    extract($___args_);
       
    include(APP_ROOT .'/template/layout/begin.html');
    
    include(APP_ROOT .'/template/'. $___file_ .'.html');
    
    include(APP_ROOT .'/template/layout/end.html');
  }
  
  protected function includeTemplate($___file_)
  {
    extract($this->args);

    include(APP_ROOT .'/template/'. $___file_ .'.html');
  }
}
?>
