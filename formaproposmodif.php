
<?php
include "header.php";

//recup les données en bdd
  $id = $_GET['id'];
  var_dump($id);
  $sql = "SELECT * FROM about WHERE id = $id";
  $stmt = $conn->prepare($sql);
  $executeIsOk = $stmt->execute();
  $data = $stmt->fetchAll();
  //var_dump($data);
  if($executeIsOk == true) {
    echo "la requete fonctionne";
  }

//enregistre les  modifs en bdd
if(isset($_POST['submit'])){

  if (empty($_POST['titre'])){
    $error[] = "veuillez remplir le champs titre";
  }
  if (empty($_POST['comment'])){
    $error[] = "veuillez remplir le champs texte";
  }

  if (!isset($error)){
    try {
      $sql = 'UPDATE about SET titre = :titre, texte = :texte WHERE id = :id';
      $stmt = $conn->prepare($sql);
      $executeIsOk = $stmt->execute(array(
    					':titre' => $_POST['titre'],
    					':texte' => $_POST['comment'],
              ':id' => $id
      				));
      //var_dump($executeIsOk);
      $stmt = $conn->prepare('INSERT INTO about (id, titre, texte) VALUES (:id, :titre, :comment)');
      $data = $stmt->fetchAll();
      //var_dump($data);

      if ($executeIsOk == true) {
      echo "la requête fonctionne";
      }
      header('Location:admin.php');
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

foreach ($data as $row) {

?>

<div class="container m-2 mx-0 ">
  <form action="" method="post">
    <div class="form-group">
    <label for="titre">Titre:</label>
    <textarea type="text" id="editor1" class="form-control" name="titre" value="<?php echo $row['titre'];?>"><?php echo $row['titre'];?></textarea>
    </div>
    <div class="form-group">
    <label for="comment">Texte:</label>
    <textarea type="text" id="editor2" class="form-control" rows="10" cols="50" name="comment" value="<?php echo $row['texte'];?>"><?php echo $row['texte'];?></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Enregistrer</button>
    <button type="button" value="Annuler" onclick="history.back()" class="btn btn-primary">Annuler</button>
    <!-- <button type='reset' class="btn btn-secondary">Annuler</button> -->
  </form>
</div>
<?php
} ?>
<script>CKEDITOR.replace( 'editor1' );</script>
<script>CKEDITOR.replace( 'editor2' );</script>

<?php
include "footeradmin.php";
?>
