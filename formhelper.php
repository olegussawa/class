<?
class FormHelper extends TagHelper{

public function openForm($arratr=[]){

	return $this->open('form',$arratr);

}

public function input($arratr=[]){
	
	if(!empty($_GET)){

		if(isset($arratr['name'])){
		
			$name=$_GET[$arratr['name']];
			$arratr['value']=$name;
			
}else
		$arratr['value']= '';
		}

return $this->open('input',$arratr);

}

public function hidden($arratr=[]){

	$arratr['type']='hidden';

	return $this->open('input',$arratr);
	
}


public function checkbox($arratr=[]){
	$arratr['type']='checkbox';
	$arratr['value']='1';

if(isset($arratr['name'])){
	
	$name=$arratr['name'];
if (isset($_GET[$name]) and $_GET[$name] == 1) {
	$arratr['checked'] = true;
}

$hidden=$this->hidden(['name'=>$name,'value'=>0]);
}else
$hidden='';

return $hidden . $this->open('input',$arratr);
}

public function textarea($arratr=[]){

if(($_GET)){
	if(isset($arratr['name'])){

$name=$arratr['name'];//text

$text=$_GET[$name];

	}

}else
$text='';
return $this->open('textarea',$arratr).$text.'</textarea>';

}

public function select($sel,$arr){


// 	echo $fh->select(
// 		['name' => 'list', 'class' => 'eee'],
// 		[
// 			['text' => 'item1', 'attrs' => ['value' => '8']],
// 			['text' => 'item2', 'attrs' => ['value' => '17']],
// 			['text' => 'item3', 'attrs' => ['value' => '11', 'class' => 'last']], 	
//    ]
// 		);

$str='';               
	
	$str=$this->open('select',$sel);

foreach($arr as $el){


	if(isset($_GET['list']) and ($_GET['list'])==$el['attrs']['value']){

		$el['attrs']['selected']=true;
		
			}



	$str.= $this->open('option',$el['attrs']).$el['text'].'</option>';
}
	
$str.=$this->close('select');
return $str;

}

public function submit(){

	return $this->open('input',['type'=>'submit']);

}


public function closeForm(){

	return $this->close('form');

}


}

?>