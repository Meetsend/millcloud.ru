<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  public function index(){
  $this->load->model('Usermod');
  $this->load->model('Pricehub');
  $this->load->model('Profilemod');
  $this->load->model('Uploadmod');
  $this->load->model('Mainmod');
  $this->load->library('form_validation');
  $this->load->library('email');
  $this->load->library('session');
  $this->load->helper('email');
  $this->load->helper('file');
  $this->load->helper('array');
  $this->load->helper(array('form', 'url'));

  //Проверка

  $logged_in=$this->session->userdata('logged_in');

  if ($logged_in !=TRUE)
    {
      header("Location: https://millcloud.ru/Come");
    }
    else
    {
      $uid=$this->session->userdata('u_id');
      $gid=$this->session->userdata('g_id');
      if ($gid=='0') { $bdsel='all_users';} else {$bdsel='g_users';}

      $query=$this->db->query("SELECT * FROM $bdsel WHERE u_id='$uid'");
      $row = $query->row();
      $activated=$row->activated;
      if ($activated !=1)
      {
        $this->load->view('Confirm');

//Активация профиля
        $activator=$this->input->post('activator');
        if ($activator=='submit')
        {
          $this->form_validation->set_rules('act_code', 'act_code', 'required');
          if ($this->form_validation->run() == FALSE)
          {
            echo '<p style="color:#fff">Данные введены некорректно!</p>';
          }
          else
          {
            $this->Usermod->confirm_reg();
          }
        }
      }
      else
      {
        $this->Profilemod->check_come();

        //Если нажат "Выход"
          if(isset($_GET['exit']))
            {
              $this->Usermod->ac_exit();
              $logged_in=$this->session->userdata('logged_in');
              if ($logged_in ==FALSE)
                {
                  header("Location: https://millcloud.ru/Come");
                }
            }
        //price_up();
        //$this->Pricehub->public_price();
        //price_down();
      }

    }
    //Если нажат "Выcлать код еще раз"
              if(isset($_GET['sendcode']))
                {
                  $query=$this->db->query("SELECT * FROM $bdsel WHERE u_id='$uid'");
                  $row = $query->row();
                  $acode=$row->activation_code;
                  $email= $row->u_email;
                  $this->email->from('dialog@millcloud.ru','Millcloud');
                  $this->email->to($email);
                  $this->email->subject('Код активации millcloud !!!');
                  $this->email->message('Код активации:'.$acode);
                  $this->email->send();
                  echo '<p style="color:#fff">Код отправлен повторно на ваш E-mail</p>';
                }

    //Если нажат "Выход"
      if(isset($_GET['exit']))
        {
          $this->Usermod->ac_exit();
          $logged_in=$this->session->userdata('logged_in');
          if ($logged_in ==FALSE)
            {
              header("Location: https://millcloud.ru/Come");
            }
        }


//Конец кода
  }
}
