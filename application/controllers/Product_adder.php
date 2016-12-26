<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_adder extends CI_Controller {

  public function index() {
  $this->load->model('Comemod');
  $this->load->model('Usermod');
  $this->load->model('Mainmod');
  $this->load->model('Profilemod');
  $this->load->model('Productadder');

  //$this->load->view('Millup');
  //$this->load->view('Left_menu');
  //$this->load->view('Product_adder');
  //$this->load->view('Millfooter');

  $this->load->library('session');
  $this->load->library('form_validation');
  $this->load->library('email');

  $this->load->helper('email');
  $this->load->helper(array('form', 'url'));

  if (isset ($POST['submit_b'])) {
		$this->load->library('form_validation');
    $rules['short_capt']	= "required";
		$rules['art_zav']	= "required";

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE)
		{
			echo 'Не заполнены обязательыне поля!';
		}
		else
		{
      $this->Productadder->insert_entry();
			echo '<p style="color:#0AB437;">Добавлено!</p>';
		}
  }
  }
}
