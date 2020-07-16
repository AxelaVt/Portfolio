
<?php
include "header.php";

 ?>
 <div class="bl-content">
   <div class="container">
     <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
           <h2>Contact</h2>
         </div>
     </div>
     <div class="row contentForm">
         <div>
           <div>
             <p>Téléphone: 06 61 30 37 06</p>
             <p>Réseaux sociaux:</p>
             <div>
                 <a href="https://github.com/AxelaVt"><img src="images/icons/github.jpg"></a>
                 <a href="https://www.linkedin.com/in/avermenot/"><img src="images/icons/linkedin.jpg"></a>
             </div>
           </div>
           <div>
             <img class="avion" src="images/icons/avion.png">
           </div>

         </div>
         <div>
             <form id="contact-form" class="form" action="#" method="POST" role="form">
                 <div class="form-group">
                     <label class="form-label" for="name">Nom</label>
                     <input type="text" class="form-control" id="name" name="name" placeholder="Nom" tabindex="1" required>
                 </div>
                 <div class="form-group">
                     <label class="form-label" for="email">Email</label>
                     <input type="email" class="form-control" id="email" name="email" placeholder="Email" tabindex="2" required>
                 </div>
                 <div class="form-group">
                     <label class="form-label" for="subject">Sujet</label>
                     <input type="text" class="form-control" id="subject" name="subject" placeholder="Sujet" tabindex="3">
                 </div>
                 <div class="form-group">
                     <label class="form-label" for="message">Message</label>
                     <textarea rows="5" cols="50" name="message" class="form-control" id="message" placeholder="Message..." tabindex="4" required></textarea>
                 </div>
                 <div class="text-center">
                     <button type="submit" class="btn btn-start-order">Envoyer</button>
                 </div>
             </form>
         </div>
     </div>
   </div>
 </div>
 <img src="/bootstrap-icons-1.0.0-alpha5/x-circle-fill.svg" alt="" width="32" height="32" title="Bootstrap">

    <?php
    include "footer.php";

     ?>
