<?

class DatabaseShell
	{
		private $link;
		
		public function __construct($host, $user, $password, $database)
		{
			$this->link = mysqli_connect($host, $user, $password, $database);
			mysqli_query($this->link, "SET NAMES 'utf8'");
		}
		
		public function save($table, $arr)
		{
			// сохраняет запись в базу

			$str='(';
            $str2='(';
foreach($arr as $key=>$elem){

	$str.=$key.',';
	$str2.="'".$elem."'".',';
}
$str=rtrim($str, ',').')';
$str2=rtrim($str2, ',').')';

			$ins = "INSERT INTO $table $str VALUES $str2";
			mysqli_query($this->link, $ins);

		}
		
		public function del($table, $id)
		{
			// удаляет запись по ее id
			$del = "DELETE FROM $table WHERE id='$id'";	
			mysqli_query($this->link,$del);

		}
		
		public function delAll($table, $ids)
		{
			// удаляет записи по их id
foreach($ids as $el){
	$del = "DELETE FROM $table WHERE id='$el'";	
			mysqli_query($this->link,$del);
}
			
		}
		
		public function get($table, $id)
		{
			// получает одну запись по ее id

			$l = "SELECT * FROM $table WHERE id='$id' ";

               $res=mysqli_query($this->link,$l);
			   $row = mysqli_fetch_assoc($res);
			   return $row;
		}
		
		public function getAll($table, $ids)
		{
			// получает массив записей по их id
                  foreach($ids as $el){
                  $l = "SELECT * FROM $table WHERE id='$el' ";
                  $res=mysqli_query($this->link,$l);
                  $row = mysqli_fetch_assoc($res);
                  $data[]=$row;
                      }
			                 return $data;

		}
		
		
	}
	
	?>