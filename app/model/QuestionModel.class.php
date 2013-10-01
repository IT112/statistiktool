<?php
namespace model;

class QuestionModel extends Model {
  
  function __construct() {
    parent::__construct();
  }
  
  public static function getQuestion($id) {
    $sql = '
      SELECT *
      FROM questions
      WHERE
        id =  ?';
    $stmt = DBConnection::getConnection()->prepare($sql);
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  
  public static function getAllQuestions() {
    return array(
      array(
        'id' => 1,
        'title' => 'Wie alt bist du?',
        'multiple' => false,
        'answers' => array(
          array('id' => 1, 'title' => '1-4'),
          array('id' => 2, 'title' => '5-6'),
          array('id' => 3, 'title' => '7-9'),
          array('id' => 4, 'title' => '10-12'),
          array('id' => 5, 'title' => '13-45'),
          array('id' => 6, 'title' => '46-199'),
        )
      ),
      array(
        'id' => 2,
        'title' => 'Hast du ein Smartphone?',
        'multiple' => false,
        'answers' => array(
          array('id' => 7, 'title' => 'Ja'),
          array('id' => 8, 'title' => 'Nein'),
        )
      ),
      array(
        'id' => 3,
        'title' => 'Was fuer ein OS hat dein Smartphone?',
        'dependsOn' => array(7),
        'multiple' => true,
        'answers' => array(
          array('id' => 9, 'title' => 'iOS'),
          array('id' => 10, 'title' => 'Android'),
          array('id' => 11, 'title' => 'BirneOS'),
        )
      ),
      array(
        'id' => 4,
        'title' => 'Welche Android version?!',
        'dependsOn' => array(10),
        'multiple' => false,
        'answers' => array(
          array('id' => 12, 'title' => '2'),
          array('id' => 13, 'title' => '4.1'),
          array('id' => 14, 'title' => '4.2'),
        )
      ),
    );
  }
}
?>
