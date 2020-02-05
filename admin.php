<?php
session_start();
include "connect.php";

$date = time();
$nom = $_SESSION['username'];
$text = $_POST["commentaires"];

$limit = 10;
$page = $_GET['page'];
$debut = ($page - $start) * $limit;
$start = 1;

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

if ($conn->connect_error) {
    echo "probleme de connexion";
} else {
    $conn->select_db($dbname);
    $sql = "INSERT INTO test(pseudo, texte, date) values (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssd', $nom,$text, $date);

    $stmt->execute();

    $conn->select_db($dbname);
    $liste = "SELECT * FROM test WHERE 1 ORDER BY date DESC limit $debut,$limit";
    $result = $conn->query($liste);
    while ($row = $result->fetch_assoc()){
        $id = $row["id"];

        echo "<table><tr><a href='update.php?id=$id'>".$row["pseudo"]." a commenté: ".$row["texte"]." le : "
            .date("d/m/y H-i-s", $row["date"])." "."</a><form action='delete.php' method='get'><button type='submit' name='supprimer'><a href='delete.php?id=$id'>Supprimer</a></button></form><br><br></tr></table>";
    }
}


    //echo '<a href="index.php">espace commentaires</a><br>';
    echo '<a href="logout.php">Déconnection</a><br>';
}else{
    echo "<a href='index.php'>Redirection vers l'ecran de connexion</a><br>";

}

?>
<a href="?page=<?php echo $page - 1; ?>">Page précédente</a>

<a href="?page=<?php echo $page + 1; ?>">Page suivante</a>