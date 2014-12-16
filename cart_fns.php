<?
	function add_to_cart($id) // добавление в корзину оределенного товара
	{
		if(isset($_SESSION['cart'][$id])) //если есть такой товар уже в корзине 
		{
			$_SESSION['cart'][$id]++;//то увеличиваем 
			return true;
		}
		
		else //если нет
		{
			$_SESSION['cart'][$id]=1;//то ставим 1
			return true;
		}
		return false;
	}
	
	function update_cart()
	{
		foreach($_SESSION['cart'] as $id=>$qty)
		if ($_POST[$id]=='0')
		{
			unset($_SESSION['cart'][$id]);
		}
		else if (($_POST[$id]<0)||!is_numeric($_POST[$id])) {}
		else
		{
			$_SESSION['cart'][$id]=$_POST[$id];
		}
	}
	
	function total_items($cart)
	{
		$num_items=0;
		if(is_array($cart))
		{
			foreach($cart as $id  => $qty)
			{
				$num_items=$num_items+$qty;
			}
		}
		
		return $num_items;
	}
	
	function total_price($cart)
	{
		$total_price=0;
		
		db_connect();
		
		if(is_array($cart))
		{
			foreach($cart as $id  => $qty)
			{
				$query="SELECT price FROM pizza where pizza_id='$id'";
				$result=mysql_query($query);
				if($result)
				{
					$item_price=mysql_result($result,0,'price');
					$total_price=$total_price+$item_price*$qty;
				}
			}
		}
		
		return $total_price;
	}
?>