<?php
// DB connection
include("dbconnect.php");

$biographyBooks = mysqli_query($conn, "SELECT * FROM books WHERE book_type='Non-Fiction' AND category='Biography book'");
$historyBooks = mysqli_query($conn, "SELECT * FROM books WHERE book_type='Non-Fiction' AND category='History book'");
$autobiographyBooks = mysqli_query($conn, "SELECT * FROM books WHERE book_type='Non-Fiction' AND category='Autobiography book'");
$selfhelpBooks = mysqli_query($conn, "SELECT * FROM books WHERE book_type='Non-Fiction' AND category='Self-help book'");
$travelBooks = mysqli_query($conn, "SELECT * FROM books WHERE book_type='Non-Fiction' AND category='Travels book'");
$cookBooks = mysqli_query($conn, "SELECT * FROM books WHERE book_type='Non-Fiction' AND category='cooks book'");
$photographyBooks = mysqli_query($conn, "SELECT * FROM books WHERE book_type='Non-Fiction' AND category='photography book'");
$philosophyBooks = mysqli_query($conn, "SELECT * FROM books WHERE book_type='Non-Fiction' AND category='Philosophy book'");
$natureBooks = mysqli_query($conn, "SELECT * FROM books WHERE book_type='Non-Fiction' AND category='Nature book'");
$memoryBooks = mysqli_query($conn, "SELECT * FROM books WHERE book_type='Non-Fiction' AND category='Memory book'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiction Books</title>
    <link rel="icon" type="image/png" href="img/library logo.png">
    <link rel="stylesheet" href="styles.css" />

    
  
</head>

<body class="fication-body">
    <?php include('header.php'); ?>

    <?php
    function fiction_renderCarousel($result, $carouselId, $title)
    {
        ?>
        <h2 class="titlt-book-section"><?= htmlspecialchars($title) ?></h2>
        <div class="fiction-carousel-wrapper" style="position: relative;">
            <button class="fiction-arrow-btn fiction-arrow-left" onclick="slideLeft('<?= $carouselId ?>')">&#10094;</button>
            <div id="<?= $carouselId ?>" class="fiction-carousel">
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <div class="fiction-book-card">
                            <img src="<?= htmlspecialchars($row['image_path']) ?>" alt="Book Image">
                            <p><strong>Title:</strong> <?= htmlspecialchars($row['title']) ?></p>
                            <p><strong>Author:</strong> <?= htmlspecialchars($row['author_name'] ?? 'N/A') ?></p>

                            <div class="button-row">
                                <button class="save-btn" onclick="saveBook(<?= $row['book_id'] ?>)">
                                    <i class="fa-solid fa-bookmark"></i> Save Book
                                </button>
                                <button class="fiction-read-btn"
                                    onclick="openReadWindow('<?= $row['book_id'] ?>','<?= htmlspecialchars($row['book_path']) ?>')">
                                    <i class="fa-solid fa-book-open"></i> Read
                                </button>
                                <button class="fiction-download-btn"
                                    onclick="downloadBook('<?= $row['book_id'] ?>','<?= htmlspecialchars($row['book_path']) ?>')">
                                    <i class="fa-solid fa-download"></i> Download
                                </button>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No books found.</p>
                <?php endif; ?>
            </div>
            <button class="fiction-arrow-btn fiction-arrow-right"
                onclick="slideRight('<?= $carouselId ?>')">&#10095;</button>
        </div>
        <?php
    }
fiction_renderCarousel($biographyBooks, "carouselBiography", "Biography Books");
    fiction_renderCarousel($historyBooks, "carouselHistory", "History Books");
    fiction_renderCarousel($autobiographyBooks, "carouselAutobiography", "Autobiography Books");
    fiction_renderCarousel($selfhelpBooks, "carouselSelfHelp", "Self-help Books");
    fiction_renderCarousel($travelBooks, "carouselTravel", "Travel Books");
    fiction_renderCarousel($cookBooks, "carouselCook", "Cook Books");
    fiction_renderCarousel($photographyBooks, "carouselPhotography", "Photography Books");
    fiction_renderCarousel($philosophyBooks, "carouselPhilosophy", "Philosophy Books");
    fiction_renderCarousel($natureBooks, "nf-carouselNature", "Nature Books");
    fiction_renderCarousel($memoryBooks, "nf-carouselMemory", "Memory Books");
    ?>

    <?php include 'footer.php'; ?>

    <script src="javascript.js"></script>
    <script>
        function trackActivity(bookId, actionType) {
            return fetch('track_activity.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'book_id=' + encodeURIComponent(bookId) + '&action_type=' + encodeURIComponent(actionType)
            }).then(response => response.text());
        }

        function openReadWindow(bookId, bookPath) {
            trackActivity(bookId, 'read').then(data => {
                if (data.includes("blocked")) {
                    alert(" You have already used your 30-minute reading time today. Please come back tomorrow.");
                    return;
                }
                const fullPath = decodeURIComponent(bookPath);
                const win = window.open(fullPath, '_blank');
                setTimeout(() => {
                    if (win && !win.closed) {
                        win.close();
                        alert(" Your 30 minutes are up. Please come back tomorrow.");
                    }
                }, 10000);
            });
        }

        function downloadBook(bookId, bookPath) {
            trackActivity(bookId, 'download').then(data => {
                if (data.includes("blocked")) {
                    alert(" You can only download one book per day.");
                    return;
                }
                const link = document.createElement('a');
                link.href = decodeURIComponent(bookPath);
                link.download = '';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            });
        }

        function saveBook(bookId) {
            fetch('save_book.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'book_id=' + encodeURIComponent(bookId)
            })
                .then(response => response.text())
                .then(data => alert(data))
                .catch(err => alert(" Error saving book!"));
        }
    </script>
</body>
</html>