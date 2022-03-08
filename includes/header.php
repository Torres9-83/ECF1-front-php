<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./assets/css/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <title>ECF DWWM</title>
</head>

<body>
  <header>
    <nav>
      <img class="logo" src="./assets/images/Logo-Afpa.png" alt="" />

      <form method="GET">
        <div class="row justify-content-start">
          <div class="col-4">
            <button class="btn btn-success" type="submit">Rechercher</button>
          </div>
          <br>
          <div class="col-8">
            <input type="search" name="search" class="form-control">
          </div>
        </div>
      </form>

      <ul>
        <li><a class="menu-style" href="index.html.php">Accueil</a></li>
        <li><a class="menu-style" href="publishArticle.php">Publier un article</a></li>
        <li><a class="menu-style" href="myArticles.php">Mes articles</a></li>
        <?php
        if (isset($_SESSION['auth'])) {
        ?>
          <li><a class="menu-style" href="profile.php?id=<?= $_SESSION['id']; ?>">Mon profil</a></li>
          <li><a class="menu-style" href="actions/users/logoutAction.php">Déconnexion</a></li>
        <?php
        }
        ?>
      </ul>
    </nav>
  </header>