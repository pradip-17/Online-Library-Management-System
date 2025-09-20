<style>
/* Header */
.main-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #f1f6f7ff;
    padding: 10px 20px;
    margin-bottom: 70px;
    position: sticky;
    top: 0;
    z-index: 1000;
}

/* Logo */
.main-header .logo {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 18px;
    font-weight: bold;
    color: #222;
}
.main-header .logo img {
    height: 35px;
}

/* Navbar */
.main-header .navbar {
    display: flex;
    gap: 50px;
    margin-left: 220px;
}
.main-header .navbar a {
    text-decoration: none;
    color: #333;
    font-size: 16px;
    transition: color 0.3s;
}
.main-header .navbar a:hover {
    color: #0077cc;
}

/* Search form */
.search-form {
    position: relative;
    display: flex;
    align-items: center;
    gap: 8px;
}
.search-form input {
    padding: 6px 10px;
    font-size: 15px;
    border: 1px solid #aaa;
    border-radius: 4px;
    height: 35px;
    box-sizing: border-box;
}
.search-form button {
    padding: 6px 14px;
    font-size: 15px;
    border: none;
    background: #0a1c1c;
    color: #fff;
    border-radius: 4px;
    cursor: pointer;
    height: 35px;
}
.search-form button:hover {
    background: #0077cc;
}

/* Dropdown */
.dropdown-list {
    position: absolute;
    top: 42px;
    left: 0;
    width: 100%;
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    display: none;
    z-index: 999;
    color: black;
}
.dropdown-list div {
    padding: 8px;
    cursor: pointer;
}
.dropdown-list div:hover {
    background: #f0f0f0;
}
</style>

<header class="main-header">
  <div class="logo">
    <img src="img/library logo.png" alt="logo">
    <span>online library management system</span>
  </div>

  <nav class="navbar">
    <a href="searchbook.php">home</a>
    <a href="my_book.php">my activity</a>
    <a href="saved_book.php">save book</a>
    <a href="contact_us.php">contact us</a>
    <a href="logout.php">logout</a>
  </nav>

<form class="search-form" onsubmit="searchBook(); return false;">
  <input type="text" id="searchInput" placeholder="Enter book type" autocomplete="off">
  <button type="submit">Search</button>

  <!-- Dropdown list -->
  <div class="dropdown-list" id="dropdownList">
    <div onclick="selectType('fiction')">Fiction</div>
    <div onclick="selectType('nonfiction')">Non-Fiction</div>
  </div>
</form>
</header>

<script>
const searchInput = document.getElementById('searchInput');
const dropdownList = document.getElementById('dropdownList');

// open dropdown when clicking on input
searchInput.addEventListener('click', () => {
    dropdownList.style.display = "block";
});

// select value from dropdown
function selectType(type) {
    searchInput.value = type;
    dropdownList.style.display = "none";
}

// search button click
function searchBook() {
    const type = searchInput.value.trim().toLowerCase();

    if (type === "fiction") {
        window.location.href = "ficationbook.php";  // fiction page
    } else if (type === "nonfiction") {
        window.location.href = "non-ficationbook.php"; // non-fiction page
    } else {
        alert("Please select Fiction or Non-Fiction");
    }
}

// close dropdown if clicked outside
document.addEventListener('click', function (event) {
    if (!event.target.closest('.search-form')) {
        dropdownList.style.display = "none";
    }
});
</script>