<?php

include('db_fns.php'); //подключение всех функций
include('cart_fns.php');

session_start(); //для добавления товаров в корзину

if(!isset($_SESSION['cart']))
{
	$_SESSION['cart'] = array();
	$_SESSION['total_items'] = 0;
	$_SESSION['total_price'] = 0;
}

$view=empty($_GET['view']) ? 'index' : $_GET['view']; //автоматически index, если что то введено, то считываем из брауз строки

switch($view)
{
	case('index') :
		$products=get_products(); // получаем массив всех пицц
	break;
	case('product'):
		$id=$_GET['id'];
		$product=get_product($id); //отдельный продукт, получаем по id из GET
	break;
	case('cart'):
	break;
	case('add_to_cart'):
		$id=$_GET['id'];
		$add_item=add_to_cart($id);	
		$_SESSION['total_items']=total_items($_SESSION['cart']);
		$_SESSION['total_price']=total_price($_SESSION['cart']);
		header('Location:index.php?view=product&id='.$id);
	break;
	case('update_cart'):
		update_cart();
		$_SESSION['total_items']=total_items($_SESSION['cart']);
		$_SESSION['total_price']=total_price($_SESSION['cart']);
		header('Location:index.php?view=cart');
	break;
	case('type'):
		$type = $_GET['type'];
		$products = get_type_products($type);
	break;
	default:
	header('Location:index.php?');
	case('order'):
}

//$arr=array('index','product','cart','add_to_cart','update_cart','order');
//if(!in_array($view,$arr)) die("ERROR 404");


include ($_SERVER[DOCUMENT_ROOT].'/views/layouts/shop.php' ); //шаблон сайта

?>