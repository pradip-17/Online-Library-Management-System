<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>About Us | MyLibrary</title>
    <link rel="icon" type="image/png" href="img/library logo.png">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f9f9fb;
            margin: 0;
            padding: 0;
            color: #333;
        }

        * {
            box-sizing: border-box;
        }

        /* Hero Section  */
        .about-us-hero {
            background: #0d3b66;
            padding: 80px 20px;
            color: #fff;
            text-align: center;
        }

        .about-us-hero h1 {
            font-size: 3rem;
            margin: 0;
        }

        .about-us-hero p {
            font-size: 1.2rem;
            margin-top: 10px;
        }

        /*  Container  */
        .about-us-container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* Card Sections  */
        .about-us-section {
            margin-bottom: 40px;
        }

        .about-us-card {
            background: #fff;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
        }

        .about-us-card h3,
        .about-us-title {
            color: #1a73e8;
            font-weight: 700;
            margin-top: 0;
            margin-bottom: 15px;
            text-align: center;
        }

        .about-us-text {
            font-size: 1rem;
            line-height: 1.7;
            color: #444;
        }

        ul.about-us-list {
            padding-left: 20px;
            line-height: 1.7;
        }

        /* Mission/Vision/Values  */
        .about-us-mv-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .about-us-mv-card {
            flex: 1 1 300px;
            max-width: 340px;
            background: #fff;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s;
        }

        .about-us-mv-card:hover {
            transform: translateY(-5px);
        }

        /* Team Section */
        .about-us-team-section {
            padding: 50px 15px;
            text-align: center;
        }

        .about-us-team-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }

        .about-us-team-card {
            width: 250px;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
            text-align: center;
            padding: 20px;
        }

        .about-us-team-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #1a73e8;
            margin: 20px auto;
            display: block;
        }

        .about-us-card-title {
            margin: 0;
            font-size: 1.1rem;
            font-weight: 600;
        }

        /* Footer */
        .about-us-footer {
            background-color: #0d3b66;
            color: white;
            padding: 20px 0;
            text-align: center;
            margin-top: 50px;
        }

        @media (max-width: 768px) {
            .about-us-mv-card {
                flex: 1 1 100%;
            }

            .about-us-team-card {
                width: 90%;
            }
        }

        .about-us-cancel-btn {
            position: absolute;
            right: 20px;
            top: 5%;
            transform: translateY(-50%);
            background: #0d3b66;
            border: none;
            color: white;
            font-size: 1.2rem;
            padding: 8px 15px;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .about-us-cancel-btn:hover {
            background: #ff1a1a;
        }
    </style>
</head>

<body>

 <?php include "header.php" ?>

    <!-- Mission / Vision / Values -->
    <div class="about-us-container">
        <section class="about-us-mv-section">
            <div class="about-us-mv-card">
                <h4 class="about-us-title"> Our Mission</h4>
                <p class="about-us-text">
                    To provide a seamless, user-friendly online platform for book lovers, students, and educators.
                    Our mission is to make reading accessible to everyone, anywhere, anytime, and to digitize library
                    services
                    for fast and efficient book management.
                </p>
            </div>
            <div class="about-us-mv-card">
                <h4 class="about-us-title"> Our Vision</h4>
                <p class="about-us-text">
                    To transform the traditional library into a fully digital knowledge center where everyone can access
                    books and study material anytime.
                    To take education and research to new heights by connecting book lovers to the world of knowledge.
                </p>
            </div>
            <div class="about-us-mv-card">
                <h4 class="about-us-title"> Our Values</h4>
                <p class="about-us-text">
                    1. Accessibility – Books for all. <br>
                    2. Innovation – Use of modern technology. <br>
                    3. Efficiency – Fast & reliable services. <br>
                    4. Integrity – Transparency & trust. <br>
                    5. Knowledge Sharing – Open for everyone.
                </p>
            </div>
        </section>

        <!-- What We Offer  -->
        <section class="about-us-section">
            <div class="about-us-card">
                <h3> What We Offer</h3>
                <ul class="about-us-list">
                    <li>Two types of books: Fiction & Non-fiction</li>
                    <li>Easy online reading and download options</li>
                    <li>User feedback system</li>
                </ul>
            </div>
        </section>

        <!-- Why Choose Us -->
        <section class="about-us-section">
            <div class="about-us-card">
                <h3> Why Choose Us</h3>
                <ul class="about-us-list">
                    <li>Free book reading for a specific time</li>
                    <li>Modern, simple interface</li>>
                </ul>
            </div>
        </section>


    </div>

    <!-- Team Section -->
    <section class="about-us-team-section">
        <h2 class="about-us-title"> Project Makers</h2>
        <p class="about-us-text" style="text-align:center;">The people making digital learning possible</p>

        <div class="about-us-team-row">
            <div class="about-us-team-card">
                <img src="img/trushal.jpg" class="about-us-team-img" alt="Team Member">
                <h5 class="about-us-card-title">Ramani Trushal</h5>
            </div>
            <div class="about-us-team-card">
                <img src="img/pradip.jpg" class="about-us-team-img" alt="Team Member">
                <h5 class="about-us-card-title">Pradip Shiyani</h5>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="about-us-footer">
        &copy; <?php echo date("Y"); ?> MyLibrary. All rights reserved.
    </footer>

    <script>
        // when you refersh page then reload page top
        document.addEventListener("DOMContentLoaded", function () {
            window.onbeforeunload = function () {
                window.scrollTo(0, 0);
            };
        });

    </script>

</body>

</html>