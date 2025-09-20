<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Mystery information</title>
    <link rel="icon" type="image/png" href="img/library logo.png">
    <link rel="stylesheet" href="styles.css" />
    <script src="javascript.js"></script>
    <link rel="stylesheet" href="css/animate.min.css">
    <script src="javascript.js"></script>
    <script src="js/wow.min.js"></script>


    <style>
        /* Mystery book information page */
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f5f7fa;
            color: #333;
            margin: 0;
            padding: 0;
        }


      
        section {
            padding: 40px 20px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 30px;
            color: #003366;
        }

        .books-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .book-card {
            background: white;
            padding: 20px 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .book-card:hover {
            transform: translateY(-5px);
        }

        .book-title {
            font-weight: bold;
            font-size: 1.3rem;
            color: #003366;
            margin-bottom: 15px;
            border-bottom: 2px solid #007ACC;
            padding-bottom: 8px;
        }

        .book-desc {
            font-size: 1rem;
            color: #555;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding-left: 30px;
            /* space for icon */
        }

        .icon {
            font-size: 1.4rem;
            color: #007ACC;
            min-width: 24px;
            text-align: center;
        }

        .mystery-book {
            background-color: #003366;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 40px;
            font-size: 0.9rem;
        }

        @media (max-width: 500px) {
            .section-title {
                font-size: 1.7rem;
            }

            .book-card {
                padding: 15px 20px;
            }

        }
    </style>
</head>

<body>

    <?php include "header.php" ?>

    <section>
        <div class="section-title"> Crime or Puzzle to Solve</div>
        <div class="books-container">
            <div class="book-card">
                <div class="book-desc"><span class="icon"></span>Central Crime or Incident — a murder, theft, or
                    disappearance starts the story.</div>
                <div class="book-desc"><span class="icon"></span>Unexplained Event — something strange or mysterious
                    demands answers.</div>
                <div class="book-desc"><span class="icon"></span>High Stakes — solving or failing the mystery has
                    serious consequences.</div>
            </div>
        </div>
    </section>

    <section>
        <div class="section-title">Investigation & Clues</div>
        <div class="books-container">
            <div class="book-card">
                <div class="book-desc"><span class="icon"></span>Interviews & Questioning — talking to suspects and
                    witnesses to gather info.</div>
                <div class="book-desc"><span class="icon"></span>Clues & Evidence — objects and facts that help piece
                    together the truth.</div>
                <div class="book-desc"><span class="icon"></span>Red Herrings & False Leads — misleading clues that
                    keep suspense alive.</div>
            </div>
        </div>
    </section>

    <section>
        <div class="section-title"> Twist and Resolution</div>
        <div class="books-container">
            <div class="book-card">
                <div class="book-desc"><span class="icon"></span>Unexpected Reveal — surprising facts or identities
                    change the story.</div>
                <div class="book-desc"><span class="icon"></span>Hidden Motives Exposed — true intentions behind
                    characters are uncovered.</div>
                <div class="book-desc"><span class="icon"></span>Logical Conclusion — the mystery is solved and all
                    loose ends tied up.</div>
            </div>
        </div>
    </section>

    <footer class="mystery-book">
        &copy; 2025 BookWorld. All rights reserved.
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