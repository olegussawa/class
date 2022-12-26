<?php
	interface iFile
	{
		public function __construct($filePath);
		
		public function getPath(); // путь к файлу
		public function getDir();  // папка файла
		public function getName(); // имя файла
		public function getExt();  // расширение файла
		public function getSize(); // размер файла
		
		public function getText();          // получает текст файла
		public function setText($text);     // устанавливает текст файла
		public function appendText($text);  // добавляет текст в конец файла
		
		public function copy($copyPath);    // копирует файл
		public function delete();           // удаляет файл
		public function rename($newName);   // переименовывает файл
		public function replace($newPath);  // перемещает файл
	}
?>