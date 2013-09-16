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
        'title' => 'wie ald bisd tu?',
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
        'title' => 'Was fürn OS hat dein Schmarthphone?',
        'multiple' => true,
        'answers' => array(
          array('id' => 7, 'title' => 'EiOS'),
          array('id' => 8, 'title' => 'Arndroind'),
          array('id' => 9, 'title' => 'BirneOS'),
        )
      ),
    );
  }
}
?>
