<?php

define('FX_ROOT', dirname(__FILE__), true);

function fxAutoload($class)
{
  $file = FX_ROOT .'/'. $class .'.class.php';
  $file = str_replace('\\', '/', $file);

  if( is_readable($file) )
    include($file);
}
spl_autoload_register('fxAutoload');

model::DBConnection::connect('mysql:dbname=statistiktool;host=localhost', 'root', 'meinPW');
?>
