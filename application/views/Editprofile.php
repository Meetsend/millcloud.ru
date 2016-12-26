<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../css/profile.css">
	<script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<title>Онлайн прайс</title>
</head>
<body>
	<div class="editprofile">
	<p>Для изменения личных данных заполните форму и нажмите "Сохранить":</p>
<?php
	$this->Profilemod->edit_profile();
?>
	</div>
</body>
</html>
