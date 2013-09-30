<?php
namespace controller;

class Question extends Base
{
  function action_list() {
    $this->includeJavascript('question/list');    
    
    $answers = isset($_POST['answers']) ? \Utils::flattenArrayRecursive($_POST['answers']) : array();
    $this->render(
      'question/list',
      array(
        'questions' => \model\QuestionModel::getAllQuestions(),
        'selectedAnswers' => $answers,
      )
    );
  }
}
?>
