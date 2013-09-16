<?php

define('APP_ROOT', dirname(__FILE__), true);

function appAutoload($class)
{
  $file = APP_ROOT .'/'. $class .'.class.php';
  $file = str_replace('\\', '/', $file);

  if( is_readable($file) )
    include($file);
}
spl_autoload_register('appAutoload');

//\model\DBConnection::connect('mysql:dbname=statistiktool;host=localhost', 'root', 'meinPW');
?>
