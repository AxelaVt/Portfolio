
<?php
include "header.php";
require ('connection.php');
?>
<div class="container admin h-90">

  <h1>ADMIN</h1>
  <button type="button" value="Annuler" onclick="history.back()" class="btn btn-primary float-sm-right">Quitter</button>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#admin">admin</a></li>
    <li><a data-toggle="tab" href="#creation">creation</a></li>
    <li><a data-toggle="tab" href="#modification">modification</a></li>
    <li><a data-toggle="tab" href="#suppression">suppression</a></li>
  </ul>

  <div class="tab-content">
    <div id="admin" class="tab-pane fade in active">
      <h3>admin</h3>
      <p>Some content.</p>
    </div>
    <div id="creation" class="tab-pane fade">
        <h3>Creation</h3>
        <div class="col-lg-4 m-4 creation">
          <!-- lien pour modifier  -->
          <a href="formprojet.php">nouveau projet</a>
        </div>
    </div>
    <div id="modification" class="tab-pane fade">
        <h3>Modification</h3>
        <div class="col-lg-4 m-4 modif">
          <!-- lien pour modifier  -->
          <a href="formapropos.php">modifier page about</a>
        </div>
        <div class="col-lg-4 m-4 modif">
          <!-- lien pour modifier  -->
          <a href="formprojet.php">modifier un projet</a>
        </div>
    </div>
    <div id="suppression" class="tab-pane fade">
          <h3>Suppression</h3>
          <p>Some content in menu 2.</p>
    </div>

</div>


<?php
include "footeradmin.php";

 ?>
