<?php
session_start();
$id_fiche = $_GET['id_fiche'];
try
{
	$base = new PDO('mysql:host=db;dbname=cerema;charset=utf8', 'root', 'dreams');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
	die('Impossible de traiter les données. Erreur : '.$e->getMessage());
}

if (isset ($id_fiche) ) {
	$query = 'SELECT * FROM fiches WHERE id_fiche = :id_fiche';
	$reponse = $base->prepare($query);
	$reponse->bindValue(':id_fiche', $id_fiche, PDO::PARAM_INT);
	$reponse->execute();
	$data = $reponse->fetch(PDO::FETCH_ASSOC);
    //print_r($data);
    //echo ($data['poste_fiche']);
	$_SESSION['statut_fiche'] = $data['statut_fiche'];
	$_SESSION['prenom_fiche'] = $data['prenom_fiche'];
	$_SESSION['nom_fiche'] = $data['nom_fiche'];
	$_SESSION['arrivee_fiche'] = $data['arrivee_fiche'];
	$_SESSION['poste_fiche'] = $data['poste_fiche'];
	$_SESSION['creation_fiche'] = $data['creation_fiche'];
	$_SESSION['batiment_fiche'] = $data['batiment_fiche'];
	$_SESSION['unite_fiche'] = $data['unite_fiche'];
	$_SESSION['visa_fiche'] = $data['visa_fiche'];
	$_SESSION['nomchefservice_fiche'] = $data['nomchefservice_fiche'];
	$_SESSION['assistante_fiche'] = $data['assistante_fiche'];
	$_SESSION['telephonefixe_fiche'] = $data['telephonefixe_fiche'];
	$_SESSION['limite_fiche'] = $data['limite_fiche'];
	$_SESSION['id_service'] = $data['id_service'];
	$_SESSION['id_fiche'] = $id_fiche;
	
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
						<a class='dropdown-item' href='liste.php'>Liste arrivants programmés</a>
						<a class='dropdown-item' href='fiches.php'>Consulter Fiches</a>
						<a class='dropdown-item' href='modifier_fiches.php'>Completer / Modifier Fiches</a>
						<a class='dropdown-item' href='#'>Clôturer Fiches</a>
					</div>
				</div>
				<?php
				if (isset($_SESSION['login_utilisateur']) && isset($_SESSION['password_utilisateur'])) {
					if ($_SESSION['id_service'] == 5) {
						echo("<div class='col'>
							<a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>Gestion des tables</a>
							<div class='dropdown-menu ml-5'>
							<a class='nav-link' href='formulaires.php'>Formulaires</a>
							<a class='nav-link' href='base.php'>La base de données</a>
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
									<p>Ulysse est une application issue d'un projet dans le cadre d'un stage de Développeur Web et Web Mobile.</p>
									<p>Elle a pour but de faciliter le circuit d’informations entre les différents services de l’établissement lorsqu’un nouvel arrivant intègre le Cerema.</p>
									<p>Cette application est en perpétuelle évolution, si vous constatez des anomalies, merci de bien vouloir nous contacter</p>
									<hr style='width: 85%'>
									<p>Version 0.02<span style='color: #e32636; font-weight: bold'>&nbsp;&nbsp;*** UPDATE 0.03 ***</span></p>
									<p style='font-weight: bold'>Renommage de l'onglet Accueil par Actions :</p>
									<p class='pl-2'>Plus compréhensible pour l'utilisateur</p>
									<p style='font-weight: bold'>Création de l'interface Administrateur :</p>
									<p class='pl-2'>Ajout du menu et gestion des tables</p>
									<p style='font-weight: bold'>Ajout de "liste.php" :</p>
									<p class='pl-2'>Fusion de "listes_no_user.php" et "listes_user.php" (script PHP)</p>
									<p style='font-weight: bold'>Suppression des pages :</p>
									<p class='pl-2'>"listes_no_user.php"</p>
									<p class='pl-2'>"listes_user.php"</p>
									<p style='font-weight: bold'>Refonte de l'onglet connexion :</p>
									<p class='pl-2'>Nouvelle icône, id du service et libellé</p>
									<p style='font-weight: bold'>Ajout de la page "modifier_fiches.php" :</p>
									<p class='pl-2'>Elle permet d'accéder aux modifications des fiches en cours</p>
									<hr style='width: 85%'>
									<p><span style='color: #e32636; font-weight: bold'>&nbsp;&nbsp;*** UPDATE 0.02 ***</span></p>
									<p style='font-weight: bold'>Mise à jour de sécurité lors de l'identification :</p>
									<p class='pl-2'>Amélioration du fichier connexion.php avec<span style='color: #0095b6'> password_hash()</span> et<span style='color: #0095b6'> password_verify()</span></p>
									<p style='font-weight: bold'>Suppression des pages :</p>
									<p class='pl-2'>"login_success.php" (obsolète depuis le<span style='color: #0095b6'> password_verify()</span>)</p>
									<p class='pl-2'>"erreur_donnees.php" (remplacée par une condition lors de l'identification)</p>
									<p class='pl-2'>"erreur_champs.php" (remplacée par un 'require' lors de la saisie du mot de passe)</p>
									<p style='font-weight: bold'>Refonte de l'onglet connexion lorsque l'utilisateur est logué</p>
									<p style='font-weight: bold'>Ajout de l'onglet "A savoir" dans le menu principal</p>
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
				<?php
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
					?>
					<div class='col' style='text-align: right'>
						<span>
							<?php
							echo date('d.m.Y');
							?>
						</span>
						<div id='horloge'>
							<script>horloge();</script>
						</div>				
					</div>
				</nav>
				<div id='page'>
					<div class='row justify-content-center m-0 pt-2'>
						<h2>Modification Fiche Accueil Agent</h2>
					</div>
					<div class='row justify-content-center m-0'>
						<form id='formulaire-creation' method='POST' action='update.php'>
							<div class='row justify-content-center mt-4 mb-3'>
								<div class='form-group col-md-8' style='text-align: left'>
									<label for='creation_fiche'>Date création fiche*</label>
									<input type='date' class='form-control' name='creation_fiche' value='<?php echo($data['creation_fiche']); ?>'>
								</div>
								<div class='form-group col-md-8' style='text-align: left'>
									<label for='limite_fiche'>Date limite fiche*</label>
									<input type='date' class='form-control' name='limite_fiche' value='<?php echo($data['limite_fiche']); ?>'>
								</div>
							</div>
							<div class='row justify-content-center mt-2 mb-2'>
								<?php
								if ($data['statut_fiche'] == 1) { ?>
									<div class='form-check form-check-inline'>
										<input type='radio' class='form-check-input' name='statut_fiche' value='<?php echo($data['statut_fiche']);?>' checked>
										<label class='form-check-label' for='statut_fiche'>Nouvel arrivant</label>
									</div>
									<?php
								}
								if ($data['statut_fiche'] == 2) { ?>
									<div class='form-check form-check-inline'>
										<input type='radio' class='form-check-input' name='statut_fiche' value='<?php echo($data['statut_fiche']);?>'checked>
										<label class='form-check-label' for='statut_fiche'>Vacataire</label>
									</div>
									<?php
								}
								if ($data['statut_fiche'] == 3) { ?>
									<div class='form-check form-check-inline'>
										<input type='radio' class='form-check-input' name='statut_fiche' value='<?php echo($data['statut_fiche']);?>'checked>
										<label class='form-check-label' for='statut_fiche'>Mutation interne</label>
									</div>
									<?php
								}
								if ($data['statut_fiche'] == 4) { ?>
									<div class='form-check form-check-inline'>
										<input type='radio' class='form-check-input' name='statut_fiche' value='<?php echo($data['statut_fiche']);?>'checked>
										<label class='form-check-label' for='statut_fiche'>Contractuel</label>
									</div>
									<?php
								}
								if ($data['statut_fiche'] == 5) { ?>
									<div class='form-check form-check-inline'>
										<input type='radio' class='form-check-input' name='statut_fiche' value='<?php echo($data['statut_fiche']);?>'checked>
										<label class='form-check-label' for='statut_fiche'>Stagiaire</label>
									</div>
									<?php
								}?>
							</div>
							<div class='form-row justify-content-center'>
								<div class='form-group col-md-8' style='text-align: left'>
									<label for='arrivee_fiche'>Date d'arrivée*</label>
									<input type='date' class='form-control' name='arrivee_fiche' value='<?php echo($data['arrivee_fiche']); ?>'>
								</div>
							</div>
							<div class='form-row justify-content-center'>
								<div class='form-group col-md-8' style='text-align: left'>
									<label for='nom_fiche'>Nom*</label>
									<input type='text' class='form-control' name='nom_fiche' value='<?php echo($data['nom_fiche']); ?>'>
								</div>
							</div>
							<div class='form-row justify-content-center'>
								<div class='form-group col-md-8' style='text-align: left'>
									<label for='prenom_fiche'>Prénom*</label>
									<input type='text' class='form-control' name='prenom_fiche' value='<?php echo($data['prenom_fiche']); ?>'>
								</div>
							</div>
							<div class='form-row justify-content-center'>
								<div class='form-group col-md-8' style='text-align: left'>
									<label for='unite_fiche'>Unité</label>
									<input type='text' class='form-control' name='unite_fiche' value='<?php echo($data['unite_fiche']); ?>'>
								</div>
							</div>
							<div class='form-row justify-content-center'>
								<div class='form-group col-md-8' style='text-align: left'>
									<label for='id_service'>Service</label>
									<input type='text' class='form-control' name='id_service' value='<?php echo($data['id_service']); ?>'>
								</div>
							</div>
							<div class='form-row justify-content-center'>
								<div class='form-group col-md-8' style='text-align: left'>
									<label for='batiment_fiche'>Bâtiment</label>
									<input type='text' class='form-control' name='batiment_fiche' value='<?php echo($data['batiment_fiche']); ?>'>
								</div>
							</div>
							<div class='form-row justify-content-center'>
								<div class='form-group col-md-8' style='text-align: left'>
									<label for='telephonefixe_fiche'>Téléphone fixe</label>
									<input type='tel' class='form-control' name='telephonefixe_fiche' value='<?php echo($data['telephonefixe_fiche']); ?>'>
								</div>
							</div>
							<div class='form-row justify-content-center'>
								<div class='form-group col-md-8' style='text-align: left'>
									<label for='nomchefservice_fiche'>Nom du Chef de Service</label>
									<input type='text' class='form-control' name='nomchefservice_fiche' value='<?php echo($data['nomchefservice_fiche']); ?>'>
								</div>
							</div>
							<div class='form-row justify-content-center'>
								<div class='form-group col-md-8' style='text-align: left'>
									<label for='assistante_fiche'>Assistante</label>
									<input type='text' class='form-control' name='assistante_fiche' value='<?php echo($data['assistante_fiche']); ?>'>
								</div>
							</div>
							<div class='form-row justify-content-center'>
								<div class='form-group col-md-8' style='text-align: left'>
									<label for='poste_fiche'>Libellé du poste</label>
									<input type='text' class='form-control' name='poste_fiche' value='<?php echo($data['poste_fiche']); ?>'>
								</div>
							</div>
							<div class='row justify-content-center mt-4 mb-4'>
								<div class='col-6' style='text-align: center'>
									<input type='submit' name='valider' value='ENREGISTRER' class='btn btn-primary' onclick='return confirm("Êtes-vous sûr de vouloir créer cette fiche ?");'>
								</div>
								<div class='col-6' style='text-align: center'>
									<a href='index.php' type='button' class='btn btn-danger' onclick='return confirm("Êtes-vous sûr de vouloir quitter ?");'>ANNULER</a>
								</div>
							</div>
						</form>
					</div>
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
		</html>
		<?php
}
else {
	echo("Une erreur s'est produite");
}
?>