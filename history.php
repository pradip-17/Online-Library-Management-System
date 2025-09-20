<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>History Book Information</title>
  <link rel="icon" type="image/png" href="img/library logo.png">
  <link rel="stylesheet" href="styles.css">
  <script src="javascript.js"></script>
  <link rel="stylesheet" href="css/animate.min.css">
  <script src="js/wow.min.js"></script>


</head>

<body class="history-body">
  <!-- HEADER -->
  <?php include "header.php" ?>

  <!-- TIMELINE -->
  <section class="history-timeline">
    <div class="history-timeline-item left wow slideInLeft" data-wow-delay="0.2s">
      <div class="history-content">
        <div class="history-title">Ancient Civilizations</div>
        <div class="history-desc">Explore the wonders of Mesopotamia, Egypt, Indus Valley, and other ancient cultures
          that laid the foundation of modern society.</div>
      </div>
    </div>

    <div class="history-timeline-item right wow slideInRight" data-wow-delay="0.4s">
      <div class="history-content">
        <div class="history-title">Medieval Era</div>
        <div class="history-desc">Dive into the Middle Ages, knights, castles, and the cultural shifts that shaped
          Europe and Asia.</div>
      </div>
    </div>

    <div class="history-timeline-item left wow slideInLeft" data-wow-delay="0.6s">
      <div class="history-content">
        <div class="history-title">Renaissance</div>
        <div class="history-desc">Learn about the rebirth of art, science, and culture during the Renaissance era,
          highlighting creativity and innovation.</div>
      </div>
    </div>

    <div class="history-timeline-item right wow slideInRight" data-wow-delay="0.8s">
      <div class="history-content">
        <div class="history-title">Industrial Revolution</div>
        <div class="history-desc">Understand how industry, machines, and new technology changed the world forever.</div>
      </div>
    </div>

    <div class="history-timeline-item left wow slideInLeft" data-wow-delay="1s">
      <div class="history-content">
        <div class="history-title">Modern History</div>
        <div class="history-desc">Explore major global events, wars, and revolutions that shaped the 20th and 21st
          centuries.</div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="history-footer wow fadeIn" data-wow-delay="1.2s">
    &copy; 2025 History Knowledge Library. All Rights Reserved.
  </footer>

  <!-- SCRIPT -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      new WOW().init();
    });
  </script>
</body>

</html>