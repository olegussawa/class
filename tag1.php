<?
interface iTag
	{
		// Геттер имени:
		public function getName();
		
		// Геттер текста:
		public function getText();
		
		// Геттер всех атрибутов:
		public function getAtrs();
		
		// Геттер одного атрибута по имени:
		public function getAt($name);
		
		// Открывающий тег, текст и закрывающий тег:
		public function show();
		
		// Открывающий тег:
		public function open();
		
		// Закрывающий тег:
		public function close();
		
		// Установка текста:
		public function setText($text);
		
		// Установка атрибута:
		public function setAtr($name, $val);
		
		// Установка атрибутов:
		public function setAtrs($attrs);
		
		// Удаление атрибута:
		public function removeAtr($name);
		
		// Установка класса:
		public function addClass($classname);
		
		// Удаление класса:
		public function removeClass($classname);
	}

class Tag implements iTag
	{
		private $name;
		private $arr=[];
		private $text;
		
		public function __construct($name)
		{
			$this->name = $name;
		}
		
		public function addClass($classname){
			
			if(isset($this->arr['class'])){
				
			$arrclass=explode(' ',$this->arr['class']);
			
			if(!in_array($classname,$arrclass)){$arrclass[]=$classname; $this->arr['class']=implode(' ',$arrclass);}
			}else
			$this->arr['class']=$classname;
			return $this;
		}
		
		public function setAtr($name,$val){
			$this->arr[$name]=$val;
			return $this;
			}
		
		public function setAtrs($attrs)
	{
		foreach ($attrs as $name => $val) {
		$this->setAtr($name, $val);
		}
		return $this;
	}
	
	
		public function setText($text){
			$this->text=$text;
		}
		
		
		
		public function removeAtr($name){
			unset ($this->arr[$name]);
			return $this;
			}
		
		
		public function removeClass($classname){
			
			if(isset($this->arr['class'])){
			 $art=explode(' ',$this->arr['class']);
			 for($i=0;$i<count($art);$i++){
	if($classname==$art[$i]){
	unset ($art[$i]);}
	$this->arr['class']=implode(' ',$art);
}
return $this; 	
}
     }
				
				
				
// Выводим открывающую часть тега:
		public function open()
		{
			$name = $this->name;
			$atrib=$this->getatr();
			return "<$name $atrib>";
		}
		
		
		public function show()
		{
			return $this->open() . $this->text . $this->close();
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
	
	//геттер getName, возвращающий название тега (то есть значение свойства name)
	
	public function getName()
		{
                      return $this->name;
			}
	//Реализуйте геттер getText, возвращающий текст нашего тега (то есть значение свойства text).
	
	
	public function getText()
		{
			if(isset($this->text)){
				return $this->text;
			}
                      
			}
	//Реализуйте геттер getAttrs, возвращающий массив всех атрибутов тега (то есть значение свойства attrs).
	
	
	public function getAtrs()
		{
			return var_dump( $this->arr);
			}
	
	  //Реализуйте геттер getAttr, параметром принимающий имя атрибута и возвращающий значение этого атрибута (а если такого атрибута нет - то null).
	  
	  public function getAt($name)
		{
			if(isset($this->arr[$name])){
				return $this->arr[$name];
			}
			 return null;
			}
			
	 
	  
	  
	}
	
	
	
	
			
			
		
	
	
	
	
	
	
	
	
	
	
	
	
?>







