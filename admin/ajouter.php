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
            <h2 class="text-white col-12 align-self-start">Ajout d'article</h2>
          </div>
        </div>
      </div>
    </header>

    <main>
      <div class="container">
        <div class="row">
          <div class="">
            <form class="form-group" action="../inc/admin-add.php" method="post">
              <input class="form-control my-2" type="text" name="titre" value="" placeholder="Titre">
              <input class="form-control my-2" type="text" name="subtitle" value="" placeholder="Sous-titre">
              <input class="form-control my-2" type="text" name="auteur" value="" placeholder="Auteur">
              <textarea class="form-control my-2" name="contenu" rows="8" cols="80" placeholder="Contenu de votre article"></textarea>
              <input class="form-control my-2" type="text" name="image" value="" placeholder="Nom de l'image (l'image doit être dans le dossier img)">
              <input class="btn btn-warning" type="submit" name="envoi" value="Envoyer">
            </form>
          </div>
        </div>
      </div>
    </main>

    <footer>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </footer>
  </body>
</html>
