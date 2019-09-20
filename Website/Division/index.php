<?php
include $_SERVER['DOCUMENT_ROOT'] . '/PHPScripts/functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Cycle News Hour</title>
  <link href="../Styles/master.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<?php
  printNav();
  $div_topic_get = null;
  $div_topic_title = 'All';
  $div_topic = null;
  $div_limit = 10000;
  if(isset($_GET['topic'])) {
    $div_topic_get = $_GET['topic'];
    switch($div_topic_get) {
      case 'International':
        $div_topic = 'i';
        $div_topic_title = 'International';
        $div_limit = 3;
        break;
      case 'Politics':
        $div_topic = 'u';
        $div_topic_title = 'U.S. and Politics';
        $div_limit = 3;
        break;
      case 'Business':
        $div_topic = 'b';
        $div_topic_title = 'Business';
        $div_limit = 3;
        break;
      case 'Science':
        $div_topic = 'c';
        $div_topic_title = 'Science and Conservation';
        $div_limit = 3;
        break;
      case 'Local':
        $div_topic = 'l';
        $div_topic_title = 'Local';
        $div_limit = 3;
        break;
      case 'Sports':
        $div_topic = 's';
        $div_topic_title = 'Sports';
        $div_limit = 3;
        break;
    }
  }
  if(isset($_GET['more'])) {
    $div_limit = 10000;
  }
?>
  <section>
    <article id="division-heading">
      <h2><?php echo $div_topic_title; ?></h2>
      <div class="top-img"></div>
    </article>
  </section>

  <main id="division-main">
    <!-- Top Division Articles -->
    <section id="division-topstories">
      <h2>Top Stories</h2>
      <?php
        getRecent(null, 2, "desktop");
      ?>
    </section>

    <!-- Recent Division Articles -->
    <section id="division">
      <h2>Recent Reports</h2>
      <?php
        getRecent($div_topic, $div_limit, "desktop");
      ?>
      <p class="more"><a href="/Division?topic=<?php echo $div_topic_get.'&more'; ?>">More Articles</a></p>
    </section>

    <!-- Videos, Social, Subscribe -->
    <section id="division-aside">
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
          <p class="more"><a href="../videos/index.html">More Videos</a></p>
      </article>

      <article>
        <h2>Social Media Feeds</h2>
        <div class="social-img"></div>
        <div class="social-img"></div>
        <div class="social-img"></div>
      </article>

      <article id="subscribe">
        <h2>Join our Mailing List</h2>
        <form>
          <input type="text" name="email" id="email" required>
          <input type="submit" value="Subscribe" class="button" id="submit">
        </form>
      </article>
    </section>
  </main>


  <footer>
    <article id="subscribe2">
      <h2>Join our Mailing List</h2>
      <form>
        <input type="text" name="email2" id="email2" required>
        <input type="submit" value="Subscribe" class="button" id="submit2">
      </form>
    </article>
  </footer>
  <script src="../script.js"></script>
</body>

</html>
