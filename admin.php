
<?php
include "header.php";
require ('connection.php');
?>
<div class="container admin h-90">

  <h1>ADMIN</h1>
  <button type="button" value="Annuler" onclick="history.back()" class="btn btn-primary float-sm-right">Quitter</button>

  <ul class="nav nav-pills" role="tablist">
    <li class="nav-link active"><a data-toggle="tab" href="#admin">admin</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#creation">creation</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#modification">modification</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#suppression">suppression</a></li>
  </ul>



  <div class="tab-content">
    <div id="admin" class="container tab-pane active">
      <h3>admin</h3>
      <p>Some content.</p>
    </div>
    <div id="creation" class="container tab-pane fade">
        <h3>Creation</h3>
        <div class="col-lg-4 m-4 creation">
          <!-- lien pour modifier  -->
          <a href="formprojet.php">nouveau projet</a>
        </div>
    </div>
    <div id="modification" class="container tab-pane fade">
        <h3>Modification</h3>
        <div class="col-lg-4 m-4 modif">
          <!-- lien pour modifier  -->
          <a href="formapropos.php">modifier page about</a>
        </div>
        <div class="col-lg-4 m-4 modif">
          <!-- lien pour modifier  -->
          <a href="formprojetmodif.php">modifier un projet</a>
        </div>
    </div>
    <div id="suppression" class="container tab-pane fade">
          <h3>Suppression</h3>
          <p>Some content in menu 2.</p>
    </div>

  </div>



<?php
include "footeradmin.php";

 ?>

 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
