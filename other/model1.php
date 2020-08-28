
<?php
require "connection.php";


//récup de données dans la base about
function get_lastpublish(){
$sql = "SELECT id, titre, texte FROM about ORDER BY id DESC LIMIT 1";
$stmt = $conn->prepare($sql);
$executeIsOk = $stmt->execute();
return $stmt->fetchAll();

  if ($executeIsOk == true) {
    echo "la requête fonctionne";
  }
}

?>
