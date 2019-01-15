



<div class='container col-md-12 m-auto text-center'>
  <?php

  if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
  } ?>


  <!--Fenetre modale-->
  <?php if (($this->session->login) && ($_SESSION['role'] == 'admin' )) { ?>


      <!-- Button trigger modal -->
      <div class="row">


      <button type="button" class="btn col-2 btn-info" data-toggle="modal" data-target="#exampleModal3">
          Nouveau produit
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModal3Label">Nouveau produit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">

                      <!--formulaire d'ajout-->
                      <?php echo form_open_multipart('produits/ajoutProd');

                        ?>


                          <div class="form-group row">
                              <label for="pro_ref" class="col-sm-2 col-form-label">Références</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="pro_ref" value=''>
                              </div>
                          </div>





                          <div class="form-group row">
                              <label for="pro_cat_id" class="col-sm-2 col-form-label">Catégorie</label>
                              <div class="col-sm-10">
                                  <select id="pcat" name="pro_cat_id" class="form-control">

                            <?php foreach ($produits as $value) { ?>
                              <option value="<?= $value->cat_id ?>"><?= $value->cat_nom ?></option>
                            <?php } ?>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group row">
                          <label for="psubcat" class="col-md-3 col-form-label">Sous-catégorie :</label>
                          <div class="col-md-9">
                              <select id="psubcat" name="psubcat" class="custom-select">
                              </select>
                          </div>
                      </div>

                          <div class="form-group row">
                              <label for="pro_libelle" class="col-sm-2 col-form-label">Libellé</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control"  name="pro_libelle" value=''>
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="pro_description" class="col-sm-2 col-form-label">Description</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control"  name="pro_description" value=''>
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="pro_prix" class="col-sm-2 col-form-label">Prix</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control"  name="pro_prix" value=''>
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="pro_stock" class="col-sm-2 col-form-label">Stock</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control"  name="pro_stock" value=''>
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="pro_couleur" class="col-sm-2 col-form-label">Couleur</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control"  name="pro_couleur" value=''>
                              </div>
                          </div>

                          <div class="form-group row">

                              <label class="col-sm-2 col-form-label" for="pro_photo">Photo </label>
                              <div class="col-sm-10">

                                  <input type="file" name="pro_photo" class="">
                              </div>
                          </div>

                          <div>Produit bloqué
                              <label id="pro_bloque"  class="radio-inline"><input  name="pro_bloque" value="1" type="radio" >oui</label>
                              <label class="radio-inline"><input    name="pro_bloque" type="radio" value="0">non</label>
                          </div>
                          <p>Date d'ajout : <?= date("d.m.y") ?></p>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>



                              <!-- Button trigger modal confirmation -->
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Valider
                              </button>

                              <!-- Modal -->
                              <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Confirmer ?</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      Continuer ?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                      <button type="submit" class="btn btn-primary">Oui</button>
                                    </div>
                                  </div>
                                </div>
                              </div>


                          </div>
                          <!--Fin du Formulaire d'ajout-->
                      </form>
                  </div>
              </div>
          </div>
      </div>



  <?php }  ?>

    <h1 class="text-center col-8">Liste des produits</h1>
    <table class="table table-bordered">

        <thead class="thead-dark">


            <tr>
                <th scope="col">Photo</th>
                <th scope="col">Id</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Réference</th>
                <th scope="col">Libellé</th>
                <th scope="col">Description</th>
                <th scope="col">Prix</th>
                <th scope="col">Stock</th>
                <th scope="col">Couleur</th>
                <th scope="col">Date d'ajout</th>
                <th scope="col">Date de modification</th>
                <th scope="col">Bloqué</th>
            </tr>

        </thead>
        <tbody>
            <?php

              foreach ($liste as $value) {

                ?>

                <tr>
                    <td><img class="img-fluid" src=" <?= base_url('assets/images_jarditou') ?>/<?= $value->pro_id ?>.<?= $value->pro_photo // Permet d'afficher les images                                                                   ?>"></td>
                    <th scope="row"> <?= $value->pro_id; ?> </th>
                    <td> <?= $value->pro_cat_id; ?> </td>
                    <td> <?= $value->pro_ref; ?> </td>
                    <td>  <a href=" <?= site_url('produits/detail/' . $value->pro_id) ?> " title="lien"> <?= $value->pro_libelle //Lien vers la pge produit                                                                   ?> </a> </td>
                    <td> <?= $value->pro_description; ?> </td>
                    <td> <?= $value->pro_prix; ?> </td>
                    <td> <?= $value->pro_stock; ?> </td>
                    <td> <?= $value->pro_couleur; ?> </td>

                    <td> <?= $value->pro_d_ajout; ?> </td>
                    <td> <?= $value->pro_d_modif; ?> </td>
                    <td> <?= $value->pro_bloque; ?> </td>
                </tr>
                <?php
            } //fermer la boucle avant la fermeture de t-body sinon le tableau ne prend les resultats que d'un seul tour de boucle
            ?>
        </tbody>
    </table>
</div>
</div>
