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
    <h1>Espace commentaires</h1>
    <a href="login.php"><input type="button" value="Connexion admin"></a>
</header>
<div id="push_infos">
    <form action="script.php" method="post">

        <label for="nom">Nom/Prenom/Pseudo : </label>
        <input type="text" name="nom" id="nom">

        <label for="commentaires"></label>
        <input type="text" name="commentaires" id="commentaires">

        <input type="submit" value="Envoyer">
    </form>
</div>
<div id="espace_commentaires">

</div>
<script src="script.js"></script>
</body>
</html>
