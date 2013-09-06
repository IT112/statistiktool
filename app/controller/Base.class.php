<?php
namespace controller;

class Base
{
  private $h;
  private $args;
  
  public function __construct()
  {
    $this->h = new \Html();
  }
  
  protected function render($___file_, array $___args_ = array())
  {
    $this->args = $___args_;
    extract($___args_);
    
    $h = $this->h;
       
    include(FX_ROOT .'/template/layout/begin.html');
    
    include(FX_ROOT .'/template/'. $___file_ .'.html');
    
    include(FX_ROOT .'/template/layout/end.html');
  }
  
  private function includeTemplate($___file_)
  {
    extract($this->args);
    $h = $this->h;
    
    include(FX_ROOT .'/template/'. $___file_ .'.html');
  }
}
?>