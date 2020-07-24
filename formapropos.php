
<?php
include "header.php";

if(isset($_POST['submit'])){

  if (empty($_POST['titre'])) {
    $error[] = "veuillez remplir le champs titre";
  }
  if (empty($_POST['comment'])) {
    $error[] = "veuillez remplir le champs texte";
  }

  //stocke en bdd les données saisies
  if (!isset($error)){
    try {
      $stmt = $conn->prepare('INSERT INTO about (id, titre, texte) VALUES (:id, :titre, :texte)');
      $executeIsOk = $stmt->execute(array(
        ':id' => $_POST['id'],
        ':titre' => $_POST['titre'],
        ':texte' => $_POST['comment']
      ));
      if ($executeIsOk == true) {
      echo "la requête fonctionne";
      }
      header('Location:apropos.php');
      exit;

    } catch (\Exception $e) {
      echo $e->getMessage();
    }
  }
  if (isset($error)) {
    foreach ($error as $error) {
      echo '<div style="color: red; font-weight: bold; text-align: center;">'.$error.'</div>';
    }
  }
}
?>

<div class="container form h-80 justify-content-center align-items-center">

      <form action="" method="post" class="h-80 p-5">
      <div class="form-group">
      <label for="titre">Titre:</label>
      <textarea type="text" id="" class="form-control" name="titre"></textarea>
      </div>
      <div class="form-group">
      <label for="comment">Texte:</label>
      <textarea type="text" id="" class="form-control" rows="10" cols="50" name="comment"></textarea>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Enregistrer</button>
      <!-- <button type="button" value="Annuler" onclick="history.back()" class="btn btn-primary">Annuler</button> -->
      <button type='reset' class="btn btn-secondary">Annuler</button>
      <a href="admin.php"><button type="button" class="btn btn-primary">admin</button></a>
    </form>

</div>

<?php
include "footeradmin.php";
?>
