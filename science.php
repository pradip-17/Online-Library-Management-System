<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Science Book Info</title>
  <link rel="icon" type="image/png" href="img/library-logo.png">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="css/animate.min.css">
  <script src="javascript.js"></script>
  <script src="js/wow.min.js"></script>

</head>

<body class="science-body">
  <!-- HEADER -->
  <?php include "header.php" ?>

  <!-- HERO -->
  <section class="science-hero wow fadeInDown">
    <h2>The Wonders of Science</h2>
    <p>
      Science books take us on a journey to understand the mysteries of nature, technology, and the universe.
      From the origins of life to the latest innovations in AI and space exploration, science gives us the
      power to think critically, explore, and innovate.
    </p>
  </section>

  <!-- INFO CARDS -->
  <section class="science-info">
    <div class="science-card wow zoomIn" data-wow-delay="0.1s">
      <h3> Earth & Environment</h3>
      <p>Discover our planet's ecosystems, climate science, and biodiversity. Learn how science helps us
        protect Earth for future generations.</p>
    </div>
    <div class="science-card wow zoomIn" data-wow-delay="0.2s">
      <h3> Genetics & Biology</h3>
      <p>Understand DNA, evolution, and how life develops. Biology opens the door to medicine and life
        sciences research.</p>
    </div>
    <div class="science-card wow zoomIn" data-wow-delay="0.3s">
      <h3> Space & Astronomy</h3>
      <p>Explore planets, stars, and galaxies beyond imagination. Learn about telescopes, satellites, and
        space missions.</p>
    </div>
    <div class="science-card wow zoomIn" data-wow-delay="0.4s">
      <h3> Physics & Chemistry</h3>
      <p>From atoms to the universe, dive into the laws of motion, quantum mechanics, and chemical reactions
        that shape our world.</p>
    </div>
    <div class="science-card wow zoomIn" data-wow-delay="0.5s">
      <h3> Technology & AI</h3>
      <p>Discover robotics, machine learning, and how technology changes our lives every day.</p>
    </div>
    <div class="science-card wow zoomIn" data-wow-delay="0.6s">
      <h3> Scientific Experiments</h3>
      <p>Learn about groundbreaking experiments, laboratory tools, and innovations that transformed science
        forever.</p>
    </div>
  </section>


  <!-- FOOTER -->
  <footer class="science-footer wow fadeIn">
    &copy; 2025 Science Knowledge Library. All Rights Reserved.
  </footer>

  <script>
    new WOW().init();
  </script>
</body>

</html>