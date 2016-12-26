<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class U_add extends CI_Model {

    public function __construct()
            {
                    parent::__construct();
                    $this->load->database('millcloud');
            }

    function add_friend()
    {
          $u_add= $_GET['addfriend'];
          $uid=$this->session->userdata('u_id');
          $data = array(
               'friend_id' => $u_add,
               'status' => '0'
            );
          $fdata = array(
               'friend_id' => $uid,
               'status' => '1'
            );
          $table=$uid.'_friends';
          $ftable=$u_add.'_friends';
          $this->db->insert($table, $data);
          $this->db->insert($ftable, $fdata);
    }

    function approve_friend()
    {

    }
}
?>
