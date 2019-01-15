<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>

    <?= (current_url() == site_url('home')) ? '' : '' ?>
    <?= (current_url() == site_url('produits/liste')) ? 'Liste de nos produits - ' : '' ?>
    <?= (current_url() == site_url('connexion/formco')) ? 'Connexion au compte - ' : '' ?>
    <?= (current_url() == site_url('inscription/renseignements')) ? 'Créer un compte - ' : '' ?>
    Jarditou : Jardinerie en ligne
  </title>
  <!--Charge le texte en fonction de l'url-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href=" <?= base_url('assets/css/style.css') ?>">
  <!-- bootstrap -->

  <!--pourle referencement-->
  <meta name='description' content="
  <?= (current_url() == site_url('home/accueil')) ? 'Jarditou propose des articles de jardinage en ligne' : '' ?>
  <?= (current_url() == site_url('produits/liste')) ? 'Liste des produits vendus dans nos boutiques de jardinage jarditou' : '' ?>
  <?= (current_url() == site_url('connexion/formco')) ? 'Page de connexion au compte client de notre boutique de jardinage en ligne jarditou' : '' ?>
  <?= (current_url() == site_url('inscription/renseignements')) ? 'Page d\'inscription à notre boutique en ligne de jardinage jarditou' : '' ?>
  ">
  <meta name="keywords" content="
  <?= (current_url() == site_url('home/accueil')) ? 'jardinage, outils, plantes, jardin, semis, brouettes' : '' ?>
  <?= (current_url() == site_url('produits/liste')) ? 'jardin, jardinage, barbecue, pelle, scie, hache, lamelle de terasse, parasol, pot de fleur, sécateur, tondeuse' : '' ?>
  <?= (current_url() == site_url('connexion/formco')) ? 'connexion, login, mot de passe, jardin, jardinage' : '' ?>
  <?= (current_url() == site_url('inscription/renseignements')) ? 'inscription, espace membre, nous rejoindre, pseudo, jardin, jardinage ' : '' //changement url?>
  ">
  <meta name="robots" content="index, follow">



</head>
<body class="">

  <div class="container-fluid p-2">


    <header class=" bg-white">
    </header>

    <nav class="navbar navbar-expand-md navbar-light justify-content-end  sticky-top" id="topnavbar">
      <a href= " <?= site_url('home/accueil') ?> "><img class="img  mt-2 img-logo" src="<?= base_url('assets/img/jarditou_logo.png') ?>" alt="logo jarditou" description="logo du site jarditou"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbtn" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbtn">
        <ul class="nav ml-auto ">
          <li class="nav-item"><a class="nav-link" href=" <?= site_url('home/accueil') ?> ">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= site_url('produits/liste') ?>">Produits</a></li>

          <!-- Si l'utilisateur est connecté -->
          <?php if (empty($this->session->login)) { ?>
            <li  class="nav-item change"><a class="nav-link" href=" <?= site_url('connexion/formco') ?>">Connexion</a></li>
            <li class="nav-item"><a class="nav-link" href=" <?= site_url('inscription/renseignements') ?> ">Nous rejoindre</a></li>

          <?php } ?>

          <?php if (isset($this->session->login)) { ?>
            <a href= " <?= site_url('connexion/deconnexion') ?> " name="btnDeco" > <img id="boutonCo" src="<?= base_url('assets/img/boutonco.png')?>" alt="boutonconnexion"> </a>
          <?php } ?>
        </ul>
      </div>
    </nav>

    <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="d-block w-100" src=" <?= base_url('assets/img/slide1.png') ?> " data-src="holder.js/900x200?theme=social" alt="First slide" description="photo plante grasse">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src=" <?= base_url('assets/img/slide2.png') ?> " data-src="holder.js/900x200?theme=industrial" alt="Second slide" description="phpto d'une tondeuse bleu">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src=" <?= base_url('assets/img/slide3.png') ?> " data-src="holder.js/900x200?theme=industrial" alt="Third slide" description="photo de cactus">
        </div>
      </div>

    </div>
  </div>
  <!-- Permet de charger le contenu-->
  <?= $page ?>

  <footer class="footer ">
    <div class="container">

      <ul class="nav navbar navbar-expand navbar-dark d-md-flex justify-content-center">
        <li class="nav-item"> <a class="nav-link" href="#"> mentions légales</a></li>
        <li class="nav-item"> <a class="nav-link" href="#"> plan du site</a></li>
        <li class="nav-item"> <a class="nav-link" href="#"> horaires</a></li>
      </ul>

    </div>
  </div>
</footer>



</div>

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src=" <?= base_url('assets/js/ajax.js') ?> "></script>
<script src=" <?= base_url('assets/js/transformProdForm.js') ?>"></script>

</body>
</html>
