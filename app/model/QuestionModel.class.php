<?php
require_once("Model.php");

static class QuestionModel extends Model {
	
	function __construct() {
		parent::__construct();
	}
	
	public static function getQuestion($id) {
		$result = $db->query("SELECT * FROM questions WHERE questions.ID = $id");
	}
}
?>