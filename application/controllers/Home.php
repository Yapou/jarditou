<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

//Pour charger la page d'accueil
public function accueil()
{
 $page = $this->load->view('accueil', '',true);
 $this->load->view('template', array('page' => $page));
}
}
?>
