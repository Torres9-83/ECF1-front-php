<?php
require('actions/users/securityAction.php');
require('actions/Articles/getInfosOfEditArticleAction.php');
require('actions/Articles/editArticleAction.php');


include 'includes/header.php'; ?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">

        <?php
        if (isset($errorMsg)) {
            echo '<p>' . $errorMsg . '</p>';
        } ?>

        <?php
        if (isset($article_description)) {
        ?>
            <form method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Titre</label>
                    <input type="text" class="form-control" name="title" value="<?= $article_title; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Description</label>
                    <textarea class="form-control" name="description"><?= $article_description; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="validate">Modifier l'article</button>
            </form>
        <?php

        }
        ?>

    </div>

    <?php include 'includes/footer.php'; ?>


</body>