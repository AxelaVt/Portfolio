
<?php
//récup de données dans la base projets
$sql1 = "SELECT * FROM projets ORDER BY id DESC ";
$stmt = $conn->prepare($sql1);
// execute la requête
$executeIsOk = $stmt->execute();

$data1 = $stmt->fetchAll();
 //var_dump($data1);

if ($executeIsOk == true) {
  echo "la requête fonctionne";
}
//$sql->closeCursor();


//récup de données dans la base about
$sql2 = "SELECT id, titre, texte FROM about ORDER BY id DESC";
$stmt = $conn->prepare($sql2);
// execute la requête
$executeIsOk = $stmt->execute();

$data2 = $stmt->fetchAll();
 //var_dump($data2);

if ($executeIsOk == true) {
  echo "la requête fonctionne";
}
//$sql->closeCursor();


//récup nb de projets
$sqlnb = "SELECT COUNT(*) FROM projets WHERE actif='oui'";
$stmtnb = $conn->prepare($sqlnb);
$executeIsOk = $stmtnb->execute();
$nbprojets = $stmtnb->fetchAll();
$nbpage = $nbprojets[0][0];

?>
