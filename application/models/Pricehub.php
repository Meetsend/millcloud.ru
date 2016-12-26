<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pricehub extends CI_Model {

  public function __construct()
          {
                  // Call the CI_Model constructor
                  parent::__construct();
                  $this->load->database('millcloud');
          }

    function public_price()
    {
      $query = $this->db->get('products');
      foreach ($query->result_array() as $row)
      {
          echo '<div class="tr">';
          echo '<div class="tdcheck"><input type="checkbox" name="checkfield[]" value="'.$row['id_product'].'" class="tdchecker"></div>';
          echo '<div class="td" id="art_zav">'.$row['art_zav'].'</div>';
          echo '<div class="td1" id="short_capt"><a href="https://millcloud.ru/About_product" target="_blank">'.$row['short_capt'].'</a></div>';
          echo '<div class="td" id="space_vol">'.$row['space_vol'].' '.$row['space_const'].'</div>';
          echo '<div class="td" id="size_vol">'.$row['size_vol'].$row['size_const'].'</div>';
          echo '<div class="td" id="place_vol">'.$row['place_vol'].'</div>';
          echo '<div class="td1" id="add_mark">'.$row['add_mark'].'</div>';
          echo '<div class="td" id="endprice_vol">'.$row['endprice_vol'].' '.$row['cash_const'].'</div>';
          echo '<div class="td" id="free_vol">'.$row['free_vol'].' '.$row['vol_const'].'</div>';
          echo '<div class="td" id="reserve_vol">'.$row['reserve_vol'].' '.$row['vol_const'].'</div>';
          echo '<div class="td" id="trans_vol">'.$row['trans_vol'].' '.$row['vol_const'].'</div>';
          echo '<div class="td" id="jelcol"><input type="text" name="jel_col"><button type="submit">+</button></div>';
          echo '</div>';
      }
      unset($row);

    }

    function price_up() {
      echo '<form name="main_price"  action="" method="post" enctype="multipart/form-data"><div class="price">';
      echo '<div class="tr" id="trhead"><div class="tdcheck"><input type="checkbox" name="select_allrows" title="выбрать все" class="allcheck"></div>
      <div id="art_zav" class="td sortir"> Артикул</div>
      <div id="short_capt" class="td1 sortir"> Короткое наименование</div>
      <div id="space_vol" class="td sortir"> Объём</div>
      <div id="size_vol" class="sortir td"> Вес</div>
      <div id="place_vol" class="sortir td"> К.Мест</div>
      <div id="add_mark" class="sortir td1"> Коммент.</div>
      <div id="endprice_vol" class="sortir td"> Ц.Розн.</div>
      <div id="free_vol" class="td sortir"> Своб.</div>
      <div id="reserve_vol" class="td sortir"> Рез.</div>
      <div id="trans_vol" class="sortir td"> Транз.</div>
      <div id="jelcol" class="td sortir"> Ж.Кол.</div></div>';
    }
    function price_down() {
      echo '</div></br><button type="submit" name="outload" class="outload">Выгрузить выбранное</button></form></br>';
    }

    function outload_price()
    {
      if(isset ($_POST['outload']))
      {
        $pval= $this->input->post('checkfield[]');
        if (isset($pval)!=TRUE)
        {
          echo("Вы ничего не выбрали.");
        }
        else
        {
          $p_val= $_POST['checkfield'];
          $time_offer=date('c');
          $cookie = array('name'   => 'outget',
                          'value'  => $time_offer,
                          'expire' => '86500',
                          'domain' => '.millcloud.ru');
          set_cookie($cookie);
          $uid = $this->session->userdata('u_id');
          $data=array(
          'v_offer' => serialize($p_val),
          'time_offer' => $time_offer,
          'id_host' => $uid
          );
          $this->db->insert('test_offer', $data);
          echo '<script>$(document).ready(function() { window.open("https://millcloud.ru/Out?time_offer='.$time_offer.'"); });</script>';
        }
      }
  }

}
?>
