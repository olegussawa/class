<?

class Interval
{
	
public function __construct(Date $date1, Date $date2)
		{
			$this->date1=$date1;
			$this->date2=$date2;
			
			}
			
			public function sec1()
		{
			// вернет seconds
		       $arr=explode('-',$this->date1);
			return mktime(0, 0, 0, $arr[1], $arr[2], $arr[0]);
			}
			
			public function sec2()
		{
			// вернет seconds
			$arr=explode('-',$this->date2);
			return mktime(0, 0, 0, $arr[1], $arr[2], $arr[0]);
			}
		
		public function toDays()
		{
			// вернет разницу в днях
			return abs( ($this->sec1()-$this->sec2())/(3600*24));
		}
		
		
		
		
		public function toMonths()
		{
			// вернет разницу в месяцах
			return abs(( ($this->sec1()-$this->sec2()  )/(3600*24) )/30);
		}
		
		public function toYears()
		{
			// вернет разницу в годах
		}
	}


?>

	
	