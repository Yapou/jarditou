<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tableau extends CI_Controller {

//Pour charger la page d'accueil
public function vente()
{
 $page = $this->load->view('tableau', '',true);
 $this->load->view('template', array('page' => $page));
}
}
?>
