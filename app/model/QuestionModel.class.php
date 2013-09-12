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
		$stmt = DBConnection->getConnection()->prepare($sql);
		$stmt->bindValue(1, $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}
}
?>
