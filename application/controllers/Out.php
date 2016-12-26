<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Out extends CI_Controller {

  public function index() {
    $this->load->model('Pricehub');
    $this->load->helper('cookie');

    $time_offer=$_GET['time_offer'];
    $query=$this->db->query("SELECT * FROM test_offer WHERE time_offer='$time_offer'");
    foreach ($query->result_array() as $row)
    {
      $a=$row['v_offer'];
      $pid_array= unserialize($a);
      $N = count($pid_array);
      echo '<p><h1>ГК "Стройс"</h1></p>';
      echo '<p><h2>Коммерческое предложение от '.$time_offer.'</h2></p>';
      for ($i=0; $i < $N; $i++)
      {
          $p_id=$pid_array[$i];
          $query=$this->db->query("SELECT * FROM products WHERE id_product='$p_id'");
          foreach ($query->result_array() as $row)
          {
            echo '<p><h3>'.$row['short_capt'].'</h3></p>';
            echo '<p><img src="https://millcloud.ru/img/111.jpg"/></p>';
            echo '<p><span>Артикул:</span>'.' '.$row['art_zav'].'</p>';
            echo '<p><span>Описание:</span>'.' '.$row['full_capt'].'</p>';
            echo '<p><span>Объем:</span>'.' '.$row['space_vol'].' '.$row['space_const'].'</p>';
            echo '<p><span>Вес:</span>'.' '.$row['size_vol'].$row['size_const'].'</p>';
            echo '<p><span>Кол-во мест:</span>'.' '.$row['place_vol'].'</p>';
            echo '<p><span>Комментарий:</span>'.' '.$row['add_mark'].'</p>';
            echo '<p><span>Рек.розничная цена:</span>'.' '.$row['endprice_vol'].' '.$row['cash_const'].'</p>';
            echo '<p><span>Свободно:</span>'.' '.$row['free_vol'].' '.$row['vol_const'].'</p>';
            echo '<p><span>В резерве:</span>'.' '.$row['reserve_vol'].' '.$row['vol_const'].'</p>';
            echo '<p><span>В транзите:</span>'.' '.$row['trans_vol'].' '.$row['vol_const'].'</p></div></br></br>';
          }
      }
      echo '<a href="http://www.web2pdfconvert.com/engine?curl=https://millcloud.ru/Out?time_offer='.$time_offer.'">Сохранить в PDF</a>';
    }

  }
}
