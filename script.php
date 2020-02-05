<?php
include "connect.php";

$date = time();
$nom = $_POST["nom"];
$text = $_POST["commentaires"];

$limit = 10;
$page = $_GET['page'];
$debut = ($page - $start) * $limit;
$start = 1;

/*
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
*/
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
        echo "<table><tr>".$row["pseudo"]." a commenté: ".$row["texte"]." le : ".date("d/m/y H-i-s", $row["date"])." "."<br><br></tr></table>";
    }
}

/*
    echo '<a href="index.html">espace commentaires</a>';
    echo '<a href="logout.php">Déconnection</a>';
}else{
    echo "<a href='login.php'>Redirection vers l'ecran de connexion</a>";

}
    */
?>
<a href="?page=<?php echo $page - 1; ?>">Page précédente</a>

<a href="?page=<?php echo $page + 1; ?>">Page suivante</a>