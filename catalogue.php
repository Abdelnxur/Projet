<?php
require('include/connexion.php');

$sql = "SELECT * FROM joueurs"; 
$result = mysqli_query($CONNEXION, $sql);

if (!$result) {
    die("Erreur requête SQL : " . mysqli_error($CONNEXION));
}

if (mysqli_num_rows($result) == 0) {
    echo "Aucun joueur trouvé.";
} else {
    echo "<h2>Liste des joueurs</h2><ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li><strong>" . $row['nom'] . "</strong> - " . $row['equipe'] . " (" . $row['position'] . ", " . $row['age'] . " ans)</li>";
    }
    echo "</ul>";
}
?>
