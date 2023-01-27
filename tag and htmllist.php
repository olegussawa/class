<?
class Tag{

private $name;
private $arratr=[];
private $text;


function __construct($nametag){


$this->name=$nametag;


}

public function open(){

$at=$this->getAtrstr($this->arratr);

return "<$this->name $at>";
}

//вспомогательная функция  преобразовывает массив атрибутов в строку
private function getAtrstr($arr){
	$str='';
	if(!empty($arr)){
			foreach($arr as $key=>$elem){
				$str.="$key=\"$elem\"".' ';
			}
		}return $str;
	}


	
public function close(){

return "</$this->name>";

}

public function show()
		{
			return $this->open() . $this->text . $this->close();
		}

		public function __toString()
		{
            return $this->open() . $this->text . $this->close(); 
		}


public function setAttr($name, $value)
		{
			$this->arratr[$name]=$value;
			return $this; // возвращаем $this чтобы была цепочка
		}


		public function setAttrs($arr){

			foreach($arr as $key=>$elem){
		
				$this->setAttr($key,$elem);
		}
			return $this;
		}

public function removeAttr($name){
unset ($this->arratr[$name]);
return $this;
}






public function addClass($classname){


	if(array_key_exists('class', $this->arratr)){
	
		$arrclass=explode(' ',$this->arratr['class'] );
	
		if(!in_array($classname, $arrclass))$arrclass[]=$classname;
	
		$this->arratr['class']=implode(' ',$arrclass);
			
	
	}else
	{$this->arratr['class']=$classname;}
	
	return $this;
	
			}

			public function removeClass($classname){

                    $a=explode(' ',$this->arratr['class'] );
				
					$key=array_search($classname, $a);
			
		array_splice($a, $key, 1);
			
		$this->arratr['class']=implode(' ',$a);
			
			return $this;
				
						}
			
					
					
//Реализуйте геттеры 


public function getName(){

return $this->name;

}
public function getAttrs(){

	return $this->arratr;
	
	}
	public function getAttr($nameatr){
		if(array_key_exists($nameatr,$this->arratr)){
			return $this->arratr[$nameatr];
		}

		return null;
		
		}


		public function setText($text)
		{
			$this->text = $text;
			return $this;
		}

		public function getText($text)
		{
			return $this->text;
		}

}


class listitem extends Tag{

public function __construct(){

	parent::__construct('li');

}
}
		
class htmllist extends Tag{
	private $items = []; // массив для хранения пунктов
		
	public function addItem(listitem $punkt)
	{
		$this->items[] = $punkt;
		return $this; // вернем $this для цепочки
	}

	public function show()
	{
		$result = $this->open(); // открывающий тег
		
		foreach($this->items as $item){

			$result.=$item->show();
		}
		
		$result .= $this->close(); // закрывающий тег
		
		return $result;
	}


}

class Ul extends htmllist{

	public function __construct(){

		parent::__construct('ul');
	
	}
}


class Ol extends htmllist{

	public function __construct(){

		parent::__construct('ol');
	
	}
}



?>






