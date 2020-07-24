
<?php

// Le ou les destinataires
  //$to  = 'a.vermenot@codeur.online'; // notez la virgule pour ajouter un destinataire en plus

  // Le sujet du mail
  $subject = $_POST['subject'];

  //Le message à envoyer
  $message = '<html><p>'. $_POST['firstname'].'</p>
              <p>'. $_POST['name'].'</p>
              <p>'. $_POST['message'].'</p></htmh>';

  // Pour envoyer un mail en HTML, l'en-tête Content-type doit être défini comme ceci
  $headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'From:'. $_POST['email'] . "\r\n" .
		'Content-Type: text/plain; charset="utf-8"; '."\r\n" .
		'X-Mailer:PHP/'.phpversion();

  // Envoi du mail avec un message HTML
  // $retour = mail('$to, $subject, $message, $headers);
  if (!mail('a.vermenot@codeur.online', $_POST['subject'], $_POST['firstname']. $_POST['name'].$_POST['message'] , $headers)){

    header('Location:contact.php');

  } else{

    header('Location:contact.php?message=ok');

  }

?>
