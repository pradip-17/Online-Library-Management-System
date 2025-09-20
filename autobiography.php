<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Autobiography Information</title>
  <link rel="icon" type="image/png" href="img/library logo.png">
  <link rel="stylesheet" href="styles.css">
  <!-- Animate.css -->
  <link rel="stylesheet" href="css/animate.min.css">

  <!-- WOW.js -->
  <script src="js/wow.min.js"></script>

</head>

<body class="autobiography-page">
  <?php include "header.php" ?>

  <!-- Section -->
  <section class="autobiography-section">
    <h2 class="autobiography-section-title wow fadeInDown">Autobiography Themes</h2>
    <div class="autobiography-books-container">
      <div class="autobiography-book-card wow fadeInLeft" data-wow-delay="0.1s">
        <div class="autobiography-book-title">Early Life & Family Background</div>
        <div class="autobiography-book-desc">
          Childhood, upbringing, and early influences.<br>
          <strong>Example:</strong> <em>I Know Why the Caged Bird Sings</em> by Maya Angelou.
        </div>
      </div>

      <div class="autobiography-book-card wow fadeInUp" data-wow-delay="0.2s">
        <div class="autobiography-book-title">Education & Growth</div>
        <div class="autobiography-book-desc">
          Learning journey, mentors, and self-development.<br>
          <strong>Example:</strong> <em>The Story of My Life</em> by Helen Keller.
        </div>
      </div>

      <div class="autobiography-book-card wow fadeInRight" data-wow-delay="0.3s">
        <div class="autobiography-book-title">Career & Achievements</div>
        <div class="autobiography-book-desc">
          Career highlights and milestones.<br>
          <strong>Example:</strong> <em>Becoming</em> by Michelle Obama.
        </div>
      </div>

      <div class="autobiography-book-card wow fadeInLeft" data-wow-delay="0.4s">
        <div class="autobiography-book-title">Beliefs & Philosophy</div>
        <div class="autobiography-book-desc">
          Spirituality and ethics shaping life.<br>
          <strong>Example:</strong> <em>The Autobiography of Malcolm X</em>.
        </div>
      </div>

      <div class="autobiography-book-card wow fadeInUp" data-wow-delay="0.5s">
        <div class="autobiography-book-title">Relationships & Family</div>
        <div class="autobiography-book-desc">
          Love life, marriage, and family experiences.<br>
          <strong>Example:</strong> <em>My Life</em> by Bill Clinton.
        </div>
      </div>

      <div class="autobiography-book-card wow fadeInRight" data-wow-delay="0.6s">
        <div class="autobiography-book-title">Historical Events</div>
        <div class="autobiography-book-desc">
          Life amidst world events.<br>
          <strong>Example:</strong> <em>Night</em> by Elie Wiesel.
        </div>
      </div>

      <div class="autobiography-book-card wow fadeInLeft" data-wow-delay="0.7s">
        <div class="autobiography-book-title">Mental Health</div>
        <div class="autobiography-book-desc">
          Struggles and healing.<br>
          <strong>Example:</strong> <em>Darkness Visible</em> by William Styron.
        </div>
      </div>

      <div class="autobiography-book-card wow fadeInUp" data-wow-delay="0.8s">
        <div class="autobiography-book-title">Legacy & Reflections</div>
        <div class="autobiography-book-desc">
          Lessons learned and wisdom.<br>
          <strong>Example:</strong> <em>On Writing</em> by Stephen King.
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="autobiography-footer wow fadeInUp">
    &copy; 2025 BookWorld. All rights reserved.
  </footer>

  <script>
    // WOW.js initialization
    new WOW().init();

    // Scroll to top on refresh
    document.addEventListener("DOMContentLoaded", function () {
      window.onbeforeunload = function () {
        window.scrollTo(0, 0);
      };
    });
  </script>

  <script src="javascript.js"></script>

</body>
</html>