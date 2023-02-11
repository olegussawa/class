<?


class CookieShell
	{
		public function set($name, $value,$time)
		{
			// устанавливает куки
			// $time задает время в сек, через сколько кука умрет
                setcookie($name, $value, $time);
		}
		
		public function get($name)
		{
			// получает куки
			return $_COOKIE[$name] ;
		}
		
		public function del($name)
		{
			// удаляет куки
			setcookie($name, '', time());
	unset($_COOKIE[$name]);
		}
		
		public function exists($name)
		{
			// проверяет наличие куки

			if(isset($_COOKIE[$name])){return true;}else
			return false;
		}
	}



	class SessionShell
	{
		// Удобно стартуем сессию в конструкторе класса:
		public function __construct()
		{
			if (!isset($_SESSION)) {
				session_start();
			}
		}
		
		public function set($name, $value)
		{
			// устанавливает переменную сессии
			$_SESSION[$name] = $value;
		}
		
		public function get($name)
		{
			// получает переменную сессии
			return $_SESSION[$name];

		}
		
		public function del($name)
		{
			// удаляет переменную сессии

			unset($_SESSION[$name]);
		}
		
		public function exists($name)
		{
			// проверяет переменную сессии
			return isset($_SESSION[$name])?true:false;

		}
		
		public function destroy()
		{
			// разрушает сессию
			session_destroy();
		}
	}

?>