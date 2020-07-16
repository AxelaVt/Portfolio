

<?php
include "connection.php";
include "header.php";

  //stocke en bdd les données saisies
  if (!empty($_POST['titre']) && !empty($_POST['comment'])) {
    try {
      $stmt = $conn->prepare('INSERT INTO about (titre, texte) VALUES (:titre, :texte)');
      $stmt->execute(array(
        ':titre' => $_POST['titre'],
        ':texte' => $_POST['comment']
      ));
    } catch (\Exception $e) {
      echo $e->getMessage();
    }
  }
  else {
    echo "Compléter les 2 champs !";
  }
?>

<div class="container h-50 m-2 mx-0 ">
  <form action="" method="post">
    <div class="form-group">
    <label for="titre">Titre:</label>
    <textarea type="text" id="editor1" class="form-control" placeholder="Entrer le titre" name="titre"></textarea>
    </div>
    <div class="form-group">
    <label for="comment">Texte:</label>
    <textarea type="text" id="editor2" class="form-control" rows="10" cols="50" name="comment"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <!-- <input type="button" value="annuler" onclick="history.back()"  />
    <a href="apropos.php"><button type="reset" class="btn btn-primary">Annuler</button></a> -->
    <button type="button" value="Annuler" onclick="history.back()" class="btn btn-primary">Annuler</button>
  </form>
</div>

<?php

if(!empty($_POST)){
  header('Location:apropos.php');
}

include "footer.php";
?>
