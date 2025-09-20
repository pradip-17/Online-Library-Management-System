<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Art & Photography Information</title>
  <link rel="icon" type="image/png" href="img/library logo.png">
  <link rel="stylesheet" href="styles.css">
  <script src="javascript.js"></script>

</head>

<body class="art-photography-page">
  <!-- Header -->
  <?php include "header.php" ?>


  <!-- Section -->
  <section class="art-photography-section">
    <h2 class="section-title"> The Art of Photography – Core Information</h2>
    <div class="books-container">
      <div class="book-card">

        <div class="book-title"> Introduction to Photography</div>
        <div class="book-desc">
          <li><strong>Definition:</strong> Photography is the art, science, and practice of creating durable images
            using light.</li>
          <li><strong>Purpose:</strong> To tell stories, document reality, express creativity, or preserve memories.
          </li>
          <li><strong>Types:</strong> Digital, Film, Black & White, Color</li>
        </div>
      </div>

      <div class="book-card">
        <div class="book-title"> Essential Equipment</div>
        <div class="book-desc">
          <ul>
            <li><strong>Cameras:</strong> DSLR, Mirrorless, Film, Smartphone</li>
            <li><strong>Lenses:</strong> Prime, Zoom, Wide-angle, Telephoto, Macro</li>
            <li><strong>Accessories:</strong> Tripod, Flash, Filters, Memory Cards</li>
          </ul>
        </div>
      </div>

      <div class="book-card">
        <div class="book-title"> Understanding Light</div>
        <div class="book-desc">
          Natural vs Artificial light, Golden Hour, Blue Hour, Hard & Soft lighting.
        </div>
      </div>

      <div class="book-card">
        <div class="book-title"> Camera Settings</div>
        <div class="book-desc">
          <lo><strong>Exposure Triangle:</strong> Aperture, Shutter Speed, ISO.</li>
            <li><strong>Other:</strong> White Balance, Focus Modes, Metering.</li>
        </div>
      </div>

      <div class="book-card">
        <div class="book-title"> Composition Techniques</div>
        <div class="book-desc">
          Rule of Thirds, Leading Lines, Framing, Symmetry, Depth, Perspective.
        </div>
      </div>

      <div class="book-card">
        <div class="book-title"> Genres of Photography</div>
        <div class="book-desc">
          Portrait, Landscape, Street, Wildlife, Macro, Architectural, Fashion, Fine Art.
        </div>
      </div>

      <div class="book-card">
        <div class="book-title"> Post-Processing</div>
        <div class="book-desc">
          <li><strong>Software:</strong> Lightroom, Photoshop, Capture One.</li>
          <li>Editing techniques from basic correction to advanced retouching.</li>
        </div>
      </div>

      <div class="book-card">
        <div class="book-title"> Learning & Inspiration</div>
        <div class="book-desc">
          <li><strong>Photographers:</strong> Ansel Adams, Annie Leibovitz, Steve McCurry.</li>
          <li><strong>Books:</strong> The Art of Photography, Understanding Exposure.</li>
        </div>
      </div>

      <div class="book-card">
        <div class="book-title"> Career Paths</div>
        <div class="book-desc">
          Freelance, Commercial, Event Photography, Stock Photography, Fine Art Sales.
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer id="art-photography-footer">
    &copy; 2025 BookWorld. All Rights Reserved.
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