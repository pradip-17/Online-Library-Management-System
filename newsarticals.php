<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> News Article Information</title>
    <link rel="icon" type="image/png" href="img/library logo.png">
    <link rel="stylesheet" href="styles.css" />
    <script src="javascript.js"></script>
    <link rel="stylesheet" href="css/animate.min.css">
    <script src="js/wow.min.js"></script>

 
</head>


<body class="news-article-page">
    <!-- Header -->
    <?php include "header.php" ?>


    <!--  Section -->
    <section class=" news-article-section">
        <h2 class="news-article-title">Explore the Latest Articles</h2>
        <div class="news-article-container">
            <div class="news-article-card">
                <div class="news-article-card-title">Breaking News Coverage</div>
                <p class="news-article-card-desc">Stay updated with real-time global headlines and breaking stories that
                    shape our world.</p>
            </div>
            <div class="news-article-card">
                <div class="news-article-card-title">Editorials & Opinions</div>
                <p class="news-article-card-desc">Expert opinions and deep insights on politics, society, and the
                    economy from trusted journalists.</p>
            </div>
            <div class="news-article-card">
                <div class="news-article-card-title">Investigative Reports</div>
                <p class="news-article-card-desc">Explore detailed investigative journalism revealing facts and
                    uncovering hidden truths.</p>
            </div>
            <div class="news-article-card">
                <div class="news-article-card-title">Technology & Innovation</div>
                <p class="news-article-card-desc">Discover the latest tech news, gadgets, and trends reshaping
                    industries globally.</p>
            </div>
            <div class="news-article-card">
                <div class="news-article-card-title">Sports & Entertainment</div>
                <p class="news-article-card-desc">Follow sports updates, celebrity news, and entertainment industry
                    stories in one place.</p>
            </div>
            <div class="news-article-card">
                <div class="news-article-card-title">Health & Lifestyle</div>
                <p class="news-article-card-desc">Guides and articles on fitness, diet, mental health, and improving
                    your daily life.</p>
            </div>
        </div>


    </section>

    <!--  Footer -->
    <footer class="news-article-footer">
        <p>© 2025 NewsPortal. All Rights Reserved.</p>
    </footer>

    <script>
        // Scroll top on refresh
        document.addEventListener("DOMContentLoaded", function () {
            window.onbeforeunload = function () {
                window.scrollTo(0, 0);
            };
        });
    </script>
</body>

</html>