<?php
namespace model;

class DBConnection extends Model
{
  private static $connection;

  public static function connect($dsn, $username, $password, array $options = array())
  {
    self::$connection = new \PDO($dsn, $user, $password, $options);
    self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    self::$connection->exec('SET NAMES utf8');
  }
  
  public static function getConnection()
  {
    return self::$connection;
  }
}

?>
