<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermod extends CI_Model
{
    public function __construct()
            {
                    parent::__construct();
                    $this->load->database('millcloud');
            }

            function ac_exit()
                {
                  $userdata = array(
                    'u_id'  => '',
                    'g_id'  => '',
                    'logged_in' => FALSE
                  );
                  $this->session->set_userdata($userdata);
                }

            function confirm_reg()
                {
                   $registration_code=$this->input->post('act_code');
                   $query=$this->db->query("SELECT * FROM g_users WHERE activation_code='$registration_code'");
                   if ($query->num_rows()==1) {
                     $row = $query->row();
                     $email= $row->u_email;
                     $query=$this->db->query("UPDATE  g_users  SET activated=1 WHERE activation_code='$registration_code'");
                     $this->email->from('dialog@millcloud.ru','Millcloud');
                     $this->email->to($email);
                     $this->email->subject('Успешная регистрация!');
                     $this->email->message('Поздравляем, ваш аккаунт зарегистрирован, добро пожаловать в Millcloud!');
                     $this->email->send();

                     $uid = $this->session->userdata('u_id');
                     $gid = $this->session->userdata('g_id');
                     $mkpath='Users/'.$gid.'/'.$uid.'/';
                     mkdir($mkpath, 0777, true);

                     $this->load->dbforge();

                     $fields = array(
                        'memb_uid' => array(
                                                 'type' => 'INT',
                                                 'null' => TRUE
                                          ),
                        'memb_role' => array(
                                                 'type' => 'TEXT',
                                                 'null' => TRUE
                                          ),
                        'activate' => array(
                                                 'type' => 'TEXT',
                                                 'null' => TRUE
                                          )
                                        );
                     $this->dbforge->add_field($fields);
                     $name= $uid.'_members';
                     $this->dbforge->create_table($name);

                     $fields = array(
                        'friend_gid' => array(
                                                 'type' => 'INT',
                                                 'null' => TRUE
                                          ),
                        'friend_id' => array(
                                                 'type' => 'INT',
                                                 'null' => TRUE
                                          ),
                        'status' => array(
                                                 'type' => 'INT',
                                                 'null' => TRUE
                                          )
                                        );
                     $this->dbforge->add_field($fields);
                     $name= $uid.'_friends';
                     $this->dbforge->create_table($name);

                     $fields = array(
                        'brand_id' => array(
                                                 'type' => 'INT',
                                                 'null' => TRUE
                                          ),
                        'brand_capt' => array(
                                                 'type' => 'TEXT',
                                                 'null' => TRUE
                                          ),
                        'brand_img' => array(
                                                 'type' => 'TEXT',
                                                 'null' => TRUE
                                          )
                                        );
                     $this->dbforge->add_field($fields);
                     $name= $uid.'_brands';
                     $this->dbforge->create_table($name);

                     $fields = array(
                        'news_id' => array(
                                                 'type' => 'INT',
                                                 'null' => TRUE
                                          ),
                        'news_capt' => array(
                                                 'type' => 'TEXT',
                                                 'null' => TRUE
                                          ),
                        'news_text' => array(
                                                 'type' => 'TEXT',
                                                 'null' => TRUE
                                          ),
                        'news_img' => array(
                                                 'type' => 'TEXT',
                                                 'null' => TRUE
                                          ),
                        'news_date' => array(
                                                 'type' => 'DATE',
                                                 'null' => TRUE
                                          )
                                        );
                     $this->dbforge->add_field($fields);
                     $name= $uid.'_news';
                     $this->dbforge->create_table($name);

                     $fields = array(
                        'store_id' => array(
                                                 'type' => 'INT',
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'store_city' => array(
                                                 'type' => 'TEXT',
                                                 'null' => TRUE
                                          ),
                        'store_address' => array(
                                                 'type' => 'TEXT',
                                                 'null' => TRUE
                                          ),
                        'store_tel' => array(
                                                 'type' => 'TEXT',
                                                 'null' => TRUE
                                          )
                                        );
                     $this->dbforge->add_field($fields);
                     $this->dbforge->add_key('store_id', TRUE);
                     $name= $uid.'_stores';
                     $this->dbforge->create_table($name);

                     header ('Location: https://millcloud.ru/User');
                   }
                   else {
                     $query=$this->db->query("SELECT * FROM all_users WHERE activation_code='$registration_code'");
                     if ($query->num_rows()==1) {
                       $row = $query->row();
                       $email= $row->u_email;
                       $query=$this->db->query("UPDATE  all_users  SET activated=1 WHERE activation_code='$registration_code'");
                       $this->email->from('dialog@millcloud.ru','Millcloud');
                       $this->email->to($email);
                       $this->email->subject('Успешная регистрация!');
                       $this->email->message('Поздравляем, ваш аккаунт зарегистрирован, добро пожаловать в Millcloud!');
                       $this->email->send();

                       $uid = $this->session->userdata('u_id');
                       $gid = $this->session->userdata('g_id');
                       $mkpath='Users/'.$gid.'/'.$uid.'/';
                       mkdir($mkpath, 0777, true);

                       $this->load->dbforge();

                       $fields = array(
                          'id_offer' => array(
                                                   'type' => 'INT',
                                                   'unsigned' => TRUE,
                                                   'auto_increment' => TRUE
                                            ),
                          'id_host' => array(
                                                   'type' => 'INT',
                                                   'null' => TRUE
                                            ),
                          'v_offer' => array(
                                                   'type' => 'LONGTEXT',
                                                   'null' => TRUE
                                            ),
                          'time_offer' => array(
                                                   'type' => 'DateTime',
                                                   'null' => TRUE
                                            )
                                          );
                       $this->dbforge->add_field($fields);
                       $this->dbforge->add_key('id_offer', TRUE);
                       $name= $uid.'_offers';
                       $this->dbforge->create_table($name);

                       $fields = array(
                          'id_act' => array(
                                                   'type' => 'INT',
                                                   'unsigned' => TRUE,
                                                   'auto_increment' => TRUE
                                            ),
                          'id_host' => array(
                                                   'type' => 'INT',
                                                   'null' => TRUE
                                            ),
                          'v_act' => array(
                                                   'type' => 'LONGTEXT',
                                                   'null' => TRUE
                                            ),
                          'time_act' => array(
                                                   'type' => 'DateTime',
                                                   'null' => TRUE
                                            )
                                          );
                       $this->dbforge->add_field($fields);
                       $this->dbforge->add_key('id_act', TRUE);
                       $name= $uid.'_offers';
                       $this->dbforge->create_table($name);

                       header ('Location: https://millcloud.ru/User');
                     }
                     else {
                       echo '<p style="color:#fff">Неверный код!</p>';
                     }
                   }

                }

}
?>
