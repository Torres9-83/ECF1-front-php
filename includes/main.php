<main>
  <section>
    <br>
    <?php
    while ($article = $getAllArticles->fetch()) {
    ?>
      <div class="container">
        <div class="card color">
          <div class="card-header">
            <a href="article.php?id=<?php echo $article['id']; ?>" class="hover">
              <?php echo $article['titre']; ?>
            </a>
          </div>
          <div class="card-body">
            <?php echo $article['description']; ?>
          </div>
          <div class="card-footer">
            Publié par <a href="profile.php?id=<?= $article['id_auteur']; ?>"></a> <?php echo $article['pseudo_auteur']; ?> le <?php echo $article['date_publication']; ?>
          </div>
        </div>
      </div>

      <br>
    <?php
    }
    ?>
  </section>

  <aside>
    <div class="best-articles">
      <h3>Articles du moment</h3>
      <div class="liens-articles">
        <a class="liens" href="#">Article x</a>
        <a class="liens" href="#">Article y</a>
        <a class="liens" href="#">Article z</a>
      </div>
      <form>
        <button type="submit" class="btn btn-primary secret" name="validate">
          Article secret !
        </button>
      </form>
    </div>
    <br><br>

    <div class="gif">
      <iframe src="https://giphy.com/embed/eYIKQNWRBvBG2yI60K" width="70%" height="70%" style="position: absolute" frameborder="0" class="giphy-embed" allowfullscreen></iframe>
    </div>
    <p class="giphy">
      <a href="https://giphy.com/gifs/007-eYIKQNWRBvBG2yI60K">via GIPHY</a>
    </p>

  </aside>
</main>