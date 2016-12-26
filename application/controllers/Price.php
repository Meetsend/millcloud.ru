<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Price extends CI_Controller {

  public function index() {
    $this->load->model('Profilemod');
    $this->load->model('Usermod');
    $this->load->model('Pricehub');
    $this->load->model('Comemod');
    $this->load->model('Mainmod');
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->load->library('email');
    $this->load->library('session');
    $this->load->helper('email');
    $this->load->helper('cookie');

    $logged_in = $this->session->userdata('logged_in');

      if ($logged_in !='TRUE')
    {
      header("Location: https://millcloud.ru/Come");
    }
    else {
      $this->load->view('Millup');
      $this->load->view('Left_menu');
      $this->load->view('Price');
      $this->load->view('Millfooter');
    }
  }
}
