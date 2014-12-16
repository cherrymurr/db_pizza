<html>
    <head>
	<script type="text/javascript" src="time.js"></script> 
	<!--Название страницы-->
        <title>Заказ пиццы</title>
		<link href="styleblok.css" rel="stylesheet" type="text/css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>
		<div id="tabl">
			<div id="shapka">
				
			</div>
			<!--Основное поле-->
			<div id="menu">
				<div class="punkt_menu zhir"><a href="index.php">Главная</a><br></div>
				<?
					$category = get_cat();
					foreach($category as $item):
				?>
				<div class="punkt_menu zhir"><a href="index.php?view=type&type=<?php echo $item['type'];?>">
					<?php echo $item['type'];
					?>
					</a>
				</div>
				<?endforeach;?>
				<div class="punkt_menu zhir"><a href="index.php?view=cart">Корзина(<?php echo $_SESSION['total_items'] ?>) - <?php echo $_SESSION['total_price'] ?>₽</a></div><br>
				
			</div>
			
			<div id="osnova">
				<?php
					include ($_SERVER[DOCUMENT_ROOT].'/views/pages/'.$view.'.php' );//здесь через переменную view передается динамическая часть шаблона
				?>
			</div>
			
			<div id="podv">
			</div>
			<div id="obtek"></div>
			
		</div>
		<img id="minute" src="images/minute.png" >
		<img id="hour" src="images/hour.png">
		<img id="sekond" src="images/sek.png" >
		<img id="ciferblat" src="images/Ciferblat.png">

	
			
    </body>
</html>
