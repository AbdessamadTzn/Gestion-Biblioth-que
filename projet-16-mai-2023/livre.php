<?php
include("inde.php");
$con = @mysqli_connect("localhost", "root", "") or die("Probleme de connexion");
mysqli_select_db($con, "bibliotheque") or die("Probleme de connexion");

$sql="SELECT * FROM livre";
$result=mysqli_query($con, $sql);
$tab = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo "<table>";
    echo "<tr>
    <th>id_livre</th>
    <th>auteur</th>
    <th>titre</th>
    <th>Modification</th>
    <th>Suppression</th>
    </tr>";
    foreach($tab as $row){
        echo "<tr><td>".$row["id_livre"]."</td><td>".$row["auteur"]."</td><td>".$row["titre"]."</td>";
        echo '<td><a href=modifierlivre.php?id='.$row["id_livre"].'" class="pen-button" onclick="return confirm(\'Voulez vous vraiment modifier ?\');"><i class="fas fa-pen"></i></a></td>';
        echo '<td><a href="supprimerlivre.php?id='.$row["id_livre"].'" class="delete-button"onclick="return confirm(\'Voulez vous vraiment supprimer ?\');"><i class="fas fa-times"></i></a></td>';
        echo "</tr>";
    }
    echo "</table>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="miniprojet.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </head>
    <body>
    <form method="post">
    <label>Titre</label><br>
    <input type="text" placeholder="auteur" name="titre"><br>
    <label>Auteur</label> <br>
    <input type="text" placeholder="titre" name="auteur"><br>
    <input type="submit" value="Ajouter" name="ajouter">
    </form>
    </body>
</html>
<?php
@$auteur=$_POST["auteur"];
@$titre=$_POST["titre"];
if(isset($_POST["ajouter"])){
    if(empty($auteur) || empty($titre)){
        echo "Entrer un nom d'auteur et un titre";
    }else{
        $sql="INSERT INTO livre(auteur, titre) VALUES('$auteur', '$titre')";
        if(mysqli_query($con, $sql)){
            echo "Insertion par succes";
        }else{
            echo "Probleme d insertion";
        }
    }
}
