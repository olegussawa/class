<?


include 'tag1.php';


class Link extends Tag
	{
		public function __construct()
		{
			$this->setAtr('href','');
			parent::__construct('a');
		}
		public function open()
		{
			$this->activ(); // вызываем активацию
			return parent::open(); // вызываем метод родителя
		}
		
		
		private function activ(){
			
			if($this->getAt('href')===$_SERVER['REQUEST_URI']){
				$this->addClass('active');
			}
		}
		
	}
	
	
	
	?>