<?php
include $_SERVER['DOCUMENT_ROOT'] . '/PHPScripts/functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Cycle News Hour</title>
  <link href="Styles/master.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<?php printnav(); ?>

    <section>
      <article id="topnews">
        <h2>Top News</h2>
        <div class="top-img"></div>
      </article>
    </section>

  <main>
    <!-- Trending News -->
    <section id="trending">
      <h2>Trending</h2>
      <?php getRecent(null, 3, "desktop") ?>
    </section>



    <!-- Recent Articles -->
    <section id="recent">
      <h2>Recent Articles</h2>
      <?php getRecent(null, 2, "desktop") ?>
    </section>

    <!-- Videos, Social, Subscribe -->
    <section id="aside">
      <article>
        <h2>Videos</h2>
        <section class="videos">
          <section>
            <h3><a href="#">Video 1</a></h3>
            <div class="videos-img"></div>
          </section>
          <section>
            <h3><a href="#">Video 2</a></h3>
            <div class="videos-img"></div>
          </section>
        </section>
        <section class="videos">
          <section>
            <h3><a href="#">Video 3</a></h3>
            <div class="videos-img"></div>
          </section>
          <section>
            <h3><a href="#">Video 4</a></h3>
            <div class="videos-img"></div>
          </section>
        </section>
        <p class="more"><a href="/Videos">More Videos</a></p>
      </article>

      <article>
        <h2>Social Media Feeds</h2>
        <div class="social-img"></div>
        <div class="social-img"></div>
        <div class="social-img"></div>
      </article>
      
  </main>

  <?php printfooter(); ?>
  <script src="../Scripts/script.js"></script>
</body>

</html>
