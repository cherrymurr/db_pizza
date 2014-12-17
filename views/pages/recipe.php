
	<div class="box">
		<div class="kartinka"><a href="#"><img src ="images/<?php echo $product['image']?>" alt="" style="height:240;"; ></a></div>
		<div class="cena">
			<b>Название:</b> <?php echo $product['name_pizza']?><br>
			<b>Тип: </b><?php echo $product['type']?><br>
		</div>
	</div>
	<div  class="desc zhir">Состав:<br>
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
	<div class="desc1 zhir"><?php echo $recipe['recipe']?></div>

	