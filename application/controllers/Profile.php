<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

  public function index() {
    $this->load->model('Profilemod');
    $this->load->model('Usermod');
    $this->load->model('Pricehub');
    $this->load->model('Comemod');
    $this->load->model('Mainmod');
    $this->load->model('Uploadmod');
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->load->library('email');
    $this->load->library('session');
    $this->load->helper('email');

    $logged_in = $this->session->userdata('logged_in');

      if ($logged_in !='TRUE')
    {
      header("Location: https://millcloud.ru/Come");
    }
    else {
      $this->load->view('Millup');
      $this->load->view('Left_menu');
      if(isset($_GET['edit']))
        {
          $this->load->view('Editprofile');
        }
      else
        {
          $this->load->view('Profile');
        }
      $this->load->view('Millfooter');
    }
  }
}
