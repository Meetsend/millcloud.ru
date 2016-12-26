<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Millcloud - торговля в облаках</title>
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <link href="../../css/main.css" rel="stylesheet" type="text/css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/slide.js"></script>
</head>
<body style="background-image: url('../../img/bg1.jpg')">

<div class="up">
  <nav>
    <?php
    $this->Mainmod->navname();
    $this->Profilemod->come_out();
    ?>

    <a href="#">Тех.поддержка</a>
    <a href="#">RU [Изменить]</a>
  </nav>
    <div class="bgmenu">
      <a href="https://millcloud.ru"><img class="imglogo" src="../../img/1.png"/></a>
      <a class="textlogo" href="https://millcloud.ru">Millcloud</a>
      <div class="menu">
        <a href="#about">О сервисе</a>
        <a href="#">Факты и цифры</a>
        <a href="#">Тарифы</a>
        <a href="#">О компании</a>
        <a href="#contacts">Контакты</a>
        <a href="#" class="ablog">#блог</a>
      </div>
    </div>
</div>

<div class="container">

<div>
  <center>
<!-- Карусель-->
  <div class="fullkar">
    <a class="rulkar l" href="#"></a>
      <div class="slider-box">
        <div class="slider">
          <div class="kar">
            <div class="inbx">
              <div class="karzag">Быстрее других!</div>
              <p class="zag">Коммерческое предложение</br>в <span style="font-size: 20pt">2</span> клика! Как возможно?</p>
              <div class="text">
                Узнайте сами, воспользуйтесь бесплатным тестовым периодом - 30 дней!
              </div>
              <p class="karbtn"><a href="#" class="btn">Узнать детали</a></p>
            </div>
            <div class="inbx">
              <img src="../../img/11.jpg"/>
            </div>
          </div>
          <div class="kar">
            <div class="inbx">
              <div class="karzag">Проще других!</div>
              <p class="zag">Как добавить лёгкости в повседневные задачи?</p>
              <div class="text">
                Почувствуйте, каким лёгким может быть взаимодейтсвие с партнёрами в облаке!
              </div>
              <p class="karbtn"><a href="#" class="btn">Узнать детали</a></p>
            </div>
            <div class="inbx">
              <img src="../../img/22.jpg"/>
            </div>
          </div>
          <div class="kar">
            <div class="inbx">
              <div class="karzag">Только в цель!</div>
              <p class="zag">Как предложить то, что обязательно купят?</p>
              <div class="text">
                Вам поможет подробная живая аналитика спроса!</br>
                Стоя на облаке, можно увидеть намного больше. Присоединяйтесь!
              </div>
              <p class="karbtn"><a href="#" class="btn">Узнать детали</a></p>
            </div>
            <div class="inbx">
              <img src="../../img/33.jpg"/>
            </div>
          </div>
        </div>
      </div>
    <a class="rulkar r" href="#"></a>
  </div>
   <!--Конец карусели-->
  </center>
</div>

<div class="content" id="blocks">
  <a name="about"></a>
</br>
  <center>
    <h2>Инновации в действии!</h2>
    <p class="text" style="font-family: Play, sans-serif; font-size:14pt;">Представляем Вам удобный и доступный сервис виртуализации торговых отношений:<p>
    <div class="sdiv">
      <div class="upframe">Прозиводителям</br>и дистрибьюторам</div>
      <div class="txt">
          <p>Автоматизация складских остатков</p>
          <p>Живая аналитика движения товаров и покупательской активности</p>
          <p>Повышение лояльности клиентов</p>
      </div></br>
      <a class="btn" href="https://millcloud.ru/Come">Подключить</a></br>
    </div>
    <div class="sdiv">
      <div class="upframe">Поставщикам</br>и подрядчикам</div>
      <div class="txt">
        <p>Удаленный доступ к онлайн-прайсам</p>
        <p>Легкая и быстрая выгрузка коммерческих предложений</p>
        <p>Система онлайн-заказов и трекинга</p>
    </div></br>
      <a class="btn" href="https://millcloud.ru/Come">Подключить</a></br>
    </div>
    <div class="sdiv">
      <div class="upframe">Провайдерам услуг</br>и розничным продавцам</div>
    <div class="txt">
        <p><a href="#" style="color: #00aef8">Приглашаем к сотрудничеству системных интеграторов и поставщиков it-услуг</a></p>
        <p>Функциональное API для вашего сайта. Откройте интернет магазин за 1 день!</p>
    </div></br>
      <a class="btn" href="https://millcloud.ru/Come">Подключить</a></br>
    </div>
  </center>
</br>
</div>

<div class="content" id="partners">
  <center>
    <h2>Сообщество надежных партнёров</h2>
    <p class="text" style="font-family: Play, sans-serif; font-size:14pt;">Millcloud объединяет лидеров рынка, профессионалов своего дела с многолетним опытом.</p>
    <p class="text" style="font-family: Play, sans-serif; font-size:14pt;">Став частью передового сообщества, вы всегда будете в курсе всех новинок, тенденций рынка и инструментов лидерства!</p></br>
    <p class="text" style="font-family: Play, sans-serif; font-size:14pt;">Самые активные участники:</p></br>
    <?php
    $query = $this->db->get('g_users',5);
    foreach ($query->result() as $row)
    {
      echo '<div class="partner"><a href="https://millcloud.ru/U/?g='.$row->g_id.'&u='.$row->u_id.'"><img src="https://millcloud.ru/Users/'.$row->g_id.'/'.$row->u_id.'/'.$row->avatar.'" class="avatar" title="'.str_replace('"','',$row->u_name).'"/></a></div>';
    }
    unset($row);
    ?>
  </center>
  <center></br></br><a class="btn" href="https://millcloud.ru/Come">Присоединиться</a></center></br>
</div>

<div class="content" id="address">
  <a name="contacts"></a>
  <center>
    <h2>Контакты</h2>
    <p class="text" style="font-family: Play, sans-serif; font-size:14pt;">
      Тех.поддержка: +7 (981) 702-77-60</br></br>
      E-mail: <a href="mailto:support@millcloud.ru">support@millcloud.ru</a></br></br>
      Почтовый адрес: 191011, Россия, Санкт-Петербург, наб. реки Фонтанки, 19</br></br>
      ООО "Орус Групп"</br>
    </p>
  </center>
</div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3997.548316189825!2d30.347566803134153!3d59.93588959211385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x469631a768372f9b%3A0xce021567e73d103a!2z0L3QsNCxLiBQ0LXQutC4INCk0L7QvdGC0LDQvdC60LgsIDE5LCDQodCw0L3QutGCLdCf0LXRgtC10YDQsdGD0YDQsywgMTkxMDIz!5e0!3m2!1sru!2sru!4v1477776473148" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<div class="cprt footer">
  <center>
  <a href="#">Политика конфеденциальности</a>
  <p style="color:#000; font-family: Arial; font-weight:600 ;">© 2016 Orus Group Inc.</p>
  </center>
</div>

</body>
</html>
