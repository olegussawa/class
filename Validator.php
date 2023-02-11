<?
class Validator
	{
		public function isEmail($str)
		{
			// проверяет строку на то, что она корректный email

			return preg_match('#^[a-zA-Z-.]+@[a-z]+\.[a-z]{2,3}$#', $str)?true:false;
		}
		
		public function isDomain($str)
		{
			// проверяет строку на то, что она корректное имя домена

			return preg_match('#^([a-z0-9]+\.)+[a-z]{2,3}$#',$str)?true:false;
        }
		
		public function inRange($num, $from, $to)
		{
			// проверяет число на то, что оно входит в диапазон

			return ($num>=$from and $num<=$to)?true:false;
		}
		
		public function inLength($str, $from, $to)
		{
			// проверяет строку на то, что ее длина входит в диапазон
                           $num=strlen($str);
			return ($num>=$from and $num<=$to)?true:false;
		}
	}
?>