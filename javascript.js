
//used for home page
//frq
document.addEventListener("DOMContentLoaded", function () {
    // Scroll to top on reload
    window.onbeforeunload = function () {
        window.scrollTo(0, 0);
    };

    // FAQ accordion toggle
    const faqButtons = document.querySelectorAll(".home-faq-btn");

    faqButtons.forEach((btn) => {
        btn.addEventListener("click", function () {
            const panel = this.nextElementSibling;

            // Close all other panels
            document.querySelectorAll(".home-faq-panel").forEach(p => {
                if (p !== panel) {
                    p.style.maxHeight = null;
                    p.previousElementSibling.classList.remove("active");
                }
            });

            // Toggle selected panel
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
                this.classList.remove("active");
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
                this.classList.add("active");
            }
        });
    });
});

// slide functions
function slideLeft(id) {
    const el = document.getElementById(id);
    el.scrollBy({ left: -300, behavior: 'smooth' });
}
function slideRight(id) {
    const el = document.getElementById(id);
    el.scrollBy({ left: 300, behavior: 'smooth' });
}

// open and close pdf
function openAndClosePDF(pdfUrl) {
    const newTab = window.open(pdfUrl, '_blank');
    if (newTab && !newTab.closed) {
        alert("⚠ your time is over , you can read tommorow.");
        setTimeout(() => {
            newTab.close();
        }, 6000);
    }
}

// toast if email not found

(function () {
    const params = new URLSearchParams(location.search);
    if (params.get('msg') === 'email_not_found') {
        alert('Email not found. Please sign up or try again.');

        // remove query from URL
        const url = new URL(location.href);
        url.searchParams.delete('msg');
        window.history.replaceState({}, '', url.pathname + (url.search ? '?' + url.search : ''));
    }
})();






// using for login page
// Toggle Password Script 

function togglePassword() {
    const passwordInput = document.getElementById("password");
    const eyeIcon = document.getElementById("eyeIcon");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.src = "img/seen.png";
    } else {
        passwordInput.type = "password";
        eyeIcon.src = "img/hide.png";
    }
}

// Autofocus: if email prefilled, focus password else focus email
window.onload = function () {
    var em = document.getElementById('email');
    var pw = document.getElementById('password');
    if (em && pw && em.value.trim() !== '') {
        pw.focus();
    } else if (em) {
        em.focus();
    }
};




// fication  and non-fication page
// Clear input and message when user comes back to this page
window.addEventListener("pageshow", function () {
    document.getElementById("searchInput").value = "";
    document.getElementById("message").innerHTML = "";
});
function slideLeft(id) { document.getElementById(id).scrollBy({ left: -230, behavior: 'smooth' }); }
function slideRight(id) { document.getElementById(id).scrollBy({ left: 230, behavior: 'smooth' }); }

//manu icon
function toggleMenu(icon) {
    icon.classList.toggle('active');
    document.getElementById('menuDetails').classList.toggle('active');
}


///
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
    const type = searchInput.value.trim();

    if (type === "ficationbook") {
        window.location.href = "ficationbook.php";  // fiction page
    } else if (type === "non-ficationbook") {
        window.location.href = "non-ficationbook.php"; // non-fiction page
    } else {
        alert("Please select Fiction or Non-Fiction");
    }
}

// close dropdown if clicked outside
document.addEventListener('click', function (event) {
    if (!event.target.closest('.search-bar')) {
        dropdownList.style.display = "none";
    }
});

