<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Philosophy Information</title>
  <link rel="icon" type="image/png" href="img/library logo.png">
  <link rel="stylesheet" href="styles.css">
  <script src="javascript.js"></script>

  <style>
  </style>
</head>

<body>
  <?php include "header.php" ?>

  <!--  Section -->
  <section class="philosophy-section">
    <h2 class="philosophy-title">Philosophy Timeline & Knowledge</h2>
    <div class="philosophy-timeline">

      <div class="philosophy-item philosophy-left">
        <div class="philosophy-content">
          <div class="philosophy-subtitle">Classical Philosophy</div>
          <p class="philosophy-text">
             Plato's <em>The Republic</em> explores justice & the ideal society.<br>
             Aristotle's <em>Nicomachean Ethics</em> introduces virtue ethics.<br>
             Marcus Aurelius’ <em>Meditations</em> reflects stoic wisdom.
          </p>
        </div>
      </div>

      <div class="philosophy-item philosophy-right">
        <div class="philosophy-content">
          <div class="philosophy-subtitle">Modern Thinkers</div>
          <p class="philosophy-text">
             Kant's <em>Critique of Pure Reason</em> explores knowledge & reality.<br>
             Descartes' <em>Discourse on Method</em> asks fundamental questions.<br>
             Hobbes' <em>Leviathan</em> defines social contracts.
          </p>
        </div>
      </div>

      <div class="philosophy-item philosophy-left">
        <div class="philosophy-content">
          <div class="philosophy-subtitle">Existentialism</div>
          <p class="philosophy-text">
             Sartre's <em>Being and Nothingness</em> on freedom & identity.<br>
             Kierkegaard's <em>Fear and Trembling</em> on faith & ethics.<br>
             Hegel's <em>Phenomenology of Spirit</em> explores consciousness.
          </p>
        </div>
      </div>

      <div class="philosophy-item philosophy-right">
        <div class="philosophy-content">
          <div class="philosophy-subtitle">Political Philosophy</div>
          <p class="philosophy-text">
             Mill's <em>Utilitarianism</em> - the greatest happiness principle.<br>
             Rawls' <em>A Theory of Justice</em> - fairness redefined.
          </p>
        </div>
      </div>

      <div class="philosophy-item philosophy-left">
        <div class="philosophy-content">
          <div class="philosophy-subtitle">Mind & Language</div>
          <p class="philosophy-text">
             Wittgenstein’s <em>Philosophical Investigations</em> explores meaning.<br>
             Chalmers' <em>The Conscious Mind</em> tackles hard problems.
          </p>
        </div>
      </div>

      <div class="philosophy-item philosophy-right">
        <div class="philosophy-content">
          <div class="philosophy-subtitle">Modern Impact</div>
          <p class="philosophy-text">
             Foucault on power & society.<br>
             Beauvoir on feminism & existence.<br>
             Kuhn on scientific revolutions.
          </p>
        </div>
      </div>

    </div>
  </section>

  <!--  Footer -->
  <footer class="philosophy-footer">
    &copy; 2025 BookWorld. All Rights Reserved.
  </footer>

  <script>
    // Scroll to top when reloading
    document.addEventListener("DOMContentLoaded", function () {
      window.onbeforeunload = function () {
        window.scrollTo(0, 0);
      };

      // Scroll animation for timeline
      const items = document.querySelectorAll('.philosophy-item');
      const revealItems = () => {
        items.forEach(item => {
          const rect = item.getBoundingClientRect();
          if (rect.top < window.innerHeight - 100) {
            item.classList.add('show');
          }
        });
      };

      window.addEventListener('scroll', revealItems);
      revealItems();
    });
  </script>
</body>

</html>