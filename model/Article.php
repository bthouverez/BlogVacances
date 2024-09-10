<?php

class Article {
	private int $id;
	private string $title;
	private string $publish_date;
	private string $content;
	private string $image_path;
	private int $user_id;

	public function __construct() {
		$this->id = -1;
		$this->title = 'unset';
		$this->publish_date = 'unset';
		$this->content = 'unset';
		$this->image_path = 'unset';
		$this->user_id = -1;
	}

	public function __get($key) {
		switch($key) {	
			case 'id':
				return $this->id;
			case 'title':
				return $this->title;
			case 'publish_date':
				return $this->publish_date;
			case 'content':
				return $this->content;
			case 'image_path':
				return $this->image_path;
			case 'user_id':
				return $this->user_id;
		}
	}

	public function __set($key, $val) {
		switch($key) {	
			case 'id':
				$this->id = $val;
				break;
			case 'title':
				$this->title = $val;
				break;
			case 'publish_date':
				$this->publish_date = $val;
				break;
			case 'content':
				$this->content = $val;
				break;
			case 'image_path':
				$this->image_path = $val;
				break;
			case 'user_id':
				$this->user_id = $val;
				break;
		}
	}

}