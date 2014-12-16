
	<div class="box">
		<div class="kartinka"><a href="#"><img src ="images/<?php echo $product['image']?>" alt="" style="height:240;"; ></a></div>
		<div class="cena">
			<b>Название:</b> <?php echo $product['name_pizza']?><br>
			<b>Тип: </b><?php echo $product['type']?><br>
			<b>Цена: </b><?php echo $product['price']?><br>
			<b>Вес: </b><?php echo $product['weight']?><br>
			<b>Калории: </b><?php echo $product['calories']?><br>
			<b>Осталось штук: </b><?php echo $product['kol_kop']?><br>
		</div>
	</div>
	<div class="desc zhir"><?php echo $product['pizza_des']?></div>
	<div id="dobav_nadp" class="zhir"><a href = "index.php?view=add_to_cart&id=<?php echo $product['pizza_id']?>"> Добавить в заказ</a></div>
	
	