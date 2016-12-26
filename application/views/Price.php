<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../css/price.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="../../js/price.js"></script>
	<title>Онлайн прайс</title>
</head>
<body>
	<div class="info">

<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	$this->Pricehub->price_up();
	$this->Pricehub->public_price();
	$this->Pricehub->price_down();
	$this->Pricehub->outload_price();
	?>
</div>

</body>
</html>
