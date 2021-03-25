<?php
session_start();

try {
	$base = new PDO('mysql:host=db;dbname=cerema', 'root', 'dreams');
	$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	$query = 'INSERT INTO fiches (id_fiche, statut_fiche, nom_fiche, prenom_fiche, arrivee_fiche, creation_fiche, batiment_fiche, unite_fiche, limite_fiche, id_service) VALUES (NULL, :statut_fiche, :nom_fiche, :prenom_fiche, :arrivee_fiche, :creation_fiche, :batiment_fiche, :unite_fiche, :limite_fiche, :id_service)';

	$statement = $base->prepare($query);
	$statement->bindValue(':statut_fiche', $_POST['statut_fiche'], PDO::PARAM_INT);
	$statement->bindValue(':nom_fiche', $_POST['nom_fiche'], PDO::PARAM_STR);
	$statement->bindValue(':prenom_fiche', $_POST['prenom_fiche'], PDO::PARAM_STR);
	$statement->bindValue(':arrivee_fiche', $_POST['arrivee_fiche'], PDO::PARAM_STR);
	$statement->bindValue(':creation_fiche', $_POST['creation_fiche'], PDO::PARAM_STR);
	$statement->bindValue(':batiment_fiche', $_POST['batiment_fiche'], PDO::PARAM_STR);
	$statement->bindValue(':unite_fiche', $_POST['unite_fiche'], PDO::PARAM_STR);
	$statement->bindValue(':limite_fiche', $_POST['limite_fiche'], PDO::PARAM_STR);
	$statement->bindValue(':id_service', $_POST['id_service'], PDO::PARAM_INT);

	$statement->execute();
	//echo("<br>Identifiant de la dernière personne ajoutée: " . $base->lastInsertId());
	header('Refresh:5; url=index.php');
	echo("<html lang='fr'>
		<head>
		<meta name='author' content='Florent Pascal / Alex Santucci'>
		<meta name='description' content='Application Ulysse pour le Cerema'>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
		<title>Ulysse | Validation fiche</title>
		<!-- FAVICON -->
		<link rel='shortcut icon' href='./logo.ico'>
		<!-- BOOTSTRAP -->
		<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css' integrity='sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk' crossorigin='anonymous'>
		<style>
		.nav-link {
			color: #000;
		}
		.lock {
			margin: -5px 3px 0 auto;
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
		<a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>Actions</a>
		<div class='dropdown-menu ml-5'>
		<a class='dropdown-item' href='liste.php'>Liste arrivants programmés</a>
		<a class='dropdown-item' href='fiches.php'>Consulter Fiches</a>
		<a class='dropdown-item' href='modifier_fiches.php'>Completer / Modifier Fiches</a>
		<a class='dropdown-item' href='#'>Clôturer Fiches</a>
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
		<p>Version 0.03<span style='color: #e32636; font-weight: bold'>&nbsp;&nbsp;*** UPDATE 0.04 ***</span></p>
		<p style='font-weight: bold'>Ajout du footer</p>
		<p class='pl-2'>Logo Ulysse, Plan du site, et Réseaux sociaux</p>
		<p style='font-weight: bold'>Ajout des liens de téléchargement dans l'onglet 'A savoir'</p>
		<hr style='width: 85%'>
		<p><span style='color: #e32636; font-weight: bold'>&nbsp;&nbsp;*** UPDATE 0.03 ***</span></p>
		<p style='font-weight: bold'>Renommage de l'onglet Accueil par Actions :</p>
		<p class='pl-2'>Plus compréhensible pour l'utilisateur</p>
		<p style='font-weight: bold'>Création de l'interface Administrateur :</p>
		<p class='pl-2'>Ajout du menu et gestion des tables</p>
		<p style='font-weight: bold'>Ajout de 'liste.php' :</p>
		<p class='pl-2'>Fusion de 'listes_no_user.php' et 'listes_user.php' (script PHP)</p>
		<p style='font-weight: bold'>Suppression des pages :</p>
		<p class='pl-2'>'listes_no_user.php'</p>
		<p class='pl-2'>'listes_user.php'</p>
		<p style='font-weight: bold'>Refonte de l'onglet connexion :</p>
		<p class='pl-2'>Nouvelle icône, id du service et libellé</p>
		<p style='font-weight: bold'>Ajout de la page 'modifier_fiches.php' :</p>
		<p class='pl-2'>Elle permet d'accéder aux modifications des fiches en cours</p>
		<hr style='width: 85%'>
		<p><span style='color: #e32636; font-weight: bold'>&nbsp;&nbsp;*** UPDATE 0.02 ***</span></p>
		<p style='font-weight: bold'>Mise à jour de sécurité lors de l'identification :</p>
		<p class='pl-2'>Amélioration du fichier connexion.php avec<span style='color: #0095b6'> password_hash()</span> et<span style='color: #0095b6'> password_verify()</span></p>
		<p style='font-weight: bold'>Suppression des pages :</p>
		<p class='pl-2'>'login_success.php' (obsolète depuis le<span style='color: #0095b6'> password_verify()</span>)</p>
		<p class='pl-2'>'erreur_donnees.php' (remplacée par une condition lors de l'identification)</p>
		<p class='pl-2'>'erreur_champs.php' (remplacée par un 'require' lors de la saisie du mot de passe)</p>
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
		<div class='modal fade' id='savoir' data-backdrop='static' data-keyboard='false' tabindex='-1' aria-labelledby='savoirLabel'aria-hidden='true'>
		<div class='modal-dialog modal-dialog-scrollable'>
		<div class='modal-content'>
		<div class='modal-header'>
		<img src='./avatar.png' width='40' height='40' alt='logo'>
		<h4 class='modal-title' id='savoirLabel'>&nbsp;&nbsp;Ulysse</h4>
		<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
		<span aria-hidden='true'>&times;</span>
		</button>
		</div>
		<div class='modal-body'>
		<p>Lors de votre arrivée, vous devez vous présenter auprès de votre service d'accueil qui vous orientera sur le site pour le circuit d'intégration.</p> 
		<hr>
		<p>Voici quelques documents utiles pour favoriser votre accueil:</p>
		<p>Cliquez sur 'Télécharger le PDF' pour obtenir les documents nécessaire à votre entrée</p>
		<p>- Plan du site : <a href='PLAN.pdf' download>Télécharger le PDF</a></p>	
		<p>- Règlement Intérieur : <a href='REGLEMENT.pdf' download>Télécharger le PDF</a></p>		
		<p>- Livret d'accueil : <a href='LIVRETACCUEIL.pdf' download>Télécharger le PDF</a></p>														
		</div>
		<div class='modal-footer'>
		<button type='button' class='btn btn-success' data-dismiss='modal'>Fermer</button>
		</div>
		</div>
		</div>
		</div>
		</div>");
if (isset($_SESSION['login_utilisateur']) && isset($_SESSION['password_utilisateur'])) {
	if ($_SESSION['id_service'] == 1 || $_SESSION['id_service'] == 2 || $_SESSION['id_service'] == 3 || $_SESSION['id_service'] == 4) {
		echo("<div class='col'>
			<a class='nav-link dropdown-toggle' data-toggle='dropdown' href='logout.php' role='button' aria-haspopup='true' aria-expanded='false'>");echo("<img class='lock' src='./lock.svg' alt='lock'> " . $_SESSION['login_utilisateur'] . " - " . $_SESSION['libellecourt_service'] . '_' . $_SESSION['libelle_role'] . "</a>
			<div class='dropdown-menu ml-5'>
			<a class='dropdown-item' href='logout.php'>Déconnexion</a>
			</div>
			</div>");
		}
		else if ($_SESSION['id_service'] == 5) {
			echo("<div class='col'>
				<a class='nav-link dropdown-toggle' data-toggle='dropdown' href='logout.php' role='button' aria-haspopup='true' aria-expanded='false'><img class='lock' src='./lock.svg' alt='lock'>&#9889; " .  $_SESSION['libelle_role'] . " &#9889;</a>
				<div class='dropdown-menu ml-5'>
				<a class='dropdown-item' href='logout.php'>Déconnexion</a>
				</div>
				</div>");
		}
	}
	else {
		echo("<div class='col'>
			<a class='nav-link' href='#' data-toggle='modal' data-target='#exampleModal'>Connexion</a>
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
			</div>");
	}
	echo("
		<div class='col' style='text-align: right'>
		<span>
		".date('d.m.Y')."
		</span>
		<div id='horloge'>
		<script>horloge();</script>
		</div>
		</div>
		</nav>
		<div class='row justify-content-center m-0 mt-4 mb-4'>
		<h3>La fiche de : " . $_POST['nom_fiche'] . " " . $_POST['prenom_fiche'] . " a bien été créée</h3>
		</div>
		<div class='row justify-content-center m-0'>
		<h5>Vous allez être redirigé vers la page d'accueil</h5>
		</div>
		<footer>
		<nav class='navbar navbar row m-0' style='background-color: #bcd4e6; border-bottom: 1px solid #000; border-top: 1px solid #000'>
		<div class='col'>			
		<a class='navbar-brand' href='index.php'>
		<img src='./avatar.png' width='40' height='40' alt='logo' class='d-inline-block align-middle' loading='lazy'>
		<span style='color: #000'>Ulysse</span>
		</a>
		</div>
		<div class='col' style='text-align: center'>
		<h5>Plan du site</h5>
		<a class='nav-link m-0 p-0' href='index.php'>Accueil</a>
		<a class='nav-link m-0 p-0' href='#' data-toggle='modal' data-target='#propos'>A propos</a>
		<a class='nav-link m-0 p-0' href='#' data-toggle='modal' data-target='#savoir'>A savoir</a>
		</div>
		<div class='col' style='text-align: end; padding-right: 30px'>
		<h5>Suivez-nous</h5>
		<a href='https://twitter.com/ceremacom'><img src='./twitter.svg' alt='twitter' style='padding-right: 10px'></a>&nbsp;
		<a href='https://www.linkedin.com/company/cerema/?originalSubdomain=fr'><img src='./linkedin.svg' alt='linkedin'></a>&nbsp;
		<a href='https://www.dailymotion.com/cerema'><img src='./youtube.svg' alt='youtube' style='padding-left: 10px'></a>
		</div>
		</nav>
		<div class='row justify-content-end m-0 pr-2'>
			<p>Ulysse &copy; 2020</p>
		</div>
		</footer>
		</div>
		<!-- JS -->
		<script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
		<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
		<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js' integrity='sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI' crossorigin='anonymous'></script>
		</body>
		</html>");

$statement->closeCursor(); // Fermer le resultat
} catch (PDOException $e){
	die("Impossible de traiter les données. Erreur : " . $e->getMessage());
} finally {
	$base = null;
}
?>
