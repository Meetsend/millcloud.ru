<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="../../css/inn.css" rel="stylesheet">
</head>
<body>
  <div class="up">
    <nav>
      <span class="leftnav">
        <?php
        $this->Mainmod->navname();
        $this->Profilemod->come_out();
        ?>
      </span>
      <form method="post" enctype="multipart/form-data" name="search" action="" style="display:inline-block; margin-right: 30px;">
        <input type="text" placeholder="Поиск товара"/>
        <input type="submit" name="searching" value="Найти"/>
      </form>
        <a href="https://millcloud.ru">На главную</a>
        <a href="#">Тех.поддержка</a>
        <a href="#">Поиск партнеров</a>
    </nav>
  </div>
</body>
</html>
