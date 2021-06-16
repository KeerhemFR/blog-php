<?php include "../inc/db.php"; ?>
<?php $req = $bdd->prepare('SELECT id, titre, subtitle, auteur, contenu, image, DATE_FORMAT(date_parution, \'%d/%m/%Y\') AS date_parution_fr FROM articles WHERE id = ?'); ?>
<?php $req->execute(array($_GET["article"])); ?>
<?php $donnees = $req->fetch(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>J-Blog / <?php echo $donnees["titre"]; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
  </head>

  <?php if(!isset($donnees['id'])){
    echo "Article Inconnu";
  }else{ ?>
  <body>
    <?php include "../inc/db.php" ?>
    <header>
      <div class="container-fluid">
        <div class="row">
          <div id="blog-header" class="d-flex flex-wrap text-center justify-content-center" style="background-image:linear-gradient(rgba(0,0,0,0.4), rgba(0, 0, 0, 0.4)),url('../img/<?php echo $donnees['image']; ?>')">
            <h1 class="display-2 col-12 text-white align-self-end"><?php echo $donnees["titre"]; ?></h1>
            <h2 class="light-font col-12 text-white align-self-start"><?php echo $donnees["subtitle"]; ?></h2>
          </div>
        </div>
      </div>
    </header>
    <?php $contenu = nl2br($donnees["contenu"]); ?>
    <main>
      <div class="container">
        <div class="row">
          <div class="py-3">
            <h3 class="italic-font">Article écrit le <?php echo $donnees["date_parution_fr"]; ?></h3>
            <h4 class="italic-font bold-font">Par <?php echo $donnees["auteur"]; ?></h4>
            <br>
            <p><?php echo $contenu; ?></p>
          </div>
        </div>
      </div>
      <?php echo $req->closeCursor(); ?>
      <!-- chatbox -->
      <div class="container">
        <div class="row">
          <div class="py-3 col-8">
            <?php $req = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_com, \'%d/%m/%Y à %H:%i\') AS date_com_fr FROM commentaires WHERE id_article = ? ORDER BY date_com DESC') ?>
            <?php $req->execute(array($_GET["article"])); ?>
            <?php while ($donnees = $req->fetch()){ ?>
            <div class="border border-info bg-info rounded my-2 px-2 py-1">
              <p class="text-white"><?php echo "<span class='bold-font'>" . $donnees["auteur"] . " (" . $donnees["date_com_fr"] . ") : " . "</span>" . $donnees["commentaire"]; ?></p>
            </div>
            <?php }
            $req->closeCursor();
             ?>
          </div>
          <div class="py-3 col-4">
            <form class="from-group" action="../inc/article_post.php" method="post">
              <input type="text" name="pseudo" value="" class="form-control my-2" placeholder="Pseudo">
              <input type="text" name="commentaire" value="" class="form-control my-2" placeholder="Entrez votre message">
              <input type="submit" name="envoi" value="Envoyer" class="btn-warning my-2 btn col">
              <input type="hidden" name="id_article" value="<?php echo $_GET['article']; ?>">
            </form>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-8">

          </div>
          <div class="col-4">
            <a href="ajouter.php" class="btn btn-success btn-sm">Ajouter un article</a>
            <a href="modifier.php?article=<?php echo $_GET["article"]; ?>" class="btn btn-info btn-sm text-white">Modifier l'article</a>
            <a href="supprimer.php?article=<?php echo $_GET["article"]; ?>" class="btn btn-danger btn-sm">Supprimer l'article</a>
          </div>
        </div>
      </div>
    </main>
    <?php } ?>
    <footer>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </footer>
  </body>

</html>
