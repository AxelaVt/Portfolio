<?php
session_start();
include_once ('connection.php');

if(isset($_POST['username']) && isset($_POST['password'])){
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    var_dump($username);
    var_dump($password);

    if($username !== "" && $password !== ""){
          try {
            //$stmt = $conn->query("SELECT COUNT(*) FROM users where username = $username and password = $password ");
            $stmt = $conn->query("SELECT count(*) FROM users where
              username = '".$username."' and password = '".$password."' ");
            $executeIsOk = $stmt->execute();
            $reponse = $stmt->fetchAll();
            echo "stmt";
            var_dump($stmt);
            echo "reponse";
            var_dump($reponse);

            if ($executeIsOk == true) {
            echo "la requête fonctionne";
            }

            $count = $reponse[0]['count(*)'];
            echo "count";
            var_dump($count);
            if($count!=0) // nom d'utilisateur et mot de passe correctes
            {
               $_SESSION['username'] = $username;
               header('Location: admin.php');
            }
            else
            {
               header('Location: identification.php?erreur=1'); // utilisateur ou mot de passe incorrect
            }
          }
          catch (\Exception $e) {
            echo $e->getMessage();
          }
      }
      else
      {
         header('Location: identification.php?erreur=2'); // utilisateur ou mot de passe vide
      }
    }
    else
    {
       header('Location: identification.php');
    }

?>
