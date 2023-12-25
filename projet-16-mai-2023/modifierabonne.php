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
        <legend>Modification Abonne</legend>
        <form method="post">
            <label>Nouveau Prenom</label><br>
            <input type="text" placeholder="Entrer le nouveau prenom" required name="newprenom">
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
        if (!empty($_POST["newprenom"])) {
            $npre = $_POST["newprenom"];
            $sql = "UPDATE abonne SET prenom='$npre' WHERE id_abonne='$id'";
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
