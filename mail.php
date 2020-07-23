
<?php
// Le ou les destinataires
  // $to  = 'avermenot@codeur.online' . ',alexa.vermenot@orange.fr'; // notez la virgule pour ajouter un destinataire en plus
  // $to .= 'alexa.vermenot@orange.fr' ;

  // Le sujet du mail
  $subject = $_POST['subject'];

  // Le message a envoyer
  $message =
    '<html>
      <body>
        <p>'. $_POST['firstname'];'</p>
        <p>'. $_POST['name'];'</p>
        <p>'. $_POST['message'];'</p>
      </body>
    </html>'

  // Pour envoyer un mail en HTML, l'en-tête Content-type doit être défini comme ceci
  $headers = 'MIME-Version: 1.0'.'\r\n';
  $headers .= 'Content-type: text/html; charset=utf-8'.'\r\n';

  // En-têtes additionnels
  $headers .= 'To: avermenot@codeur.online ,alexa.vermenot@orange.fr'.'\r\n';
  $headers .= 'From:' . $_POST['email'] . '\r\n';

  // Envoi du mail avec un message HTML
  mail($to, $subject, $message, $headers);
?>
