<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comemod extends CI_Model {

    public function __construct()
            {
                    parent::__construct();
                    $this->load->database('millcloud');
            }

           function create_user ()
              {

                  $checkmail=$this->input->post('u_email');
                  $g_id=$this->input->post('g_id');
                  $activation_code=sha1(mt_rand(10000,99999).time().'u_email');
                  if ($g_id=='0') { $bdsel='all_users';} else {$bdsel='g_users';}

                  $query=$this->db->query("SELECT * FROM all_users, g_users WHERE all_users.u_email='$checkmail' OR g_users.u_email='$checkmail'");
                  if ($query->num_rows()>0)
                  {
                    echo '<p style="color:#fff">Пользователь с таким Email уже существует, пожалуйста используйте другой Email!</p>';
                  }

                  else {
                    $data = array(
                   'g_id' => $this->input->post('g_id'),
                   'u_email' => $this->input->post('u_email'),
                   'u_pass' => sha1($this->input->post('u_pass')),
                   'activation_code' => $activation_code,
                   'created_at' =>  date("Y-m-d H:i:s", time())
                    );
                    $this->db->insert($bdsel, $data);

                    $query=$this->db->query("SELECT * FROM $bdsel WHERE u_email='$checkmail'");
                    $row = $query->row();
                    $u_id=$row->u_id;
                    $g_id=$row->g_id;
                    $userdata = array(
                               'u_id'  => $u_id,
                               'g_id'  => $g_id,
                               'group' => $bdsel,
                               'logged_in' => TRUE
                              );
                    $this->session->set_userdata($userdata);

                    $this->email->from('dialog@millcloud.ru','Millcloud');
                    $this->email->to($checkmail);
                    $this->email->subject('Подтверждение регистрации Millcloud');
                    $mess="<p>Добро пожаловать в Millcloud! Для завершения регистрации в личном кабинете введите код активации, представленный ниже:</p>";
                    $this->email->message($mess.$activation_code);
                    $this->email->set_mailtype("html");
                    $this->email->send();
                    header("Location: https://millcloud.ru/User");
                  }
              }

              function auth_user()
              {
                $int_email=$this->input->post('int_email');
                $cont_pass=sha1($this->input->post('int_pass'));
                $query=$this->db->query("SELECT * FROM all_users WHERE u_email='$int_email'");
                if ($query->num_rows()==1)
                {
                  $row = $query->row();
                  $u_id=$row->u_id;
                  $g_id=$row->g_id;
                  $query=$this->db->query("SELECT * FROM all_users WHERE u_id='$u_id' AND u_pass='$cont_pass'");
                  if ($query->num_rows()==1)
                  {
                    $userdata = array(
                               'u_id'  => $u_id,
                               'g_id'  => $g_id,
                               'group' => 'all_users',
                               'logged_in' => TRUE
                              );
                    $this->session->set_userdata($userdata);
                    header("Location: https://millcloud.ru/User");
                  }
                  else {
                    echo '<p style="color:#fff">Неверный пароль!</p>';
                  }
                }
                else {
                  $query=$this->db->query("SELECT * FROM g_users WHERE u_email='$int_email'");
                  if ($query->num_rows()==1)
                  {
                    $row = $query->row();
                    $u_id=$row->u_id;
                    $g_id=$row->g_id;
                    $query=$this->db->query("SELECT * FROM g_users WHERE u_id='$u_id' AND u_pass='$cont_pass'");
                    if ($query->num_rows()==1)
                    {
                      $userdata = array(
                                 'u_id'  => $u_id,
                                 'g_id'  => $g_id,
                                 'group' => 'g_users',
                                 'logged_in' => TRUE
                                );
                      $this->session->set_userdata($userdata);
                      header("Location: https://millcloud.ru/User");
                    }
                    else {
                      echo '<p style="color:#fff">Неверный пароль!</p>';
                    }
                }
                else {
                  echo '<p style="color:#fff">Введенный Email не существует!</p>';
                }

                }

              }

}
?>
