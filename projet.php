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

<div class="container-fluid projet h-100 p-10">
  <div class="row col-lg-12 w-auto h-100 border">
    <div class="d-flex flex-column w-50">
      <h2 class="d-flex h-20 p-5"><?php echo $row['titre_projet']?></h2>
      <div class="d-flex h-60 border p-5">
        <?php echo $row['descriptif_projet']?>
      </div>
      <div class="d-flex h-10 p-5 ">
        <a href="#<?php echo $row['lien_projet']?>"><button type="button" class="btn btn-outline-dark" name="lien_projet">demo</button></a>
      </div>
      <div class="d-flex h-10 p-5">
        <button type="button" value="Annuler" onclick="history.back()" class="btn btn-outline-dark">Retour à la liste des projets</button>
      </div>
    </div>
    <div class="d-flex w-50 p-5">
      <?php echo $row['img_projet']?>
      <!-- <img class="image-projet w-auto h-50" src="img/<?php echo $row['img_projet']?>.png" alt="image"> -->
    </div>
  </div>
</div>
<?php } ?>

<?php
include "footer.php";

 ?>
