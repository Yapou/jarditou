

<?php
 if (empty($this->session->login)) { ?>
  <div class="center">
<?php echo form_open();
 echo validation_errors(); ?>

            <div class="form-group col-md-3 m-auto">
                <label for="login">Login</label>
                <input name="login" type="text" class="form-control mb-3" id="login"   value="<?php echo set_value('nom'); ?>">
            </div>
            <div class="form-group col-md-3 m-auto">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control mb-3" id="password">
            </div>
            <div class="text-center mb-3">
                <button type="submit" name="btnSub" class="btn btn-success" value="valider">Valider</button>
            </div>
        </form>
    </div>
<?php
} else {
    ?>
    <h1 class="col-12 alert alert-success text-center" role="alert">Bonjour <i><?= $this->session->login ?></i> </h1>
    <p class="text-center"> Vous êtes connecté</p>

    <div class="text-center mb-3">
        <a href= " <?= site_url('connexion/deconnexion') ?> " name="btnDeco" class="btn btn-danger">Se deconnecter</a>
    </div>

    <?php
}
?>
