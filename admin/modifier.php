<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>J-Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <header>
      <?php include "../inc/db.php" ?>
      <div class="container-fluid">
        <div class="row">
          <div id="blog-header" class="d-flex flex-wrap text-center justify-content-center" style="background-image:linear-gradient(rgba(0,0,0,0.4), rgba(0, 0, 0, 0.4)),url('../img/temple-bg.jpg')">
            <h1 class="display-1 text-white col-12 align-self-end">J-Blog</h1>
            <h2 class="text-white col-12 align-self-start">Modification d'article</h2>
          </div>
        </div>
      </div>
    </header>
    <main>

      <?php
      include "../inc/db.php";

      $sql = "SELECT * FROM articles WHERE id = :id LIMIT 1";
      $req = $bdd->prepare($sql);
      $req->execute(array(
        'id'=> $_GET["article"],
      ));
      $donnees = $req->fetch();
       ?>
      <div class="container">
       <div class="row">
         <div class="">
          <form class="form-group" action="../inc/admin-modify.php" method="post">
            <input class="form-control my-2" type="text" name="titre" value="<?php echo $donnees["titre"] ?>" placeholder="Titre">
            <input class="form-control my-2" type="text" name="subtitle" value="<?php echo $donnees["subtitle"] ?>" placeholder="Sous-titre">
            <input class="form-control my-2" type="text" name="auteur" value="<?php echo $donnees["auteur"] ?>" placeholder="Auteur">
            <textarea class="form-control my-2" name="contenu" rows="8" cols="80" placeholder="Contenu de votre article"><?php echo $donnees["contenu"] ?></textarea>
            <input class="form-control my-2" type="text" name="image" value="<?php echo $donnees["image"] ?>" placeholder="Nom de l'image (l'image doit être dans le dossier img)">
            <input class="btn btn-warning" type="submit" name="modifier" value="Modifier">
            <input type="hidden" name="id_article" value="<?php echo $_GET['article']; ?>">
          </form>
        </div>
       </div>
      </div>
    </main>
  </body>
</html>
