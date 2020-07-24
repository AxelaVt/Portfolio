
<?php
include "header.php";

$id = $_GET['id'];

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
      $sql = 'UPDATE about SET id = :id, titre = :titre, texte = :texte WHERE id = :id';
      $stmt = $conn->prepare($sql);
      $executeIsOk = $stmt->execute(array(
    					':titre' => $_POST['titre'],
    					':texte' => $_POST['comment'],
              ':id' => $id
      				));

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


foreach ($data as $row) {

?>

<div class="container h-80 justify-content-center align-items-center ">
  <form action="" method="post" class="h-80 p-5">
    <div class="form-group">
    <label for="titre">Titre:</label>
    <textarea type="text" id="" class="form-control" name="titre" value="<?php echo $row['titre'];?>"><?php echo $row['titre'];?></textarea>
    </div>
    <div class="form-group">
    <label for="comment">Texte:</label>
    <textarea type="text" id="" class="form-control" rows="10" cols="50" name="comment" value="<?php echo $row['texte'];?>"><?php echo $row['texte'];?></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Enregistrer</button>
    <!-- <button type="button" value="Annuler" onclick="history.back()" class="btn btn-primary">Annuler</button> -->
    <button type='reset' class="btn btn-secondary">Annuler</button>
    <a href="admin.php"><button type="button" class="btn btn-primary">admin</button></a>
  </form>
</div>
<?php
} ?>


<?php
include "footeradmin.php";
?>
