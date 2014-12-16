
<?
	
	foreach($products as $item):?>
		
		
		
	<div class="box">
		<div class="kartinka"><a href="index.php?view=product&id=<?php echo $item['pizza_id']?>"><img src ="images/<?php echo $item['image']?>" alt="" style="height:240;"; ></a></div>
		<div class="cena">
			<b>Название:</b> <?php echo $item['name_pizza']?><br>
			<b>Тип: </b><?php echo $item['type']?><br>
			<b>Цена: </b><?php echo $item['price']?><br>
			<b>Вес: </b><?php echo $item['weight']?><br>
			<b>Калории:</b> <?php echo $item['calories']?><br>
			<b>Осталось штук:</b> <?php echo $item['kol_kop']?><br>
		</div>
	</div>
	
	<?endforeach;?>

	
	
