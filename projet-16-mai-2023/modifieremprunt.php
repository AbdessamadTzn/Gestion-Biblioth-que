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
            <input type="date" required name="Ds">
            <input type="date"  required name="Dr">
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
        if (!empty($_POST["Ds"])&&!empty($_POST["Dr"])) {
            $ds = $_POST["Ds"];
            $dr = $_POST["Dr"];
            $sql = "UPDATE emprunt SET date_sortie='$ds', date_rendu='$dr' WHERE id_emprunt='$id'";
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
