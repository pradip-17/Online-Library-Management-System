<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cooking Books Information</title>
  <link rel="icon" type="image/png" href="img/library logo.png">
  <link rel="stylesheet" href="styles.css">
  <script src="javascript.js"></script>
   

<body class="cooking-page">

  <?php include "header.php" ?>

  <!-- SECTION -->
  <section>
    <h2 class="cook-section-title"> Top Cooking Books</h2>

    <div class="cook-books-list">

      <div class="cook-book-item">
        <div class="cook-book-content">
          <div class="cook-book-title">The Joy of Cooking – Irma S. Rombauer</div>
          <div class="cook-book-desc">
            A timeless all-purpose classic, blending reliable recipes, conversational tips, and
            household guidance. Over 20 million copies sold, inspiring generations of home cooks.
          </div>
        </div>
      </div>

      <div class="cook-book-item">
        <div class="cook-book-content">
          <div class="cook-book-title">Mastering the Art of French Cooking</div>
          <div class="cook-book-desc">
            Julia Child’s legendary book brings French gourmet cuisine to every home kitchen,
            with detailed recipes like beef bourguignon and cassoulet.
          </div>
        </div>
      </div>

      <div class="cook-book-item">
        <div class="cook-book-content">
          <div class="cook-book-title">Salt, Fat, Acid, Heat – Samin Nosrat</div>
          <div class="cook-book-desc">
            Learn the four elements of cooking and master balance in taste.
            A modern illustrated guide that builds confidence for any cook.
          </div>
        </div>
      </div>

      <div class="cook-book-item">
        <div class="cook-book-content">
          <div class="cook-book-title">On Food and Cooking – Harold McGee</div>
          <div class="cook-book-desc">
            A food science masterpiece explaining the chemistry and history behind ingredients and
            cooking techniques.
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- FOOTER -->
  <footer class="cook-footer">
    &copy; 2025 BookWorld. All Rights Reserved.
  </footer>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      window.onbeforeunload = function () {
        window.scrollTo(0, 0);
      };
    });
  </script>

</body>

</html>