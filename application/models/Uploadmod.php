<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadmod extends CI_Model {

    function _construct()
    {
        parent:: _construct();
        $this->load->database('millcloud');
    }

    function set_avatar()
    {
        $uid = $this->session->userdata('u_id');
        $gid = $this->session->userdata('g_id');
        $group = $this->session->userdata('group');
        $query=$this->db->query("SELECT * FROM $group WHERE u_id='$uid'");
        if ($query->num_rows()==1)
        {
          $row = $query->row();
          $ava=$row->avatar;
          echo '<img src="https://millcloud.ru/Users/'.$gid.'/'.$uid.'/'.$ava.'" class="avatar"/>';
        }
    }


    function upload_avatar()
    {

          //chmod ('users/'.$g_id.'/'.$u_id.'/', 0777);
      //chmod ('users/'.$g_id.'/'.$u_id.'/', 0600);
          $config['upload_path'] = 'users/'.$gid.'/'.$uid.'/';
          $config['allowed_types'] = 'gif|jpg|png';
          $config['max_size'] = '1000';
          $config['encrypt_name'] = TRUE;
          $config['remove_spaces'] = TRUE;
          $this->load->library('upload', $config);
          $this->upload->do_upload();
          $avatar=$this->upload->data('file_name');
          $group = $this->session->userdata('group');
          $data = array('avatar' => $this->input->post($avatar));
          $this->db->update($group, $data, array('u_id' => $uid));

    }

}

?>
