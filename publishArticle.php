<?php

require('actions/users/securityAction.php');
require('actions/Articles/publishArticleAction.php');

include 'includes/header.php'; ?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<br>
<form class="container" method="POST">

    <?php
    if (isset($errorMsg)) {
        echo '<p>' . $errorMsg . '</p>';
    } elseif (isset($successMsg)) {
        echo '<p>' . $successMsg . '</p>';
    }
    ?>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Titre</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Description</label>
        <textarea class="form-control" name="description"></textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-primary" name="validate">Publier</button>
</form>
<br>

<?php

include 'includes/footer.php';

?>