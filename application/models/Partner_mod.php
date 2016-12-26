<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partner_mod extends CI_Model {

    public function __construct()
            {
                    // Call the CI_Model constructor
                    parent::__construct();
                    $this->load->database('millcloud');
            }


    function load_partners()
    {
      $uid=$this->session->userdata('u_id');
  		$table=$uid.'_friends';

      if (isset($_GET['i']))
      {
        $ind=$_GET['i'];
        $query = $this->db->get_where($table, array('status' => $ind));
        foreach ($query->result_array() as $row)
          {
            if ($query->num_rows() > 0)
              {
                $fid=$row['friend_id'];
                $query=$this->db->query("SELECT * FROM g_users WHERE u_id='$fid'");
                foreach ($query->result_array() as $row)
      			       {
                	    $ava=$row['avatar'];
                			echo '<img src="https://millcloud.ru/Users/'.$row['g_id'].'/'.$row['u_id'].'/'.$row['avatar'].'" class="avatar"/><a href="https://millcloud.ru/U/?g='.$row['g_id'].'&u='.$row['u_id'].'/">'.$row['u_name'].'</a></br>';
                	 }
              }
            }
        }
       else
        {
          $query = $this->db->get($table);
          foreach ($query->result_array() as $row)
            {
              if ($query->num_rows() > 0)
              {
                $fid=$row['friend_id'];
          			$query=$this->db->query("SELECT * FROM g_users WHERE u_id='$fid'");
          			foreach ($query->result_array() as $row)
      			      {
                	   $ava=$row['avatar'];
                		 echo '<img src="https://millcloud.ru/Users/'.$row['g_id'].'/'.$row['u_id'].'/'.$row['avatar'].'" class="avatar"/><a href="https://millcloud.ru/U/?g='.$row['g_id'].'&u='.$row['u_id'].'/">'.$row['u_name'].'</a></br>';
                	}
  		        }
           }
         }
      }
}
?>
