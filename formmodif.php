<?php
include "header.php";



$id = $_GET['id'];
$sql = "SELECT * FROM projets WHERE id = $id";
$stmt = $conn->prepare($sql);
// execute la requête
$executeIsOk = $stmt->execute();

$data = $stmt->fetchAll();
 //var_dump($data);

if ($executeIsOk == true) {
  echo "la requête fonctionne";
}

//affichage dans le formulaire
foreach ($data as $row) {
    // affichage
    // echo "</br>" . $row['id'];
    // echo "</br>" . $row['titre'];
    // echo "</br>" . $row['descriptif'];
    // echo "</br>" . $row['image'];
    // echo "</br>" . $row['lien'];
    // echo "</br>" . $row['actif'];
    // value.titre = $row['titre'];
    ?>
    <h2> Projet <?php echo $row['id']?></h2>
    <div class="container p-5 d-flex flex-column justify-content-center align-items-center">
       <form action="" method="post">  <!--enctype="multipart/form-data" -->
           <div class="form-group">
           <label for="titre">Titre:</label>
           <textarea type="text" id="editor3" class="form-control" name="titre" value=""><?php echo  htmlspecialchars($row['titre']);?></textarea>
           </div>
           <div class="form-group">
           <label for="descriptif">Description:</label>
           <textarea type="text" id="editor4" class="form-control" rows="10" cols="50" name="descriptif" value=""><?php echo $row['descriptif'];?></textarea>
           </div>
           <div class="form-group">
           <label for="image">Illustration</label>
           <textarea type="text" id="editor5" class="form-control" rows="10" cols="50" name="image" value=""><?php echo $row['image'];?></textarea>
           </div>
           <div class="form-group">
           <label for="lien">Lien:</label>
           <textarea type="text" id="lien" class="form-control" rows="10" cols="50" name="lien" value=""><?php echo $row['lien'];?></textarea>
           </div>
            <fieldset>
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
        <button type="submit" class="btn btn-primary" name="Enregistrer" value="Enregistrer">Enregistrer</button>
        <button type="button" value="Annuler" onclick="history.back()" class="btn btn-primary">Annuler</button>
      </form>
    </div>
  <?php
}


//update dans la bdd

if (!empty($_POST['Enregistrer']) && !empty($_POST['titre']) && !empty($_POST['descriptif']) && !empty($_POST['image']) && !empty($_POST['lien']) && !empty($_POST['actif'])) {
  var_dump($_POST['Enregistrer']);
  var_dump($_POST['titre']);
  var_dump($_POST['image']);
  var_dump($_POST['lien']);
  var_dump($_POST['actif']);

  try {
    $stmt = $conn->prepare('UPDATE projets SET(titre = :titre, descriptif = :descriptif, image = :image, lien = :lien , actif = :actif) WHERE id = $row["id"]');

    $executeIsOk = $stmt->execute(array(
    ':titre' => $_POST['titre'],
    ':descriptif' => $_POST['descriptif'],
    ':image' => $_POST['image'],
    ':lien' => $_POST['lien'],
    ':actif' => $_POST['actif']
    ));

    if ($executeIsOk == true) {
      echo "la requête update fonctionne";
    }

  } catch (\Exception $e) {
    echo $e->getMessage();
  }
}
// if (!empty($_POST)){
//   header('Location:admin.php');
// }


?>
</div>

<script>CKEDITOR.replace( 'editor3' );</script>
<script>CKEDITOR.replace( 'editor4' );</script>
<script>CKEDITOR.replace( 'editor5' );</script>

<?php
include "footeradmin.php";
?>
