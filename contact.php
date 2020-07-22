
<?php
include "header.php";

if(isset($_POST['submit'])){

  if (empty($_POST['name'])) {
    $error[] = "veuillez remplir le champs nom";
  }
  if (empty($_POST['firstname'])) {
    $error[] = "veuillez remplir le champs prénom";
  }
  if (empty($_POST['email'])) {
    $error[] = "veuillez remplir le champs email";
  }
  if (empty($_POST['subjet'])) {
    $error[] = "veuillez remplir le champs sujet";
  }
  if (empty($_POST['message'])) {
    $error[] = "veuillez remplir le champs message";
  }

  //stocke en bdd les données saisies
  if (!isset($error)){
    try {
      $stmt = $conn->prepare('INSERT INTO contacts (id, name, firstname, email) VALUES (:id, :name, :firstname, :email)');
      $executeIsOk = $stmt->execute(array(
        ':id' => $_POST['id'],
        ':name' => $_POST['name'],
        ':firstname' => $_POST['firstname'],
        ':email' => $_POST['email']
      ));
      if ($executeIsOk == true) {
      echo "la requête fonctionne";
      }

      $stmt2 = $conn->prepare('INSERT INTO messages (id, name, subject, message) VALUES (:id, :name, :subject, :message)');
      $executeIsOk = $stmt->execute(array(
        ':id' => $_POST['id'],
        ':name' => $_POST['name'],
        ':subject' => $_POST['subject'],
        ':message' => $_POST['message']
      ));
      if ($executeIsOk == true) {
      echo "la requête fonctionne";
      }

      header('Location:contact.php');
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

?>
 <div class="container-fluid h-100">
   <input style="display:none" onClick="window.close()"/><a href="portefolio.php"><img class="float-sm-right p-1" src="bootstrap-icons/x-circle-fill.svg" alt="close" width="32" height="32" title="Bootstrap"></a>
   <div class="row h-5">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
    <h2 class="p-0">Contact</h2>
    </div>
   </div>
   <div class="d-flex flex-column align-items-center">
       <div class="d-flex flex-column align-items-start ">
         <p>Téléphone: 06 61 30 37 06</p>
         <div class="d-flex flex-row align-items-center">
          <p>Réseaux sociaux:</p>
          <div class="d-flex flex-row p-2">
             <a href="https://github.com/AxelaVt"><img src="img/github.png" width="40" height="40" class="m-2"></a>
             <a href="https://www.linkedin.com/in/avermenot/"><img src="img/linkedin.svg" width="50" height="50" class="m-2 pb-2"></a>
          </div>
         </div>
       </div>
       <div class="container p-0 m-0">
         <form  class="h-60 p-2" id="contact-form" action="#" method="POST">
             <div class="form-group">
                 <label class="form-label" for="name">Nom</label>
                 <input type="text" class="form-control" id="name" name="name" placeholder="Nom" required>
             </div>
             <div class="form-group">
                 <label class="form-label" for="name">Prénom</label>
                 <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Prénom" required>
             </div>
             <div class="form-group">
                 <label class="form-label" for="email">Email</label>
                 <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
             </div>
             <div class="form-group">
                 <label class="form-label" for="subject">Sujet</label>
                 <input type="text" class="form-control" id="subject" name="subject" placeholder="Sujet">
             </div>
             <div class="form-group">
                 <label class="form-label" for="message">Message</label>
                 <textarea rows="5" cols="30" name="message" class="form-control" id="message" placeholder="Message..." required></textarea>
             </div>
             <div class="text-center">
                 <button type="submit" class="btn btn-outline-secondary" value="envoyer" name="envoyer">Envoyer</button>
              </div>
         </form>
       </div>
   </div>
</div>
<?php
include "footer.php";
 ?>
