<?php
include_once ('header.php');
?>

  <div id="container" class="container h-100 m-0">
      <!-- formulaire de connexion -->
    <div class="d-flex col-lg-8 col-sm-12 align-self-center">
      <form class="w-100 p-5" action="session.php" method="POST">
          <h1 class="align-self-center mb-4">Connexion</h1>
          <div class="form-group">
          <label><b>Nom d'utilisateur</b></label>
          <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
          </div>
          <div class="form-group">
          <label><b>Mot de passe</b></label>
          <input type="password" placeholder="Entrer le mot de passe" name="password" required>
          </div>
          <input type="submit" id='submit' value='LOGIN' >
      </form>
    </div>
          <?php
          if(isset($_GET['erreur'])){
              $err = $_GET['erreur'];
              if($err==1 || $err==2)
                  echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
          }
          ?>

  </div>
