<?

//класс Tag для упрощения работы с HTML тегами. Имея такой класс мы, вместо того, чтобы набирать HTML теги вручную, будем использовать для этого PHP.





class Tag
	{
		private $name;
		
		public function __construct($name)
		{
			$this->name = $name;
		}
		
		// Выводим открывающую часть тега:
		public function open()
		{
			$name = $this->name;
			return "<$name>";
		}
		
		public function close()
		{
			$name = $this->name;
			return "</$name>";
		}
	}
	
	
	
	/*Пусть теперь мы хотим сделать так, чтобы в создаваемых тегах можно было указывать атрибуты и их значения. Давайте будем передавать атрибуты для тега в виде ассоциативного массива в конструктор тега.

Вот пример (пока не рабочий, это наша цель):*/


	/*$tag = new Tag('input', ['id' => 'test', 'class' => 'eee bbb']);
	echo $tag->open();  выведет <input id="test" class="eee bbb">*/

class Tag
	{
		private $name;
		private $arr;
		
		public function __construct($name, $arr=[])
		{
			$this->name = $name;
			$this->arr = $arr;
		}
		
		// Выводим открывающую часть тега:
		public function open()
		{
			$name = $this->name;
			$atr=$this->getatr();
			return "<$name $atr>";
		}
		// Выводим закрывающую часть тега:
		public function close()
		{
			$name = $this->name;
			return "</$name>";
		}
		
		
		private function getatr(){
			if(!empty($this->arr)){
				$res='';
				foreach($this->arr as $key=>$el){$res.=$key.'='."\"$el\"";
				}return $res;
			}return '';
	}
	}
	
	
	
	
			
			
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	?>