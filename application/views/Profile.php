<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../css/profile.css">
	<script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<!--<script type="text/javascript" src="application/views/usermill.js"></script>-->
	<title>Онлайн прайс</title>
</head>
<body>
	<div class="info">
		<div id="up">
			<?php
				$this->Uploadmod->set_avatar();
			?>
			<a href="?edit">Редактировать</a></br>
			<a href="#" class="unvisible">+Сотрудничать</a></br>
			<a href="#" class="unvisible">-Удалить из партнеров</a></br>
		</div>

		<div id="down">
			<?php
				$this->Profilemod->load_profile();
			 ?>
		</div>
		</div>
</body>
</html>
