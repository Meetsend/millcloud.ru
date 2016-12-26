<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link href="../../css/main.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
	<title>millcloud - вход в систему</title>
</head>
<body style="background:url('../../img/bg_login.jpg');">
<div class="up">
	<nav><center>
    <a href="https://millcloud.ru">На главную</a>
    <a href="#">Тех.поддержка</a>
    <a href="#" class="ablog">#блог</a>
    <a href="#">Рус.[Изменить]</a>
  </center></nav>
</div>
	<center>
	<div style="margin-top: 5%">

	<div id="logined">
				<div class="formup"><a class="textlogin" href="https://millcloud.ru"><img src="../../img/1.png"/> Millcloud</a></div></br>

		<form method="post" enctype="multipart/form-data" action="">
			<input name="int_email" label="intmail" type="text" placeholder=" E-mail"></br></br>
			<input name="int_pass"  label="intpass" type="password" placeholder=" Пароль"></br></br>
			<button type="submit" name="logbut" value="submit" class="btn">Войти</button></br></br>
		</form>
	</div>

	</br>

	<div id="regist">
		<h3>Впервые тут?</h4>
		<p>Быстрая регистрация:</p></br>
	<style> input {width: 250px; height: 30px;}</style>
		<form method="post" enctype="multipart/form-data" action="">
			<select name="g_id">
				<option>--Выберете статус--</option>
				<option value="0">Новый сотрудник (компания зарегистр.)</option>
				<option value="1">Новый производитель</option>
				<option value="2">Новый диллер</option>
			</select></br></br>
			<input name="u_email" label="Email" type="text" placeholder=" Ваш E-mail"></br></br>
			<input name="u_pass" label="Pass" type="password" placeholder=" Ваш пароль"></br></br>
			<input name="confirm_pass" label="Confirmpass" type="password" placeholder=" Повторите пароль"></br></br>
			<button type="submit" name="regbut" value="submit" class="btn">Зарегистрироваться</button></br></br>
		</form>
	</div>

</br></br>

		<p style="color:#fff; font-family: Arial; font-weight:600 ;">© 2016 Orus Group Inc.</p>

	</div>
	</center>
</body>
</html>
