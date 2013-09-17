<?php
class Utils
{
  public static function getBaseUrl($extra = false)
  {
    $https = self::isHttps();
    
    $port = $https ? 443 : 80;
    if( $port != $_SERVER['SERVER_PORT'] )
      $port = ':'. $_SERVER['SERVER_PORT'];
    else
      $port = '';
    
    $url = ($https ? 'https' : 'http') .'://'. $_SERVER['HTTP_HOST'] . $port . rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    
    if( !empty($extra) )
      $url .= '/'. ltrim($extra, '/\\');
    
    return $url;
  }
  
  public static function getUrl(array $args)
  {
    if( !isset($args['controller']) )
      $args['controller'] = 'index';
      
    if( !isset($args['action']) )
      $args['action'] = 'index';
      
    $url = self::escapeUrl($args['controller']) .'/'. self::escapeUrl($args['action']) .'.html';
    
    unset($args['controller']);
    unset($args['action']);
    
    
    $firstArg = true;
    
    foreach($args AS $key => $value)
    {
      if( $firstArg )
      {
        $url .= '?';
        $firstArg = false;
      }
      else
        $url .= '&';
        
      $url .= self::escapeUrl($key) .'='. self::escapeUrl($value);
    }
    
    return self::getBaseUrl($url);
  }
  
  public static function isHttps()
  {
    return !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443;
  }
  
  public static function escapeUrl($string)
  {
    return urlencode($string);
  }
  
  public static function escapeHtml($text)
  {
    return htmlspecialchars($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
  }

}
?>
