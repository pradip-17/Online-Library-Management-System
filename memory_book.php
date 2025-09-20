<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Memory Book Information</title>
  <link rel="icon" type="image/png" href="img/library logo.png">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="bootstrap.min.css">

  <!--  Offline Animate.css -->
  <link rel="stylesheet" href="animate.min.css">

  <style>
    /* memory book info page design */
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f0f4f8;
      color: #333;
      line-height: 1.6;
      overflow-x: hidden;
    }

    /* Section Styling */
    .memory-section {
      background: #fff;
      margin: 40px auto;
      padding: 40px 20px;
      border-radius: 20px;
      max-width: 1100px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
      transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .memory-section:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 35px rgba(0, 0, 0, 0.12);
    }

    .memory-section h2 {
      color: #0c4da2;
      font-weight: 700;
      font-size: 2.3rem;
      margin-bottom: 25px;
      text-align: center;
      letter-spacing: 1px;
    }

    .memory-content {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      align-items: center;
      justify-content: center;
    }

    .memory-text {
      flex: 1;
      min-width: 280px;
    }

    .memory-text p {
      margin-bottom: 15px;
      font-size: 1.1rem;
      color: #3b4c5c;
      font-weight: 500;
    }

    .memory-text ul {
      list-style: none;
      padding: 0;
    }

    .memory-text ul li {
      padding-left: 28px;
      position: relative;
      margin-bottom: 12px;
      font-size: 1.05rem;
      color: #333;
      font-weight: 500;
    }

    .memory-text ul li::before {
      content: "✔";
      color: #ff5f5f;
      font-weight: bold;
      position: absolute;
      left: 0;
      font-size: 1.2rem;
    }

    .memory-image {
      flex: 1;
      min-width: 280px;
      text-align: center;
    }

    .memory-image img {
      width: 100%;
      max-width: 420px;
      border-radius: 20px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
      transition: transform 0.4s ease;
    }

    .memory-image img:hover {
      transform: scale(1.05);
    }

    .memory-footer {
      background: #0c4da2;
      color: #fff;
      text-align: center;
      padding: 25px;
      margin-top: 60px;
      font-size: 1rem;
      font-weight: 500;
      letter-spacing: 1px;
    }

    @media (max-width: 768px) {
      .memory-section {
        padding: 25px 15px;
      }

      .memory-section h2 {
        font-size: 1.8rem;
      }

      .memory-content {
        flex-direction: column;
        text-align: center;
      }

      .memory-image img {
        max-width: 90%;
      }
    }
  </style>
</head>

<body>
  <?php include "header.php" ?>

  <!-- Childhood Section -->
  <section class="memory-section wow fadeInUp" data-wow-duration="1.2s">
    <h2 class="wow bounceIn" data-wow-delay="0.3s"> Childhood Memories</h2>
    <div class="memory-content">
      <div class="memory-text wow fadeInLeft" data-wow-delay="0.4s">
        <p>Revisit the golden days of innocence and wonder, where every little discovery brought joy.</p>
        <ul>
          <li>Playground adventures and neighborhood friends</li>
          <li>First day of school memories</li>
          <li>Grandparents’ bedtime stories</li>
          <li>Favourite cartoons & toys that shaped childhood</li>
        </ul>
      </div>
      <div class="memory-image wow fadeInRight" data-wow-delay="0.6s">
        <img src="img/childhood.png" alt="Childhood Memories">
      </div>
    </div>
  </section>

  <!-- School & College Section -->
  <section class="memory-section wow fadeInUp" data-wow-duration="1.2s">
    <h2 class="wow bounceIn" data-wow-delay="0.3s"> School & College Life</h2>
    <div class="memory-content">
      <div class="memory-text wow fadeInRight" data-wow-delay="0.4s">
        <p>Celebrate the golden era of learning, friendships, and achievements that shaped who you are.</p>
        <ul>
          <li>Sports days, science fairs & annual functions</li>
          <li>Best friends & unforgettable teachers</li>
          <li>Late-night study sessions and class trips</li>
          <li>Achievements that filled you with pride</li>
        </ul>
      </div>
      <div class="memory-image wow fadeInLeft" data-wow-delay="0.6s">
        <img src="img/collegel life.png" alt="School and College Life">
      </div>
    </div>
  </section>

  <!-- Travel Memories -->
  <section class="memory-section wow fadeInUp" data-wow-duration="1.2s">
    <h2 class="wow bounceIn" data-wow-delay="0.3s"> Travel Adventures</h2>
    <div class="memory-content">
      <div class="memory-text wow fadeInLeft" data-wow-delay="0.4s">
        <p>Relive your journeys, exotic locations, and cultural experiences through these cherished pages.</p>
        <ul>
          <li>First solo trip stories</li>
          <li>Adventures in mountains & beaches</li>
          <li>Experiencing new cultures & cuisines</li>
          <li>Picturesque sunsets & landscapes</li>
        </ul>
      </div>
      <div class="memory-image wow fadeInRight" data-wow-delay="0.6s">
        <img src="img/traveling.png" alt="Travel Adventures">
      </div>
    </div>
  </section>

  <!-- Family Section -->
  <section class="memory-section wow fadeInUp" data-wow-duration="1.2s">
    <h2 class="wow bounceIn" data-wow-delay="0.3s"> Family & Love</h2>
    <div class="memory-content">
      <div class="memory-text wow fadeInRight" data-wow-delay="0.4s">
        <p>The essence of love, warmth, and togetherness. This section captures the heart of your story.</p>
        <ul>
          <li>Family celebrations and festivals</li>
          <li>Heartwarming moments with loved ones</li>
          <li>Legacy and traditions passed down</li>
          <li>Photos that define happiness</li>
        </ul>
      </div>
      <div class="memory-image wow fadeInLeft" data-wow-delay="0.6s">
        <img src="img/family love.png" alt="Family and Love">
      </div>
    </div>
  </section>

  <footer class="memory-footer wow fadeInUp" data-wow-delay="0.4s">
    &copy; 2025 BookWorld. All Rights Reserved.
  </footer>

  <script src="bootstrap.bundle.min.js"></script>
  <!--  Offline WOW.js -->
  <script src="wow.min.js"></script>
  <script>
    new WOW().init();
  </script>
</body>
</html>