<?php
session_start();
$id_fiche = $_SESSION['id_fiche'];
try {
	$base = new PDO('mysql:host=db;dbname=cerema;charset=utf8', 'root', 'dreams');
	$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	if ($_POST['creation_fiche'] != $_SESSION['creation_fiche'] && !empty($_POST['creation_fiche'])) {
		$query = 'UPDATE fiches SET creation_fiche = :creation_fiche WHERE id_fiche = :id_fiche';
		$reponse = $base->prepare($query);
		$reponse->bindValue(':creation_fiche', $_POST['creation_fiche'], PDO::PARAM_STR);
		$reponse->bindValue(':id_fiche',$id_fiche, PDO::PARAM_STR);
		$reponse->execute();

	}
	if ($_POST['limite_fiche'] != $_SESSION['limite_fiche'] && !empty($_POST['limite_fiche'])) {
		$query = 'UPDATE fiches SET limite_fiche = :limite_fiche WHERE id_fiche = :id_fiche';
		$reponse = $base->prepare($query);
		$reponse->bindValue(':limite_fiche', $_POST['limite_fiche'], PDO::PARAM_STR);
		$reponse->bindValue(':id_fiche',$id_fiche, PDO::PARAM_STR);
		$reponse->execute();
	}
	if ($_POST['statut_fiche'] != $_SESSION['statut_fiche'] && !empty($_POST['statut_fiche'])) {
		$query = 'UPDATE fiches SET statut_fiche = :statut_fiche WHERE id_fiche = :id_fiche';
		$reponse = $base->prepare($query);
		$reponse->bindValue(':statut_fiche', $_POST['statut_fiche'], PDO::PARAM_INT);
		$reponse->bindValue(':id_fiche',$id_fiche, PDO::PARAM_INT);
		$reponse->execute();
	}
	if ($_POST['arrivee_fiche'] != $_SESSION['arrivee_fiche'] && !empty($_POST['arrivee_fiche'])) {
		$query = 'UPDATE fiches SET arrivee_fiche = :arrivee_fiche WHERE id_fiche = :id_fiche';
		$reponse = $base->prepare($query);
		$reponse->bindValue(':arrivee_fiche', $_POST['arrivee_fiche'], PDO::PARAM_STR);
		$reponse->bindValue(':id_fiche',$id_fiche, PDO::PARAM_STR);
		$reponse->execute();
	}
	if ($_POST['nom_fiche'] != $_SESSION['nom_fiche'] && !empty($_POST['nom_fiche'])) {
		$query = 'UPDATE fiches SET nom_fiche = :nom_fiche WHERE id_fiche = :id_fiche';
		$reponse = $base->prepare($query);
		$reponse->bindValue(':nom_fiche', $_POST['nom_fiche'], PDO::PARAM_STR);
		$reponse->bindValue(':id_fiche',$id_fiche, PDO::PARAM_STR);
		$reponse->execute();
	}
	if ($_POST['prenom_fiche'] != $_SESSION['prenom_fiche'] && !empty($_POST['prenom_fiche'])) {
		$query = 'UPDATE fiches SET prenom_fiche = :prenom_fiche WHERE id_fiche = :id_fiche';
		$reponse = $base->prepare($query);
		$reponse->bindValue(':prenom_fiche', $_POST['prenom_fiche'], PDO::PARAM_STR);
		$reponse->bindValue(':id_fiche',$id_fiche, PDO::PARAM_STR);
		$reponse->execute();
	}
	if ($_POST['unite_fiche'] != $_SESSION['unite_fiche'] && !empty($_POST['unite_fiche'])) {
		$query = 'UPDATE fiches SET unite_fiche = :unite_fiche WHERE id_fiche = :id_fiche';
		$reponse = $base->prepare($query);
		$reponse->bindValue(':unite_fiche', $_POST['unite_fiche'], PDO::PARAM_STR);
		$reponse->bindValue(':id_fiche',$id_fiche, PDO::PARAM_STR);
		$reponse->execute();
	}
	if ($_POST['id_service'] != $_SESSION['id_service'] && !empty($_POST['id_service'])) {
		$query = 'UPDATE fiches SET id_service = :id_service WHERE id_fiche = :id_fiche';
		$reponse = $base->prepare($query);
		$reponse->bindValue(':id_service', $_POST['id_service'], PDO::PARAM_INT);
		$reponse->bindValue(':id_fiche',$id_fiche, PDO::PARAM_INT);
		$reponse->execute();
	}
	if ($_POST['batiment_fiche'] != $_SESSION['batiment_fiche'] && !empty($_POST['batiment_fiche'])) {
		$query = 'UPDATE fiches SET batiment_fiche = :batiment_fiche WHERE id_fiche = :id_fiche';
		$reponse = $base->prepare($query);
		$reponse->bindValue(':batiment_fiche', $_POST['batiment_fiche'], PDO::PARAM_STR);
		$reponse->bindValue(':id_fiche',$id_fiche, PDO::PARAM_STR);
		$reponse->execute();
	}
	if ($_POST['telephonefixe_fiche'] != $_SESSION['telephonefixe_fiche'] && !empty($_POST['telephonefixe_fiche'])) {
		$query = 'UPDATE fiches SET telephonefixe_fiche = :telephonefixe_fiche WHERE id_fiche = :id_fiche';
		$reponse = $base->prepare($query);
		$reponse->bindValue(':telephonefixe_fiche', $_POST['telephonefixe_fiche'], PDO::PARAM_STR);
		$reponse->bindValue(':id_fiche',$id_fiche, PDO::PARAM_STR);
		$reponse->execute();
	}
	if ($_POST['nomchefservice_fiche'] != $_SESSION['nomchefservice_fiche'] && !empty($_POST['nomchefservice_fiche'])) {
		$query = 'UPDATE fiches SET nomchefservice_fiche = :nomchefservice_fiche WHERE id_fiche = :id_fiche';
		$reponse = $base->prepare($query);
		$reponse->bindValue(':nomchefservice_fiche', $_POST['nomchefservice_fiche'], PDO::PARAM_STR);
		$reponse->bindValue(':id_fiche',$id_fiche, PDO::PARAM_STR);
		$reponse->execute();
	}
	if ($_POST['assistante_fiche'] != $_SESSION['assistante_fiche'] && !empty($_POST['assistante_fiche'])) {
		$query = 'UPDATE fiches SET assistante_fiche = :assistante_fiche WHERE id_fiche = :id_fiche';
		$reponse = $base->prepare($query);
		$reponse->bindValue(':assistante_fiche', $_POST['assistante_fiche'], PDO::PARAM_STR);
		$reponse->bindValue(':id_fiche',$id_fiche, PDO::PARAM_STR);
		$reponse->execute();
	}
	if ($_POST['poste_fiche'] != $_SESSION['poste_fiche'] && !empty($_POST['poste_fiche'])) {
		$query = 'UPDATE fiches SET poste_fiche = :poste_fiche WHERE id_fiche = :id_fiche';
		$reponse = $base->prepare($query);
		$reponse->bindValue(':poste_fiche', $_POST['poste_fiche'], PDO::PARAM_STR);
		$reponse->bindValue(':id_fiche',$id_fiche, PDO::PARAM_STR);
		$reponse->execute();
	}
	header('Refresh:5; url=index.php');
	?>
	<!DOCTYPE html>
	<html lang='fr'>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
		<title>Ulysse | Modification fiche</title>
		<!-- FAVICON -->
		<link rel='shortcut icon' href='./logo.ico'>
		<!-- BOOTSTRAP -->
		<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css' integrity='sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk' crossorigin='anonymous'>
		<style>
			.nav-link {
				color: #000;
			}
			label {
				font-weight: bold;
				font-size: 1.2rem;
			}
			#page {
				background-image: url('./ulysse.jpg');
				background-repeat: no-repeat;
				background-size: cover;
				height: 100%;
			}
			.lock {
				margin: -5px 3px 0 auto;			
			}
		</style>
		<script>
			function horloge(){
				var div = document.getElementById('horloge');
				var heure = new Date();
				div.firstChild.nodeValue = heure.getHours() + ':' + heure.getMinutes() + ':' + heure.getSeconds();
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
						<a class='dropdown-item' href='liste.php'>Liste arrivants programm??s</a>
						<a class='dropdown-item' href='fiches.php'>Consulter Fiches</a>
						<a class='dropdown-item' href='modifier_fiches.php'>Completer / Modifier Fiches</a>
						<a class='dropdown-item' href='#'>Cl??turer Fiches</a>
					</div>
				</div>
				<?php
				if (isset($_SESSION['login_utilisateur']) && isset($_SESSION['password_utilisateur'])) {
					if ($_SESSION['id_service'] == 5) {
						echo("<div class='col'>
							<a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>Gestion des tables</a>
							<div class='dropdown-menu ml-5'>
							<a class='nav-link' href='formulaires.php'>Formulaires</a>
							<a class='nav-link' href='base.php'>La base de donn??es</a>
							</div>
							</div>");
					}
				}
				?>
				<div class='col'>
					<a class='nav-link' href='#' data-toggle='modal' data-target='#propos'>A propos</a>
					<!-- Modal -->
					<div class='modal fade' id='propos' data-backdrop='static' data-keyboard='false' tabindex='-1' aria-labelledby='proposLabel' aria-hidden='true'>
						<div class='modal-dialog modal-dialog-scrollable'>
							<div class='modal-content'>
								<div class='modal-header'>
									<img src='./avatar.png' width='40' height='40' alt='logo'>
									<h4 class='modal-title' id='proposLabel'>&nbsp;&nbsp;A propos</h4>
									<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
										<span aria-hidden='true'>&times;</span>
									</button>
								</div>
								<div class='modal-body'>
									<p>Ulysse est une application issue d'un projet dans le cadre d'un stage de D??veloppeur Web et Web Mobile.</p>
									<p>Elle a pour but de faciliter le circuit d???informations entre les diff??rents services de l?????tablissement lorsqu???un nouvel arrivant int??gre le Cerema.</p>
									<p>Cette application est en perp??tuelle ??volution, si vous constatez des anomalies, merci de bien vouloir nous contacter</p>
									<hr style='width: 85%'>
									<p>Version 0.02<span style='color: #e32636; font-weight: bold'>&nbsp;&nbsp;*** UPDATE 0.03 ***</span></p>
									<p style='font-weight: bold'>Renommage de l'onglet Accueil par Actions :</p>
									<p class='pl-2'>Plus compr??hensible pour l'utilisateur</p>
									<p style='font-weight: bold'>Cr??ation de l'interface Administrateur :</p>
									<p class='pl-2'>Ajout du menu et gestion des tables</p>
									<p style='font-weight: bold'>Ajout de "liste.php" :</p>
									<p class='pl-2'>Fusion de "listes_no_user.php" et "listes_user.php" (script PHP)</p>
									<p style='font-weight: bold'>Suppression des pages :</p>
									<p class='pl-2'>"listes_no_user.php"</p>
									<p class='pl-2'>"listes_user.php"</p>
									<p style='font-weight: bold'>Refonte de l'onglet connexion :</p>
									<p class='pl-2'>Nouvelle ic??ne, id du service et libell??</p>
									<p style='font-weight: bold'>Ajout de la page "modifier_fiches.php" :</p>
									<p class='pl-2'>Elle permet d'acc??der aux modifications des fiches en cours</p>
									<hr style='width: 85%'>
									<p><span style='color: #e32636; font-weight: bold'>&nbsp;&nbsp;*** UPDATE 0.02 ***</span></p>
									<p style='font-weight: bold'>Mise ?? jour de s??curit?? lors de l'identification :</p>
									<p class='pl-2'>Am??lioration du fichier connexion.php avec<span style='color: #0095b6'> password_hash()</span> et<span style='color: #0095b6'> password_verify()</span></p>
									<p style='font-weight: bold'>Suppression des pages :</p>
									<p class='pl-2'>"login_success.php" (obsol??te depuis le<span style='color: #0095b6'> password_verify()</span>)</p>
									<p class='pl-2'>"erreur_donnees.php" (remplac??e par une condition lors de l'identification)</p>
									<p class='pl-2'>"erreur_champs.php" (remplac??e par un 'require' lors de la saisie du mot de passe)</p>
									<p style='font-weight: bold'>Refonte de l'onglet connexion lorsque l'utilisateur est logu??</p>
									<p style='font-weight: bold'>Ajout de l'onglet "A savoir" dans le menu principal</p>
									<p class='pl-2'>Il donne des informations compl??mentaires pour favoriser l'accueil du nouvel arrivant</p>
									<p style='font-weight: bold'>Corrections de divers bugs</p>
									<p style='font-weight: bold'>Mise ?? jour de la base de donn??es</p>
									<hr style='width: 85%'>
									<p><span style='text-decoration: underline'>R??alisation</span> Florent PASCAL, Alex SANTUCCI</p>
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
									<p>Lors de votre arriv??e, vous devez vous pr??senter aupr??s de votre service d'accueil qui vous orientera sur le site pour le circuit d'int??gration.</p> 
									<hr>
									<p>Voici quelques documents utiles pour favoriser votre accueil:</p>
									<p>- Plan du site: LIEN</p>
									<p>- R??glement Int??rieur: LIEN</p>
									<p>- Organigramme : LIEN</p>
								</div>
								<div class='modal-footer'>
									<button type='button' class='btn btn-success' data-dismiss='modal'>Fermer</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
				if (isset($_SESSION['login_utilisateur']) && isset($_SESSION['password_utilisateur'])) {
					if ($_SESSION['id_service'] == 1 || $_SESSION['id_service'] == 2 || $_SESSION['id_service'] == 3 || $_SESSION['id_service'] == 4) {
						echo("<div class='col'>
							<a class='nav-link dropdown-toggle' data-toggle='dropdown' href='logout.php' role='button' aria-haspopup='true' aria-expanded='false'>");echo("<img class='lock' src='./lock.svg' alt='lock'> " . $_SESSION['login_utilisateur'] . " - " . $_SESSION['libellecourt_service'] . '_' . $_SESSION['libelle_role'] . "</a>
							<div class='dropdown-menu ml-5'>
							<a class='dropdown-item' href='logout.php'>D??connexion</a>
							</div>
							</div>");
						}
						else if ($_SESSION['id_service'] == 5) {
							echo("<div class='col'>
								<a class='nav-link dropdown-toggle' data-toggle='dropdown' href='logout.php' role='button' aria-haspopup='true' aria-expanded='false'><img class='lock' src='./lock.svg' alt='lock'>&#9889; " .  $_SESSION['libelle_role'] . " &#9889;</a>
								<div class='dropdown-menu ml-5'>
								<a class='dropdown-item' href='logout.php'>D??connexion</a>
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
					<div id='page'>
					<div class='row justify-content-center m-0 mt-4 mb-4'>
					<h3>La fiche de : " . $_POST['nom_fiche'] . " " . $_POST['prenom_fiche'] . " a bien ??t?? modifi??e</h3>
					</div>
					<div class='row justify-content-center m-0'>
					<h5>Vous allez ??tre redirig?? vers la page d'accueil</h5>
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
					</div>
					<!-- JS -->
					<script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
					<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
					<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js' integrity='sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI' crossorigin='anonymous'></script>
					</body>
					</html>");
					$reponse->closeCursor(); // Fermer le resultat
} catch (PDOException $e){
	die("Impossible de traiter les donn??es. Erreur : " . $e->getMessage());
} finally {
	$base = null;
}
?>
