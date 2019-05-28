<?php
include $_SERVER['DOCUMENT_ROOT'] . '/PHPScripts/functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Cycle News Hour</title>
  <link href="https://necolas.github.io/normalize.css/8.0.1/normalize.css" rel="stylesheet" />
  <link href="../Styles/master.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  
<?php printnav(); ?>

  <main id="main-article">
    <!-- Single Post Article -->
    <section id="desktop-flex">
      <section id="post">
        <h4 class="category"><a href="../Division/index.html" class="category">Category</a></h4>
        <article>
          <h2 class="title"><?php getTitle($_GET['id']); ?></h2>
          <h3><?php getAuthor($_GET['id']); echo ' - '; getNewsDate($_GET['id']); ?></h3>
          <div class="post-img"></div>
          <img src="../Media/soundcloud.png" alt="image" width="400" id="soundcloud">
          <?php getSummary($_GET['id']); ?>
        </article>

        <section id="share-buttons">
          <a><img src="../Media/facebook.png" alt="facebook share button" width="65" height="65" id="fb"></a>
          <a><img src="../Media/twitter.png" alt="twitter share button" width="65" height="65" id="twitter"></a>
          <a><img src="../Media/instagram.png" alt="instagram share button" width="65" height="65" id="insta"></a>
          <a><img src="../Media/email.png" alt="email share button" width="65" height="65" id="mail"></a>
        </section>
      </section>

      <!-- Recent Division Articles -->
      <section id="aside">
        <h2>Related Articles</h2>
        <article id="related-desktop">
          <section>
            <div class="recent-img"></div>
          </section>
          <section class="desktop">
            <h4 class="category"><a>CATEGORY</a></h4>
            <h3><a href="index.html">Article Title</a></h3>
            <h4 class="author">Author</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
          </section>
        </article>

        <article class="related-desktop">
          <section>
            <div class="recent-img"></div>
          </section>
          <section class="desktop">
            <h4 class="category"><a>CATEGORY</a></h4>
            <h3><a href="index.html">Article Title</a></h3>
            <h4 class="author">Author</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
          </section>
        </article>

        <h2>Trending Articles</h2>
        <article class="trending-desktop">
          <section>
            <div class="recent-img"></div>
          </section>
          <section class="desktop">
            <h4 class="category"><a>CATEGORY</a></h4>
            <h3><a href="index.html">Article Title</a></h3>
            <h4 class="author">Author</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
          </section>
        </article>

        <article class="related-desktop">
          <section>
            <div class="recent-img"></div>
          </section>
          <section class="desktop">
            <h4 class="category"><a>CATEGORY</a></h4>
            <h3><a href="index.html">Article Title</a></h3>
            <h4 class="author">Author</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
          </section>
        </article>

        <article id="subscribe">
          <h2>Join our Mailing List</h2>
          <form>
            <input type="text" name="email" id="email" required>
            <input type="submit" value="Subscribe" class="button" id="submit">
          </form>
        </article>
      </section>
    </section>
  </main>

  <section id="comment-section">
    <h2>Comment Section</h2>
    <section>
      <div class="comment-img"></div>
      <section>
        <form>
          <label for="email" class="comment">Name</label> <br>
          <input type="text" name="name" id="name" required> <br>
          <label for="comment" class="comment">Leave a Comment</label> <br>
          <textarea id="comment" rows="2" required></textarea>
          <input type="submit" value="Submit" id="submitComment" class="button">
        </form>
      </section>
    </section>

    <section id="comments">
      <h3></h3>
      <p></p>
    </section>
  </section>

  <footer>
  </footer>
</body>

</html>
