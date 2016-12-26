<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../css/price.css">
	<link rel="stylesheet" type="text/css" href="../../css/uptabs.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="../../js/friends.js"></script>
	<title>Онлайн прайс</title>
</head>
<body>
	<div class="info">

		<div>
		  <a id="friends" class="uptab settab" href="#?i=1">Партнёры</a>
		  <a id="incom" class="uptab" href="#?i=2">Подписчики</a>
		  <a id="comout" class="uptab" href="#?i=3">Мои приглашения</a>
		  <a id="blacklist" class="uptab" href="#?i=4">Черный список</a>
		  <div id="loadfr" class="actboard">
				<?php
		 		 	defined('BASEPATH') OR exit('No direct script access allowed');
		 		 	$this->Partner_mod->load_partners();
 		 		?>
		  </div>
		</div>

</div>

</body>
</html>
