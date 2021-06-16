<?php
include "db.php";

$titre = valid_donnees($_POST["titre"]);
$subtitle = valid_donnees($_POST["subtitle"]);
$auteur = valid_donnees($_POST["auteur"]);
$contenu = valid_donnees($_POST["contenu"]);
$image = valid_donnees($_POST["image"]);

function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}

$regex = '/[[:alpha:]]/';
/*Si les champs prenom et mail ne sont pas vides et si les donnees ont
 *bien la forme attendue...*/
if (!empty($titre)
    // && strlen($titre) <= 5
    && preg_match($regex,$auteur)
    && !empty($contenu)
    && !empty($image)
  ) {
      try{
        $titre = htmlspecialchars($_POST["titre"]);
        $subtitle = htmlspecialchars($_POST["subtitle"]);
        $auteur = htmlspecialchars($_POST["auteur"]);
        $contenu = htmlspecialchars($_POST["contenu"]);
        $image = htmlspecialchars($_POST["image"]);
        $req = $bdd -> prepare('INSERT INTO articles(titre, subtitle, auteur, contenu, image, date_parution) VALUES (:titre, :subtitle, :auteur, :contenu, :image, NOW())');
        $req->execute(array(
          'titre'  => $titre,
          'subtitle' => $subtitle,
          'auteur' => $auteur,
          'contenu' => $contenu,
          'image' => $image,
        ));
        header("location:../admin/index.php");
      }catch(PDOException $e){
        echo "Erreur: " .$e->getMessage();
      }
    }else{
      header("location:../admin/ajouter.php");
      echo "Un problème est survenu, le formulaire n'a pas pu être envoyé.";
    }
 ?>
