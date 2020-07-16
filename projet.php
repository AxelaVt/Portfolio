<?php
include "header.php";
require ('connection.php');
?>

<?php
echo $_GET['id'];
$id = $_GET['id'];
//récup des données dans la base
$sql = "SELECT * FROM projets WHERE id_projet = $id ";
$stmt = $conn->prepare($sql);
// execute la requête
$executeIsOk = $stmt->execute();

$data = $stmt->fetchAll();
 // var_dump($data);

if ($executeIsOk == true) {
  echo "la requête fonctionne";
}

// <!-- affichage des données -->
foreach ($data as $row) {
    // affichage
     // echo "</br>" . $row['id_projet'];
     // echo "</br>" . $row['descriptif_projet'];
     // echo "</br>" . $row['titre_projet'];
     // echo "</br>" . $row['img_projet'];
     // echo "</br>" . $row['lien_projet'];

?>
<div class="container-fluid">
  <div class="row col-lg-12 h-100">
    <div class="d-flex w-50 h-100">
      <h2 class="d-flex h-20"><?php echo $row['titre_projet']?></h2>
      <div class="d-flex h-60">
        <?php echo $row['descriptif_projet']?>
      </div>
      <div class="d-flex h-20">
        <?php echo $row['lien_projet']?>
      </div>
    </div>
    <div class="d-flex w-50 h100">
      <img src="img/"<?php echo $row['img_projet']?>".png" alt="image">
    </div>
  </div>
</div>
<?php } ?>



<?php
include "footer.php";

 ?>
