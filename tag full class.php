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

/*public function __toString()
		{
            return $this->open() . $this->text . $this->close(); 
		}*/


public function setAttr($name, $value=true)
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




	public function getAttr($name){

		if(isset($this->arratr[$name]))

			return $this->arratr[$name];
		}


		public function setText($text)
		{
			$this->text = $text;
			return $this;
		}

		public function getText()
		{
			return $this->text;
		}

}



//--------------------------------------------
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
	




class Form extends Tag{



public function __construct(){

parent:: __construct('form');

}
}



class Input extends Tag
	{
		public function __construct()
		{
			parent::__construct('input');
		}
		
		public function open()
		{
			$inputName = $this->getAttr('name');

			if (isset($_REQUEST[$inputName])) {
					$value = $_REQUEST[$inputName];
					$this->setAttr('value', $value);
				}
			
			
			return parent::open();
		}
		
		public function __toString()
		{
			return $this->open();
		}
	


	}

class Submit extends Input{

public function __construct(){
	$this->setAttr('type', 'submit');

	parent::__construct();
	}

}


class Password extends Tag{

	public function __construct(){
		$this->setAttr('type', 'password');
	
		parent::__construct('input');
	
	
	}
	public function __toString(){

		return $this->open();

}


}



class Textarea extends Tag{

	public function __construct(){
		
	
		parent::__construct('textarea');
	}


	public function show()
	{
		$inputName = $this->getAttr('name');

		if (isset($_POST[$inputName])) {
				$text = $_POST[$inputName];
				$this->setText($text);
			}
		
		
		return parent::show();
	}



}

class Hidden extends Input{

	public function __construct(){
		$this->setAttr('type', 'Hidden');
	
		parent::__construct();
	}
	

}




class Checkbox extends Tag{


public function __construct(){

$this->setAttr('type','checkbox');
$this->setAttr('value','1');

parent::__construct('input');

}

public function open(){

$name=$this->getAttr('name');

If($name){

$hidden=(new Hidden)->setAttr('value','0')->setAttr('name',$name);


//--------------------
if(isset($_POST[$name])){
	if($_POST[$name]==1) {$this->setAttr('checked');}else

{$this->removeAttr('checked');}
}

//--------------------------------------

return $hidden->open().parent::open();

}else
return parent::open();


}


public function __toString(){

return $this->open();}


}

class Radio extends Tag{


public function __construct(){



$this->setAttr('type','radio');
$this->setAttr('value','1');

parent:: __construct('input');

}


public function open(){


$name=$this->getAttr('name');

if($name){



	//---------------------
	if(isset($_POST[$name])){

		if($_POST[$name]==1)$this->setAttr('checked');
		else $this->removeAttr('checked');
	}
	//----------------------------------

$hidden=(new Hidden)->setAttr('name',$name)->setAttr('value','0');
return $hidden->open().parent::open();

}else
return parent::open();

}

public function __toString(){


return $this->open();

}

}




class Select extends Tag{

private $arr=[];

public function __construct(){

parent:: __construct('select');
}



public function add(Option $option){

	$this->arr[]=$option;
	return $this;

}

public function show(){


	$result=$this->open();

	foreach($this->arr as $el){




			if(isset($_POST['list']) and $_POST['list']==$el->getText()){

				$result.=$el->setSel()->show();
			}else
			$result.=$el->show();

			
			
	
     
}
	 $result.=$this->close();
return $result;
}


}


class Option extends Tag{

	public function __construct(){

		parent:: __construct('option');
		}


		public function setSel(){

			$this->setAttr('selected');
			return $this;
			}

}











?>