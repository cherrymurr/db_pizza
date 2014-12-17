 
<h1 align="center">Оформление заказа</h1><br>

<?
	$p=0;
	if($_SESSION['cart'] && (!isset($_POST['order'])||$p==0))
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
	Ваше имя*:</br>
	<input type="text" name="first_name"/><br><br>
	Ваша фамилия*:</br>
	<input type="text" name="last_name"/><br><br>
	Ваше отчество:</br>
	<input type="text" name="patronymic"/><br><br>
	Ваш телефон*:</br>
	<input type="text" name="phone"/><br><br>
	Адрес доставки*:</br>
	<input type="text" name="address"/><br><br>
	Тип оплаты(нал/безнал)*:</br>
	<input type="text" name="type_pay"/><br><br>
	</p>
	
	
    <p align="center"><input type="submit" name="order" value="Заказать" /> </p>
	
	
</form>﻿
<?}

$p=0;
//-----------------------------------------------------------------------------------------
//Проверяем, была ли форма отправлена
if(isset($_POST['order'])){

   //Создаем массив, в который будем складывать ошибки
   $errors = array();

   //Проверяем указал ли пользователь имя
	if(empty($_POST['first_name'])||empty($_POST['last_name'])||empty($_POST['phone'])||empty($_POST['address'])||empty($_POST['type_pay'])){
      $errors[]=  "*Пожалуйста, заполните все поля, обязательные к заполнению*";
	}
	if (!empty($_POST['phone'])){
			$pattern = "#^( +)?((\+?7|8) ?)?((\(\d{3}\))|(\d{3}))?( )?(\d{3}[\- ]?\d{2}[\- ]?\d{2})( +)?$#"; 
		if(!preg_match($pattern, $_POST['phone'], $out)){ 
		$errors[]=  "*Пожалуйста, укажите корректный телефон*";
		} 
	}
	if(!empty($_POST['type_pay']) && !($_POST['type_pay']=='нал' || $_POST['type_pay']=='безнал')){
      $errors[]=  "*Пожалуйста, в поле <Тип оплаты> укажите либо <нал> либо <безнал>*";
  }
}?>

<?php if(isset($errors)){ ?>
   <ul id="error-list">
      <?php foreach($errors as $msg){?>
         <p align="center" class="error zhir"> <?php echo $msg ?> </p>
    <?  }?>
   </ul>    
<?php } ?>

<center><img src='images/kart_in_order1.png' height="400"></center>

<?if( isset($_POST['order']) && empty($errors)){
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$patronymic=$_POST['patronymic'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
		$type_pay=$_POST['type_pay'];
		$all_price=$_SESSION['total_price'];
		$date_order=date('Y-m-d H:i:s');
		$manag=mysql_query("SELECT manager.manager_id FROM manager WHERE manager.active=1 ORDER BY RAND() LIMIT 1");
		$res_manag=mysql_result ($manag, 0);
		$query = mysql_query("INSERT INTO orders(first_name,last_name,
			patronymic,phone,address,type_pay, date_order, 
			all_price, complited, manager_id) VALUES ('$first_name','$last_name','$patronymic',
			'$phone','$address','$type_pay','$date_order', '$all_price',0,'$res_manag')");
		$id1 = mysql_insert_id();
		foreach($_SESSION['cart'] as $id => $quantity):
			$product=get_product($id);
			$pizza_id=$product['pizza_id'];
			$query2=mysql_query("INSERT INTO orders_has_pizza(orders_id,pizza_id,amount_pizz)
			VALUES('$id1','$pizza_id','$quantity')");
			$qty=mysql_query("SELECT kol_kop FROM pizza WHERE 
					pizza.pizza_id='$pizza_id'");
			$qty=mysql_result($qty,0);
			$qty=$qty-$quantity;
			$qty2=mysql_query("UPDATE pizza SET kol_kop = '$qty' 
			WHERE pizza.pizza_id='$pizza_id'"); 
		endforeach;
		
		
		?>
		
		<div id="PUST"><h2> Ваш заказ успешно выполнен!</h2><br>
		
		
		<?php $man= ("SELECT * FROM manager WHERE manager_id='$res_manag'");
		$res_man= mysql_query($man);
		$res_man=db_result_to_array($res_man);
		foreach($res_man as $item):?>
			<div id="manag_sv">
			<br><b>Ваш менеджер:</b><br>
			<p>Имя: <?php echo $item['first_name'].' '.$item['patronymic'].' '.$item['last_name']?></p>
			<p>Телефон: </b><?php echo $item['phone']?></p>
			<p>В ближайшее время с Вами свяжутся! Всего доброго!</p>
			</div>
		<? endforeach;?>
		</div>
		
		<?
		unset($_SESSION);
		session_destroy();}
		?>


