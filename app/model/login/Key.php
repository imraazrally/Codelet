<?php
	class Key{
		private $role

		function __construct($role){
			$this->role=$role;
		}

		public function getRole(){
			return $this->role;
		}
	}
?>