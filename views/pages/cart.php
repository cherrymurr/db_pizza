 
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
	$errors = array();
	foreach($_SESSION['cart'] as $id=> $quantity):
	$product=get_product($id)
?>

<tr>
    <td align="center"><?php echo $product['name_pizza']?></td>
    <td align="center"><?php echo $product['price']?>₽</td>
    <td align="center"><input style="text-align:center;" type="text" size="2" name="<?php echo $id?>" maxlength="2" value="<?php echo $quantity;?>" /></td>
    <td align="center"><?php echo $product['price']*$quantity?>₽</td>    
</tr>

<?
	if($quantity > $product['kol_kop'])
	{ 
		$p=$product['name_pizza'];
		$p1=$product['kol_kop'];
		$errors[] = "*Измените количество пиццы <$p>.Возможный максимум: $p1 штук(и)*";
		
	} 
	endforeach;?>

</table>
    <p class="total zhir" align="center" style="font-size:20; font-family: 'Comic Sans MS', cursive;">Общая сумма заказа: <span style="color: 8B0000;"><?php echo $_SESSION['total_price'] ?> рублей</span> </p>
    <p align="center"><input type="submit" name="update" value="Обновить" /> </p>
	
</form>﻿

<? if(isset($errors)){ ?>
   <ul id="error-list">
      <? foreach($errors as $msg){?>
        <p align="center" class="error zhir"> <?php echo $msg ?> </p>
      <? } ?>
   </ul>   
<? } ?>



<!--<p class="error zhir" > *Уважаемый покупатель, пицца "<?php echo $product['name_pizza']?>" не может быть заказана в таком количестве. Максимальный заказ данной пиццы на данный момент:<?php echo $product['kol_kop']?>  штук*</p>-->

<?if(empty($errors)){ ?>

<center><p  id="dobav_nadp1" class="zhir"><a href="index.php?view=order">Оформить заказ</a></p></center><br>

<? } ?>

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
