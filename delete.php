

<?php
$id = $_GET['id'];
include 'header.php';


$del = "DELETE FROM projets WHERE id = $id";
 $stmt = $conn->prepare($del);
 $executeIsOk = $stmt->execute();
 echo "Record deleted successfully";
header('Location: admin.php');
exit;
?>
