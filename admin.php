
<?php
include "header.php";
require ('requetes.php');
?>
<div class="container admin h-90">

  <h1>ADMIN</h1>
  <button type="button" value="quitter" class="btn btn-primary float-sm-right">Quitter</button>
  <?php
  if (!empty($_POST["quitter"])) {
    header('Location:portfolio.php');
  }
   ?>
  <ul class="nav nav-pills" role="tablist">
    <li class="nav-link active"><a data-toggle="tab" href="#admin">admin</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#apropos">a propos</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#projets">Projets</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#articles">Articles</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#contacts">Contacts</a></li>
  </ul>

  <div class="tab-content">
    <div id="admin" class="container tab-pane active p-2">
      <h3 class="mt-2">admin</h3>

    </div>
    <div id="apropos" class="container tab-pane fade">
      <h3>apropos</h3>
      <a href="formapropos.php">modifier page about</a>
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

    <div id="projets" class="container tab-pane fade">
        <h3>Projets</h3>
        <div class="container d-flex flex-column justify-content-center text-center">
        <a href="formprojet.php">nouveau projet</a>
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
              <td><a href="formmodif.php?id=<?php echo $row['id']?>"><img src="bootstrap-icons/pencil-square.svg" alt="close" width="32" height="32" title="Bootstrap"></a></td>
              <td><a href="delete.php?id=<?php echo $row['id']?>"><img src="bootstrap-icons/trash.svg" alt="close" width="32" height="32" title="Bootstrap"></a></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <div id="articles" class="container tab-pane fade">
          <h3>Articles</h3>
          <div class="container d-flex flex-column justify-content-center text-center">
          <!-- <a href="formprojet.php">nouveau projet</a>
          <a href="formprojetmodif.php">modifier un projet</a> -->
          <h2>Projets</h2>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>id</th>
                <th>titre</th>
                <th>texte</th>
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
                <td><?php echo $row['descriptif']?></td>
                <td><?php echo $row['actif']?></td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
    </div>
    <div id="contacts" class="container tab-pane fade">
          <h3>Contacts</h3>
          <div class="container d-flex flex-column justify-content-center text-center">
          <a href="formprojet.php">nouveau projet</a>
          <a href="formprojetmodif.php">modifier un projet</a>
          <h2>Projets</h2>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>id</th>
                <th>nom</th>
                <th>prenom</th>
                <th>email</th>
                <th>contact</th>
              </tr>
            </thead>
            <tbody class="h-60">
              <?php
              foreach ($data4 as $row) {
                  // affichage
                  // echo "</br>" . $row['id'];
                  // echo "</br>" . $row['nom'];
                  // echo "</br>" . $row['premon'];
                  // echo "</br>" . $row['email'];
                  // echo "</br>" . $row['message'];

                  ?>
              <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['nom']?></td>
                <td><?php echo $row['prenom']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['message']?></td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
    </div>

  </div>



<?php
include "footeradmin.php";

 ?>
