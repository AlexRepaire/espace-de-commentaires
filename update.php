<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, user-scalable=no">
</head>

<body>
<header>
    <h1>Espace Mise à jour</h1>
</header>
<div id="push_infos">
    <form action="update.php" method="post">
        <?php
        session_start();
        include "connect.php";
        if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
        $id = $_GET["id"];
        $id2 = $_POST["id"];

        if (isset($id2)) {
            $nom = $_POST["nom"];
            $text = $_POST["commentaires"];

            $conn->select_db($dbname);
            $update = "UPDATE test SET pseudo = '$nom', texte ='$text' WHERE id=$id2";
            $result2 = $conn->query($update);
            header("location: admin.php");
        }

        if ($conn->connect_error):
            echo "probleme de connexion";
        else:
        $conn->select_db($dbname);
        $sql = "SELECT * FROM test Where id=$id";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()):


        ?>

        <label for="nom">Nom/Prenom/Pseudo : </label>
        <input type="text" name="nom" id="nom" value="<?php echo $row["pseudo"] ?>">

        <label for="commentaires"></label>
        <input type="text" name="commentaires" id="commentaires" value="<?php echo $row["texte"] ?>">

        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="submit" value="Envoyer">
    </form>
</div>
<div id="espace_commentaires">

</div>
<script src="script.js"></script>
</body>
</html>
<?php
endwhile;
endif;
}else{
            echo "<a href='admin.php'>Retour à la liste des commentaires</a>";
}
?>
