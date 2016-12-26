<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profilemod extends CI_Model
{
    public function __construct()
            {
                    parent::__construct();
                    $this->load->database('millcloud');
            }

            //Проверка авторизации
            function check_come() {
              $logged_in=$this->session->userdata('logged_in');
              if ($logged_in !=TRUE)
                {
                  header("Location: https://millcloud.ru/Come");
                }
                else
                {
                  $uid=$this->session->userdata('u_id');
                  $gid=$this->session->userdata('g_id');
                  if ($gid=='0') { $bdsel='all_users';} else {$bdsel='g_users';}

                  $query=$this->db->query("SELECT * FROM $bdsel WHERE u_id='$uid'");
                  $row = $query->row();
                  $activated=$row->activated;
                  $u_name=$row->u_name;
                  if ($activated =1)
                  {
                    $this->load->view('Millup');
                    $this->load->view('Left_menu');
                    if ($u_name =='') {$this->load->view('Editprofile');}
                    else {
                      if ($u_name =='0') {$this->load->view('Editprofile');}
                      else {
                      if(isset($_GET['edit']))
              					{
              						$this->load->view('Editprofile');
              					}
                      else
                        {
                          $this->load->view('News');
                        }
                      }
                    }
                    $this->load->view('Millfooter');
                  }
              }
              }
              //Если нажат "Выход"
              function come_out () {
                $logged_in=$this->session->userdata('logged_in');
                if(isset($_GET['exit']))
                  {
                    $userdata = array(
                      'u_id'  => '',
                      'g_id'  => '',
                      'logged_in' => FALSE
                    );
                    $this->session->set_userdata($userdata);
                    header("Location: https://millcloud.ru");
                    /*$logged_in=$this->session->userdata('logged_in');
                    if ($logged_in ==FALSE)
                      {
                        header("Location: https://millcloud.ru");
                      }*/
                  }
              }
//Подгрузка информации пользователя
            function load_profile() {

                $group = $this->session->userdata('group');
                $uid = $this->session->userdata('u_id');
                $query=$this->db->query("SELECT * FROM $group WHERE u_id='$uid'");
                if ($query->num_rows()==1)
                {
                  $row = $query->row();
                  $u_name=$row->u_name;
                  $u_position=$row->u_position;
                  $u_email=$row->u_email;
                  $u_phone=$row->u_phone;
                  $u_skype=$row->u_skype;
                  $u_icq=$row->u_icq;
                  $avatar=$row->avatar;
                  $info= "<p>".$u_name."</p>"."<p>".$u_position."</p>"."<p>Email: ".'<a href="mailto:'.$u_email.'">'.$u_email."</a></p>"
                  ."<p>Телефон: ".$u_phone."</p>"
                  ."<p>Skype: ".'<a href="skype:'.$u_skype.'">'.$u_skype."</a></p>"
                  ."<p>Icq: ".$u_icq."</p>";
                  echo $info;
                }

            }
// Редактирование профиля
            function edit_profile() {

                $group = $this->session->userdata('group');
                $uid = $this->session->userdata('u_id');
                $gid = $this->session->userdata('g_id');
                $query=$this->db->query("SELECT * FROM $group WHERE u_id='$uid'");
                if ($query->num_rows()==1)
                {
                  $row = $query->row();
                  $u_name=$row->u_name;
                  $u_position=$row->u_position;
                  $u_email=$row->u_email;
                  $u_phone=$row->u_phone;
                  $u_skype=$row->u_skype;
                  $u_icq=$row->u_icq;
                  $u_linkedin=$row->u_linkedin;
                  $avatar=$row->avatar;
                  $edit= '<form action="" method="post" enctype="multipart/form-data">'.
                         '<p>*ФИО / Название:</p><input type="text" name="u_name" value="'.$u_name.'">'.'</br></br>'.
                         '<p>*Должность:</p><input type="text" name="u_position" value="'.$u_position.'">'.'</br></br>'.
                         '<p>*E-mail:</p><input type="text" name="u_email" value="'.$u_email.'">'.
                         '<p style="color:#A30008">*при изменении - изменится E-mail для входа на портал!!!</p>'.'</br>'.
                         '<p>Выберете фото профиля:</p><input type="file" name="userfile">'.
                         '<p>Телефон:</p><input type="text" name="u_phone" value="'.$u_phone.'">'.'</br></br>'.
                         '<p>Skype:</p><input type="text" name="u_skype" value="'.$u_skype.'">'.'</br></br>'.
                         '<p>icq:</p><input type="text" name="$u_icq" value="'.$u_icq.'">'.'</br></br>'.
                         '<button type="submit" name="savebut">Сохранить</button></br>'.
                         '</form>';
                  echo $edit;

                  $savebut=$this->input->post('savebut');
                  $usfile=$this->input->post('userfile');
                  if (isset($savebut)) {
                    $this->form_validation->set_rules('u_name', 'u_name', 'required');
                    $this->form_validation->set_rules('u_position', 'u_position', 'required');
                    $this->form_validation->set_rules('u_email', 'Email', 'required|valid_email');
                    if ($this->form_validation->run() == FALSE)
                		{
                			echo 'Некорректно заполнены обязательные поля "*" !!!';
                		}
                		else
                		{
                      if(isset($usfile)) {

                        $this->load->library('upload');
                        $config = array();
                        $config['upload_path'] = 'Users/'.$gid.'/'.$uid.'/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size'] = '100000000';
                        //$config['encrypt_name'] = TRUE;
                        //$config['remove_spaces'] = TRUE;
                        $this->upload->initialize($config);
                        $this->upload->do_upload();
                        $avatar=$this->upload->data('file_name');

                        $data = array(
                        'u_name' => $this->input->post('u_name'),
                        'u_position' => $this->input->post('u_position'),
                        'u_email' => $this->input->post('u_email'),
                        'u_phone' => $this->input->post('u_phone'),
                        'u_skype' => $this->input->post('u_skype'),
                        'u_icq' => $this->input->post('u_icq'),
                        'avatar' => $avatar
                        );
                        $this->db->where('u_id', $uid);
                        $this->db->update($group, $data);
                      }
                      else {
                        $data = array(
                        'u_name' => $this->input->post('u_name'),
                        'u_position' => $this->input->post('u_position'),
                        'u_email' => $this->input->post('u_email'),
                        'u_phone' => $this->input->post('u_phone'),
                        'u_skype' => $this->input->post('u_skype'),
                        'u_icq' => $this->input->post('u_icq')
                        );
                        $this->db->where('u_id', $uid);
                        $this->db->update($group, $data);
                      }
                      header("Location: https://millcloud.ru/Profile");
                    }
                  }
                }

            }

            function logo_who()
            {
              $group = $this->session->userdata('group');
              $uid = $this->session->userdata('u_id');
              $query=$this->db->query("SELECT * FROM $group WHERE u_id='$uid'");
              if ($query->num_rows()==1)
              {
                $row = $query->row();
                $u_name=$row->u_name;
                echo '<a class="textlogo" href="https://millcloud.ru">millcloud'.' >>'.'</a>'.'<a class="namelogo" href="https://millcloud.ru/User">'.$u_name.'</a>';
              }
            }

}
?>
