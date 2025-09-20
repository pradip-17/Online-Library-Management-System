<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>searchBook</title>
    <link rel="icon" type="image/png" href="img/library logo.png">
    <link rel="stylesheet" href="styles.css" />
    <style>
        /* Page Background */
        .searchbookpage-body {
            color: #f5f5f5;
            background: linear-gradient(180deg, #121212, #121212);
            font-family: 'Segoe UI', sans-serif;
        }

        /* Feature Carousel */
        .fiction-feature-carousel-wrapper {
            position: relative;
            max-width: 75%;
            margin: 40px auto;
            overflow: hidden;
            background: #121212;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 0 20px rgba(0, 255, 200, 0.3);
        }

        .fiction-feature-carousel {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
        }

        .fiction-feature-card {
            flex: 0 0 320px;
            margin: 0 15px;
            background: #1f1f1f;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            color: #eee;
            box-shadow: 0 0 15px rgba(0, 255, 200, 0.2);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .fiction-feature-card:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0 0 30px rgba(0, 255, 200, 0.6);
        }

        .fiction-feature-card .fiction-icon {
            width: 70px;
            height: 70px;
            margin-bottom: 15px;
            filter: drop-shadow(0 0 8px cyan);
        }

        .fiction-feature-card h3 {
            color: #00ffc3;
            font-size: 18px;
        }

        .fiction-feature-card p {
            font-size: 14px;
            color: #ccc;
        }

        /* Carousel Buttons */
        .fiction-feature-arrow-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 255, 200, 0.3);
            color: #fff;
            border: none;
            width: 40px;
            height: 40px;
            cursor: pointer;
            border-radius: 50%;
            font-size: 18px;
            z-index: 10;
            transition: 0.3s;
        }

        .fiction-feature-arrow-btn:hover {
            background: rgba(0, 255, 200, 0.7);
        }

        .fiction-feature-arrow-left {
            left: 10px;
        }

        .fiction-feature-arrow-right {
            right: 10px;
        }

        /* Headings */
        #search-book-heading {
            text-align: center;
            font-size: 2.2rem;
        }

        #search-book-heading span:first-child {
            color: #ff005c;
        }

        #search-book-heading span:last-child {
            color: #00ffc3;
        }

        #fiction-book-heading {
            color: #cdef0dff;
            text-align: center;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        /* Cards Section */
        .card-wrapper {
            width: 85%;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
        }

        .book-info-card {
            position: relative;
            width: 205px;
            height: 260px;
            border-radius: 18px;
            overflow: hidden;
            background: #fffbfbff;
            box-shadow: 0 0 20px rgba(255, 0, 100, 0.3);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .card-content {
            position: relative;
            z-index: 1;
            height: 100%;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            color: #eee;
        }

        .book-info-card h3 {
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin-top: 110px;
            color: #0a6bb0ff;
        }

        .sub-title {
            margin-top: 20px;
            text-align: center;
            font-family: serif;
            color: #011028ff;
        }

        .sub-title a {
            color: #ff005c;
            text-decoration: none;
            transition: 0.3s;
        }

        .sub-title a:hover {
            color: #fb0d0dff;
            text-shadow: 0 0 8px #ff005c
        }

        .icon-circle {
            width: 80px;
            height: 80px;
            background: #000;
            border: 2px solid #00ffc3;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px 0;
            position: absolute;
            bottom: 140px;
            transition: 0.4s;
        }

        .icon-circle img {
            width: 55px;
            height: 55px;
            filter: drop-shadow(0 0 8px #ff005c);
        }

        .icon-circle:hover {
            transform: rotate(15deg) scale(1.1);
        }

        /* Hero Section */
        .hero {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            padding: 3rem;
        }

        .hero-left h1 {
            font-size: 2.8rem;
            font-weight: bold;
            line-height: 1.3;
            color: #fff;
            margin-left: 136px;
        }


        .gradient-text {
            background: linear-gradient(to right, #ff005c, #00ffc3);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            margin-top: 1.5rem;
            font-size: 16px;
            color: #bbb;
            margin-left: 120px;

        }

        .hero-right {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .mockup-box {
            background-image: url('Img/searchbook img.png');
            border-radius: 20px;
            box-shadow: 0 0 25px rgba(0, 255, 200, 0.5);
            height: 350px;
            margin-right: 7px;
            width: 62%;
            background-size: cover;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }
        }
    </style>
</head>

<body class="searchbookpage-body">
    <?php include 'header.php'; ?>
    <div class="search-book-container">
        <h2 style="text-align:center; color:#00ffc3;">Welcome to Our Library</h2>

        <!-- Feature Section -->
        <div class="fiction-feature-carousel-wrapper">
            <button class="fiction-feature-arrow-btn fiction-feature-arrow-left"
                onclick="slideLeft('fiction-features-carousel')">&#10094;</button>
            <div id="fiction-features-carousel" class="fiction-feature-carousel">
                <div class="fiction-feature-card">
                    <img class="fiction-icon" src="img/my book img/effcient book icon.png">
                    <h3>Efficient Online Library Management</h3>
                    <p>Easily manage your entire library system online. Add new books, organize collections, track user
                        activity, and monitor records with a few clicks.</p>
                </div>
                <div class="fiction-feature-card">
                    <img class="fiction-icon" src="img/my book img/open book icon.png">
                    <h3>Read Free Library Books Online</h3>
                    <p>Seventy five more of books available through Controlled Digital Lending</p>
                </div>
                <div class="fiction-feature-card">
                    <img class="fiction-icon" src="img/my book img/high quality icon.png">
                    <h3>Read a Book for One Hour</h3>
                    <p>Build a daily habit of reading a red book for one hour in the library. Achieve your reading
                        goals.</p>
                </div>
                <div class="fiction-feature-card">
                    <img class="fiction-icon" src="img/my book img/track book img.png">
                    <h3>Keep Track of Your Favorite Books</h3>
                    <p>Easily manage and remember the books you love. Create reading lists and stay organized.</p>
                </div>
            </div>
            <button class="fiction-feature-arrow-btn fiction-feature-arrow-right"
                onclick="slideRight('fiction-features-carousel')">&#10095;</button>
        </div>

        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-left">
                <h1>
                    Smart library,<br>
                    smarter you <br>
                    <span class="gradient-text">Empower your knowledge<br>journey</span>
                </h1>
                <p>"Discover books" – Easily find books that match your interests or needs.</p>
            </div>
            <div class="hero-right">
                <div class="mockup-box"></div>
            </div>
        </section>
    </div>

    <!-- use for search book -->
    <h1 id="search-book-heading"><span>One Library Connecting</span> <span>All of India</span></h1>
    <p style="color:#ccc; text-align:center;">A Single Source Knowledge Repository</p>

    <!-- Fiction Cards -->
    <h2 id="fiction-book-heading">Fiction Book:</h2>
    <div class="card-wrapper">
        <!-- Card 1 -->
        <div class="book-info-card">
            <div class="card-content">
                <h3>SPORT</h3>
                <h4 class="sub-title">about more information <br><a href="sportbook.php">click here</a></h4>
                <div class="icon-circle">
                    <img src="img/book icon/sport book icon.png" alt="sport book icon">
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="book-info-card">
            <div class="card-content">
                <h3>THRILLER/SUSPENSE</h3>
                <h4 class="sub-title">about more information <br><a href="thiller_book.php">click here</a></h4>
                <div class="icon-circle">
                    <img src="img/book icon/thriller book icon.png" alt="thriller book icon">
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="book-info-card">
            <div class="card-content">
                <h3>MYSTERY</h3>
                <h4 class="sub-title">about more information <br><a href="mystery.php">click here</a></h4>
                <div class="icon-circle">
                    <img src="img/book icon/mystery book icon.png" alt="mystery book icon">
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="book-info-card">
            <div class="card-content">
                <h3>SCIENCE FICTION</h3>
                <h4 class="sub-title">about more information <br><a href="science.php">click here</a></h4>
                <div class="icon-circle">
                    <img src="img/book icon/science book icon.png" alt="science book icon">
                </div>
            </div>
        </div>

        <!-- Card 5 -->
        <div class="book-info-card">
            <div class="card-content">
                <h3>NEWS ARTICLES</h3>
                <h4 class="sub-title">about more information <br><a href="newsarticals.php">click here</a></h4>
                <div class="icon-circle">
                    <img src="img/book icon/news artical book icon.png" alt="news artical book icon">
                </div>
            </div>
        </div>
    </div>

    <!-- Non Fiction Cards -->
    <h2 id="fiction-book-heading">Non Fiction Book:</h2>
    <div class="card-wrapper">
        <!-- Card 1 -->
        <div class="book-info-card">
            <div class="card-content">
                <h3>BIOGRAPHY</h3>
                <h4 class="sub-title">about more information <br><a href="biography.php">click here</a></h4>
                <div class="icon-circle">
                    <img src="img/book icon/biography book icon.png" alt="biography book icon">
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="book-info-card">
            <div class="card-content">
                <h3>HISTORY BOOK</h3>
                <h4 class="sub-title">about more information <br><a href="history.php">click here</a></h4>
                <div class="icon-circle">
                    <img src="img/book icon/histroy book icon.png" alt="history book icon">
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="book-info-card">
            <div class="card-content">
                <h3>AUTOBIOGRAPHY</h3>
                <h4 class="sub-title">about more information <br><a href="autobiography.php">click here</a></h4>
                <div class="icon-circle">
                    <img src="img/book icon/autobiography book icon.png" alt="autobiography book icon">
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="book-info-card">
            <div class="card-content">
                <h3>SELF-HELP</h3>
                <h4 class="sub-title">about more information <br><a href="self_help.php">click here</a></h4>
                <div class="icon-circle">
                    <img src="img/book icon/self help book icon.png" alt="self help book icon">
                </div>
            </div>
        </div>

        <!-- Card 5 -->
        <div class="book-info-card">
            <div class="card-content">
                <h3>TRAVEL</h3>
                <h4 class="sub-title">about more information <br><a href="travel.php">click here</a></h4>
                <div class="icon-circle">
                    <img src="img/book icon/travel book icon.png" alt="travel book icon">
                </div>
            </div>
        </div>

        <!-- Card 6 -->
        <div class="book-info-card">
            <div class="card-content">
                <h3>COOKBOOKS</h3>
                <h4 class="sub-title">about more information <br><a href="cookingbooks.php">click here</a></h4>
                <div class="icon-circle">
                    <img src="img/book icon/cook book icon.png" alt="cook book icon">
                </div>
            </div>
        </div>

        <!-- Card 7-->
        <div class="book-info-card">
            <div class="card-content">
                <h3>ART/PHOTOGRAPHY</h3>
                <h4 class="sub-title">about more information <br><a href="photography.php">click here</a></h4>
                <div class="icon-circle">
                    <img src="img/book icon/art book icon.png" alt="art book icon">
                </div>
            </div>
        </div>

        <!-- Card 8 -->
        <div class="book-info-card">
            <div class="card-content">
                <h3>PHILOSOPHY</h3>
                <h4 class="sub-title">about more information <br><a href="philosophy.php">click here</a></h4>
                <div class="icon-circle">
                    <img src="img/book icon/philosophy book icon.png" alt="philosophy book icon">
                </div>
            </div>
        </div>

        <!-- Card 9 -->
        <div class="book-info-card">
            <div class="card-content">
                <h3>NATURE</h3>
                <h4 class="sub-title">about more information <br><a href="nature.php">click here</a></h4>
                <div class="icon-circle">
                    <img src="img/book icon/nature book icon.png" alt="nature book icon">
                </div>
            </div>
        </div>

        <!-- Card 10 -->
        <div class="book-info-card">
            <div class="card-content">
                <h3>MEMOIR</h3>
                <h4 class="sub-title">about more information <br><a href="memory_book.php">click here</a></h4>
                <div class="icon-circle">
                    <img src="img/book icon/memoirs book icon.png" alt="memoirs book icon">
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="javascript.js"></script>
    <script src="bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            window.onbeforeunload = function () {
                window.scrollTo(0, 0);
            };
        });
    </script>
</body>