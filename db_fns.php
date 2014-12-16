<?
	
	function db_connect()
	{
		$host='localhost';
		$user='root';
		$password='';
		$db='pizza_restaurant';
		
		$connection=mysql_connect($host, $user, $pswd);
		
		mysql_query("SET NAMES utf8");
		
		if(!$connection || ! mysql_select_db($db,$connection))
		{
			return false;
		}
		return $connection;
	}
	
	function db_result_to_array($result)
	{	
		$res_array=array();
		
		$count=0;
		
		while($row = mysql_fetch_array($result))
		{
			$res_array[$count]=$row;
			$count++;
		}
		return $res_array;
	}
	
	function get_products() //функция получения всех пицц
	{
		db_connect();
		
		$query="SELECT * FROM pizza WHERE kol_kop>0 ORDER BY kol_kop";
		
		$result=mysql_query($query);
		
		$result=db_result_to_array($result);
		
		return $result;
		
	}
	
	function get_cat()
	{
		db_connect();
		
		$query="SELECT DISTINCT type FROM pizza WHERE kol_kop>0 ORDER BY kol_kop";
		
		$result=mysql_query($query);
		
		$result=db_result_to_array($result);
		
		return $result;
		
	}
	
	function get_product($id) //функция получения конкретной пиццы по id из браузерной строки
	{	
		db_connect();
		
		$query= ("SELECT * FROM pizza WHERE pizza_id='$id'");
		
		$result= mysql_query($query);
		
		$row=mysql_fetch_array($result);
		
		return $row;
	}
	
	function get_type_products($type)
	{
		db_connect();
		
		$query="SELECT * FROM pizza WHERE (kol_kop>0) AND (type='$type') ORDER BY kol_kop";
		
		$result=mysql_query($query);
		
		$result=db_result_to_array($result);
		
		return $result;
		
	}
 ?>