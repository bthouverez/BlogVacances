<?php

class User {
	private $id;
	private $username;
	private $last_connection;

	public function __construct() {
		$this->id = -1;
		$this->username = 'undefined';
		$this->last_connection = date('Y-m-d h:i:s');
	}

	public function __get($key) {
		switch($key) {	
			case'id':
				return  $this->id;
			case'username':
				return  $this->username;
			case'last_connection':
				return  $this->last_connection;
		}
	}
	

	public function __set($key, $value) {
		switch($key) {
			case'id':
				$this->id = $value;
			case'username':
				$this->username = $value;
			case'last_connection':
				$this->last_connection = $value;
		}
	}

}