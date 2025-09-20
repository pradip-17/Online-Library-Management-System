<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Self-Help Book Information</title>
    <link rel="icon" type="image/png" href="img/library logo.png">
    <link rel="stylesheet" href="styles.css">
    <script src="javascript.js"></script>


</head>

<body class="selfhelp-page">
    <!-- Header -->
  <?php include "header.php" ?>
    
    <!-- Hero -->
    <section class="selfhelp-hero">
        <h2>Empower Your Mind, Transform Your Life</h2>
        <p>Discover life-changing self-help books that motivate, inspire, and push you to become your best self. Dive
            into these
            handpicked guides to improve your mindset, build better habits, and find purpose.</p>
    </section>

    <!-- Books Section -->
    <section class="selfhelp-section">
        <h2>Top Self-Help Books</h2>
        <div class="selfhelp-book-list">
            <div class="selfhelp-book">
                <img src="img/atomic-habits.jpg" alt="Atomic Habits">
                <div>
                    <h3> Atomic Habits</h3>
                    <p>James Clear’s best-selling book teaches you how tiny changes can create remarkable results. Learn
                        practical
                        strategies to build good habits and break bad ones effortlessly.</p>
                </div>
            </div>

            <div class="selfhelp-book">
                <img src="img/the-power-of-now.jpg" alt="The Power of Now">
                <div>
                    <h3> The Power of Now</h3>
                    <p>Eckhart Tolle’s spiritual classic emphasizes living fully in the present moment to find peace,
                        joy, and
                        enlightenment in daily life.</p>
                </div>
            </div>

            <div class="selfhelp-book">
                <img src="img/you-are-a-badass.jpg" alt="You Are a Badass">
                <div>
                    <h3> You Are a Badass</h3>
                    <p>Jen Sincero’s motivational masterpiece encourages you to embrace your inner strength, stop
                        doubting yourself, and
                        start living your best life today.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="selfhelp-footer">
        &copy; 2025 SelfHelp World. All rights reserved.
    </footer>

    <script>
        // Scroll to top on refresh
        document.addEventListener("DOMContentLoaded", function () {
            window.onbeforeunload = function () {
                window.scrollTo(0, 0);
            };
        });
    </script>
</body>

</html>