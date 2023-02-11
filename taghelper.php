<?
class TagHelper{


public function open($name,$arratr=[]){

return "<$name".' '. $this->stratr($arratr).">";
}

public function close($name){

	return "</$name>";
}


private function stratr($arr){

if(!empty($arr)){
$str='';
foreach($arr as $key=>$el){

$str.="$key=\"$el\" ";

}return $str;

}else return '';
}

public function show($name,$text=''){

return "<$name>$text</$name>";
}

}


?>