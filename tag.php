<?

//класс Tag для упрощения работы с HTML тегами. Имея такой класс мы, вместо того, чтобы набирать HTML теги вручную, будем использовать для этого PHP.





class Tag
	{
		private $name;
		
		public function __construct($name)
		{
			$this->name = $name;
		}
		
		// Выводим открывающую часть тега:
		public function open()
		{
			$name = $this->name;
			return "<$name>";
		}
		
		public function close()
		{
			$name = $this->name;
			return "</$name>";
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	?>