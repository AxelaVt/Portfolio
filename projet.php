<?php
include "header.php";
?>

<?php
echo $_GET['id'];
$id = $_GET['id'];
//récup des données dans la base
$sql = "SELECT * FROM projets WHERE id = $id ";
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
     // echo "</br>" . $row['id'];
     // echo "</br>" . $row['descriptif'];
     // echo "</br>" . $row['titre'];
     // echo "</br>" . $row['image'];
     // echo "</br>" . $row['lien'];

?>

<div class="container-fluid projet h-100 p-10">
  <div class="row col-lg-12 w-auto m-0 p-0 border">
    <div class="d-flex flex-column h-90 w-50">
      <h2 class="d-flex h-20 p-2"><?php echo $row['titre']?></h2>
      <div class="d-flex h-60 border p-5" id="description">
        <?php echo $row['descriptif']?>
      </div>
      <div class="d-flex h-10 p-2 ">
        <a href="#<?php echo $row['lien']?>"><button type="button" class="btn btn-outline-light" name="lien">demo</button></a>
      </div>
      <div class="d-flex h-10 p-2">
        <a href="projets.php"><button type="button" class="btn btn-outline-light">Retour à la liste des projets</button></a>
        <?php
        $nbpage = $_GET['page'];
        $pagesuivante = $id +1;
        $pageprecedente = $id -1;
        $pageactuelle =  $id;
        if($pageactuelle == $nbpage+1 || $pageactuelle-1 === 0 ) {
          $pageactuelle = $pageactuelle;
          echo "cette page n'existe pas";
         }

        ?>
        <a href="projet.php?id=<?php echo $pageprecedente?>&page=<?php echo $nbpage?>"><button type="button" value="" onclick="" class="btn btn-outline-light">projet précédent</button></a>
        <a href="projet.php?id=<?php echo $pagesuivante?>&page=<?php echo $nbpage?>"><button type="button" value="" onclick="" class="btn btn-outline-light">projet suivant</button></a>
      </div>
    </div>
    <div class="d-flex w-50 p-2 justify-content-center align-items-center">
      <?php echo $row['image']?>
      <!-- <img class="image-projet w-auto h-50" src="img/<?php// echo $row['image']?>.png" alt="image"> -->
    </div>
  </div>
</div>
<?php } ?>

<?php
include "footer.php";

 ?>
