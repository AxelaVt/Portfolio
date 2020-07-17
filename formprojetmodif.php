
<?php
include "connection.php";
include "header.php";

//récup de données dans la base
$sql = "SELECT * FROM projets ORDER BY id DESC ";
$stmt = $conn->prepare($sql);
// execute la requête
$executeIsOk = $stmt->execute();

$data = $stmt->fetchAll();
 //var_dump($data);

if ($executeIsOk == true) {
  echo "la requête fonctionne";
}

?>

<div class="container">
  <h2>Projets</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>titre</th>
        <th>dsecriptif</th>
        <th>actif</th>
      </tr>
    </thead>
    <tbody class="h-60">
      <?php
      foreach ($data as $row) {
          // affichage
          // echo "</br>" . $row['id'];
          // echo "</br>" . $row['titre'];
          // echo "</br>" . $row['descriptif'];
          // echo "</br>" . $row['image'];
          // echo "</br>" . $row['lien'];
          // echo "</br>" . $row['actif'];
          ?>
      <tr>
        <td><?php echo $row['id']?></td>
        <td><?php echo $row['titre']?></td>
        <td><?php echo $row['descriptif']?></td>
        <td><?php echo $row['actif']?></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
  <div class="form-group text-center">
    <label for="id">projet sélectionné:</label>
    <select class="form-control" id="id" name="listprojet">
      <?php
      foreach ($data as $row) {
          // affichage
          // echo "</br>" . $row['id'];
          ?>
      <option><?php echo $row['id']?></option>
    <?php } ?>
    </select>
  </div>
</div>


<?php
include "footeradmin.php";
?>
