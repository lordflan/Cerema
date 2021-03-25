<?php

try {
	$base = new PDO('mysql:host=db;dbname=cerema', 'root', 'dreams');
	$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	if(isset($_POST['login_utilisateur']) && isset($_POST['password_utilisateur']))
	{
		if(empty($_POST['password_utilisateur']))
		{
			include('erreur_champs.php');
		}
		else
		{
			$query = 'SELECT utilisateurs.login_utilisateur,utilisateurs.password_utilisateur,services.id_service,services.libellecourt_service FROM utilisateurs
			INNER JOIN services
			ON (utilisateurs.id_service = services.id_service) WHERE login_utilisateur = :login_utilisateur AND password_utilisateur = :password_utilisateur';
			$resultat = $base->prepare($query);
			$resultat->bindValue(':login_utilisateur', $_POST['login_utilisateur'], PDO::PARAM_STR);
			$resultat->bindValue(':password_utilisateur', $_POST['password_utilisateur'], PDO::PARAM_STR);
			$resultat->execute();
			$data = $resultat->fetch();
			$passwordCorrect = $data['password_utilisateur'];
			if ($passwordCorrect) {
	            //echo('<br>Mot de passe vérifié');
				session_start();
				$_SESSION['login_utilisateur'] = $_POST['login_utilisateur'];
				$_SESSION['password_utilisateur'] = $_POST['password_utilisateur'];
				$_SESSION['id_service'] = $data['id_service'];
				$_SESSION['libellecourt_service'] = $data['libellecourt_service'];
				header('location:login_success.php');
			}
			else
			{
				include('erreur_donnees.php');
			}
		}
	}
}
catch(PDOException $error)
{
	die("ERREUR " . $error->getMessage());
} finally{
	$base = null;
}
?>