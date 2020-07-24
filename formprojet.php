<!-- ajout d'un nouveau projet -->
<?php
include_once "header.php";

?>
<div class="container d-flex flex-column justify-content-center">
   <form action="" method="post" class="w-80 p-5" enctype="multipart/form-data">
       <div class="form-group">
       <label for="titre">Titre:</label>
       <textarea type="text" id="" class="form-control" placeholder="Entrer le titre" name="titre" value=""></textarea>
       </div>
       <div class="form-group">
       <label for="descriptif">Description:</label>
       <textarea type="text" id="" class="form-control" rows="10" cols="50" name="descriptif" value=""></textarea>
       </div>
       <div class="form-group">
       <label for="image">Illustration:</label>
       <!-- <input type="text" id="" class="form-control" name="image" value=""> -->
       <!-- </div>-->
       <div class="form-group">
         <input type="file" name="image" size="30">
         <!-- <button type="submit" name="upload" class="btn btn-primary" value="Uploader">Uploader</button> -->
       </div>
       <div class="form-group">
       <label for="lien">Lien:</label>
       <textarea type="text" id="lien" class="form-control" rows="10" cols="50" name="lien" value=""></textarea>
       </div>
      <fieldset required>
       <div class="form-check-inline mb-2">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="actif" value="oui">Enregistrer et publier
          </label>
        </div>
        <div class="form-check-inline mb-2">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="actif" value="non" checked="yes">enregistrer
          </label>
        </div>
      </fieldset>

    <!-- <input type="file" name="img/" value=""> -->
    <button type="submit" class="btn btn-primary" name="Enregistrer">Enregistrer</button>
    <!-- <button type="button" value="Annuler" onclick="history.back()" class="btn btn-primary">Annuler</button> -->
    <button type='reset' class="btn btn-secondary">Annuler</button>
    <a href="admin.php"><button type="button" class="btn btn-primary">admin</button></a>
  </form>


</div>

<?php
//stocke en bdd les données saisies
if(isset($_POST['Enregistrer'])){

  if(!empty($_POST['titre']) && !empty($_POST['descriptif']) && !empty($_POST['actif'])) {
    try {
      $stmt = $conn->prepare('INSERT INTO projets(titre, descriptif, image, lien, actif) VALUES(:titre, :descriptif, :image, :lien, :actif)');
      var_dump($_FILES['image']['name']);

      $filename = $_FILES['image']['name'];
      $target_files = 'img/imgprojets/'. $filename;
      $file_extension = pathinfo($target_files, PATHINFO_EXTENSION);
      $file_extension = strtolower($file_extension);
      $valid_extension = array('png','jpg','jpeg','svg');  //extension possible

      if (in_array($file_extension, $valid_extension)) {    // si l'extension du fichier est dans le tableau
        if (move_uploaded_file($_FILES['image']['tmp_name'],$target_files)) {
          $stmt->execute(array(
          ':titre' => $_POST['titre'],
          ':descriptif' => $_POST['descriptif'],
          ':image' => $target_files,
          ':lien' => $_POST['lien'],
          ':actif' => $_POST['actif']
          ));
        }
      }
      header('Location:admin.php');

    } catch (\Exception $e) {
      echo $e->getMessage();
    }
  }
  else {
    echo "Compléter les champs !";
  }
}

?>

<?php
include "footeradmin.php";
?>
