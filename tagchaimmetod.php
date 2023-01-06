<?

/*Bынес добавление атрибутов из конструктора в отдельный метод setAttr. Пусть при этом наш метод позволяет добавлять только один атрибут, а чтобы добавить несколько атрибутов - нужно будет вызвать несколько методов в виде цепочки.


	/*$tag = new Tag('input');
	
	echo $tag
		->setAttr('id', 'test') // добавляем атрибут 'id'
		->setAttr('class', 'eee bbb') // добавляем атрибут 'class'
		->open(); // выведет <input id="test" class="eee bbb">*/

class Tag
	{
		private $name;
		private $arr=[];
		
		public function __construct($name)
		{
			$this->name = $name;
			
		}
		
		public function setAtr($name,$val){
			$this->arr[$name]=$val;
			return $this;
			
		}
		
		
	// Выводим открывающую часть тега:
		public function open()
		{
			$name = $this->name;
			$atrib=$this->getatr();
			return "<$name $atrib>";
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






