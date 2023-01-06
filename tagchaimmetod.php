<?

/*Bынес добавление атрибутов из конструктора в отдельный метод setAttr. Пусть при этом наш метод позволяет добавлять только один атрибут, а чтобы добавить несколько атрибутов - нужно будет вызвать несколько методов в виде цепочки.


	/*$tag = new Tag('input');
	
	echo $tag
		->setAttr('id', 'test') // добавляем атрибут 'id'
		->setAttr('class', 'eee bbb') // добавляем атрибут 'class'
		->open(); // выведет <input id="test" class="eee bbb">*/




//2 .Реализуйте метод removeAttr, который будет удалять переданный параметром атрибут. Сделайте так, чтобы этот метод также мог принимать участие в цепочке.






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
		
		//delete atribut
		public function removeAtr($name){
			unset ($this->arr[$name]);
			return $this;
			
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






