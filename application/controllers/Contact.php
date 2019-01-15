<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class contact extends CI_Controller {

//Pour charger la page d'accueil
public function formulaire()
{
 $page = $this->load->view('formulaire', '',true);
 $this->load->view('template', array('page' => $page));
}
}
?>
