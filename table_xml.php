<?php
	
	
	$dom= new DOMDocument("1.0","utf-8"); //создаем элемент класса DOM
	
	$root=$dom->createElement("root"); //создаем корневой элемент root
	$dom->appendChild($root);
	
	$sql = "SELECT * FROM orders ORDER BY orders_id";
	$query = mysql_query($sql) or die(mysql_error());
	

	while($row=mysql_fetch_assoc($query))
	{
	
		$zakaz = $dom ->createElement("zakaz");
		
		$id = $dom ->createElement("orders_id"); //создаем элемент
		$idtext = $dom->createTextNode($row['orders_id']); //текстовый узел со сзначением из базы
		$id->appendChild($idtext); //вкладываем в элемент значение текстового узла
		$zakaz->appendChild($id);
		
		$first_name = $dom ->createElement("first_name"); //создаем элемент
		$first_nametext = $dom->createTextNode($row['first_name']); //текстовый узел со сзначением из базы
		$first_name->appendChild($first_nametext); //вкладываем в элемент значение текстового узла
		$zakaz->appendChild($first_name);
		
		$last_name = $dom ->createElement("last_name"); //создаем элемент
		$last_nametext = $dom->createTextNode($row['last_name']); //текстовый узел со сзначением из базы
		$last_name->appendChild($last_nametext); //вкладываем в элемент значение текстового узла
		$zakaz->appendChild($last_name);
		
		$address = $dom ->createElement("address"); //создаем элемент
		$addresstext = $dom->createTextNode($row['address']); //текстовый узел со сзначением из базы
		$address->appendChild($addresstext); //вкладываем в элемент значение текстового узла
		$zakaz->appendChild($address);
		
		$phone = $dom ->createElement("phone"); //создаем элемент
		$phonetext = $dom->createTextNode($row['phone']); //текстовый узел со сзначением из базы
		$phone->appendChild($phonetext); //вкладываем в элемент значение текстового узла
		$zakaz->appendChild($phone);
		
		$root->appendChild($zakaz);
		
	}
	$dom->save("table.xml"); // сохранение файла
?>