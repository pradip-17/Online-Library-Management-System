<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Biography Information</title>
  <link rel="icon" type="image/png" href="img/library logo.png">
  <link rel="stylesheet" href="styles.css">
  <script src="javascript.js"></script>
  <link rel="stylesheet" href="css/animate.min.css">
  <script src="js/wow.min.js"></script>

  
</head>

<body class="biography-page">
  <!-- HEADER -->
  <?php include "header.php" ?>

  <!-- CONTENT SECTION -->
  <section class="biography-section">
    <div class="biography-section-title wow fadeInDown" data-wow-duration="1.2s">
       Explore Inspiring Life Stories
    </div>
    <div class="biography-books-container">
      <div class="biography-card wow fadeInUp" data-wow-delay="0.2s">
        <div class="biography-card-title">Life Stories</div>
        <div class="biography-card-desc">
          Explore inspiring journeys of notable personalities, their challenges, milestones, and legacies that changed
          the world.
        </div>
      </div>

      <div class="biography-card wow fadeInUp" data-wow-delay="0.4s">
        <div class="biography-card-title">Historical Figures</div>
        <div class="biography-card-desc">
          Read about leaders, pioneers, and trailblazers who shaped history, politics, science, and culture.
        </div>
      </div>

      <div class="biography-card wow fadeInUp" data-wow-delay="0.6s">
        <div class="biography-card-title">Memoirs & Autobiographies</div>
        <div class="biography-card-desc">
          First-person narratives offering deep insights into struggles, dreams, and achievements of extraordinary
          individuals.
        </div>
      </div>

      <div class="biography-card wow fadeInUp" data-wow-delay="0.8s">
        <div class="biography-card-title">Celebrity Biographies</div>
        <div class="biography-card-desc">
          Discover untold stories from the lives of famous actors, musicians, athletes, and artists.
        </div>
      </div>

      <div class="biography-card wow fadeInUp" data-wow-delay="1s">
        <div class="biography-card-title">Inspirational Leaders</div>
        <div class="biography-card-desc">
          Stories of people who overcame adversity, showing strength, courage, and determination.
        </div>
      </div>

      <div class="biography-card wow fadeInUp" data-wow-delay="1.2s">
        <div class="biography-card-title">Social Impact Icons</div>
        <div class="biography-card-desc">
          Learn about changemakers who transformed societies through activism, innovation, and cultural movements.
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="biography-footer wow fadeIn" data-wow-delay="1.5s">
    &copy; 2025 My Library | Biography Collection
  </footer>

  <!-- SCRIPT -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      window.onbeforeunload = function () {
        window.scrollTo(0, 0);
      };
      new WOW().init();
    });
  </script>
</body>

</html>