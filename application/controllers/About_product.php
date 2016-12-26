<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_product extends CI_Controller {

  public function index() {
    $this->load->model('Profilemod');
    $this->load->model('Usermod');
    $this->load->model('Pricehub');
    $this->load->model('Comemod');
    $this->load->model('Mainmod');
    $this->load->helper(array('form', 'url'));
    $this->load->helper('url');
    $this->load->library('form_validation');
    $this->load->library('email');
    $this->load->library('session');
    $this->load->helper('email');

    $this->load->view('About_product');
  }
}
