<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partners extends CI_Controller {

  public function index() {
    $this->load->model('Profilemod');
    $this->load->model('Usermod');
    $this->load->model('Pricehub');
    $this->load->model('Partner_mod');
    $this->load->model('Comemod');
    $this->load->model('Mainmod');
    $this->load->model('Uploadmod');
    $this->load->model('U_add');
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
      $this->load->view('Partners');
      $this->load->view('Millfooter');


    	if (isset ($_GET['addfriend'])) {
    		$this->U_add->add_friend();
    		header("Location: https://millcloud.ru/Partners");
    	}

    }
    function load_p()
    {
      $this->Partner_mod->load_partners();
    }
  }
}
