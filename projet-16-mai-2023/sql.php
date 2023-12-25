<?php

$con = @mysqli_connect("localhost", "root", "") or die("Probleme de connexion");
mysqli_select_db($con, "bibliotheque") or die("Probleme de selection");

$sql1 = "SELECT COUNT(id_abonne) nbr_abonne FROM abonne";
$res1=mysqli_query($con, $sql1);
$row1=mysqli_fetch_array($res1);
echo "Le nombre des abonnes est :".$row1['nbr_abonne'];
echo "<br>";
$sql2 = "SELECT COUNT(id_livre) nbr_livre FROM livre";
$res2=mysqli_query($con, $sql2);
$row2=mysqli_fetch_array($res2);
echo "Le nombre des livres est :".$row2['nbr_livre'];
echo "<br>";
$sql3 = "SELECT COUNT(id_emprunt) nbr_emprunt FROM emprunt";
$res3=mysqli_query($con, $sql3);
$row3=mysqli_fetch_array($res3);
echo "Le nombre des emprunts est :".$row3['nbr_emprunt'];

