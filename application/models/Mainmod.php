<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainmod extends CI_Model {

    public function __construct()
            {
                    // Call the CI_Model constructor
                    parent::__construct();
                    $this->load->database('millcloud');
            }

    function navname()
    {
      $logged_in=$this->session->userdata('logged_in');
      if ($logged_in !=TRUE) {
        echo '<a class="btn" href="https://millcloud.ru/Come">Подключить</a>';
        echo '<a href="https://millcloud.ru/Come">Вход/ Регистрация</a>';
      }
      else {
        $group = $this->session->userdata('group');
        $uid = $this->session->userdata('u_id');
        $query=$this->db->query("SELECT * FROM $group WHERE u_id='$uid'");
        if ($query->num_rows()==1)
        {
          $row = $query->row();
          $u_name=$row->u_name;
          echo '<a href="https://millcloud.ru/User" title="Перейти в профиль" class="alogin">'.$u_name.'</a>';
          echo '<a href="#">Корзина [0]</a>';
          echo '<a href="https://millcloud.ru/User?exit" style="margin-right:50px">Выйти</a>';
        }
      }
    }


}
?>
