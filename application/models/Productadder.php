<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productadder extends CI_Model {

    public function __construct()
            {
                    // Call the CI_Model constructor
                    parent::__construct();
                    $this->load->database('millcloud');
            }

    function insert_entry()
    {
      $data = array(
      'art_zav' => $this->input->post('art_zav'),
      'short_capt' => $this->input->post('short_capt'),
      'full_capt' => $this->input->post('full_capt'),
      'image' => $this->input->post('image'),
      'space_vol' => $this->input->post('space_vol'),
      'space_const' => $this->input->post('space_const'),
      'size_vol' => $this->input->post('size_vol'),
      'size_const' => $this->input->post('size_const'),
      'place_vol' => $this->input->post('place_vol'),
      'add_mark' => $this->input->post('add_mark'),
      'endprice_vol' => $this->input->post('endprice_vol'),
      'cash_const' => $this->input->post('cash_const'),
      'negabarit' => $this->input->post('negabarit'),
      'free_vol' => $this->input->post('free_vol'),
      'reserve_vol' => $this->input->post('reserve_vol'),
      'trans_vol' => $this->input->post('trans_vol'),
      'vol_const' => $this->input->post('vol_const')
  );
          $this->db->insert('products', $data);
    }


}
?>
