<?php

class Date{
		
		private $date;
		
		public function __construct($date = null)
		{
			// если дата не передана - пусть берется текущая
			if($date){
				$this->date=$date;
			}else
			
			{$this->date = date('Y-m-d');}
		}
		
		public function getDay()
		{
			// возвращает день
			return date('d', strtotime($this->date));
		}
		
	public function getMonth($lang = null){
		
		// возвращает месяц
			
			// переменная $lang может принимать значение ru или en
			// если эта не пуста - пусть месяц будет словом на заданном языке
		
$ru = [1=>'Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентярь','Октябрь','Ноябрь','Декабрь'];
$en = [1=>'Jan','Febr','Marh','April','May','June','July','August','September','Oct','November','December'];

	$num= date('m', strtotime($this->date));
			if($lang=='ru'){
				foreach($ru as $key=>$el){
					if($num==$key)return $el;
				}
			}
			if($lang=='en'){
				foreach($en as $key=>$el){
					if($num==$key)return $el;
				}
			}
			return $num;
		}
		
		public function getYear()
		{
			
			// возвращает month// возвращает год
			
			return date('Y', strtotime($this->date));
		}
		
		public function getWeekDay($lang = null)
		{
			
			// возвращает день недели
			
			// переменная $lang может принимать значение ru или en
			// если эта не пуста - пусть день будет словом на заданном языке
			
$ru =[1 => 'Понедельник' , 'Вторник' , 'Среда' , 'Четверг' , 'Пятница' , 'Суббота' , 'Воскресенье' ];
$en = [1=>'mon','vtor','sred','chetverg','pyatnica','subb','voscr'];

$num= date('w', strtotime($this->date));
			
			if($lang=='ru'){
				foreach($ru as $key=>$el){
					if($num==$key)return $el;
				}
			}
			if($lang=='en'){
				foreach($en as $key=>$el){
					if($num==$key)return $el;
				}
			}
			return $num;
			
		}
			public function addDay($value)
		{
			// добавляет значение $value к дню
                $this->date = date('Y-m-d', strtotime($this->date . "+$value day"));
       return $this;
	         }
		
		public function addYear($value)
		{
			// добавляет значение $value к году
			$this->date = date('Y-m-d', strtotime($this->date . "+$value year"));
       return $this;
               }
               
               
               
               public function subDay($value)
		{
			// отнимает значение $value к дню
                $this->date = date('Y-m-d', strtotime($this->date . "-$value day"));
       return $this;
	         }
               
		
		public function format($format)
		{
			return date($format, strtotime($this->date));
			}
			
			public function __toString()
		{
			// выведет дату в формате 'год-месяц-день'
		return (string)$this->date;
		}
			
}
		
?>