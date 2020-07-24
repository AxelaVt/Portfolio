
<?php
include "header.php";
 ?>
<?php
//récup de données dans la base
$sql = "SELECT * FROM projets WHERE actif='oui' ORDER BY id";
$sqlnb = "SELECT COUNT(*) FROM projets WHERE actif='oui'";
$stmt = $conn->prepare($sql);
$stmtnb = $conn->prepare($sqlnb);
// execute la requête
$executeIsOk = $stmt->execute();
$executeIsOk = $stmtnb->execute();
$nbprojets = $stmtnb->fetchAll();
//var_dump($nbprojets);
//echo $nbprojets[0][0];
$data = $stmt->fetchAll();
 //var_dump($data);
 //print_r($data);
if ($executeIsOk == true) {
  echo "la requête fonctionne";
}
?>
<div class="container-fluid projets">
  <input style="display:none" onClick="window.close()"/><a href="menu.php"><img class="float-sm-right p-1" src="bootstrap-icons/x-circle-fill.svg" alt="close" width="32" height="32" title="Bootstrap"></a>
  <h2 class="text-center mb-0">Projets</h2>
  <div class="card-deck w-100 h-40 m-4 flex-wrap">
<?php

foreach ($data as $row) {
    // affichage
    // echo "</br>" . $row['id'];
    // echo "</br>" . $row['titre'];
    // echo "</br>" . $row['image'];

    ?>
      <div class="card h-100 col-lg-5 col-sm-11 p-4 m-4">
        <img class="card-img-top " src="<?php echo $row['image'];?>" alt="Card image">
        <div class="card-img-overlay">
          <h4 class="card-title text-center pt-5"><?php echo $row['titre'];?></h4>
          <p class="card-text text-center"></p>
          <a href="projet.php?id=<?php echo $row['id'];?>&page=<?php echo $nbprojets[0][0]; ?>" class="stretched-link"></a>
        </div>
      </div>
    <?php
}

?>
  </div>
</div>

<?php

include "footer.php";

 ?>
