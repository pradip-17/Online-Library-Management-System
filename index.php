<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="icon" type="image/png" href="img/library logo.png">
    <link rel="stylesheet" href="styles.css" />
    <style>
 
    </style>
</head>

<body>
    <div class="home-hero">

        <!-- header -->
        <header>
            <div class="home-logo">Online <br> Library Management System
                <div class="home-login"><button class="home-login-btn-wrapper">
                        <img src="img/login img1.png" class="home-login-icon" alt="login-icon">
                        <a href="login.php" class="home-login-link">Login</a>
                    </button></div>
            </div>
        </header>

        <!-- information -->
        <div class="home-heading">Choose your book at any time!</div>
        <div class="home-subheading">This website allows for online reading of books</div>
        <div class="home-description">It promotes ease of access and acquisition of books, simplifying user experience
        </div>

        <!-- email form -->
        <div class="home-center-form">
            <form action="check_email.php" method="post">
                <input type="email" name="email" class="home-email-input" placeholder="Enter email" required>
                <button type="submit" class="home-get-started-btn">Get Started</button>
            </form>
        </div>
    </div>

    <!-- toast -->
    <div id="toast" class="home-toast"></div>

    <!-- book showcase -->
    <div class="home-books-section">
        <h2 class="home-books-title">Here are some books</h2>

        <!-- fiction books -->
        <h2 class="home-section-title" style="color:rgba(14, 86, 141, 1)">Fiction Books</h2>
        <div class="home-carousel-container">
            <button class="home-arrow-btn home-arrow-left" onclick="slideLeft('books14')">&#10094;</button>
            <div id="books14" class="home-carousel">

                <div class="home-book-card">
                    <img src="img/my book img/thriller bookimg1.png" class="home-book-img">
                    <button onclick="openAndClosePDF('book pdf/62bb4a6e4adb7-goliath.pdf')"
                        class="home-read-btn">Read</button>
                    <button class="home-download-btn"><a href="login.php"
                            class="home-download-link">Download</a></button>
                </div>

                <div class="home-book-card">
                    <img src="img/my book img/mystery bookimg5.png" class="home-book-img">
                    <button onclick="openAndClosePDF('book pdf/62c60132c58ed-after-dark.pdf')"
                        class="home-read-btn">Read</button>
                    <button class="home-download-btn"><a href="login.php"
                            class="home-download-link">Download</a></button>

                </div>
                <div class="home-book-card">
                    <img src="img/my book img/thriller bookimg3.png" class="home-book-img">
                    <button onclick="openAndClosePDF('book pdf/62f12a6064353-rise-and-kill-first.pdf')"
                        class="home-read-btn">Read</button>
                    <button class="home-download-btn"><a href="login.php"
                            class="home-download-link">Download</a></button>

                </div>

                <div class="home-book-card">
                    <img src="img/my book img/thriller bookimg5.png" class="home-book-img">
                    <button onclick="openAndClosePDF('book pdf/63b03a1ac20a2-twisted-lies.pdf')"
                        class="home-read-btn">Read</button>
                    <button class="home-download-btn"><a href="login.php"
                            class="home-download-link">Download</a></button>

                </div>
                <div class="home-book-card">
                    <img src="img/my book img/sport bookimg6.png" class="home-book-img">
                    <button onclick="openAndClosePDF('book pdf/66d806aa81715-the-art-of-lawn-tennis.pdf')"
                        class="home-read-btn">Read</button>
                    <button class="home-download-btn"><a href="login.php"
                            class="home-download-link">Download</a></button>

                </div>
                <div class="home-book-card">
                    <img src="img/my book img/sport bookimg2.png" class="home-book-img">
                    <button onclick="openAndClosePDF('book pdf/6662396430d66-articles-into-videos.pdf')"
                        class="home-read-btn">Read</button>
                    <button class="home-download-btn"><a href="login.php"
                            class="home-download-link">Download</a></button>

                </div>

            </div>
            <button class="home-arrow-btn home-arrow-right" onclick="slideRight('books14')">&#10095;</button>
        </div>

        <!-- non-fiction books -->
        <h2 class="home-section-title" style="color:rgba(14, 86, 141, 1)">Non-Fiction Books</h2>
        <div class="home-carousel-container">
            <button class="home-arrow-btn home-arrow-left" onclick="slideLeft('books11')">&#10094;</button>
            <div id="books11" class="home-carousel">

                <div class="home-book-card">
                    <img src="img/my book img/biography bookimg2.png" class="home-book-img">
                    <button onclick="openAndClosePDF('book pdf/Adorno_ A Biography.pdf')"
                        class="home-read-btn">Read</button>
                    <button class="home-download-btn"><a href="login.php"
                            class="home-download-link">Download</a></button>
                </div>

                <div class="home-book-card">
                    <img src="img/my book img/history img3.png" class="home-book-img">
                    <button onclick="openAndClosePDF('book pdf/9780767908184.pdf')" class="home-read-btn">Read</button>
                    <button class="home-download-btn"><a href="login.php" class="home-download-link">Download</a></button>

                </div>
                <div class="home-book-card">
                    <img src="img/my book img/autobiography img1.png" class="home-book-img">
                    <button onclick="openAndClosePDF('book pdf/The-Discovery-Of-India-Jawaharlal-Nehru.pdf')"
                        class="home-read-btn">Read</button>
                    <button class="home-download-btn"><a href="login.php" class="home-download-link">Download</a></button>

                </div>
                <div class="home-book-card">
                    <img src="img/my book img/self-help  bookimg1.png" class="home-book-img">
                    <button onclick="openAndClosePDF('book pdf/Community Self-Help.pdf')"
                        class="home-read-btn">Read</button>
                    <button class="home-download-btn"><a href="login.php" class="home-download-link">Download</a></button>

                </div>
                <div class="home-book-card">
                    <img src="img/my book img/travel bookimg1.png" class="home-book-img">
                    <button onclick="openAndClosePDF('book pdf/63c5b2b2b7137-abs-diet-cookbook (1).pdf')"
                        class="home-read-btn">Read</button>
                    <button class="home-download-btn"><a href="login.php" class="home-download-link">Download</a></button>

                </div>
                <div class="home-book-card">
                    <img src="img/my book img/cook bookimg1.png" class="home-book-img">
                    <button onclick="openAndClosePDF('book pdf/63c5b2b2b7137-abs-diet-cookbook (1).pdf')"
                        class="home-read-btn">Read</button>
                    <button class="home-download-btn"><a href="login.php" class="home-download-link">Download</a></button>

                </div>
                <div class="home-book-card">
                    <img src="img/my book img/photography bookimg1.png" class="home-book-img">
                    <button onclick="openAndClosePDF('book pdf/62e2af574cf5a-wedding-photography-tips.pdf')"
                        class="home-read-btn">Read</button>
                    <button class="home-download-btn"><a href="login.php" class="home-download-link">Download</a></button>

                </div>
                <div class="home-book-card">
                    <img src="img/my book img/phyloshophy bookimg2.png" class="home-book-img">
                    <button onclick="openAndClosePDF('book pdf/Poverty-Philosophy(m.proudhon).pdf')"
                        class="home-read-btn">Read</button>
                    <button class="home-download-btn"><a href="login.php" class="home-download-link">Download</a></button>

                </div>
                <div class="home-book-card">
                    <img src="img/my book img/nature bookimg4.png" class="home-book-img">
                    <button onclick="openAndClosePDF('book pdf/07. THE GOD OF THE WOODS by( Liz Moore).pdf')"
                        class="home-read-btn">Read</button>
                    <button class="home-download-btn"><a href="login.php" class="home-download-link">Download</a></button>

                </div>
                <div class="home-book-card">
                    <img src="img/my book img/memory bookimg3.png" class="home-book-img">
                    <button
                        onclick="openAndClosePDF('book pdf/682f408958d81-hack-on-memory-find-the-angle-that-appeals-to-you.pdf')"
                        class="home-read-btn">Read</button>
                    <button class="home-download-btn"><a href="login.php" class="home-download-link">Download</a></button>
                </div>


            </div>
            <button class="home-arrow-btn home-arrow-right" onclick="slideRight('books11')">&#10095;</button>
        </div>

        <!-- info cards -->
        <h2 class="home-books-title">More reasons to join</h2>
        <div class="home-card-container">
            <div class="home-card">
                <h3>What is the online library?</h3>
                <p>A digital library is an online collection of books, articles, and multimedia resources accessible
                    through the internet.</p>
            </div>
            <div class="home-card">
                <h3>24/7 Availability:</h3>
                <p>Digital libraries can be accessed at any time, providing continuous access to resources</p>
            </div>
            <div class="home-card">
                <h3>Can multiple people read the same book?</h3>
                <p>Yes. Most digital libraries support simultaneous access, so multiple students can use the same title.
                </p>
            </div>
            <div class="home-card">
                <h3>Who benefits from digital libraries?</h3>
                <p>Students, researchers, educators, and lifelong learners all benefit from digital libraries.</p>
            </div>
        </div>

        <!-- FAQ -->
        <h2 class="home-faq-heading">Frequently Asked Questions</h2>
        <div class="home-faq-container">
            <div class="home-faq-item">
                <button class="home-faq-btn">What is a digital library? <i class="fas fa-plus"></i></button>
                <div class="home-faq-panel">
                    <p>A digital library is an online collection of books, articles, and multimedia resources accessible
                        through the internet.</p>
                </div>
            </div>
            <div class="home-faq-item">
                <button class="home-faq-btn">Difference between online and offline library? <i
                        class="fas fa-plus"></i></button>
                <div class="home-faq-panel">
                    <p>An offline library is a physical place. Online library is a platform that allows access via the
                        internet.</p>
                </div>
            </div>
            <div class="home-faq-item">
                <button class="home-faq-btn">Limitations of online library <i class="fas fa-plus"></i></button>
                <div class="home-faq-panel">
                    <p>- Needs internet <br>- Requires device <br>- Technical issues may occur <br>- No physical feel of
                        books</p>
                </div>
            </div>
            <div class="home-faq-item">
                <button class="home-faq-btn">Main features of online library <i class="fas fa-plus"></i></button>
                <div class="home-faq-panel">
                    <p>- eBooks, PDFs, videos <br>- Searchable catalog <br>- Login access <br>- 24/7 availability</p>
                </div>
            </div>
        </div>

      
<footer>  
    <div class="home-footer">  
        <div class="home-footer-contact">  
            Questions? Call <a href="tel:000-800-919-1743">+91 76220 89347</a>  
        </div>  
        <div class="home-footer-grid">  
            <div>  
                <p>Discover</p>  
                <a href="index.php">Home</a><br>  
                <a href="about_us.php">About Us</a>  
            </div>  
            <div>  
                <p>Support</p>  
                <a href="help_center.php">Help Centre</a> <br>  
                <a href="admin/admin_login.php">Admin</a>  
            </div>  
            <div>  
                <p>Legal</p>  
                <a href="Privacy_policy.php">Privacy Policy</a>  
            </div>  
            <div>  
                <p>Contact</p>  
                <a href="contact_us.php">Contact Us</a>  
            </div>  
        </div>  
    </div>  
</footer>
    </div>

    <script src="javascript.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            window.onbeforeunload = function () {
                window.scrollTo(0, 0);
            };
        });
    </script>
</body>

</html>