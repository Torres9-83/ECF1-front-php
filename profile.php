<?php
require('actions/users/securityAction.php');
require('actions/users/showUsersProfileAction.php');

include 'includes/header.php';

?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<section>
    <div class="container">
        <?php
        if (isset($errorMsg)) {
            echo $errorMsg;
        }

        if (isset($getHisArticles)) {
        ?>
            <div class="card-body">
                <h4>@<?= $user_pseudo; ?></h4>
            </div>
            <br>
            <?php
            while ($article = $getHisArticles->fetch()) {
            ?>
                <div class="card">
                    <div class="card-header">
                        <?= $article['titre']; ?>
                    </div>
                    <div class="card-body">
                        <?= $article['description']; ?>
                    </div>
                    <div class="card-footer">
                        <?= $article['pseudo_auteur']; ?> le <?= $article['date_publication']; ?>
                    </div>
                </div>
                <br>
        <?php
            }
        }

        ?>
    </div>
</section>


<?php include 'includes/footer.php'; ?>