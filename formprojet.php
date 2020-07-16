
 <!-- && !empty($_POST['image']) && !empty($_POST['lien']) -->
<?php
include "connection.php";
include "header.php";

?>
<div class="container m-2 mx-0 ">
   <form action="" method="post" >  <!--enctype="multipart/form-data" -->
       <div class="form-group">
       <label for="titre">Titre:</label>
       <textarea type="text" id="editor3" class="form-control" placeholder="Entrer le titre" name="titre"></textarea>
       </div>
       <div class="form-group">
       <label for="descriptif">Description:</label>
       <textarea type="text" id="editor4" class="form-control" rows="10" cols="50" name="descriptif"></textarea>
       </div>
       <div class="form-group">
       <label for="image">Illustration</label>
       <textarea type="text" id="editor5" class="form-control" rows="10" cols="50" name="image"></textarea>
       </div>
       <div class="form-group">
       <label for="lien">Lien:</label>
       <textarea type="text" id="lien" class="form-control" rows="10" cols="50" name="lien"></textarea>
       </div>
    <!-- <input type="file" name="img/" value=""> -->
    <button type="submit" class="btn btn-primary" name="Envoyer">Enregistrer</button>
    <button type="button" value="Annuler" onclick="history.back()" class="btn btn-primary">Annuler</button>
  </form>
</div>

<?php
//stocke en bdd les données saisies
if (!empty($_POST['titre']) && !empty($_POST['descriptif']) && !empty($_POST['image']) && !empty($_POST['lien'])) {
  try {
    $stmt = $conn->prepare('INSERT INTO projets(titre_projet,descriptif_projet,img_projet,lien_projet) VALUES (:titre,:descriptif,:image,:lien)');
    $executeIsOk = $stmt->execute(array(
      ':titre_projet' => $_POST['titre'],
      ':descriptif_projet' => $_POST['descriptif'],
      ':img_projet' => $_POST['image'],
      ':lien_projet' => $_POST['lien']
    ));

    if ($executeIsOk == true) {
      echo "la requête fonctionne";
    }

  } catch (\Exception $e) {
    echo $e->getMessage();
  }
}
else {
  echo "Compléter les champs !";
}

// if (!empty($_POST)){
//   header('Location:projets.php');
// }
?>
<script>CKEDITOR.replace( 'editor3' );</script>
<script>CKEDITOR.replace( 'editor4' );</script>
<script>CKEDITOR.replace( 'editor5' );</script>
<?php
include "footeradmin.php";
?>
