<?php
class Utils
{
  public static function getBaseUrl()
  {
    $https = self::isHttps();
    
    $port = $https ? 443 : 80;
    if( $port != $_SERVER['SERVER_PORT'] )
      $port = ':'. $_SERVER['SERVER_PORT'];
    else
      $port = '';
    
    return ($https ? 'https' : 'http') .'://'. $_SERVER['HTTP_HOST'] . $port . rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  }
  
  public static function isHttps()
  {
    return !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443;
  }
}
?>
