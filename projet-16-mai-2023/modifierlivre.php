<!DOCTYPE html>
<html lang="en">
    <body>
        <style>
            body{
                background-color: coral;
            }
            .pen-button {
    color: blue;
    }
fieldset{
  border-radius: 25px;
  border: solid black;
  margin-right: 400px;
  margin-left: 210px;
}
input[type='submit']{
    border-radius: 25px;
    border: solid;
    margin-top: 9px;
    color: coral;
  }
  input[type='text']{
    border-radius: 25px;
    margin-bottom: 2px;
  }

        </style>
    <fieldset>
        <legend>Modification Livre</legend>
        <form method="post">
            <label>Nouveau Prenom</label><br>
            <input type="text" placeholder="Entrer le nouveau auteur" required name="newauteur">
            <input type="text" placeholder="Entrer le nouveau titre" required name="newtitre">
            <input type="submit" name="modifier">
        </form>
    </fieldset>
    </body>
</html>
<?php
$con = @mysqli_connect("localhost", "root", "") or die("Probleme de connexion");
mysqli_select_db($con, "bibliotheque") or die("Probleme de connexion");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_POST["modifier"])) {
        if (!empty($_POST["newauteur"])&&!empty($_POST["newtitre"])) {
            $na = $_POST["newauteur"];
            $nt = $_POST["newtitre"];
            $sql = "UPDATE livre SET auteur='$na', titre='$nt' WHERE id_livre='$id'";
            if (mysqli_query($con, $sql)) {
                echo "Mise a jour avec succes";
                header("Location: abonne.php"); // Redirect after displaying the success message
                exit; // Terminate the current script execution
            } else {
                echo "Erreur de modification";
            }
        }
    }
}
?>
