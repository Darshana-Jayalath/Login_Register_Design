<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="dashboard.css" />
  <link href='https://cdn.boxicons.com/3.0.3/fonts/basic/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <h1>Welcome, <span><?php echo htmlspecialchars($username); ?></span> 🎉</h1>
    <p class="subtext">We’re happy to see you again!</p>

    <!-- Surprise Box -->
    <div class="surprise-container">
      <div class="gift-box" id="giftBox">
        <div class="lid"></div>
        <div class="ribbon"></div>
        <div class="box-body">
          <p>Click the gift box to open your surprise!</p>
        </div>
      </div>

      <div class="surprise-message" id="surpriseMessage">
        <h2>🎁 Surprise! 🎉</h2>
        <p>Thank you for logging in, <b><?php echo htmlspecialchars($username); ?></b>!</p>
        <p>You’re awesome — have a great day! 🌟</p>
        <a href="logout.php" class="logout-btn">Logout</a>
      </div>
    </div>
  </div>

  <script>
    const giftBox = document.getElementById("giftBox");
    const surpriseMessage = document.getElementById("surpriseMessage");

    giftBox.addEventListener("click", () => {
      giftBox.classList.add("open");
      setTimeout(() => {
        surpriseMessage.classList.add("show");
      }, 1200);
    });
  </script>
</body>
</html>
