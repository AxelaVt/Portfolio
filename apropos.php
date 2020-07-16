<?php
include "header.php";
require ('connection.php');
?>

<?php
//récup de données dans la base
$sql = "SELECT id, titre, texte FROM about ORDER BY id DESC LIMIT 1";
$stmt = $conn->prepare($sql);
// execute la requête
$executeIsOk = $stmt->execute();

$data = $stmt->fetchAll();
 //var_dump($data);

if ($executeIsOk == true) {
  echo "la requête fonctionne";
}
?>
// <!-- affichage des données -->

<div class="container-fluid apropos">
  <div class="jumbotron p-0">
    <input style="display:none" onClick="window.close()"/><a href="portefolio.php"><img class="float-sm-right p-1" src="bootstrap-icons/x-circle-fill.svg" alt="close" width="32" height="32" title="Bootstrap"></a>
    <div class="row h-40 p-4">
      <div class="column w-100">
        <div class="row h-20">
          <h2 class="mx-4">A propos</h2><img src="bootstrap-icons/info-square.svg" alt="close" width="32" height="32" title="Bootstrap">
        </div>
        <div class="row">
          <div class="col-lg-4 col-sm-12 p-2 text-center align-self-center">
            <img src="img/photo.png" >
          </div>
          <?php
          foreach ($data as $row) {
              // affichage
              // echo "</br>" . $row['titre'];
              // echo "</br>" . $row['texte'];
            ?>
          <div class="col-lg-8 col-sm-12 p-2">
            <div class="column h-100 align-items-center">
              <h4 class="d-flex h-20"><?php echo $row['titre'] ?></h4>
              <p class="d-flex h-70"><?php echo $row['texte'] ?></p>
              <div class="d-flex flex-row h-10 align-self-end"> N’hésitez pas à me contacter !
              <a href="CV.pdf" target="_blank">Télécharger mon CV</a>
              </div>
            </div>
          </div>
          <?php }  ?>
        </div>
      </div>
    </div>

    <div class="column h-50 p-4">
      <div class="row h-20">
        <h2 class="my-auto">Compétences</h2> <img src="img/comp.png"/>
      </div>
      <div class="row h-80">
        <div class="col-md-4">
          <h3>Développement front</h3>
          <p>
          </p>
        </div>
        <div class="col-md-4">
          <h3>Développement backend</h3>
          <p>
          </p>
        </div>
        <div class="col-md-4">
          <h3>Gestion de Projet</h3>
          <p>
          </p>
        </div>
      </div>
    </div>


<?php
include "footer.php";

 ?>
</div>
