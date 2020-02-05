<?php
/**** Supprimer une randonnée ****/
session_start();
include "connect.php";
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    $id = $_GET["id"];
    if (isset($id)) {
        $conn->select_db($dbname);
        $sql = "DELETE FROM test where id=$id";
        $result = $conn->query($sql);
        header("location: admin.php");
        echo "fonctionne";
    } else {
        echo "fonctionne pas";
    }
    echo '<a href="logout.php">Déconnection</a>';
}else{
    echo "<a href='login.php'>Redirection vers l'ecran de connexion</a>";

}
?>