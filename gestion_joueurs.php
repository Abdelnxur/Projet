<link rel="stylesheet" href="css/site.css">
<a href="index.php">Revenir à l'affichage des joueurs</a>
<?php
require('include/connexion.php');


if (isset($_POST['ajouter'])) {
    $nom = mysqli_real_escape_string($CONNEXION, $_POST['nom']);
    $equipe = mysqli_real_escape_string($CONNEXION, $_POST['equipe']);
    $position = mysqli_real_escape_string($CONNEXION, $_POST['position']);
    $age = intval($_POST['age']);

    $sql = "INSERT INTO joueurs (nom, equipe, position, age) VALUES ('$nom', '$equipe', '$position', $age)";
    mysqli_query($CONNEXION, $sql);
}

if (isset($_GET['supprimer'])) {
    $id = intval($_GET['supprimer']);
    $sql = "DELETE FROM joueurs WHERE id = $id";
    mysqli_query($CONNEXION, $sql);
}

if (isset($_POST['modifier'])) {
    $id = intval($_POST['id']);
    $nom = mysqli_real_escape_string($CONNEXION, $_POST['nom']);
    $equipe = mysqli_real_escape_string($CONNEXION, $_POST['equipe']);
    $position = mysqli_real_escape_string($CONNEXION, $_POST['position']);
    $age = intval($_POST['age']);

    $sql = "UPDATE joueurs SET nom='$nom', equipe='$equipe', position='$position', age=$age WHERE id=$id";
    mysqli_query($CONNEXION, $sql);
}

$result = mysqli_query($CONNEXION, "SELECT * FROM joueurs");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestion des joueurs</title>
</head>
<body>
    <h2>Ajouter un joueur</h2>
    <form method="post">
        Nom: <input type="text" name="nom" required>
        Équipe: <input type="text" name="equipe" required>
        Position: <input type="text" name="position" required>
        Âge: <input type="number" name="age" required>
        <button type="submit" name="ajouter">Ajouter</button>
    </form>
    
    <h2>Liste des joueurs</h2>
    <ul>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <li>
            <?php echo $row['nom'] . " - " . $row['equipe'] . " - " . $row['position'] . " - " . $row['age'] . " ans"; ?>
            <a href="?supprimer=<?php echo $row['id']; ?>" onclick="return confirm('Supprimer ce joueur ?');">❌</a>
            <a href="?edit=<?php echo $row['id']; ?>">✏️</a>
        </li>
    <?php } ?>
    </ul>

    <?php if (isset($_GET['edit'])) { 
        $id = intval($_GET['edit']);
        $res = mysqli_query($CONNEXION, "SELECT * FROM joueurs WHERE id = $id");
        $joueur = mysqli_fetch_assoc($res);
    ?>
    <h2>Modifier un joueur</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $joueur['id']; ?>">
        Nom: <input type="text" name="nom" value="<?php echo $joueur['nom']; ?>" required>
        Équipe: <input type="text" name="equipe" value="<?php echo $joueur['equipe']; ?>" required>
        Position: <input type="text" name="position" value="<?php echo $joueur['position']; ?>" required>
        Âge: <input type="number" name="age" value="<?php echo $joueur['age']; ?>" required>
        <button type="submit" name="modifier">Modifier</button>
    </form>
    <?php } ?>
</body>
</html>
