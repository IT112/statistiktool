<?php
namespace controller;

class Question extends Base
{
  function action_list() {
    $this->render(
      'question/list',
      array(
        'questions' => \model\QuestionModel::getAllQuestions(),
        'selectedAnswers' => isset($_POST['answers']) ? $_POST['answers'] : array(),
      )
    );
  }
}
?>
