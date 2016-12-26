<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link href="../../css/style.css" rel="stylesheet">
	<title>millcloud - вход в систему</title>
</head>
<body style="background:url('../../img/bg_login.jpg');">
	<center>
	<div style="margin-top: 5%">

	<div id="logined" style="box-shadow: 0px 0px 1px; width: 500px; padding:15px 0 15px 0; border-radius:3px; background:#fff;">
				<a href="https://millcloud.ru" style="text-decoration:none"><h1 style="text-transform: none; color:#04356C;">millcloud</h1></a>
				<p>На ваш адрес отправленно письмо с кодом активации!</p><p>Для завершения регистрации введите код:</p>
		<form method="post" enctype="multipart/form-data" action="">
			<input name="act_code"  label="act_code" type="text" placeholder=" Код активации"></br></br>
			<button type="submit" name="activator" value="submit">Активировать</button></br>
		</br><a href="?sendcode">Выслать код повторно</a></br><a href="?exit">Выход</a></br>
		</form>
	</div>
</br></br>

		<p style="color:#fff; font-family: Arial; font-weight:600 ;">© 2016 Orus Group Inc.</p>

	</div>
	</center>
</body>
</html>
