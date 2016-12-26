<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../css/inn.css">
	<title></title>
</head>
<body>

<div id="container">
	<h1>Форма добавления нового товара</h1>

	<div id="body">
		<form name="adder_p" action="" method="post" enctype="multipart/form-data">
		<p>Артикул (заводской номер изделия)*</p>
		<input type="text" name="art_zav">
		<p>Короткое наименование (отображается в общей таблице)*</p>
		<input type="text" name="short_capt">
		<p>Описание (отображается на странице товара)</p>
		<input type="text" name="full_capt">
		<p>Изображение (не более 200кб)</p>
		<input type="file" name="image">
		<p><input type="checkbox"   name="negabarit">Негабаритный груз</p>
		<p>Объем</p>
		<input type="text" name="space_vol">
		<select name="space_const" size="1">
		  <option>м3</option>
		  <option>м2</option>
			<option>пог.м</option>
		</select>
		<p>Вес</p>
		<input type="text" name="size_vol">
		<select name="size_const" size="1">
		  <option>кг</option>
		  <option>г</option>
			<option>т</option>
		</select>
		<p>Количество мест</p>
		<input type="text" name="place_vol">
		<p>Доп. информация</p>
		<input type="text" name="add_mark">
		<p>Рекомендованная цена $</p>
		<input type="text" name="endprice_vol">
		<select name="cash_const" size="1">
		  <option>RUB</option>
		  <option>USD</option>
			<option>EUR</option>
		</select>
		<p>Свободное кол-во:</p>
		<input type="text" name="free_vol">
		<p>В резерве:</p>
		<input type="text" name="reserve_vol">
		<p>В транзите:</p>
		<input type="text" name="trans_vol">
		<p>Кол. единица:</p>
		<select form="adder_p" name="vol_const" size="1">
		  <option>шт</option>
		  <option>уп</option>
			<option>палет</option>
			<option>конт</option>
			<option>ваг</option>
			<option>кг</option>
			<option>т</option>
			<option>м</option>
			<option>м2</option>
			<option>м3</option>
			<option>л</option>
			<option>мл</option>
		</select>
	</br>	</br>
		<button type="submit" name="submit_b" value="submit">Добавить</button>
			</br>	</br>
	</form>
	</div>
</div>

</body>
</html>
