<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>J-Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
  </head>

  <body>
    <?php include "../inc/nav.php" ?>
    <header>
      <?php include "../inc/db.php" ?>
      <div class="container-fluid">
        <div class="row">
          <div id="blog-header" class="d-flex justify-content-center align-items-center" style="background-image:linear-gradient(rgba(0,0,0,0.4), rgba(0, 0, 0, 0.4)),url('../img/temple-bg.jpg')">
            <h1 class="display-1 text-white">J-Blog</h1>
          </div>
        </div>
      </div>
    </header>

    <main>
      <?php
      $nb_article_page = 3;
      $requete = $bdd->query('SELECT COUNT(*) AS nb_articles FROM articles');
      $donnees = $requete->fetch();
      $nb_pages = ceil($donnees["nb_articles"] / $nb_article_page);

      if(isset($_GET["page"]) AND $_GET["page"] > 0){
        $page = $_GET["page"];
      }else{
        $page = 1;
      }
      ?>
      <!-- requete creation carte articles -->
      <?php $req = $bdd->query('SELECT id, titre, subtitle, auteur, contenu, image, DATE_FORMAT(date_parution, \'%d/%m/%Y\') AS date_parution_fr FROM articles ORDER BY date_parution LIMIT ' . ($page-1) * $nb_article_page . ',' . $nb_article_page); ?>
      <div class="container">
        <div class="row">
            <?php
              while ($donnees = $req->fetch()){
            ?>
            <div class="col-4 p-3">
              <div class="card" >
                <img class="card-img-top" src="../img/<?php echo $donnees["image"]; ?>" alt="Card image cap">
                <div class="card-body">
                  <h4 class="card-title"><?php echo htmlspecialchars($donnees["titre"]); ?></h4>
                  <h5 class="card-text"><?php echo htmlspecialchars($donnees["subtitle"]); ?></h5>
                  <p>Ecrit par <?php echo $donnees["auteur"] . " le " . $donnees["date_parution_fr"] ?></p>
                  <a href="article.php?article=<?php echo $donnees["id"];?>" class="btn btn-warning">Here we go</a>
                </div>
              </div>
            </div>

            <?php
              }
              $req->closeCursor();
            ?>
        </div>
      </div>

      <nav>
        <ul class="pagination justify-content-center pagination-lg">
          <?php for($page = 1; $page <= $nb_pages; $page++){ ?>
          <li class="page-item">
            <?php
            echo '<a class="page-link" href="index.php?page=' . $page .'" > ' . $page . '</a>';
             ?>
          </li>
        <?php } ?>
        </ul>
      </nav>
      <div class="container">
        <div class="row">
          <div class="col-10">

          </div>
          <div class="col-2">
            <a href="ajouter.php" class="btn btn-success btn-sm">Ajouter un article</a>
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
