

<?php
include "connection.php";
include "header.php";

  //stocke en bdd les données saisies
  if (!empty($_POST['titre']) && !empty($_POST['descriptif'])) {
    try {
      $stmt = $conn->prepare('INSERT INTO projets (titre, descriptif) VALUES (:titre_projet, :descriptif_projet)');
      $stmt->execute(array(
        ':titre' => $_POST['titre_projet'],
        ':descriptif' => $_POST['descriptif_projet']
      ));
    } catch (\Exception $e) {
      echo $e->getMessage();
    }
  }
  else {
    echo "Compléter les champs !";
  }
?>

<div class="container h-50 m-2 mx-0 ">
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
    <label for="titre">Titre:</label>
    <textarea type="text" id="editor3" class="form-control" placeholder="Entrer le titre" name="titre"></textarea>
    </div>
    <div class="form-group">
    <label for="descriptif">descriptif:</label>
    <textarea type="text" id="editor4" class="form-control" rows="10" cols="50" name="descriptif"></textarea>
    </div>
    <div class="form-group">
    <label for="lien">lien:</label>
    <textarea type="text" id="lien" class="form-control" rows="5" cols="50" name="lien"></textarea>
    </div>
    <input type="file" name="img/" value="">
    <button type="submit" class="btn btn-primary" name="Envoyer">Enregistrer</button>
    <button type="button" value="Annuler" onclick="history.back()" class="btn btn-primary">Annuler</button>
  </form>
</div>


<?php

if (!empty($_POST)){
  header('Location:projets.php');
}


include "footer.php";
?>
