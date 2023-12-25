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


        <form method="post">
            <label>Cliquer pour supprimer</label><br>
            <input type="submit" value="Supprimer" name="modifier">
        </form>

    </body>
</html>
<?php
$con = @mysqli_connect("localhost", "root", "") or die("Probleme de connexion");
mysqli_select_db($con, "bibliotheque") or die("Probleme de connexion");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST["modifier"])) {
            $sql = "DELETE FROM abonne WHERE `abonne`.`id_abonne` = $id";
            if (mysqli_query($con, $sql)) {
                echo "Mise a jour avec succes";
                header("Location: abonne.php"); // Redirect after displaying the success message
                exit; // Terminate the current script execution
            } else {
                echo "Erreur de modification";
            }
        }
    }

?>
