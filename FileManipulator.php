<?
class FileManipulator
	{
		public function create($filePath)
		{
			// создает файл
			file_put_contents($filePath, '');
		}
		
		public function delete($filePath)
		{
			// удаляет файл

			unlink($filePath);
		}
		
		public function copy($filePath, $copyPath)
		{
			// копирует файл
			copy($filePath, $copyPath);
		}
		
		public function rename($filepath, $newName)
		{
			// переименовывает файл
			// вторым параметром принимает новое имя файла (только имя, не путь)

			$arr=explode('\\',$filepath);
            array_pop($arr);

            $s=implode('\\', $arr);
            rename($filepath, "$s.\\$newName");
		}
		
		public function replace($filePath, $newPath)
		{
			// перемещает файл
			rename($filePath,$newPath);
		}
		
		public function weigh($filePath)
		{
			// узнает размер файла

			return filesize($filePath);
		}
	}

?>