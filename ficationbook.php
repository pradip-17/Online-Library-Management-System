<?php
// DB connection
include("dbconnect.php");

$scienceBooks = mysqli_query($conn, "SELECT * FROM books WHERE book_type='Fiction' AND category='Science Book'");
$thrillerBooks = mysqli_query($conn, "SELECT * FROM books WHERE book_type='Fiction' AND category='Thriller/Suspense book'");
$sportBooks   = mysqli_query($conn, "SELECT * FROM books WHERE book_type='Fiction' AND category='Sport Book'");
$mysteryBooks = mysqli_query($conn, "SELECT * FROM books WHERE book_type='Fiction' AND category='Mystery Book'");
$newsBooks    = mysqli_query($conn, "SELECT * FROM books WHERE book_type='Fiction' AND category='News/Articles book'");
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
function fiction_renderCarousel($result, $carouselId, $title) {
?>
  <h2 class="titlt-book-section"><?= htmlspecialchars($title) ?></h2>
  <div class="fiction-carousel-wrapper">
    <button class="fiction-arrow-btn fiction-arrow-left" onclick="slideLeft('<?= $carouselId ?>')">&#10094;</button>
    <div id="<?= $carouselId ?>" class="fiction-carousel">
      <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <div class="fiction-book-card">
            <img src="<?= htmlspecialchars($row['image_path']) ?>" alt="Book Image">
            <p><strong>Title:</strong> <?= htmlspecialchars($row['title']) ?></p>
            <p><strong>Author:</strong> <?= htmlspecialchars($row['author_name'] ?? 'N/A') ?></p>
            <div class="button-row">
              <button class="save-btn" onclick="saveBook(<?= $row['book_id'] ?>)">Save Book</button>
              <button class="fiction-read-btn" onclick="openReadWindow('<?= $row['book_id'] ?>','<?= htmlspecialchars($row['book_path']) ?>')">Read</button>
              <button class="fiction-download-btn" onclick="downloadBook('<?= $row['book_id'] ?>','<?= htmlspecialchars($row['book_path']) ?>')">Download</button>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p>No books found.</p>
      <?php endif; ?>
    </div>
    <button class="fiction-arrow-btn fiction-arrow-right" onclick="slideRight('<?= $carouselId ?>')">&#10095;</button>
  </div>
<?php
}
fiction_renderCarousel($scienceBooks, "fiction-carouselScience", "Science Books");
fiction_renderCarousel($thrillerBooks, "fiction-carouselThriller", "Thriller/Suspense Books");
fiction_renderCarousel($sportBooks, "fiction-carouselSport", "Sport Books");
fiction_renderCarousel($mysteryBooks, "fiction-carouselMystery", "Mystery Books");
fiction_renderCarousel($newsBooks, "fiction-carouselNews", "News / Articles Books");
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