<?php
class Router
{
  function route()
  {
    $controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'index';
    
    $controllerClass = '\\controller\\'. ucfirst(strtolower($controllerName));

    if( !class_exists($controllerClass) )
      die('Controller not defined '. $controllerClass);
    
    $controller = new $controllerClass();
    
    $actionName = isset($_GET['action']) ? $_GET['action'] : 'index';
    
    $actionMethod = 'action_'. ucfirst(strtolower($actionName));
    
    if( !method_exists($controller, $actionMethod) )
      die('Action not defined');
    
    $controller->$actionMethod();
  }
}
?>
