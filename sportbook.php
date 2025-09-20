<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sport Information</title>
  <link rel="icon" type="image/png" href="img/library logo.png">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="css/animate.min.css">
  <script src="javascript.js"></script>
  <script src="js/wow.min.js"></script>

  <style>
  
  </style>
</head>

<body class="wb-page">

  <!--Header -->
  <?php include "header.php" ?>

  <div class="container py-4">

    <!-- Section 1  -->
    <section class="wb-section wow fadeInUp" data-wow-delay="0.2s">
      <div class="wb-section-title"> Sports Specific Books</div>
      <div class="row">
        <div class="col-12">
          <div class="wb-timeline">
            <div class="wb-timeline-item wow fadeInLeft" data-wow-delay="0.3s">
              <div class="wb-item-title">Rules and Strategies</div>
              <div class="wb-item-desc">Books explaining the rules, strategies, and techniques of different sports.</div>
            </div>
            <div class="wb-timeline-item wow fadeInRight" data-wow-delay="0.4s">
              <div class="wb-item-title">Training and Coaching</div>
              <div class="wb-item-desc">Resources on training methods, coaching philosophies, and sports-specific conditioning.</div>
            </div>
            <div class="wb-timeline-item wow fadeInLeft" data-wow-delay="0.5s">
              <div class="wb-item-title">Sports Medicine & Performance</div>
              <div class="wb-item-desc">Books on sports injuries, rehabilitation, nutrition, and sports psychology.</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section 2 -->
    <section class="wb-section wow fadeInUp" data-wow-delay="0.3s">
      <div class="wb-section-title"> Sports Management Books</div>
      <div class="row">
        <div class="col-12">
          <div class="wb-timeline">
            <div class="wb-timeline-item wow fadeInLeft" data-wow-delay="0.4s">
              <div class="wb-item-title">Event Planning & Organization</div>
              <div class="wb-item-desc">Guides for planning tournaments, sports festivals, and large-scale international events.</div>
            </div>
            <div class="wb-timeline-item wow fadeInRight" data-wow-delay="0.5s">
              <div class="wb-item-title">Sports Marketing & Promotion</div>
              <div class="wb-item-desc">Learn branding, sponsorships, ticketing, and audience engagement strategies.</div>
            </div>
            <div class="wb-timeline-item wow fadeInLeft" data-wow-delay="0.6s">
              <div class="wb-item-title">Facility & Equipment Management</div>
              <div class="wb-item-desc">Maintain sports facilities, safety standards, and training equipment efficiently.</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--  Section 3 -->
    <section class="wb-section wow fadeInUp" data-wow-delay="0.4s">
      <div class="wb-section-title"> Historical & Cultural Aspects</div>
      <div class="row">
        <div class="col-12">
          <div class="wb-timeline">
            <div class="wb-timeline-item wow fadeInLeft" data-wow-delay="0.5s">
              <div class="wb-item-title">History of Sports</div>
              <div class="wb-item-desc">Explore the origins and evolution of various sports.</div>
            </div>
            <div class="wb-timeline-item wow fadeInRight" data-wow-delay="0.6s">
              <div class="wb-item-title">Major Sporting Events</div>
              <div class="wb-item-desc">Accounts of major tournaments, championships, and Olympic Games.</div>
            </div>
            <div class="wb-timeline-item wow fadeInLeft" data-wow-delay="0.7s">
              <div class="wb-item-title">Cultural Impact of Sports</div>
              <div class="wb-item-desc">Understand the influence of sports on society and culture.</div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

  <!--  Footer  -->
  <footer class="wb-footer">
    &copy; 2025 BookWorld. All rights reserved.
  </footer>

  <!--  Bootstrap JS -->
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    new WOW().init();
    document.addEventListener("DOMContentLoaded", function () {
      window.onbeforeunload = function () {
        window.scrollTo(0, 0);
      };
    });
  </script>
</body>

</html>