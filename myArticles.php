<?php
require('actions/users/securityAction.php');
require('actions/Articles/myArticleAction.php');

include 'includes/header.php';

?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <section>
        <div class="container">
            <?php

            while ($article = $getAllMyArticles->fetch()) {
            ?>
                <br>
                <div class="card">
                    <h5 class="card-header">
                        <a href="article.php?id=<?php echo $article['id']; ?>">
                            <?php echo $article['titre']; ?>
                        </a>
                    </h5>
                    <div class="card-body">
                        <p class="card-text">
                            <?= $article['description']; ?>
                        </p>
                        <a href="article.php?id=<?= $article['id']; ?>" class="btn btn-primary">Accéder à l'article</a>
                        <a href="editArticle.php?id=<?= $article['id']; ?>" class="btn btn-warning">Modifier l'article</a>
                        <a href="actions/Articles/deleteArticleAction.php?id=<?= $article['id']; ?>" class="btn btn-danger">Supprimer l'article</a>
                    </div>
                </div>
                <br>
            <?php
            }

            ?>
        </div>
    </section>


    <?php include 'includes/footer.php'; ?>


</body>