<?php
include("inde.php");
$con = @mysqli_connect("localhost", "root", "") or die ("Probleme de connexion");
mysqli_select_db($con,"bibliotheque") or die ("probleme de selection");

$sql = "SELECT * FROM abonne";
$result = mysqli_query($con, $sql);
    echo "<table>";
    echo "<tr>
    <th>id_abonnee</th>
    <th>prenom</th>
    <th>Modification</th>
    <th>Suppression</th>
    </tr>
    ";
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr><td>".$row["id_abonne"]."</td><td>".$row["prenom"]."</td>";
        echo '<td><a href=modifierabonne.php?id='.$row["id_abonne"].'" class="pen-button" onclick="return confirm(\'Voulez vous vraiment modifier ?\');"><i class="fas fa-pen"></i></a></td>';
        echo '<td><a href="supprimerabonne.php?id='.$row["id_abonne"].'" class="delete-button"onclick="return confirm(\'Voulez vous vraiment supprimer ?\');"><i class="fas fa-times"></i></a></td>';

    }
    echo "<table>";
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
            <br>
            <label>Prenom</label><br>
            <input type="text" placeholder="Entrer le prenom a ajouter" name="prenom"><br>
            <input type="submit" value="Ajouter" name="Ajouter">
        </form>
    
    </body>
</html>
<?php
@$prenom=$_POST["prenom"];
if(isset($_POST["Ajouter"])){
    if(empty($prenom)){
        echo "Entrer un prenom a jouter";
    }else{
        $sql="INSERT INTO abonne(prenom) VALUES('$prenom')";
        $res=mysqli_query($con, $sql);
    }
    if($res){
        echo "DonneR ajouter par succes";
    }else{  
        echo "Probleme d insertion";
    }
}
