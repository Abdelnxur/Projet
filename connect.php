<?php
define('SERVEUR_BD', getenv('SERVEUR_BD'));
define('USER_BD', getenv('MARIADB_USER'));
define('PASS_BD', getenv('MARIADB_PASSWORD'));
define('NOM_BD', getenv('MARIADB_DATABASE'));

$CONNEXION = mysqli_connect(SERVEUR_BD, USER_BD, PASS_BD);
if (!$CONNEXION) {
    die("Erreur de connexion au serveur : " . mysqli_connect_error());
}
if (!mysqli_select_db($CONNEXION, NOM_BD)) {
    die("Erreur de sélection de la base : " . mysqli_error($CONNEXION));
}
if (!mysqli_set_charset($CONNEXION, 'UTF8')) {
    die("Erreur encodage UTF-8 : " . mysqli_error($CONNEXION));
}
?>
