<?php
namespace model;

class QuestionModel extends Model {
  
  function __construct() {
    parent::__construct();
  }
  
  public static function getQuestion($id) {
    $sql = '
      SELECT id, question, multiple, dependsOn
      FROM questions
      WHERE
        id =  ?';
    $stmt = DBConnection::getConnection()->prepare($sql);
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  
  public static function getAllQuestions() {
  	$sql = 'SELECT id, question, multiple, dependsOn, freieEingabe FROM questions;';
  	$stmt = DBConnection::getConnection()->prepare($sql);
  	$stmt->execute();
  	$data = $stmt->fetchAll();
  	
  	$response = array();
  	for($i = 0; $i < count($data); $i++) {
  		$response[$i]['id'] = $data[$i][0];
  		$response[$i]['title'] = $data[$i][1];
  		$response[$i]['multiple'] = $data[$i][2];
  		$response[$i]['dependsOn'] = array($data[$i][3]);
  		
  		
  		$sql = 'SELECT * FROM answers WHERE fk_question_id = ?';
  		$stmt = DBConnection::getConnection()->prepare($sql);
  		$stmt->bindValue(1, $data[$i][0], \PDO::PARAM_INT);
  		$stmt->execute();
  		
  		$answerData = $stmt->fetchAll();
  		
  		for($u = 0; $u < count($answerData); $u++) {
  			$response[$i]['answers'][$u]['id'] = $answerData[$u]['id'];
  			$response[$i]['answers'][$u]['title'] = $answerData[$u]['answer'];
  		}
  	}
  	
  	return $response;
  }
}
?>
