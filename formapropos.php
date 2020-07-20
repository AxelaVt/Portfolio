
<?php
include "header.php";


//stocke en bdd les données saisies
  if (!empty($_POST['submit']) && !empty($_POST['titre']) && !empty($_POST['comment'])) {
    try {
      $stmt = $conn->prepare('INSERT INTO about (titre, texte) VALUES (:titre, :texte)');
      $stmt->execute(array(
        ':titre' => $_POST['titre'],
        ':texte' => $_POST['comment']
      ));

      header('Location:apropos.php');
      exit;

    } catch (\Exception $e) {
      echo $e->getMessage();
    }
  }
  else {
    echo "Compléter les 2 champs !";
  }

// if (!empty($_POST['submit'])) {
//   if (empty($_POST['titre'])) {
//     $error[] = "veuillez remplir le champs titre";
//   }
//   if (empty($_POST['comment'])) {
//     $error[] = "veuillez remplir le champs texte";
//   }
// }
//   //stocke en bdd les données saisies
//   //if (!empty($_POST['titre']) && !empty($_POST['comment']))
//   if (!isset($error)){
//     try {
//       $stmt = $conn->prepare('INSERT INTO about (titre, texte) VALUES (:titre, :texte)');
//       $stmt->execute(array(
//         ':titre' => $_POST['titre'],
//         ':texte' => $_POST['comment']
//       ));
//
//       header('Location:apropos.php');
//       exit;
//
//     } catch (\Exception $e) {
//       echo $e->getMessage();
//     }
//   }
//   if (isset($error)) {
//     foreach ($error as $error) {
//       echo '<div style="color: red; font-weight: bold; text-align: center;">'.$error.'</div>';
//     }
//   }
//?>

?>

<div class="container m-2 mx-0 ">
  <form action="" method="post">
    <div class="form-group">
    <label for="titre">Titre:</label>
    <textarea type="text" id="editor1" class="form-control" name="titre"></textarea>
    </div>
    <div class="form-group">
    <label for="comment">Texte:</label>
    <textarea type="text" id="editor2" class="form-control" rows="10" cols="50" name="comment"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <button type="button" value="Annuler" onclick="history.back()" class="btn btn-primary">Annuler</button>
  </form>
</div>

<script>CKEDITOR.replace( 'editor1' );</script>
<script>CKEDITOR.replace( 'editor2' );</script>

<?php
include "footeradmin.php";
?>
