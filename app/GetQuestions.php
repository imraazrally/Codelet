<?php
//----------------------------------------Function Definitions-------------------------
	function getTFQuestions($questions){
		$listOfQuestionsCreatedByInstructor=array();
		foreach ($questions as $question){
			if($question->getType()==2){
					array_push(
									$listOfQuestionsCreatedByInstructor, 
									array(
										   'question'=>$question->getQuestion(),
										   'id'=>$question->getId(),
										   'answerA'=>'true',
										   'answerB'=>'false'	
										 )
							  );
			}
		}
		return $listOfQuestionsCreatedByInstructor;
	}

	function getMCQuestions($questions){
		$listOfQuestionsCreatedByInstructor=array();
		foreach ($questions as $question){
			if($question->getType()==1){
					array_push(
									$listOfQuestionsCreatedByInstructor, 
									array(
										   'question'=>$question->getQuestion(),
										   'id'=>$question->getId(),
										   'answerA'=>$question->getAnswer()->getAnswerA(),
										   'answerB'=>$question->getAnswer()->getAnswerB(),
										   'answerC'=>$question->getAnswer()->getAnswerC(),
										   'answerD'=>$question->getAnswer()->getAnswerD(),	
										 )
							  );
			}
		}
		return $listOfQuestionsCreatedByInstructor;
	}


	function getOpenEndedQuestions($questions){
		$listOfQuestionsCreatedByInstructor=array();
		foreach ($questions as $question){
			if($question->getType()==4){
					array_push(
									$listOfQuestionsCreatedByInstructor, 
									array(
										   'question'=>$question->getQuestion(),
										   'id'=>$question->getId(),
										 )
							  );
			}
		}
		return $listOfQuestionsCreatedByInstructor;
	}

?>