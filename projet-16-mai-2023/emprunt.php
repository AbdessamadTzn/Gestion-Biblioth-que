<?php
include("inde.php");
$con = @mysqli_connect("localhost", "root", "") or die("Probleme de connexion");
mysqli_select_db($con, "bibliotheque") or die("Probleme de selection");

$sql = "SELECT * FROM emprunt";
// $result = mysqli_query($con, $sql);

// if(mysqli_num_rows($result)>1){
//     echo "<table>";
//     echo "<td>
//     <th>wid_emprunt</th>
//     <th>id_livre</th>
//     <th>id_abonne</th>
//     <th>date_sortie</th>
//     <th>date_rendu</th>
//     </td>";
//     while($row=mysqli_fetch_assoc($result)){
//         echo "<tr><td>".$row["id_emprunt"]."</td><td>".$row["id_livre"]."</td><td>".$row["id_abonne"]."</td><td>".$row["date_sortie"]."</td><td>".$row["date_rendu"]."</td></tr>";
//     }
// }


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
    <?php
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>1){
        echo "<table>";
        echo "<tr>
        <th>id_emprunt</th>
        <th>id_livre</th>
        <th>id_abonne</th>
        <th>dateS</th>
        <th>dateR</th>
        <th>Moification</th>
        <th>Suppression</th>
        </tr>";
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr><td>".$row["id_emprunt"]."</td><td>".$row["id_livre"]."</td><td>".$row["id_abonne"]."</td><td>".$row["date_sortie"]."</td><td>".$row["date_rendu"]."</td>";
            echo '<td><a href=modifieremprunt.php?id='.$row["id_emprunt"].'" class="pen-button" onclick="return confirm(\'Voulez vous vraiment modifier ?\');"><i class="fas fa-pen"></i></a></td>';
            echo '<td><a href="supprimeremprunt.php?id='.$row["id_emprunt"].'" class="delete-button"onclick="return confirm(\'Voulez vous vraiment supprimer ?\');"><i class="fas fa-times"></i></a></td>';
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
    <br>
        <form method="post">
    <label>Abonne</label>
    <select name="SelectedAbonne">
            <?php
            @$sql1="SELECT id_abonne, prenom FROM abonne";
            $res1=mysqli_query($con, $sql1);
            if($res1){
                while($row=mysqli_fetch_assoc($res1)){
                    echo "<option value=' ".$row['id_abonne']."|".$row['prenom']."'>".$row['id_abonne']."-".$row['prenom'];
                    echo "</option>";
                }
            }
            ?>
    </select>
    <br>
    <label>Livre</label>
    <select name="selectedOption">
            <?php
            @$sql="SELECT id_livre, auteur, titre FROM livre";
            $res=mysqli_query($con, $sql);
            if($res){
                        while($row=mysqli_fetch_assoc($res)){
                                    echo "<option value =' ".$row['id_livre']."|".$row['auteur']."|".$row['titre']."'>";
                                    echo $row['id_livre']."-".$row['auteur']." | ".$row['titre'];
                                    echo "</option>";
                                }
                            }
            ?>
    </select>
    <br>
    <label>Date Sortie</label><br>
    <input type="date" name="dateS"><br>
    <label>Date Entrer</label><br>
    <input type="date" name="dateE"><br>
    <input type="submit" value="ajouter" name="ajout">
    </form>
    </body>
</html>
<?php
if(isset($_POST['ajout'])){
    $selectedValue = $_POST["selectedOption"];
    $selectedValues = explode("|", $selectedValue);
    $selectedAbonne = $_POST["SelectedAbonne"];
    $IdAbonne= explode("|", $selectedAbonne);


    
    $selectedIdLivre = $selectedValues[0];
    $selectedAuteur = $selectedValues[1];
    $selectedTitre = $selectedValues[2];
    $idab= $IdAbonne[0];
    $dateS=$_POST["dateS"];
    $dateE=$_POST["dateE"];
    if(!empty($_POST['dateS'])){
    $Update = "UPDATE emprunt SET date_sortie = '$dateS' WHERE id_livre = $selectedIdLivre AND id_abonne = $idab";
    }
    if(!empty($_POST['dateE'])){
    $Update1 = "UPDATE emprunt SET date_rendu = '$dateE' WHERE id_livre = $selectedIdLivre AND id_abonne = $idab";
    }
    if(empty($_POST['dateS'])){
    $Update = "UPDATE emprunt SET date_sortie = NULL WHERE id_livre = $selectedIdLivre AND id_abonne = $idab";
    }
    if(empty($_POST['dateE'])){
    $Update1 = "UPDATE emprunt SET date_rendu = NULL WHERE id_livre = $selectedIdLivre AND id_abonne = $idab";
    }
        if(mysqli_query($con, $Update))
        echo "Date Sortie mit a jour par succes";
        if(mysqli_query($con, $Update1)){
            echo "Date Rendu mit a jour avec succes";
        }
    
    echo "Selected ID Livre: " . $selectedIdLivre . "<br>";
    echo "Selected Auteur: " . $selectedAuteur . "<br>";
    echo "Selected Titre: " . $selectedTitre . "<br>";
    echo "Selected Abonne: " . $selectedAbonne . "<br>";
}