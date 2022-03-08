<?php
require('actions/users/securityAction.php');
require('actions/Articles/showArticleContentAction.php');

include 'includes/header.php';

?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <?php
        if (isset($errorMsg)) {
            echo $errorMsg;
        }

        if (isset($article_publication_date)) {
        ?>
            <h3><?= $article_title; ?></h3>
            <hr>
            <p><?= $article_description; ?></p>
            <small><?= $article_pseudo_author . ' ' . $article_publication_date; ?></small>
        <?php
        }

        ?>
    </div>
    <?php include 'includes/footer.php'; ?>

</body>