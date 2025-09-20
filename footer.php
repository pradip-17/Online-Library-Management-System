<style>
html, body {
    height: 100%;
    margin: 0;
}

.wrapper {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.content {
    flex: 1; 
}

.footer {
    background-color: transform;
    color: #999;
    padding: 40px 20px;
    text-align: center;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.footer a {
    color: #b1b4b5ff; 
    text-decoration: none;
    font-size: 14px;
}

.footer a:hover {
    text-decoration: underline;
}

.footer-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 270px; 
    margin-top: 25px;
}

.footer-grid div p {
    font-weight: bold;
    color: #ffffffd9;
    margin-bottom: 10px;
    text-decoration: underline;
}

.footer-contact {
    margin-bottom: 25px;
    font-size: 16px;
    color: #ff6b6b;
}

.footer-contact a {
    color: #feca57;
}

@media screen and (max-width: 768px) {
    .footer-grid {
        gap: 40px;
    }
}
</style>

<footer>
    <div class="footer">
        <div class="footer-contact">
            Questions? Call <a href="tel:000-800-919-1743">+91 76220 89347</a>
        </div>
        <div class="footer-grid">
            <div>
                <p>Discover</p>
                <a href="index.php">Home</a><br>
                <a href="about_us.php">About Us</a>
            </div>
            <div>
                <p>Support</p>
                <a href="help_center.php">Help Centre</a> <br>
                <a href="admin/admin_login.php">admin</a>
            </div>
            <div>
                <p>Legal</p>
                <a href="feedback.php">Feedback</a><br>
                <a href="Privacy_policy.php">Privacy Policy</a>
            </div>
            <div>
                <p>Contact</p>
                <a href="contact_us.php">Contact Us</a>
            </div>
        </div>
    </div>
</footer>