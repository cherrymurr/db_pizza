 
<h1 align="center">Ваша корзина</h1><br>

<?
	if($_SESSION['cart'])//если переменная cart сессии непустая, то выводим:
	{
?>

<form action="index.php?view=update_cart" method="post" id="cart-form">
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
    <td align="center"><input style="text-align:center;" type="text" size="2" name="<?php echo $id?>" maxlength="2" value="<?php echo $quantity;?>" /></td>
    <td align="center"><?php echo $product['price']*$quantity?>₽</td>    
</tr>

<?endforeach;?>
</table>
    <p class="total zhir" align="center" style="font-size:20; font-family: 'Comic Sans MS', cursive;">Общая сумма заказа: <span style="color: 8B0000;"><?php echo $_SESSION['total_price'] ?> рублей</span> </p>
    <p align="center"><input type="submit" name="update" value="Обновить" /> </p>
	
</form>﻿

<center><p  id="dobav_nadp1" class="zhir"><a href="index.php?view=order">Оформить заказ</a></p></center><br>
<center><img src='images/kart_in_cart.png' height="300"></center>

<?
	}
	else
	{
		echo "
			<br><h2>Ваша корзина пуста!</h2>
			<center><img src='images/musor_pust.png'></center>
		";
	}
?>
