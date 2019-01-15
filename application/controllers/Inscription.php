<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inscription extends CI_Controller {

//Pour charger la page d'accueil
public function renseignements()
{
  $this->load->database();

  $this->load->helper('form');

  if ($this->input->post()) {

    //Recuperation du tableau
    $aPost = $this->input->post();
    //var_dump($aPost);

    //Recupération champ par champ
    $login = $this->input->post('login');
    $mdp = $this->input->post('password');
    $mdpConfirm = $this->input->post('passwordConfirm');

    //Validation
    $this->load->library('form_validation');

    //regle de validation

  $this->form_validation->set_rules('login', 'pseudo', 'trim|required|is_unique[client.login]|min_length[4]', array('required' => 'Le %s doit être renseigné.', 'is_unique' => 'Le %s choisit existe déjà'));
  $this->form_validation->set_rules('password', 'mot de passe', 'required');
  $this->form_validation->set_rules('passwordConfirm', 'confirmation du mot de passe', 'required|matches[password]', array('matches' => 'La %s est incorrect'));

  if ($this->form_validation->run() == false)
  {
     // +++ CAPTATION DES ERREURS +++



     // On réaffiche le formulaire
     $page =  $this->load->view('renseignements', '', true);
     $this->load->view('template', array('page' => $page));

  }
  else
  {
    //On entre les infos dans la base en appelant le model
    $this->load->model('Client');
    $this->Client->addClient();
    // Si OK, on redirige où souhaité
    redirect("inscription/inscrit");
  }
}
else
{
// Pas posté, on affiche le formulaire pour saisie
$page = $this->load->view('renseignements', '',true);
$this->load->view('template', array('page' => $page));
}
}

public function inscrit()
{
 $page = $this->load->view('inscrit', '',true);
 $this->load->view('template', array('page' => $page));
}

}
?>
