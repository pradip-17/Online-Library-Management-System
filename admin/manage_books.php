<?php
session_start();
include("../dbconnect.php");

// History Insert Function
function insertHistory($conn, $book_id, $action_type)
{
    $stmt = $conn->prepare("INSERT INTO book_history (book_id, action_type, action_date) VALUES (?, ?, NOW())");
    $stmt->bind_param("is", $book_id, $action_type);
    $stmt->execute();
    $stmt->close();
}

// ADD BOOK
if (isset($_POST['add_book'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author_name = mysqli_real_escape_string($conn, $_POST['author_name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $book_type = mysqli_real_escape_string($conn, $_POST['book_type']);

    // Image Upload
    $image_path = "";
    if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] == 0) {
        $targetDir = "../uploads/";
        if (!is_dir($targetDir))
            mkdir($targetDir, 0777, true);

        $filename = time() . "_" . basename($_FILES["image_file"]["name"]);
        $targetFile = $targetDir . $filename;
        if (move_uploaded_file($_FILES["image_file"]["tmp_name"], $targetFile)) {
            $image_path = "uploads/" . $filename;
        }
    }

    //  Book File Upload
    $book_path = "";
    if (isset($_FILES['book_file']) && $_FILES['book_file']['error'] == 0) {
        $bookDir = "../book_upload/";
        if (!is_dir($bookDir))
            mkdir($bookDir, 0777, true);

        $bookFilename = time() . "_" . basename($_FILES["book_file"]["name"]);
        $bookTarget = $bookDir . $bookFilename;
        if (move_uploaded_file($_FILES["book_file"]["tmp_name"], $bookTarget)) {
            $book_path = "book_upload/" . $bookFilename;
        }
    }

    $query = "INSERT INTO books (title, author_name, category, image_path, book_path, book_type) 
              VALUES ('$title', '$author_name', '$category', '$image_path', '$book_path', '$book_type')";
    if (mysqli_query($conn, $query)) {
        $last_id = mysqli_insert_id($conn);
        insertHistory($conn, $last_id, 'Added');
        $_SESSION['msg'] = " Book added successfully!";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['msg'] = " Failed to add book!";
        $_SESSION['msg_type'] = "error";
    }
    header("Location: manage_books.php");
    exit();
}

//  DELETE BOOK

if (isset($_GET['delete'])) {
    $book_id = intval($_GET['delete']);
    insertHistory($conn, $book_id, 'Deleted');
    if (mysqli_query($conn, "DELETE FROM books WHERE book_id=$book_id")) {
        $_SESSION['msg'] = " Book deleted successfully!";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['msg'] = " Failed to delete book!";
        $_SESSION['msg_type'] = "error";
    }
    header("Location: manage_books.php");
    exit();
}

// UPDATE BOOK
if (isset($_POST['update_book'])) {
    $book_id = intval($_POST['book_id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author_name = mysqli_real_escape_string($conn, $_POST['author_name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $book_type = mysqli_real_escape_string($conn, $_POST['book_type']);
    $old_image = mysqli_real_escape_string($conn, $_POST['old_image']);
    $old_book = mysqli_real_escape_string($conn, $_POST['old_book']);

    // Image Upload
    $image_path = $old_image;
    if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] == 0) {
        $targetDir = "../uploads/";
        if (!is_dir($targetDir))
            mkdir($targetDir, 0777, true);

        $filename = time() . "_" . basename($_FILES["image_file"]["name"]);
        $targetFile = $targetDir . $filename;
        if (move_uploaded_file($_FILES["image_file"]["tmp_name"], $targetFile)) {
            $image_path = "uploads/" . $filename;
        }
    }

    //  Book File Upload
    $book_path = $old_book;
    if (isset($_FILES['book_file']) && $_FILES['book_file']['error'] == 0) {
        $bookDir = "../book_upload/";
        if (!is_dir($bookDir))
            mkdir($bookDir, 0777, true);

        $bookFilename = time() . "_" . basename($_FILES["book_file"]["name"]);
        $bookTarget = $bookDir . $bookFilename;
        if (move_uploaded_file($_FILES["book_file"]["tmp_name"], $bookTarget)) {
            $book_path = "book_upload/" . $bookFilename;
        }
    }

    $query = "UPDATE books SET 
                title='$title',
                author_name='$author_name',
                category='$category',
                image_path='$image_path',
                book_path='$book_path',
                book_type='$book_type'
              WHERE book_id=$book_id";
    if (mysqli_query($conn, $query)) {
        insertHistory($conn, $book_id, 'Updated');
        $_SESSION['msg'] = " Book updated successfully!";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['msg'] = " Failed to update book!";
        $_SESSION['msg_type'] = "error";
    }
    header("Location: manage_books.php");
    exit();
}

// FETCH BOOKS
$result = mysqli_query($conn, "SELECT * FROM books ORDER BY book_id ASC");

// BOOK TYPE & CATEGORY
$categoryOptions = [
    "Fiction" => ["Science Book", "Sport Book", "News/Articles Book", "Mystery Book", "Thriller/Suspense Book"],
    "Non-Fiction" => ["Biography Book", "History Book", "Autobiography Book", "Self-help Book", "Travels Book", "Cooks Book", "Photography Book", "Philosophy Book", "Nature Book", "Memory Book"]
];

$edit_row = null;
if (isset($_GET['edit'])) {
    $book_id = intval($_GET['edit']);
    $edit_result = mysqli_query($conn, "SELECT * FROM books WHERE book_id=$book_id");
    if (mysqli_num_rows($edit_result) == 1) {
        $edit_row = mysqli_fetch_assoc($edit_result);
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Manage Books</title>
    <link rel="icon" type="image/png" href="../img/library logo.png">
    <style>
        html {
            overflow-y: scroll;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #eef1f5;
            overflow-x: hidden;
        }

        .sidebar {
            width: 220px;
            height: 100vh;
            background: #333;
            position: fixed;
            color: white;
            padding-top: 20px;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 15px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: #575757;
        }

        .main {
            margin-left: 220px;
            padding: 30px;
            width: calc(100% - 220px);
        }

        .form-box {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        input[type=text],
        select,
        input[type=file] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input[type=submit] {
            background: #007bff;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background: #0056b3;
        }

        .table-container {
            overflow-x: auto;
            background: #fff;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            table-layout: fixed;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
            word-wrap: break-word;
        }

        th {
            background: #343a40;
            color: #fff;
        }

        th:nth-child(2),
        td:nth-child(2) {
            width: 180px;
        }

        /* Title */
        th:nth-child(3),
        td:nth-child(3) {
            width: 140px;
        }

        /* Author */
        th:nth-child(8),
        td:nth-child(8) {
            width: 120px;
            text-align: center;
        }

        /* Actions */
        a.edit {
            color: green;
        }

        a.delete {
            color: red;
        }

        img {
            border-radius: 4px;
        }

        /*  Toast Message */
        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 20px;
            border-radius: 6px;
            color: white;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            z-index: 9999;
            display: none;
        }

        .toast.success {
            background: #28a745;
        }

        .toast.error {
            background: #dc3545;
        }
    </style>
</head>

<body>
    <?php include("sidebar.php"); ?>
    <?php include("navbar.php"); ?>

    <!--  Toast Notification -->
    <?php if (isset($_SESSION['msg'])): ?>
        <div class="toast <?php echo $_SESSION['msg_type']; ?>" id="toastMsg">
            <?php echo $_SESSION['msg']; ?>
        </div>
        <script>
            const toast = document.getElementById("toastMsg");
            toast.style.display = "block";
            setTimeout(() => { toast.style.display = "none"; }, 3000);
        </script>
        <?php unset($_SESSION['msg']);
        unset($_SESSION['msg_type']); ?>
    <?php endif; ?>

    <div class="main">
        <h2><?php echo $edit_row ? 'Edit Book' : 'Add Book'; ?></h2>

        <form method="POST" enctype="multipart/form-data" class="form-box">
            <?php if ($edit_row): ?>
                <input type="hidden" name="book_id" value="<?php echo $edit_row['book_id']; ?>">
                <input type="hidden" name="old_image" value="<?php echo $edit_row['image_path']; ?>">
                <input type="hidden" name="old_book" value="<?php echo $edit_row['book_path']; ?>">
            <?php endif; ?>

            <input type="text" name="title" maxlength="40" placeholder="Book Title" required
                value="<?php echo $edit_row ? htmlspecialchars($edit_row['title']) : ''; ?>">
            <input type="text" name="author_name" maxlength="40" placeholder="Author Name" required
                value="<?php echo $edit_row ? htmlspecialchars($edit_row['author_name']) : ''; ?>">

            <select id="book_type" name="book_type" onchange="updateCategory()" required>
                <option value="">Select Book Type</option>
                <?php foreach ($categoryOptions as $type => $cats): ?>
                    <option value="<?php echo $type; ?>" <?php if ($edit_row && $edit_row['book_type'] == $type)
                           echo 'selected'; ?>>
                        <?php echo $type; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <select id="category" name="category" required>
                <option value="">Select Category</option>
                <?php if ($edit_row):
                    foreach ($categoryOptions[$edit_row['book_type']] as $cat): ?>
                        <option value="<?php echo $cat; ?>" <?php if ($edit_row['category'] == $cat)
                               echo 'selected'; ?>>
                            <?php echo $cat; ?>
                        </option>
                    <?php endforeach; endif; ?>
            </select>

            <label>Upload Image:</label>
            <input type="file" name="image_file" accept="image/*" <?php echo $edit_row ? '' : 'required'; ?>>

            <label>Upload Book File:</label>
            <input type="file" name="book_file" accept=".pdf,.doc,.docx" <?php echo $edit_row ? '' : 'required'; ?>>

            <input type="submit" name="<?php echo $edit_row ? 'update_book' : 'add_book'; ?>"
                value="<?php echo $edit_row ? 'Update Book' : 'Add Book'; ?>">
        </form>

        <div class="table-container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Book File</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['book_id']; ?></td>
                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                        <td><?php echo htmlspecialchars($row['author_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['category']); ?></td>
                        <td><?php echo $row['image_path'] ? "<img src='../{$row['image_path']}' width='50'>" : 'No Image'; ?>
                        </td>
                        <td>
                            <?php if ($row['book_path']) { ?>
                                <a href="../<?php echo $row['book_path']; ?>" target="_blank">View File</a>
                            <?php } else {
                                echo "No File";
                            } ?>
                        </td>
                        <td><?php echo htmlspecialchars($row['book_type']); ?></td>
                        <td>
                            <a class="edit" href="?edit=<?php echo $row['book_id']; ?>">Edit</a> |
                            <a class="delete" href="?delete=<?php echo $row['book_id']; ?>"
                                onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <script>
        const categoryOptions = <?php echo json_encode($categoryOptions); ?>;
        function updateCategory() {
            const typeSelect = document.getElementById("book_type");
            const categorySelect = document.getElementById("category");
            const selectedType = typeSelect.value;
            categorySelect.innerHTML = '<option value="">Select Category</option>';
            if (selectedType && categoryOptions[selectedType]) {
                categoryOptions[selectedType].forEach(cat => {
                    const opt = document.createElement("option");
                    opt.value = cat;
                    opt.textContent = cat;
                    categorySelect.appendChild(opt);
                });
            }
        }
    </script>
</body>

</html>