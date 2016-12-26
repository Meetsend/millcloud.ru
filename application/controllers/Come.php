<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Come extends CI_Controller {

  public function index()
  {
  $this->load->view('Come');
  $this->load->model('Comemod');
  $this->load->model('Mainmod');
  $this->load->helper(array('form', 'url'));
  $this->load->library('form_validation');
  $this->load->library('email');
  $this->load->library('session');
  $this->load->helper('email');

  $regbut=$this->input->post('regbut');
  $logbut=$this->input->post('logbut');
  $logged_in = $this->session->userdata('logged_in');

  if ($logged_in !='TRUE')
{

//Модуль регистрации
  if ($regbut =='submit') {
    $this->form_validation->set_rules('u_email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('u_pass', 'Pass', 'required|min_length[5]|matches[confirm_pass]');
    $this->form_validation->set_rules('confirm_pass', 'Confirmpass', 'required');
    if ($this->form_validation->run() == FALSE)
    {
      echo '<p style="color:#fff">Данные введены некорректно!</p>';
    }
    else
    {
      $this->Comemod->create_user();
    }

  }

//Модуль авторизации
  if ($logbut =='submit') {
    $this->form_validation->set_rules('int_email', 'intmail', 'required|valid_email');
    $this->form_validation->set_rules('int_pass', 'intpass', 'required|min_length[5]');
    if ($this->form_validation->run() == FALSE)
    {
      echo '<p style="color:#fff">Данные введены некорректно!</p>';
    }
    else
    {
      $this->Comemod->auth_user();
    }

                          }
  }
  else {
    header("Location: https://millcloud.ru/User");
  }

  }

}
