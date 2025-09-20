<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Thriller Genre Info</title>
   <link rel="stylesheet" href="styles.css">
  <link rel="icon" type="image/png" href="img/library logo.png">

  <!-- Local Bootstrap -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <!-- Animate.css -->
  <link rel="stylesheet" href="css/animate.min.css">

  <style>
   
  </style>
</head>

<body>

  <!-- Header -->
  <?php include "header.php" ?> 

  <div class="container py-5">

    <div class="row g-4 mb-4">
      <!-- Thriller Info -->
      <div class="col-lg-7">
        <div class="thriller-info wow fadeInLeft">
          <h2>What is a Thriller?</h2>
          <p style="color:black;">Thrillers are high-stakes stories designed to keep readers on edge with tension, danger, and
            unexpected twists. From psychological suspense to action-packed espionage, thrillers captivate
            audiences with mystery and excitement.</p>
          <div class="mt-3">
            <div class="thriller-feature wow slideInLeft">🔍 Mystery-driven, suspenseful plots</div>
            <div class="thriller-feature wow slideInLeft" data-wow-delay="0.2s">⚡ Fast-paced, gripping narrative</div>
            <div class="thriller-feature wow slideInLeft" data-wow-delay="0.4s">🕵 Crime, psychological tension, espionage themes</div>
            <div class="thriller-feature wow slideInLeft" data-wow-delay="0.6s">🎬 Often adapted into blockbuster films</div>
          </div>
        </div>
      </div>

      <!-- Subgenres & Authors -->
      <div class="col-lg-5">
        <div class="thriller-subsection wow zoomIn">
          <h4>Popular Subgenres</h4>
          <ul>
            <li>• Crime Thriller</li>
            <li>• Psychological Thriller</li>
            <li>• Spy & Espionage</li>
            <li>• Action Thriller</li>
            <li>• Legal & Political</li>
          </ul>
        </div>
        <div class="thriller-subsection wow zoomIn" data-wow-delay="0.2s">
          <h4>Famous Authors</h4>
          <ul>
            <li>• Agatha Christie</li>
            <li>• Dan Brown</li>
            <li>• James Patterson</li>
            <li>• Gillian Flynn</li>
            <li>• Lee Child</li>
          </ul>
        </div>
      </div>
    </div>



  <footer class="thriller-footer">
    © 2025 BookWorld. All Rights Reserved.
  </footer>

  <!-- Scripts -->
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="javascript.js"></script>

</body>

</html>