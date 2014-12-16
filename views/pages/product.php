
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
	<div class="desc zhir"><?php echo $product['description']?></div>
	<div class="desc zhir" >Состав:<br>
		<?php
			$ide=$product['pizza_id'];
			$query= ("SELECT product, structure.weight FROM food,structure,pizza WHERE pizza.pizza_id='$ide' AND pizza.pizza_id=structure.pizza_id AND structure.food_id=food.food_id");
			$result= mysql_query($query);
			$result=db_result_to_array($result);
			foreach($result as $item)
			{
				echo $item['product'];
				echo ", ";
				echo $item['weight'];
				echo " гр.<br>";
			}
		?>
	</div>
	<div class="desc zhir" style="background:#FF69B4;"><a href = "index.php?view=recipe&id=<?php echo $product['pizza_id']?>"> Хотите приготовить сами? Нажмите, чтобы посмотреть рецепт!</a></div>
	<center><div id="dobav_nadp" class="zhir"><a href = "index.php?view=add_to_cart&id=<?php echo $product['pizza_id']?>"> Добавить в заказ</a></div></center>
	
	