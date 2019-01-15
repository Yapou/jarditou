
<div class="center">
          <?php echo form_open();
          echo validation_errors(); ?>

        <div class="form-group col-md-3 m-auto">
            <label for="login">Choississez un pseudo</label>
            <input name="login" type="text" class="form-control mb-3" id="login">
        </div>
        <div class="form-group col-md-3 m-auto">
            <label for="password">Choississez un mot de passe</label>
            <input type="password" name="password" class="form-control mb-3" id="password">
        </div>
        <div class="form-group col-md-3 m-auto">
            <label for="password">Confirmer votre mot de passe</label>
            <input type="password" name="passwordConfirm" class="form-control mb-3" id="passwordConfirm">
        </div>
        <div class="text-center mb-3">
            <button type="submit" name="btnSub" class="btn btn-success" value="valider">Valider</button>
        </div>
    </form>
</div>
