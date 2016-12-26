<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../css/input.css">
	<title>Онлайн прайс</title>
</head>
<body>
  <div id="container">
    <div id="body">
      <h1>Товар1</h1>
      <img src="https://millcloud.ru/img/111.jpg"/>
      <style type="text/css">p span {font-weight: bolder;}</style>
    <?php
          $out_a='Товар1';
          $query = $this->db->get_where('products', array('short_capt' => $out_a));
          foreach ($query->result_array() as $row)
          {
              echo '<p><span>Артикул:</span>'.' '.$row['art_zav'].'</p>';
              echo '<p><span>Описание:</span>'.' '.$row['full_capt'].'</p>';
              echo '<p><span>Объем:</span>'.' '.$row['space_vol'].' '.$row['space_const'].'</p>';
              echo '<p><span>Вес:</span>'.' '.$row['size_vol'].$row['size_const'].'</p>';
              echo '<p><span>Кол-во мест:</span>'.' '.$row['place_vol'].'</p>';
              echo '<p><span>Комментарий:</span>'.' '.$row['add_mark'].'</p>';
              echo '<p><span>Рек.розничная цена:</span>'.' '.$row['endprice_vol'].' '.$row['cash_const'].'</p>';
              echo '<p><span>Свободно:</span>'.' '.$row['free_vol'].' '.$row['vol_const'].'</p>';
              echo '<p><span>В резерве:</span>'.' '.$row['reserve_vol'].' '.$row['vol_const'].'</p>';
              echo '<p><span>В транзите:</span>'.' '.$row['trans_vol'].' '.$row['vol_const'].'</p>';
          }
          unset($row);
    ?>
  </div>
  </div>
</body>
</html>
