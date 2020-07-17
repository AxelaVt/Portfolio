
<?php
include "header.php";
include "connection.php";
 ?>

<?php
//récup de données dans la base
$sql = "SELECT id, titre, image FROM projets ORDER BY id";
$stmt = $conn->prepare($sql);
// execute la requête
$executeIsOk = $stmt->execute();

$data = $stmt->fetchAll();
 //var_dump($data);
 //print_r($data);
if ($executeIsOk == true) {
  echo "la requête fonctionne";
}
?>
<div class="container-fluid projets">
  <input style="display:none" onClick="window.close()"/><a href="portefolio.php"><img class="float-sm-right p-1" src="bootstrap-icons/x-circle-fill.svg" alt="close" width="32" height="32" title="Bootstrap"></a>
  <h2>Projets</h2>
  <div class="card-deck h-40 m-4">
    <!-- <div class="card h-60"> -->
<?php
foreach ($data as $row) {
    // affichage
    //echo "</br>" . $row['id'];
    // echo "</br>" . $row['titre'];
    // echo "</br>" . $row['image'];
    // echo "</br>" . substr($row['image'],20);

    // recup de la valeur de src
    $str = $row['image'];
    $tag = 'img';
    $att = 'src';
    if (preg_match_all('/<'.$tag.'[^>]*>/', $str, $m)) {
        $result = array();
        foreach($m[0] as $balise) {
          $buffer = array();
          $reg = sprintf('/(%s) \s* = \s* (["\']?) ([^">\s]*) \2/ix', $att);
          if (preg_match_all($reg, $balise, $n)) {
              foreach($n[0] as $key=>$value) {
                $buffer[ $n[1][$key] ] = $n[3][$key];
                ?>
                <div class="card w-50 h-100 p-4">
                  <img class="card-img-top" src="<?php echo $buffer['src'] ?>" alt="Card image">
                  <div class="card-img-overlay">
                    <h4 class="card-title text-center pt-5"><?php echo $row['titre']?></h4>
                    <p class="card-text text-center"></p>
                    <a href="projet.php?id=<?php echo $row['id'] ?>" class="stretched-link"></a>

                  </div>
                </div>
                <?php
              }
          }
          $result[$tag][] = $buffer;
          
        }
    }
  }
?>
  </div>
</div>

    <?php

    include "footer.php";

     ?>
