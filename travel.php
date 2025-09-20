<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Travel Information</title>
  <link rel="icon" type="image/png" href="img/library logo.png">
  <link rel="stylesheet" href="styles.css">
  <script src="javascript.js"></script>
 
  
</head>

<body class="traveling-page">

  <!-- HEADER -->
    <?php include "header.php" ?>
 

  <!-- BOOK SECTION -->
  <section class="traveling-section">
    <h2 class="traveling-section-title">Travel Book Collection</h2>
    <div class="traveling-books-container">
      <div class="traveling-book-card">
        <div class="traveling-book-title">The Innocents Abroad – Mark Twain</div>
        <div class="traveling-book-desc">
          A humorous account of Twain’s 1867 voyage through Europe and the Holy Land,
          lampooning tourists and offering cultural insights.
        </div>
      </div>

      <div class="traveling-book-card">
        <div class="traveling-book-title">Travels with Charley – John Steinbeck</div>
        <div class="traveling-book-desc">
          Steinbeck travels across America with his poodle Charley, reflecting on
          landscapes, people, and changing social norms.
        </div>
      </div>

      <div class="traveling-book-card">
        <div class="traveling-book-title">Arabian Sands – Wilfred Thesiger</div>
        <div class="traveling-book-desc">
          An intimate portrayal of Bedouin life in the Rub’ al Khali desert post-WWII;
          one of the finest works on Arabian culture.
        </div>
      </div>

      <div class="traveling-book-card">
        <div class="traveling-book-title">The Snow Leopard – Peter Matthiessen</div>
        <div class="traveling-book-desc">
          Spiritual and natural history of a journey in Nepal and Tibet in search
          of the elusive snow leopard.
        </div>
      </div>

      <div class="traveling-book-card">
        <div class="traveling-book-title">A Short Walk in the Hindu Kush – Eric Newby</div>
        <div class="traveling-book-desc">
          Two Englishmen trek Afghanistan’s Hindu Kush in the 1950s,
          delivering a witty, thrilling, and candid memoir.
        </div>
      </div>

      <div class="traveling-book-card">
        <div class="traveling-book-title">The Great Railway Bazaar – Paul Theroux</div>
        <div class="traveling-book-desc">
          An iconic journey by train through Europe, the Middle East, India, and Southeast Asia,
          vividly describing travel, people, and food.
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="traveling-footer">
    &copy; 2025 BookWorld. All rights reserved.
  </footer>

  <script>
    // Scroll to top on reload
    document.addEventListener("DOMContentLoaded", function () {
      window.onbeforeunload = function () {
        window.scrollTo(0, 0);
      };
    });
  </script>

</body>

</html> 