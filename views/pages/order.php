 
<h1 align="center">Оформление заказа</h1><br>

<?
	if($_SESSION['cart'] && (!isset($_POST['order'])))
	{
?>

<form action="index.php?view=order" method="post" id="cart-form">
<table id="mycart" align="center" border="0">
<tr>
    <th>Товар</th>
    <th>Цена</th>
    <th>Кол-во</th>
    <th>Всего</th>
</tr>

<?
	foreach($_SESSION['cart'] as $id=> $quantity):
	$product=get_product($id)
?>

<tr>
    <td align="center"><?php echo $product['name_pizza']?></td>
    <td align="center"><?php echo $product['price']?>₽</td>
    <td align="center"><?php echo $quantity;?></td>
    <td align="center"><?php echo $product['price']*$quantity?>₽</td>    
</tr>

<?endforeach;?>
</table>
    <p class="total zhir" align="center" style="font-size:20; font-family: 'Comic Sans MS', cursive;">Общая сумма заказа: <span style="color: 8B0000;"><?php echo $_SESSION['total_price'] ?> рублей</span> </p>
	<p align="center" class="zhir">
	Ваше имя:</br>
	<input type="text" name="first_name"/><br><br>
	Ваша фамилия:</br>
	<input type="text" name="last_name"/><br><br>
	Ваше отчество:</br>
	<input type="text" name="patronymic"/><br><br>
	Ваш телефон:</br>
	<input type="text" name="phone"/><br><br>
	Адрес доставки:</br>
	<input type="text" name="address"/><br><br>
	Тип оплаты(нал/безнал):</br>
	<input type="text" name="type_pay"/><br><br>
	</p>
	
	
    <p align="center"><input type="submit" name="order" value="Заказать" /> </p>
	
</form>﻿

<!--<center><p  id="dobav_nadp1" class="zhir"><a href="index.php?view=order">Оформить заказ</a></p></center><br>-->
<center><img src='images/kart_in_order1.png' height="400"></center>

<?
}
	if($_SESSION['cart'] && (isset($_POST['order'])))
	{
		$address=$_POST['address'];
		
		$date=date('Y-m-d');
		$time=date('H:i:s');
		
		foreach($_SESSION['cart'] as $id => $quantity):
		$product=get_product($id);
			//$query=mysql_query("INSERT INTO order(type_pay,address) VALUES ('$type_pay','$address')");
			$query=mysql_query("INSERT INTO address(city) VALUES ('$address')");
		endforeach;
		
	}
?>
