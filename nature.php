
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>nature Book Information</title>
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
        <div class="history-title">Sustainability</div>
        <div class="history-desc">Learn sustainable practices, renewable energy solutions, and ways to reduce our ecological footprint for a
          greener planet.</div>
      </div>
    </div>

    <div class="history-timeline-item left wow slideInLeft" data-wow-delay="0.6s">
      <div class="history-content">
        <div class="history-title"> Environmental Ethics</div> 
        <div class="history-desc">Understand the moral responsibility humans have to preserve nature, and explore philosophies around
          conservation and coexistence</div>
      </div>
    </div>

    <div class="history-timeline-item right wow slideInRight" data-wow-delay="0.8s">
      <div class="history-content">
        <div class="history-title">Natural History</div>
        <div class="history-desc">Discover Earth's story — from its geological transformations to the evolution of life over millions of
          years.</div>
      </div>
    </div>

    <div class="history-timeline-item left wow slideInLeft" data-wow-delay="1s">
      <div class="history-content">
        <div class="history-title">Environmental Leaders</div>
        <div class="history-desc">Read about pioneers like Rachel Carson, Aldo Leopold, and Jane Goodall, who shaped the way we protect
          nature today.</div>
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