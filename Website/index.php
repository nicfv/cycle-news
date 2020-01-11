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
    <?php getVids(4, 240, 160); ?>
    <!-- <section id="aside">
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
      </article> -->

      <!-- <article>
        <div id="share-buttons-normal">
          <h2>Social Media Feeds</h2>
          <br>
          <a href="https://twitter.com/cyclenewshour?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-size="large" data-show-count="false">Follow @cyclenewshour</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
          <br><br>
          <div id="fb-root"></div>
          <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0"></script>
          <div class="fb-like" data-href="https://www.facebook.com/CycleNewsHour/" data-width="" data-layout="standard" data-action="like" data-size="large" data-share="true"></div><br><br>
          <script src="https://apis.google.com/js/platform.js"></script>
          <div class="g-ytsubscribe" data-channelid="UCPmgC5_PHtrL7r3Z29DF9gw" data-layout="default" data-count="default"></div>
          <br><br>
          <iframe allowtransparency="true" scrolling="no" frameborder="no" src="https://w.soundcloud.com/icon/?url=http%3A%2F%2Fsoundcloud.com%2Fcyclenewshour&color=orange_white&size=32" style="width: 32px; height: 32px;"></iframe>
        </div>
      </article> -->
      <?php printsocials(); ?>
    </section>

  </main>

  <?php printfooter(); ?>
  <script src="../Scripts/script.js"></script>
</body>

</html>
