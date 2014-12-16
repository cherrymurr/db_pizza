<?
	function get_recipe($id) //функция получения конкретной пиццы по id из браузерной строки
	{	
		db_connect();
		
		$query= ("SELECT recipe.recipe FROM recipe,pizza WHERE pizza.pizza_id='$id' and pizza.pizza_id=recipe.pizza_id");
		
		$result= mysql_query($query);
		
		$row=mysql_fetch_array($result);
		
		return $row;
	}
?>