<?php
include_once ('header.php');
?>

  <div id="container" class="container justify-content-center">
      <!-- zone de connexion -->
    <div class="d-flex flex-row m-0 col-lg-6 col-sm-12">
      <form class="w-100 p-5" action="session.php" method="POST">
          <h1>Connexion</h1>
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
