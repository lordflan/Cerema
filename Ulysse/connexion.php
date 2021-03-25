<?php

try {
  // bdd cerema
  $base = new PDO('mysql:host=db;dbname=cerema', 'root', 'dreams');

  // bdd wamp
  //$base = new PDO('mysql:host=127.0.0.1:3308;dbname=cerema', 'root', '');
  $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  // On vérifie si le le mot de passe saisi est bien un mot de passe autorisé
  $passhash = password_hash($_POST["password_utilisateur"], PASSWORD_DEFAULT);

  // On inscrit la requête
  $query = 'SELECT utilisateurs.login_utilisateur,utilisateurs.password_utilisateur,services.id_service,services.libellecourt_service,roles.id_role,roles.libelle_role
    FROM (cerema.utilisateurs    utilisateurs
        INNER JOIN cerema.roles roles ON (utilisateurs.id_role = roles.id_role))
        INNER JOIN cerema.services services ON (utilisateurs.id_service = services.id_service) WHERE login_utilisateur = :login_utilisateur';

  // On prépare la requête
  $resultat = $base->prepare($query);
  $resultat->bindValue(':login_utilisateur', $_POST['login_utilisateur'], PDO::PARAM_STR);

  // On exécute la requête, on parcourt la table
  $resultat->execute();
  $data = $resultat->fetch();

  // On vérifie si le le mot de passe saisi est bien un mot de passe autorisé
  $passwordCorrect = password_verify($_POST['password_utilisateur'], $data['password_utilisateur']);
  if ($passwordCorrect) {
    //echo('<br>Mot de passe vérifié');
    session_start();
    $_SESSION['login_utilisateur'] = $_POST['login_utilisateur'];
    $_SESSION['password_utilisateur'] = $_POST['password_utilisateur'];
    $_SESSION['id_service'] = $data['id_service'];
    $_SESSION['libellecourt_service'] = $data['libellecourt_service'];
    $_SESSION['id_role'] = $data['id_role'];
    $_SESSION['libelle_role'] = $data['libelle_role'];
    header('location:index.php');
    exit();
  }
  else
  {
    //echo(password_hash("cerema", PASSWORD_DEFAULT));
    // Le visiteur n'a pas été reconnu comme étant membre de notre application. On utilise alors un petit javascript lui signalant ce fait
    echo('<body onLoad="alert(\'Mot de passe invalide..\')">');
    // Puis on le redirige vers la page d'accueil
    echo('<meta http-equiv="refresh" content="0;URL=index.php">');
  }
}
catch(PDOException $error)
{
  die("ERREUR " . $error->getMessage());
} finally{
  $base = null;
}
?>