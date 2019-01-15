<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class connexion extends CI_Controller {

  public function formco() {
    //Connexion à la base de donnée
    $this->load->database();
    //Chargement du helper
    $this->load->helper('form');

    if ($this->input->post()) {
      // Récupère tout le tableau
      $aPost = $this->input->post();
      // Récupérer un champ en particulier
      $login = $this->input->post("login");
      $password = $this->input->post("password");

      //validation
      $this->load->library('form_validation');
      // Règles de validation
      $this->form_validation->set_rules('login', 'login', 'trim|required', array('required' => 'Le %s doit être renseigné.'));
      $this->form_validation->set_rules('password', 'mot de passe', 'trim|required', array('required' => 'Le %s doit être renseigné.'));
      // Si form_validation est faux
      if ($this->form_validation->run() == false) {
      // +++ CAPTATION DES ERREURS +++
      // On réaffiche le formulaire
        $page = $this->load->view('formco', '', true);
        $this->load->view('template', array('page' => $page));
      }
      //Si on remplit les conditions
      else {
        //On charge le model client
        $this->load->model('Client');
        $test = $this->Client->logClient($login, $password);
        //Si logClient renvoit faux
        // if ( $this->Client->logClient($login, $password) == false) {
        if ( $test == false) {
          // On réaffiche le formulaire
          $page = $this->load->view('formco', '', true);
          echo 'login ou mot de passe incorrect';
          $this->load->view('template', array('page' => $page));
          //Si les données match avec la BDD
        } else {
          // OK
          //chargement de la librairie de session en autoload
          // $this->session->login = $userInfo
          $this->session->set_userdata('login', $login);
          $this->session->set_userdata('role', $test->role);
          // Si OK, on redirige où souhaité
          redirect("Connexion/formco");
        }

      }
    }
    else {
      // Pas posté, on affiche le formulaire pour saisie
      $page = $this->load->view('formco', '', true);
      $this->load->view('template', array('page' => $page));
    }
  }

  public function connecte()
  {
    if ($this->session->login)
    {
      $this->load->view('connecte');
    }
    else
    {
      // Pas loggué : renvoi sur connexion (par exemple)
      $page = $this->load->view('formco', '', true);
      $this->load->view('template', array('page' => $page));    }
    } // -- connecte()

    public function deconnexion()
    {
      $this->session->sess_destroy();
      $page = $this->load->view('deconnexion', '', true);
      $this->load->view('template', array('page' => $page));
    } // -- deconnexion


  }

  ?>
