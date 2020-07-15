
<?php
include "header.php";
 ?>
    <div class="container-fluid projets">
      <input style="display:none" onClick="window.close()"/><a href="portefolio.php"><img class="float-sm-right p-1" src="bootstrap-icons/x-circle-fill.svg" alt="close" width="32" height="32" title="Bootstrap"></a>
      <h2>Projets</h2>
      <!-- <div class="card h-60"> -->
        <div class="card-deck h-40 m-4">
          <div class="card w-50 h-100 p-4">
            <img class="card-img-top" src="img/Screenshot-projet-integration-bootstrap.png" alt="Card image">
            <div class="card-img-overlay">
              <h4 class="card-title text-center pt-5">Projet 1</h4>
              <p class="card-text text-center">Intégration d'une maquette avec le framework Bootstrap.</p>
              <a href="projet.php?id=1" class="stretched-link"></a>
            </div>
          </div>
          <div class="card w-50 h-100 p-4">
            <img class="card-img-top" src="img/Screenshot-projet-integration-html-css.png" alt="Card image">
            <div class="card-img-overlay">
              <h4 class="card-title text-center pt-5">Projet 2</h4>
              <p class="card-text text-center">Intégration d'une maquette avec les technologies HTML CSS.</p>
              <a href="projet.php?id=2" class="stretched-link"></a>
            </div>
          </div>
        </div>
        <div class="card-deck h-40 m-4">
          <div class="card w-50 h-100 p-4">
            <img class="card-img-top" src="img/bomberbird.png" alt="Card image">
            <div class="card-img-overlay">
              <h4 class="card-title text-center pt-5">Projet 3</h4>
              <p class="card-text text-center">Réalisation d'un bomberman en javascript.</p>
              <a href="projet.php?id=3" class="stretched-link"></a>
            </div>
          </div>
          <div class="card w-50 h-100 p-4">
            <img class="card-img-top" src="img/image.png" alt="Card image">
            <div class="card-img-overlay">
              <h4 class="card-title text-center pt-5">Projet 2</h4>
              <p class="card-text text-center">entrer ici le text</p>
              <a href="projet.php?id=4" class="stretched-link"></a>
            </div>
          </div>
        </div>
      <!-- </div> -->
      <div class="d-flex flex-row h-10 align-items-end">
        <div class="col-lg-4 m-4 modif">
          <!-- lien pour modifier  -->
          <a href="formprojet.php">modifier</a>
        </div>
        <div class="col-lg-4 m-4 connect">
        <a href="connection.php">se connecter</a>
        </div>
      </div>




    <?php
    include "footer.php";

     ?>
