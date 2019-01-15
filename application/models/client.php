<?php

class Client extends CI_Model  {

  public function addClient() {

    $login = $this->input->post('login');
    $password =  $this->input->post('password');
    $passwordh = password_hash($password, PASSWORD_DEFAULT);
    $datas = array('login' => $login, 'password' => $passwordh);
    $this->db->insert('client', $datas);
  }//addClient

  public function logClient() {
       $login = $this->input->post('login'); // Filtre XSS définit de base dans config > $config['global_xss_filtering'] = TRUE; Sinon faut mettre $this->input->post('login', TRUE)
       $pwd = $this->input->post('password');
       $this->db->select('password');
       $this->db->from('client');
       $this->db->where('login', $login);
       $hashPwd = $this->db->get()->row('password'); //récup mon pass hashé
       if (password_verify($pwd, $hashPwd)) {
           $this->db->select('*');
           $this->db->from('client');
           $this->db->where('login', $login);
           return $this->db->get()->row();
       } else {
           return FALSE;
       }
   }//log_client
}
?>
