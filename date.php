<?php







	class Date
	{
		public function __construct($date = null)
		{
			// если дата не передана - пусть берется текущая
			$this-date=$date;
		}
		
		public function getDay()
		{
			// возвращает день
		}
		
		public function getMonth($lang = null)
		{
			// возвращает месяц
			
			// переменная $lang может принимать значение ru или en
			// если эта не пуста - пусть месяц будет словом на заданном языке
		}
		
		public function getYear()
		{
			// возвращает год
		}
		
		public function getWeekDay($lang = null)
		{
			// возвращает день недели
			
			// переменная $lang может принимать значение ru или en
			// если эта не пуста - пусть день будет словом на заданном языке
		}
		
		public function addDay($value)
		{
			// добавляет значение $value к дню
		}
		
		public function subDay($value)
		{
			// отнимает значение $value от дня
		}
		
		public function addMonth($value)
		{
			// добавляет значение $value к месяцу
		}
		
		public function subMonth($value)
		{
			// отнимает значение $value от месяца
		}
		
		public function addYear($value)
		{
			// добавляет значение $value к году
		}
		
		public function subYear($value)
		{
			// отнимает значение $value от года
		}
		
		public function format($format)
		{
			// выведет дату в указанном формате
			// формат пусть будет такой же, как в функции date
		}
		
		public function __toString()
		{
			// выведет дату в формате 'год-месяц-день'
		}
	}
?>