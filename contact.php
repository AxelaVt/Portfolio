
<?php
include "header.php";

if(isset($_POST['submit'])){
  if (empty(htmlspecialchars($_POST['name']))) {
    $error[] = "veuillez remplir le champs nom";
    $string_exp = "/^[A-Za-z0-9 .'-]+$/";
    if(!preg_match($string_exp,(htmlspecialchars($_POST['name'])))) {
      $error = "Le nom renseigné ne semble pas valide";
    }
  }
  if (empty(htmlspecialchars($_POST['firstname']))) {
    $error[] = "veuillez remplir le champs prénom";
    $string_exp = "/^[A-Za-z0-9 .'-]+$/";
    if(!preg_match($string_exp,(htmlspecialchars($_POST['firstname'])))) {
      $error = "Le prénom renseigné ne semble pas valide";
    }
  }
  if (empty(htmlspecialchars($_POST['email']))) {
    $error[] = "veuillez remplir le champs email";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
     if(!preg_match($email_exp,$_POST['email'])) {
      $error[] = "adresse e-mail non valide.";
    }
  }
  if (empty(htmlspecialchars($_POST['subjet']))) {
    $error[] = "veuillez remplir le champs sujet";
  }
  if (empty(htmlspecialchars($_POST['message']))) {
    $error[] = "veuillez remplir le champs message";
  }

}
if (isset($error)) {
  foreach ($error as $error) {
    echo 'Certains champs semblent comporter des erreurs, merci de corriger:';
    echo '<div style="color: red; font-weight: bold; text-align: center;">'.$error.'</div>';
  }
}

if (isset ($_GET['message'])) {
echo "message envoyé";
}else{
echo "message non envoyé";
}

?>

 <div class="container-fluid h-100">
   <input style="display:none" onClick="window.close()"/><a href="menu.php"><img class="float-sm-right p-1" src="bootstrap-icons/x-circle-fill.svg" alt="close" width="32" height="32" title="Bootstrap"></a>
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
         <form  class="h-60 p-2" id="contact-form" action="mail.php" method="POST">
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
