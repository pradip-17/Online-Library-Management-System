<?php
session_start();
include("dbconnect.php");

if (!isset($_SESSION['user_id'])) {
    echo " Please login to view saved books.";
    exit;
}

$userId = $_SESSION['user_id'];

$query = $conn->prepare("
    SELECT books.book_id, books.title, books.author_name, books.image_path, books.book_path, saved_book.saved_at
    FROM saved_book
    JOIN books ON saved_book.book_id = books.book_id
    WHERE saved_book.user_id = ?
    ORDER BY saved_book.saved_at ASC
");
$query->bind_param("i", $userId);
$query->execute();
$result = $query->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<link rel="icon" type="image/png" href="img/library logo.png">

<head>
    <meta charset="UTF-8">
    <title>Saved Books</title>
    <link rel="stylesheet" href="css/animate.min.css">
    <script src="javascript.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <style>
        body.savebook-body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #012d38ff;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Container */
        .savebook-container {
            max-width: 900px;
            margin: 30px auto;
            padding: 0 15px;
        }

        /* Book Card */
        .savebook-card {
            background: #a0c8d2ff;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            display: flex;
            gap: 20px;
            align-items: flex-start;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .savebook-image {
            width: 120px;
            height: 160px;
            border-radius: 10px;
            object-fit: cover;
        }

        .savebook-details {
            flex: 1;
        }

        .savebook-title {
            font-size: 1.5rem;
            color: #222;
            margin: 0;
        }

        .savebook-author {
            font-size: 1rem;
            color: #555;
            margin: 8px 0;
        }

        .savebook-date {
            font-size: 0.9rem;
            color: #888;
            margin-bottom: 10px;
        }

        .savebook-read-btn {
            background: #ff7b54;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s ease;
            margin-right: 10px;
        }

        .savebook-read-btn:hover {
            background: #e84a27;
        }

        .savebook-cancel-btn {
            background: #4444ff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s ease;
        }

        .savebook-cancel-btn:hover {
            background: #2222cc;
        }

        .savebook-empty {
            text-align: center;
            font-size: 1.2rem;
            color: #fff;
            background: rgba(0, 0, 0, 0.4);
            padding: 20px;
            border-radius: 12px;
        }
    </style>
</head>

<body class="savebook-body">


    <?php include "header.php" ?>

    <div class="savebook-container">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="wow slideInLeft savebook-card">
                    <img src="<?= htmlspecialchars($row['image_path']) ?>" alt="Book Image" class="savebook-image">
                    <div class="savebook-details">
                        <h3 class="savebook-title"><?= htmlspecialchars($row['title']) ?></h3>
                        <p class="savebook-author"><strong>Author:</strong> <?= htmlspecialchars($row['author_name']) ?></p>
                        <p class="savebook-date"> Saved on: <?= $row['saved_at'] ?></p>
                        <button class="savebook-read-btn"
                            onclick="readBook(<?= $row['book_id'] ?>, '<?= htmlspecialchars($row['book_path']) ?>')">
                            Read Now
                        </button>
                        <button class="savebook-cancel-btn" onclick="cancelSave(<?= $row['book_id'] ?>, this)">Cancel </button>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="savebook-empty">You haven't saved any books yet!</p>
        <?php endif; ?>
    </div>

    <script>
        function readBook(bookId, bookPath) {
            fetch('track_activity.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'book_id=' + bookId + '&action_type=read'
            })
                .then(res => res.text())
                .then(data => {
                    if (data === "success") {
                        let newTab = window.open(bookPath, '_blank');
                        alert("You can read this book for 10 seconds.");

                        setTimeout(() => {
                            if (newTab && !newTab.closed) {
                                newTab.close();
                                alert(" Time is over! The book is closed.");
                            }
                        }, 10000);
                    } else if (data === "blocked:already_done_today") {
                        alert("You have already read a book today.");
                    } else {
                        alert("Error: " + data);
                    }
                })
                .catch(err => {
                    alert("Something went wrong: " + err);
                });
        }

        function cancelSave(bookId, button) {
            if (!confirm("Are you sure you want to remove this book from saved list?")) return;

            fetch('unsave_book.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'book_id=' + bookId
            })
                .then(res => res.text())
                .then(data => {
                    if (data === "success") {
                        alert("Book removed from saved list.");
                        button.closest('.savebook-card').remove();
                    } else {
                        alert("Error: " + data);
                    }
                })
                .catch(err => alert("Something went wrong: " + err));
        }
    </script>
</body>

</html>