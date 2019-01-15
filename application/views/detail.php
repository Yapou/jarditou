

<!--formulaire fiche produit-->
<?php echo form_open('produits/update/' . $product->pro_id);
if (isset($_SESSION['error'])) {
  echo $_SESSION['error'];
} ?>



    <div class="form-group row">
        <label for="pro_id" class="col-sm-2 col-form-label">Id :</label>
        <div class="col-sm-10">
            <input type="text" name ="pro_id" readonly class=" form-control-plaintext" id="pro_id" value=' <?= $product->pro_id; ?> '>
        </div>
    </div>

    <div class="form-group row">
        <label for="pro_ref" class="col-sm-2 col-form-label">Références :</label>
        <div class="col-sm-10">
            <input name="pro_ref" type="text" readonly class="inputClass form-control-plaintext" id="pro_ref" value='<?= $product->pro_ref ?>'>
        </div>
    </div>

    <div class="form-group row">
        <label for="pro_cat_id" class="col-sm-2 col-form-label">Catégorie :</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="pro_cat_id" value='<?= $product->pro_cat_id; ?>'>
        </div>
    </div>

    <div class="form-group row">
        <label for="pro_libelle" class="col-sm-2 col-form-label">Libellé :</label>
        <div class="col-sm-10">
            <input name="pro_libelle" type="text" readonly class="inputClass form-control-plaintext" id="pro_libelle" value='<?=
            $product->pro_libelle;
            ?>'>
        </div>
    </div>

    <div class="form-group row">
        <label for="pro_description" class="col-sm-2 col-form-label">Description :</label>
        <div class="col-sm-10">
            <input name="pro_description" type="text" readonly class="inputClass form-control-plaintext" id="pro_description" value='<?= $product->pro_description ?>'>
        </div>
    </div>

    <div class="form-group row">
        <label for="pro_prix" class="col-sm-2 col-form-label">Prix :</label>
        <div class="col-sm-10">
            <input name="pro_prix" type="text" readonly class="inputClass form-control-plaintext" id="pro_prix" value='<?= $product->pro_prix ?>'>
        </div>
    </div>

    <div class="form-group row">
        <label for="pro_stock" class="col-sm-2 col-form-label">Stock :</label>
        <div class="col-sm-10">
            <input name="pro_stock" type="text" readonly class="inputClass form-control-plaintext" id="pro_stock" value='<?= $product->pro_stock ?>'>
        </div>
    </div>

    <div class="form-group row">
        <label for="pro_couleur" class="col-sm-2 col-form-label">Couleur :</label>
        <div class="col-sm-10">
            <input name="pro_couleur" type="text" readonly class="inputClass form-control-plaintext" id="pro_couleur" value='<?= $product->pro_couleur ?>'>
        </div>
    </div>
    <div>Produit bloqué
        <label class="radio-inline"><input type="radio" name="pro_bloque" value="1" <?= ($product->pro_bloque == 1) ? 'checked' : '' ?>  >oui</label>
        <label class="radio-inline"><input type="radio" name="pro_bloque" value="0" <?= ($product->pro_bloque == 0) ? 'checked' : '' ?> >non</label>
    </div>
    <p>date d'ajout : <?= $product->pro_d_ajout ?></p>
    <p name="pro_d_modif">date de modification : <?= $product->pro_d_modif ?></p>
    <?php if (isset($_SESSION['login']) && ($_SESSION['role'] == 'admin' )) { ?>
        <button type="submit" value="" class="sub btn btn-success m-1" style="display:none"><span class="span-mod">valider</span></button>

        <!--bouton pour transformer le formulaire avec transformProdForm.js-->
    </form>


    <button type="button" value="" class="onClick btn btn-warning m-2"><span class="span-mod1">Modifier</span></button>
    <a class="btn btn-danger" href=" <?= site_url('produits/deleteProd/' . $product->pro_id) ?> "> Supprimer </a>
    <!--Fin modal-->
<?php }  ?>
