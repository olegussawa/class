<?php

interface iFile
	{
		public function __construct($Pathfile);
		
		public function getPath(); // путь к файлу
		public function getDir();  // папка файла
		public function getName(); // имя файла
		public function getExt();  // расширение файла
		public function getSize(); // размер файла
		
		public function getText();          // получает текст файла
		public function setText($text);     // устанавливает текст файла
		public function appendText($text);  // добавляет текст в конец файла
		
		/*public function copy($copyPath);    // копирует файл
		public function delete();           // удаляет файл
		public function rename($newName);   // переименовывает файл
		public function replace($newPath);  // перемещает файл*/
	}
	
	
	class File implements iFile{
		
		private $Pathfile;
		public $arr;
		
		public function __construct($Pathfile){
			
		$this->Pathfile=$Pathfile;
		$this->arr=pathinfo($this->Pathfile);
		
		}
		public function getPath(){
			//путь к файлу
		return $this->Pathfile;
		}
		public function getDir(){
			//папка файла
		return $this->arr['dirname'];
		}
		public function getName(){
			//имя файла
			return $this->arr['filename'];}
			
			public function getExt(){
			//расширение
			return $this->arr['extension'];}
			
			  public function getSize(){
				 // размер
			  return filesize ($this->Pathfile);}
			
			
			   public function getText(){
				 // читает содержимое
				 if (file_exists($this->Pathfile)) {
				 	return file_get_contents($this->Pathfile);      }
				 	return 'нет такого файла';
			
	}
	
	            public function setText($text){
		
				 // записывает содержимое
				file_put_contents($this->Pathfile, $text); 
				}
				
				public function appendText($text){
					
					// добавляет текст в конец файла
	            file_put_contents($this->Pathfile, file_get_contents($this->Pathfile).' '. $text); 
				}
				
				
				public function copy($copyPath){
					
					
					//копирует файл
				copy($this->Pathfile, $copyPath);
					
				}
				
				public function delete()
				{
					//удаляет
					unlink($this->Pathfile);
				}
				
				public function replace($newPath){
					//перемещает файл
					rename($this->Pathfile,$newPath);
				}
				
				
				public function rename($newName){
					//переименовывает
					$this->arr['basename']=$newName;
				rename($this->Pathfile, $this->arr['dirname'].'\\'. $this->arr['basename']);
				}
	}
	
	
	
				
	}
	
	
	
	
	
	
	
	
	
?>