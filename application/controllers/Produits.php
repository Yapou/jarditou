<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class produits extends CI_Controller {

public function liste() {
  $this->load->database();

        $this->load->model('produit_table'); //pr ma query je charge mon model ac ma requête
        $proTb['liste'] = $this->produit_table->table();
        //Je stock ds une var pour afficher dans mon template en utilisant 3ème param true qui permet de la retourner
        $proTb['produits'] = $this->produit_table->getAllCat();
        //Afficher le prolist avec un $ devant pr le foreach
        $page = $this->load->view('liste', $proTb, true);
        // On affiche notre page avec le template
        $this->load->view('template', array('page' => $page));
    }

public function subCat() {
       if (isset($_POST['cat_id']) && $_POST['cat_id'] !== '0') {
         $this->load->database();
         $id = $_POST['cat_id'];
         echo "<option>Sélectionner</option>";
         $this->load->model('produit_table');
         $data = $this->produit_table->getSubCat($id);
         foreach ($data as $value) {
         echo "<option value='" . $value->cat_id . "'>" . $value->cat_nom . "</option>";
           }
       }
   }

public function detail($pro_id)
{


    $this->load->database();
    $requete = $this->db->get_where('produits', array('pro_id' => $pro_id));
    $product = $requete->row();
    $page = $this->load->view('detail', array('product'=> $product), true);
    $this->load->view('template', array('page' => $page));
}

public function update($id)
{
  $this->load->database();

  $this->load->helper('form');
  //Recupération des champs
  $ref = $this->input->post('pro_ref');
  $libelle = $this->input->post('pro_libelle');
  $description = $this->input->post('pro_description');
  $prix = $this->input->post('pro_prix');
  $stock = $this->input->post('pro_stock');
  $couleur = $this->input->post('pro_couleur');

  //chargement validation champs
  $this->load->library('form_validation');
  //Validation des champs
  $this->form_validation->set_rules('pro_libelle', 'Libellé', 'trim|required', array('required' => 'Le %s doit être renseigné.'));
  $this->form_validation->set_rules('pro_prix', 'prix', 'trim|required', array('required' => 'Le %s doit être renseigné.'));
  $this->form_validation->set_rules('pro_description', 'description', 'trim|required', array('required' => 'La %s doit être renseigné.'));
  $this->form_validation->set_rules('pro_stock', 'stock', 'trim|required|numeric', array('required' => 'Le %s doit être renseigné'));
  $this->form_validation->set_rules('pro_couleur', 'couleur', 'trim|required', array('required' => 'La %s doit être renseignée '));

  //Si validation des champs = faux, on reaffiche le formulaire
  if ($this->form_validation->run() == false) {
      // +++ CAPTATION DES ERREURS +++
      // On réaffiche le formulaire

// Mettre validation en session
$error = validation_errors();
$this->session->set_flashdata('error', $error);
redirect('produits/detail/' . $id);
  }
  else
  {
      $this->load->model('produit_table');
      $test = $this->produit_table->setProduit($id);
      redirect('produits/detail/' . $id);
  }
}

public function ajoutProd()
{
  //Connexion à la base de donnée
  $this->load->database();
  //Chargement du helper Formulaire
  $this->load->helper('form');
  //Recupération des champs
  $pref = $this->input->post('pro_ref');
  $pcat = $this->input->post('pro_cat_id');
  $pname = $this->input->post('pro_libelle');
  $pdesc = $this->input->post('pro_description');
  $pprice = $this->input->post('pro_prix');
  $pstk = $this->input->post('pro_stock');
  $pcolor = $this->input->post('pro_couleur');
  $pblocked = $this->input->post('pro_bloque');

  //chargement validation champs
  $this->load->library('form_validation');
  //Validation des champs
  $this->form_validation->set_rules('pro_ref', 'Référence', 'trim|required|is_unique[produits.pro_ref]', array('required' => 'La %s doit être renseignée.', 'is_unique' => 'La %s doit être unique'));
  $this->form_validation->set_rules('pro_libelle', 'Libellé', 'trim|required', array('required' => 'Le %s doit être renseigné.'));
  $this->form_validation->set_rules('pro_prix', 'prix', 'trim|required', array('required' => 'Le %s doit être renseigné.'));
  $this->form_validation->set_rules('pro_stock', 'stock', 'trim|required|numeric', array('required' => 'Le %s doit être renseigné'));
  $this->form_validation->set_rules('pro_couleur', 'couleur', 'trim|required', array('required' => 'La %s doit être renseignée '));

  //Si validation des champs = faux, on reaffiche le formulaire
  if ($this->form_validation->run() == false) {
      // +++ CAPTATION DES ERREURS +++
      // On réaffiche le formulaire

// Mettre validation en session
$error = validation_errors();
$this->session->set_flashdata('error', $error);
redirect('home/accueil');
  }
  else
  {
      $this->load->model('produit_table');
      $this->load->library('upload');
               //Mes règles d'upload sont définies dans config/upload.php (ext autorisées, etc.)
               if (!$this->upload->do_upload("pro_photo")) { //pro_photo name de mon input file
                   $upErrors = $this->upload->display_errors(); //Erreurs d'upload
                   $this->session->set_flashdata('Upload failed', $upErrors);
                   redirect("connexion/formco");
               }
                else {
                   $this->load->model('produit_table');
                   $d = $this->upload->data(); //renvoie toutes les infos du fichier uploadé
                   $imgExt = substr($d['file_ext'], 1); //Ext de mon img ap upload avec le point (ex : .jpg), ac substr j'enlève le premier caractère avec le 1 en param
                   $this->produit_table->addProduit($imgExt); //Envoie mon ext d'image pr l'insert
                   $lastId = $this->db->insert_id(); //Récup le dernier ID de ma table ap l'ajout
                   rename($d['full_path'], $d['file_path'] . '/' . $lastId . "." . $imgExt);
                   //(Vieux nom, nouveau non) full = chemin + ext, file = chemin sans ext
                   $this->session->set_flashdata('Success', '<div class="alert alert-success mt-3" role="alert"><strong>Produit ajouté !</strong></div>'); //Message de succès

      redirect('produits/liste');
  }

}//Sinon chargement du model pour rentrer les données dans la table et redirection vers une page success

}//ajoutProd

public function deleteProd($id)
{
  $this->load->database();
  $this->load->model('produit_table');
  $test = $this->produit_table->deleteProduit($id);
  redirect('produits/liste');

}


}//class
?>
