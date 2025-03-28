<?php
require("connect.php"); 
require('include/header.php');
require('include/menu.php');
require('include/connexion.php');
?>

<h1>Bienvenue sur notre site de football</h1>
<a href="gestion_joueurs.php">Gérer les joueurs</a>
<?php
require('include/connexion.php');

$sql = "SELECT * FROM joueurs"; 
$result = mysqli_query($CONNEXION, $sql);

if (!$result) {
    die("Erreur requête SQL : " . mysqli_error($CONNEXION));
}

if (mysqli_num_rows($result) == 0) {
    echo "<p>Aucun joueur trouvé.</p>";
} else {
    echo "<h2>Liste des joueurs</h2><ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . $row['nom'] . " - " . $row['equipe'] . " - " . $row['age'] .  "</li>";
    }
    echo "</ul>";
}
?>
<p>Découvrez les meilleurs joueurs du moment et suivez les actualités du foot.</p>

<?php require('include/footer.php'); ?>
