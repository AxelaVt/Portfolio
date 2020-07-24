<?php
include_once "header.php";

//recup les données
$id = $_GET['id'];

if (isset($_POST['submit'])){
//var_dump($_POST['titre']);

   if(empty($_POST['titre']) && empty($_POST['descriptif']) && empty($_POST['actif'])) {

    $error[] = 'veuillez renseigner tous les champs';

    }

    $titre=$_POST['titre'];
    $descriptif=$_POST['descriptif'];
    $image=$_POST['image'];
    $lien=$_POST['lien'];
    $actif=$_POST['actif'];


     if (!isset($error)){
      try {
        $id = $_GET['id'];

        $stmt = $conn->prepare("UPDATE projets SET titre = :titre, descriptif = :descriptif, image = :image, lien = :lien , actif = :actif WHERE id = $id");
        $stmt->execute(array(
        ':titre' => $titre,
        ':descriptif' => $descriptif,
        ':image' => $image,
        ':lien' => $lien,
        ':actif' => $actif
        ));


        //header('Location: admin.php');
      	//exit;
      }
      catch (\Exception $e) {
        echo $e->getMessage();
      }
     }
}
if (isset($error)) {
  foreach ($error as $error) {
    echo '<div style="color: red; font-weight: bold; text-align: center;">'.$error.'</div>';
  }
}

try {
  $sql = "SELECT * FROM projets WHERE id = $id";
  $stmt = $conn->prepare($sql);
  $executeIsOk = $stmt->execute();
  $data = $stmt->fetchAll();
  //var_dump($data);

  if ($executeIsOk == true)
   {
    echo "la requête select fonctionne";
    }
}
catch(PDOException $e) {
	echo $e->getMessage();
}

//affichage dans le formulaire

foreach ($data as $row) {
    // affichage
    // echo "</br>" . $data['id'];
    // echo "</br>" . $data['titre'];
    // echo "</br>" . $data['descriptif'];
    // echo "</br>" . $data['image'];
    // echo "</br>" . $data['lien'];
    // echo "</br>" . $data['actif'];
    // value.titre = $data['titre'];
    ?>
    <h2>Projet id: <?php echo $row['id']?></h2>
    <div class="container p-5 d-flex flex-column justify-content-center ">
       <form action="formprojetmodif.php?id=<?php echo $row['id']?>" method="post" class="w-80 p-5">
         <input type='hidden' name='id' value='<?php echo $row['id'];?>'>
           <div class="form-group">
           <label for="titre">Titre:</label>
           <input type="text" id="" class="form-control" name="titre" value="<?php echo  htmlspecialchars($row['titre']);?>">
           </div>
           <div class="form-group">
           <label for="descriptif">Description:</label>
           <textarea type="text" id="" class="form-control" rows="10" cols="50" name="descriptif"><?php echo htmlspecialchars($row['descriptif']);?></textarea>
           </div>
           <div class="form-group">
           <label for="image">Illustration</label>
           <input type="text" id="" class="form-control" name="image" value="<?php echo $row['image'];?>">
           </div>
           <div class="form-group">
           <label for="lien">Lien:</label>
           <textarea type="text" id="lien" class="form-control" rows="10" cols="50" name="lien"><?php echo htmlspecialchars($row['lien']);?></textarea>
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
        <button type="submit" class="btn btn-primary" name="submit">Enregistrer</button>
        <button type="button" value="Annuler" onclick="history.back()" class="btn btn-primary">Annuler</button>
        <button type='reset' class="btn btn-secondary">Annuler</button>
        <a href="admin.php"><button type="button" class="btn btn-primary">admin</button></a>
      </form>
    </div>
  <?php
}


include_once "footeradmin.php";
?>
