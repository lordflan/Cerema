<?php

try
{
  // On se connecte à MySQL
  $bdd = new PDO('mysql:host=db;dbname=cerema;charset=utf8', 'root', 'dreams');
}
catch(Exception $e)
{
  // En cas d'erreur, on affiche un message et on arrête tout
  die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu des la table fiches
$reponse = $bdd->query('SELECT * FROM fiches WHERE limite_fiche BETWEEN "2020/08/01" AND "2020-09-30"'); // BETWEEN A DEFINIR

// Affichage
echo("<html lang='fr'>
  <head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <title>Ulysse | Liste programmées</title>
  <!-- FAVICON -->
  <link rel='shortcut icon' href='./logo.ico'>
  <!-- BOOTSTRAP -->
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css' integrity='sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk' crossorigin='anonymous'>
  <style>
  .nav-link {
    color: #000;
  }
  </style>
  <script>
  function horloge(){
    var div = document.getElementById('horloge');
    var heure = new Date();
    div.firstChild.nodeValue = heure.getHours()+':'+heure.getMinutes()+':'+heure.getSeconds();
    window.setTimeout('horloge()',1000);
  }
  </script>
  </head>
  <body>
  <div class='container-fluid m-0 p-0'>
  <nav class='navbar navbar row m-0' style='background-color: #bcd4e6; border-bottom: 1px solid #000; border-top: 1px solid #000'>
  <div class='col'>     
  <a class='navbar-brand' href='index.php'>
  <img src='./avatar.png' width='40' height='40' alt='logo' class='d-inline-block align-middle' loading='lazy'>
  <span style='color: #000'>Ulysse</span>
  </a>
  </div>
  <div class='col'>
  <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>Accueil</a>
  <div class='dropdown-menu ml-5'>
  <a class='dropdown-item' href='index.php'>Retour Accueil</a>
  </div>
  </div>
  <div class='col'>
  <a class='nav-link' href='#' data-toggle='modal' data-target='#propos'>A propos</a>
  <!-- Modal -->
  <div class='modal fade' id='propos' data-backdrop='static' data-keyboard='false' tabindex='-1' aria-labelledby='proposLabel' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-scrollable'>
  <div class='modal-content'>
  <div class='modal-header'>
  <img src='./avatar.png' width='40' height='40' alt='logo'>
  <h4 class='modal-title' id='proposLabel'>&nbsp;&nbsp;Ulysse</h4>
  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
  </button>
  </div>
  <div class='modal-body'>
  <p>Ulysse est une application issue d'un projet dans le cadre d'un stage de Développeur Web et Web Mobile.</p>
  <p>Elle a pour but de faciliter le circuit d’informations entre les différents services de l’établissement lorsqu’un nouvel arrivant intègre le Cerema.</p>
  <p>Cette application est en perpétuelle évolution, si vous constatez des anomalies, merci de bien vouloir nous contacter</p>
  <hr style='width: 85%'>
  <p>Version 0.01<span style='color: #e32636; font-weight: bold'>&nbsp;&nbsp;*** UPDATE 0.02 ***</span></p>
  <p style='font-weight: bold'>Mise à jour de sécurité lors de l'identification :</p>
  <p class='pl-2'>Amélioration du fichier connexion.php avec<span style='color: #0095b6'> password_hash()</span> et<span style='color: #0095b6'> password_verify()</span></p>
  <p style='font-weight: bold'>Suppression des pages :</p>
  <p class='pl-2'>login_success.php (obsolète depuis le<span style='color: #0095b6'> password_verify()</span>)</p>
  <p class='pl-2'>erreur_donnees.php (remplacée par une condition lors de l'identification)</p>
  <p class='pl-2'>erreur_champs.php (remplacée par un 'require' lors de la saisie du mot de passe)</p>
  <p style='font-weight: bold'>Refonte de l'onglet connexion lorsque l'utilisateur est logué</p>
  <p style='font-weight: bold'>Ajout de l'onglet 'A savoir' dans le menu principal</p>
  <p class='pl-2'>Il donne des informations complémentaires pour favoriser l'accueil du nouvel arrivant</p>
  <p style='font-weight: bold'>Corrections de divers bugs</p>
  <p style='font-weight: bold'>Mise à jour de la base de données</p>
  <hr style='width: 85%'>
  <p><span style='text-decoration: underline'>Réalisation</span> Florent PASCAL, Alex SANTUCCI</p>
  <p><span style='text-decoration: underline'>Supervision</span> Gil ROMAND</p>
  <p><span style='text-decoration: underline'>Contact</span> SII DTerMed</p>
  </div>
  <div class='modal-footer'>
  <button type='button' class='btn btn-success' data-dismiss='modal'>Fermer</button>
  </div>
  </div>
  </div>
  </div>
  </div>
  <div class='col'>
  <a class='nav-link' href='#' data-toggle='modal' data-target='#savoir'>A savoir</a>
  <!-- Modal -->
  <div class='modal fade' id='savoir' data-backdrop='static' data-keyboard='false' tabindex='-1' aria-labelledby='savoirLabel' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-scrollable'>
  <div class='modal-content'>
  <div class='modal-header'>
  <img src='./avatar.png' width='40' height='40' alt='logo'>
  <h4 class='modal-title' id='savoirLabel'>&nbsp;&nbsp;A savoir</h4>
  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
  </button>
  </div>
  <div class='modal-body'>
  <p>Lors de votre arrivée, vous devez vous présenter auprès de votre service d'accueil qui vous orientera sur le site pour le circuit d'intégration.</p> 
  <hr>
  <p>Voici quelques documents utiles pour favoriser votre accueil:</p>
  <p>- Plan du site: LIEN</p>
  <p>- Règlement Intérieur: LIEN</p>
  <p>- Organigramme : LIEN</p>
  </div>
  <div class='modal-footer'>
  <button type='button' class='btn btn-success' data-dismiss='modal'>Fermer</button>
  </div>
  </div>
  </div>
  </div>
  </div>
  <div class='col'>
  <a class='nav-link' href='#' data-toggle='modal' data-target='#exampleModal'>
  Connexion
  </a>
  <!-- Modal -->
  <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
  <div class='modal-content'>
  <div class='modal-header'>
  <img src='./logo.png' width='40' height='40' alt='logo'>
  <h4 class='modal-title' id='exampleModalLabel' style='color: #189471'>&nbsp;&nbsp;Connexion</h4>
  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
  </button>
  </div>
  <div class='modal-body'>
  <form id='connexion' method='POST' action='connexion.php'>
  <div class='form-group'>
  <label for='login_utilisateur'>Votre login</label>
  <input type='text' class='form-control' name='login_utilisateur' required>
  </div>
  <div class='form-group'>
  <label for='password_utilisateur'>Votre mot de passe</label>
  <input type='password' class='form-control' name='password_utilisateur' required>
  </div>
  <button type='submit' class='btn btn-success' style='background-color: #f07d00; border-color: #f07d00'>SE CONNECTER</button>
  </form>
  </div>
  </div>
  </div>
  </div>
  </div>
  <div class='col'>
  <span>
  ".date('d.m.Y')."
  </span>
  <div id='horloge'>
  <script>horloge();</script>
  </div>
  </div>
  </nav>
  <div class='row justify-content-start ml-0 mr-0 mt-2 mb-0 pl-2'>
  <h5>Liste des arrivants programmés</h5>
  </div>");

while ($donnees = $reponse->fetch())
{
  ?>
  <nav class='navbar navbar-light bg-secondary ml-3' style='width: 50%'>
    <span class='navbar-brand mb-0 h1' style='color: #fff'>Fiche id: <?php echo $donnees['id_fiche']; ?></span>
  </nav>
  <div class='row justify-content-start m-0 ml-3 pl-4 pb-3 bg-light' style='width: 50%'>
    <div class='col'>
      <?php echo 'Nom : ';?><br>
      <?php echo 'Prénom : ';?><br>
      <?php echo 'Date d\'arrivée : ';?><br>
      <?php echo 'Poste : ';?><br>
      <?php echo 'Date création fiche : ';?><br>
      <?php echo 'Etat fiche : ';?><br>
      <?php echo 'Bâtiment : ';?><br>
      <?php echo 'Unité : ';?><br>
      <?php echo 'Visa Chef de Service : ';?><br>
      <?php echo 'Assistante : ';?><br>
      <?php echo 'Téléphone fixe : ';?><br>
      <?php echo 'Date limite fiche : ';?>
    </div>
    <div class='col'>
      <?php echo $donnees['nom_fiche']; ?><br>
      <?php echo $donnees['prenom_fiche']; ?><br>
      <?php echo $donnees['arrivee_fiche']; ?><br>
      <?php echo $donnees['poste_fiche']; ?><br>
      <?php echo $donnees['creation_fiche']; ?><br>
      <?php echo $donnees['etat_fiche']; ?><br>
      <?php echo $donnees['batiment_fiche']; ?><br>
      <?php echo $donnees['unite_fiche']; ?><br>
      <?php echo $donnees['visa_fiche']; ?><br>
      <?php echo $donnees['assistante_fiche']; ?><br>
      <?php echo $donnees['telephonefixe_fiche']; ?><br>
      <?php echo $donnees['limite_fiche']; ?>
    </div>
    <div class='col'>
      <img src='./avatar.png' alt='ulysse' width='150px' height='150px' style='float: right; margin: 40px  75px 0 auto'>
    </div>
  </div>
  <?php
}
echo("<footer class='row justify-content-center m-0 pb-4 pt-4'>
  <a href='index.php' class='btn btn-success btn-lg'>Retour</a>
  </footer>
  </div>
  <!-- JS -->
  <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
  <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
  <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js' integrity='sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI' crossorigin='anonymous'></script>
  </body>
  </html>");

$reponse->closeCursor(); // Termine le traitement de la requête

?>