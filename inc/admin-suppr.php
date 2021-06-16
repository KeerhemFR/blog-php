<?php
include "db.php";
$sql = "DELETE FROM articles WHERE id = :id LIMIT 1";
$req = $bdd->prepare($sql);
$req -> execute(array(
    'id' => $_POST["id_article"],
));
  header("location:../admin/index.php");
 ?>
