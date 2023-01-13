<?
include 'tag1.php';

class Image extends Tag
	{
		
		
		
		public function __construct(){
			$this->setAtr('src', '');
			$this->setAtr('alt', '');
			
			parent::__construct('img');
		}
		public function __toString()
		{
			return parent::open(); // вызываем метод родителя
		}
	}















?>