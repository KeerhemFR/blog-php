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
            <h2 class="text-white col-12 align-self-start">Suppression d'article</h2>
          </div>
        </div>
      </div>
    </header>
    <!-- __________ -->
    <main>
      <?php
      $sql = "SELECT * FROM articles WHERE id = :id LIMIT 1" ;
      $req = $bdd->prepare($sql);
      $req -> execute(array(
        'id' => $_GET["article"],
      ));
      $donnees = $req->fetch();
      ?>
      <div class="container">
        <div class="row">
          <div class="col-12 text-center text-warning my-3">
            <h3>Êtes vous sûr(e) de vouloir supprimer l'article "<?php echo $donnees["titre"] ?>" ?</h3>
          </div>
          <div class="col-3"></div>
          <div class="col-3 text-center">
            <form class="form-group" action="../inc/admin-suppr.php" method="post">
              <input class="btn btn-danger py-1 px-5" type="submit" name="oui" value="Oui">
              <input type="hidden" name="id_article" value="<?php echo $_GET["article"] ?>">
            </form>
          </div>
          <div class="col-3 text-center">
            <form class="form-group" action="article.php?article=<?php echo $_GET["article"] ?>" method="post">
              <input class="btn btn-success py-1 px-5" type="submit" name="non" value="Non">
            </form>
          </div>
          <div class="col-3"></div>
        </div>
      </div>
    </main>
    <!-- __________ -->
    <footer>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </footer>
  </body>
</html>
