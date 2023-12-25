<?php
$con = @mysqli_connect("localhost", "root", "") or die ("Probleme de connexion");
mysqli_select_db($con, "bibliotheque") or die("Probleme de selection");

// $sql = "CREATE TABLE livre(
//     id_livre INT(3) AUTO_INCREMENT PRIMARY KEY,
//     auteur VARCHAR(25),
//     titre VARCHAR(25)
//     )";
// $sql = "CREATE TABLE emprunt(
//   id_emprunt INT(3) AUTO_INCREMENT PRIMARY KEY,
//   id_livre INT(3),
//   id_abonne INT(3),
//   date_sortie DATE,
//   date_rendu DATE DEFAULT NULL
//   )";
// if(mysqli_query($con, $sql)){
//   echo "Creation succes";
// }else{
//   echo "Proebleme connexion";
// }
// $sql="ALTER TABLE emprunt
// ADD CONSTRAINT fk_livre FOREIGN KEY(id_livre) REFERENCES livre(id_livre)";

//   $sql="ALTER TABLE emprunt
//   ADD CONSTRAINT fk_abonne FOREIGN KEY(id_abonne) REFERENCES abonne(id_abonne)";
//   if(mysqli_query($con, $sql)){
//     echo "Alter succes";
// }else{
//     echo "No alter";
// }
//   $sql="ALTER TABLE emprunt
//   MODIFY COLUMN id_emprunt INT(3) AUTO_INCREMENT";
//   if(mysqli_query($con, $sql)){
//     echo "Modify succes";
// }else{
//     echo "No modiification";
// }

// $sql = "INSERT INTO abonne VALUES(1, 'GUILLAUME')";
// $sql = "INSERT INTO abonne VALUES(2, 'Benoit')";
// $sql = "INSERT INTO abonne VALUES(3, 'Chloe')";
// $sql = "INSERT INTO abonne VALUES(4, 'Laura')";
// $sql = "INSERT INTO `emprunt`(`id_emprunt`, `id_livre`, `id_abonne`, `date_sortie`, `date_rendu`) VALUES (1,100,1,'2011-12-17','2011-12-18')";
// $sql="INSERT INTO livre VALUES(100, 'GUY DE MAUPPASSANT', 'Une Vie')";
// $sql="INSERT INTO livre VALUES(101, 'GUY DE MAUPPASSANT', 'Bel-Ami')";
// $sql="INSERT INTO livre VALUES(102, 'HONORE DE BALZAC', 'Le pere Goriot')";
// $sql="INSERT INTO livre VALUES(103, 'ALPHONSE DAUDET', 'Le petit chose')";
// $sql="INSERT INTO livre VALUES(104, 'ALEXANDRE DUMAS', 'La Reine Margo')";
// $sql="INSERT INTO livre VALUES(105, 'ALEXANDRE DUMAS', 'Les Trois Mousquetaires')";
// $sql = "INSERT INTO emprunt VALUES (1,100,1,'2011-12-17','2011-12-18')";
// $sql1 = "INSERT INTO emprunt VALUES (2,101,2,'2011-12-18','2011-12-20')";
// $sql2 = "INSERT INTO emprunt VALUES (3,100,3,'2011-12-19','2011-12-22')";
// $sql3 = "INSERT INTO emprunt VALUES (4,103,4,'2011-12-19','2011-12-22')";
// $sql4 = "INSERT INTO emprunt VALUES (5,104,5,'2011-12-19','2011-12-28')";
// $sql5 = "INSERT INTO emprunt VALUES (6,105,6,'2011-12-20','2011-12-26')";
// $sql6 = "INSERT INTO emprunt VALUES (7,105,7,'2011-12-13', NULL)";
// $sql7 = "INSERT INTO emprunt VALUES (8,100,8,'2011-12-15', NULL)";
// // @$sql="TRUNCATE TABLE emprunt";
// if(mysqli_query($con, $sql2)){
//   echo "Insertion succes";
// }else{
//   echo "Erreur Insertion";
// }
// if(mysqli_query($con, $sql3)){
//   echo "Insertion succes";
// }else{
//   echo "Erreur Insertion";
// }
// if(mysqli_query($con, $sql4)){
//   echo "Insertion succes";
// }else{
//   echo "Erreur Insertion";
// }
// if(mysqli_query($con, $sql5)){
//   echo "Insertion succes";
// }else{
//   echo "Erreur Insertion";
// }
// if(mysqli_query($con, $sql6)){
//   echo "Insertion succes";
// }else{
//   echo "Erreur Insertion";
// }
// if(mysqli_query($con, $sql7)){
//   echo "Insertion succes";
// }else{
//   echo "Erreur Insertion";
// }

