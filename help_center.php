<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Help Center</title>
  <link rel="icon" type="image/png" href="img/library logo.png">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Segoe UI, Roboto, Arial, sans-serif;
      background: #f4f7fb;
      color: #1f2937;
      line-height: 1.5;
    }

  

    .helpcenter-container {
      max-width: 1000px;
      margin: auto;
      padding: 28px 18px;
    }

    /* FAQ */
    .helpcenter-faq h2 {
      text-align: center;
      margin-bottom: 20px;
      font-size: 1.6rem;
      font-weight: 700;
      color: #072746;
    }

    .helpcenter-accordion {
      display: grid;
      gap: 14px;
    }

    .helpcenter-item {
      background: #ffffff;
      border-radius: 12px;
      box-shadow: 0 6px 18px rgba(16, 24, 40, 0.08);
      overflow: hidden;
    }

    .helpcenter-btn {
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 16px 20px;
      border: 0;
      background: none;
      cursor: pointer;
      font-weight: 600;
      font-size: 1rem;
      color: #111827;
    }

    .helpcenter-icon {
      transition: 0.2s;
      font-size: 20px;
    }

    .helpcenter-item.open .helpcenter-icon {
      transform: rotate(45deg);
    }

    .helpcenter-body {
      max-height: 0;
      overflow: hidden;
      padding: 0 20px;
      color: #6b7280;
      transition: max-height 0.4s ease, padding 0.4s ease;
      font-size: 0.95rem;
    }

    .helpcenter-item.open .helpcenter-body {
      max-height: 300px;
      padding: 0 20px 16px;
    }

    /* Contact */
    .helpcenter-contact h2 {
      text-align: center;
      margin-bottom: 18px;
      color: #072746;
    }

    .helpcenter-grid {
      display: grid;
      gap: 18px;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    }

    .helpcenter-card {
      background: #ffffff;
      padding: 22px;
      border-radius: 12px;
      box-shadow: 0 6px 18px rgba(16, 24, 40, 0.08);
      text-align: center;
      transition: 0.25s;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .helpcenter-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(16, 24, 40, 0.12);
    }

    .helpcenter-iconwrap {
      width: 60px;
      height: 60px;
      border-radius: 14px;
      margin-bottom: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 28px;
      background: linear-gradient(180deg, rgba(13, 110, 253, 0.15), rgba(7, 39, 70, 0.12));
      color: #072746;
    }

    .helpcenter-card h5 {
      margin: 6px 0;
      font-size: 1.05rem;
      color: #111827;
    }

    .helpcenter-muted {
      color: #6b7280;
      font-weight: 600;
      font-size: 0.95rem;
    }

    .help-center-cancel-btn {
      position: absolute;
      right: 20px;
      top: 5%;
      transform: translateY(-50%);
      background: #072746;
      border: none;
      color: white;
      font-size: 1.2rem;
      padding: 8px 15px;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .help-center-cancel-btn:hover {
      background: #ff1a1a;
    }
  </style>
</head>

<body>
 <?php include "header.php" ?>
  <!-- FAQ -->
  <section class="helpcenter-faq">
    <div class="helpcenter-container">
      <h2>Frequently Asked Questions</h2>
      <div class="helpcenter-accordion">

        <div class="helpcenter-item">
          <button class="helpcenter-btn">How can I create a new account? <span class="helpcenter-icon">＋</span></button>
          <div class="helpcenter-body">If you want to create a new account, then go to the login page and click on the
            register button. Fill all the required information and verify OTP. After that, you can login using your
            email & password.</div>
        </div>

        <div class="helpcenter-item">
          <button class="helpcenter-btn">How do I reset my password? <span class="helpcenter-icon">＋</span></button>
          <div class="helpcenter-body">Click "Forgot Password" → Enter email → Verify OTP → Set new password.</div>
        </div>

        <div class="helpcenter-item">
          <button class="helpcenter-btn">How can I read a book? <span class="helpcenter-icon">＋</span></button>
          <div class="helpcenter-body">Login → Go to main page → Select Fiction/Non-Fiction → Choose your book.</div>
        </div>

        <div class="helpcenter-item">
          <button class="helpcenter-btn">How can I download a book? <span class="helpcenter-icon">＋</span></button>
          <div class="helpcenter-body">Login → Go to main page → Select category → Open book page → Click download
            button.</div>
        </div>

        <div class="helpcenter-item">
          <button class="helpcenter-btn">What to do if the site doesn't work? <span
              class="helpcenter-icon">＋</span></button>
          <div class="helpcenter-body">
            ✓ Check internet connection.<br>
            ✓ Clear browser cache/cookies.<br>
            ✓ Try another browser.<br>
            ✓ Wait if server is under maintenance.<br>
            ✓ Still issues? Contact support.<br>
            📧 Email: support@onlinelibrary.com
          </div>
        </div>

        <div class="helpcenter-item">
          <button class="helpcenter-btn">How long is OTP valid? <span class="helpcenter-icon">＋</span></button>
          <div class="helpcenter-body">OTP is valid for 180 seconds. Use "Resend OTP" if expired.</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section class="helpcenter-contact">
    <div class="helpcenter-container">
      <h2>Need More Help?</h2>
      <div class="helpcenter-grid">
        <div class="helpcenter-card">
          <div class="helpcenter-iconwrap">📧</div>
          <h5>Email Us</h5>
          <p class="helpcenter-muted">support@onlinelibrary.com</p>
        </div>
        <div class="helpcenter-card">
          <div class="helpcenter-iconwrap">📞</div>
          <h5>Call Us</h5>
          <p class="helpcenter-muted">+91 98765 43210</p>
        </div>
        <div class="helpcenter-card">
          <div class="helpcenter-iconwrap">💬</div>
          <h5>Live Chat</h5>
          <p class="helpcenter-muted">Chat with our support team <br>+91 76220 89347</p>
        </div>
      </div>
    </div>
  </section>

  <script>
    document.querySelectorAll('.helpcenter-btn').forEach(btn => {
      btn.onclick = () => {
        const item = btn.parentElement;
        const isOpen = item.classList.contains('open');
        document.querySelectorAll('.helpcenter-item').forEach(i => i.classList.remove('open'));
        if (!isOpen) {
          item.classList.add('open');
        }
      };
    });

    // when you refersh page then reload page top
    document.addEventListener("DOMContentLoaded", function () {
      window.onbeforeunload = function () {
        window.scrollTo(0, 0);
      };
    });

  </script>
</body>

</html>