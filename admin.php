
<?php
include_once "header.php";
require ('requetes.php');
?>

<div class="container admin h-90">
<?php

//var_dump($_SESSION);
if ($_SESSION['admin'] !== true ) {
  echo "devez vous connecter";
  //sleep(10);
  header("location:identification.php");

}

if($_SESSION['username'] !== ""){
    $user = $_SESSION['username'];
    // afficher un message
    ?> <div class="row h-10 p-3">
      <?php echo "Bonjour $user, ";?>
    </div><?php
}


if(isset($_GET['deconnexion']) && $_GET['deconnexion']==true){
  session_unset();
  session_destroy();
  header("location:menu.php");
}

?>
  <h1>ADMIN</h1>

    <a href='admin.php?deconnexion=true' type="button" class="btn btn-primary btn-lg float-sm-right">Quitter</a>


  <ul class="nav nav-pills m-4" role="tablist">
    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#admin">admin</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#apropos">a propos</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#projets">Projets</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#articles">Articles</a></li>
  </ul>

  <div class="tab-content">
    <div id="admin" class="container tab-pane active p-2">
      <h3>admin</h3>


    </div>
    <!-- a propos -->
    <div id="apropos" class="container tab-pane fade">
      <h3>Page de présentation</h3>
      <a role="button" class="btn btn-outline-primary btn-lg" href="formapropos.php">Nouvelle entrée</a>
      <div class="container d-flex flex-column justify-content-center text-center">
      <h2>Liste des enregistrements</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>id</th>
            <th>titre</th>
            <th>texte</th>
          </tr>
        </thead>
        <tbody class="h-60">
          <?php
          foreach ($data2 as $row) {
              // affichage
              // echo "</br>" . $row['id'];
              // echo "</br>" . $row['titre'];
              // echo "</br>" . $row['texte'];
              ?>
          <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['titre']?></td>
            <td><?php echo $row['texte']?></td>
            <td><a href="apropos.php?id=<?php echo $row['id']?>"><img src="bootstrap-icons/eye.svg" alt="close" width="32" height="32" title="Bootstrap"></a></td>
            <td><a href="formaproposmodif.php?id=<?php echo $row['id']?>"><img src="bootstrap-icons/pencil-square.svg" alt="close" width="32" height="32" title="Bootstrap"></a></td>
            <td><a href="deleteapropos.php?id=<?php echo $row['id']?>"><img src="bootstrap-icons/trash.svg" alt="close" width="32" height="32" title="Bootstrap"></a></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
      </div>
    </div>
    <!-- projets -->
    <div id="projets" class="container tab-pane fade">
        <h3>Page de gestion des projets</h3>
        <a role="button" class="btn btn-outline-primary btn-lg" href="formprojet.php">nouveau projet</a>
        <div class="container d-flex flex-column justify-content-center text-center">
        <h2>Projets</h2>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>id</th>
              <th>titre</th>
              <th>descriptif</th>
              <th>actif</th>
              <th>suppression</th>
            </tr>
          </thead>
          <tbody class="h-60">
            <?php
            foreach ($data1 as $row) {
                // affichage
                // echo "</br>" . $row['id'];
                // echo "</br>" . $row['titre'];
                // echo "</br>" . $row['descriptif'];
                // echo "</br>" . $row['image'];
                // echo "</br>" . $row['lien'];
                // echo "</br>" . $row['actif'];
                ?>
            <tr>
              <td><?php echo $row['id']?></td>
              <td><?php echo $row['titre']?></td>
              <td><?php echo $row['descriptif']?></td>
              <td><?php echo $row['actif']?></td>
              <td><a href="projet.php?id=<?php echo $row['id']?>&page=<?php echo $nbpage?>"><img src="bootstrap-icons/eye.svg" alt="close" width="32" height="32" title="Bootstrap"></a></td>
              <td><a href="formprojetmodif.php?id=<?php echo $row['id']?>"><img src="bootstrap-icons/pencil-square.svg" alt="close" width="32" height="32" title="Bootstrap"></a></td>
              <td><a href="deleteprojet.php?id=<?php echo $row['id']?>"><img src="bootstrap-icons/trash.svg" alt="close" width="32" height="32" title="Bootstrap"></a></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- articles -->
    <div id="articles" class="container tab-pane fade">
      <h3>Page de gestion des articles</h3>
      <a role="button" class="btn btn-outline-primary btn-lg" href="formarticle.php">nouvel article</a>

      <div class="container d-flex flex-column justify-content-center text-center">
          <h2>Articles</h2>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>id</th>
                <th>titre</th>
                <th>texte</th>
                <th>image</th>
                <th>actif</th>
              </tr>
            </thead>
            <tbody class="h-60">
              <?php
              foreach ($data3 as $row) {
                  // affichage
                  // echo "</br>" . $row['id'];
                  // echo "</br>" . $row['titre'];
                  // echo "</br>" . $row['texte'];
                  // echo "</br>" . $row['image'];
                  // echo "</br>" . $row['lien'];
                  // echo "</br>" . $row['actif'];
                  ?>
              <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['titre']?></td>
                <td><?php echo $row['texte']?></td>
                <td><?php echo $row['image']?></td>
                <td><?php echo $row['actif']?></td>
                <td><a href="article.php?id=<?php echo $row['id']?>&page=<?php echo $nbpage?>"><img src="bootstrap-icons/eye.svg" alt="close" width="32" height="32" title="Bootstrap"></a></td>
                <td><a href="formmodifarticle.php?id=<?php echo $row['id']?>"><img src="bootstrap-icons/pencil-square.svg" alt="close" width="32" height="32" title="Bootstrap"></a></td>
                <td><a href="deletearticle.php?id=<?php echo $row['id']?>"><img src="bootstrap-icons/trash.svg" alt="close" width="32" height="32" title="Bootstrap"></a></td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
    </div>
  </div>
</div>


<?php
include "footeradmin.php";

 ?>
