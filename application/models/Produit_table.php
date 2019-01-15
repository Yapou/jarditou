<?php

class Produit_table extends CI_Model {

    public function table() {
        //$this->load->database(); Dans autoload
        $dbQ = $this->db->get('produits');
        return $dbQ->result();
    }

    public function getAllCat() {
      $this->load->database();
        $this->db->select('cat_id, cat_nom');
        $this->db->where('cat_parent', NULL);
        $dbQ = $this->db->get('categories');
        return $dbQ->result();
    }

    public function getSubCat($id) {
        $this->load->database();
        $this->db->select('cat_id, cat_nom');
        $this->db->where('cat_parent', $id);
        $dbQ = $this->db->get('categories');
        return $dbQ->result();
    }

    public function getDetails($id) {
      $this->load->database();
        $this->db->select('*');
        $this->db->from('produits');
        $this->db->join('categories', 'produits.pro_cat_id = categories.cat_id', 'inner');
        $this->db->where('pro_id', $id);
        //$dbQ = $this->db->get_where('produits', array('pro_id' => $_GET['id']));
        //$dbResult['dbTab'] = $dbQ->result();
        return $this->db->get()->row();
    }

    public function addProduit($imgExt) {
        $pref = $this->input->post('pro_ref');
        $pcat = $this->input->post('pro_cat_id');
        $pname = $this->input->post('pro_libelle');
        $pdesc = $this->input->post('pro_description');
        $pprice = $this->input->post('pro_prix');
        $pstk = $this->input->post('pro_stock');
        $pcolor = $this->input->post('pro_photo');
        $pblocked = $this->input->post('pro_bloque');
        $data = array(
            'pro_ref' => $pref,
            'pro_cat_id' => $pcat,
            'pro_libelle' => $pname,
            'pro_description' => $pdesc,
            'pro_prix' => $pprice,
            'pro_stock' => $pstk,
            'pro_couleur' => $pcolor,
            'pro_photo' => $imgExt,
            'pro_bloque' => $pblocked
        );
        $this->db->set('pro_d_ajout', 'NOW()', FALSE); //pour que le NOW() soit pas forcer en string et s'exécute, il faut utiliser cette ligne et mettre à FALSE
        $this->db->insert('produits', $data);
    }

    public function setProduit($id) {
        $pname = $this->input->post('pro_libelle');
        $pdesc = $this->input->post('pro_description');
        $pprice = $this->input->post('pro_prix');
        $pstk = $this->input->post('pro_stock');
        $pcolor = $this->input->post('pro_couleur');
        $pblocked = $this->input->post('pro_bloque');
        $data = array(
            'pro_libelle' => $pname,
            'pro_description' => $pdesc,
            'pro_prix' => $pprice,
            'pro_stock' => $pstk,
            'pro_couleur' => $pcolor,
            'pro_bloque' => $pblocked
        );
        $this->db->set('pro_d_modif', 'NOW()', FALSE);
        $this->db->where('pro_id', $id);
        $this->db->update('produits', $data);
    }

    public function deleteProduit($id) {
        $this->db->delete('jarditou.produits', array('pro_id' => $id));  //DELETE FROM produits WHERE pro_id = $id
    }

}
