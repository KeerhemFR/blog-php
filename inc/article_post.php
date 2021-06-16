<?php
include "db.php";
if(isset($_POST["envoi"])){
  $pseudo = htmlspecialchars($_POST["pseudo"]);
  $commentaire = htmlspecialchars($_POST["commentaire"]);
  $id_article = htmlspecialchars($_POST["id_article"]);
  $req = $bdd->prepare("INSERT INTO commentaires(id_article, auteur, commentaire, date_com) VALUES (:id_article, :auteur, :commentaire, NOW())");
  $req->execute(array(
    'id_article' => $id_article,
    'auteur' => $pseudo,
    'commentaire' => $commentaire,
  ));
  header('location:../article.php?article=' . $id_article);
}else{
  echo "Huston, nous avons une problème";
}
 ?>
