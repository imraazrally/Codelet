<?php
	class OpenEndedAnswer extends GenericAnswer{
		private $case1;
		private $case2;
		private $case3;
		private $answer1;
		private $answer2;
		private $answer3;

		public function __construct($case1, $case2, $case3, $answer1, $answer2, $answer3){
			$this->case1=$case1;
			$this->case2=$case2;
			$this->case3=$case3;
			$this->answer1=$answer1;
			$this->answer2=$answer2;
			$this->answer3=$answer3;
			parent::__construct("NULL");
		}

		public function getCase1(){
			return $this->case1;
		}

		public function getCase2(){
			return $this->case2;
		}

		public function getCase3(){
			return $this->case3;
		}

		public function getAnswer1(){
			return $this->answer1;
		}

		public function getAnswer2(){
			return $this->answer2;
		}

		public function getAnswer3(){
			return $this->answer3;
		}
	}
?>