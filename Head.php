<html>

<head>


  <style>
    body {
      margin: 0;
      font-family: Gilroy, sans-serif;
    }

    .header {
      overflow: hidden;
      background: linear-gradient(to top, red, black);
      color: #fff;
      padding: 10px 0;
      text-align: center;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .header a {
      color: #fff;
      text-decoration: none;
      padding: 12px 20px;
      display: inline-block;
      transition: background-color 0.3s;
      border-radius: 5px;
      margin-right: 10px;
    }

    .header logo {
      font-size: 24px;
      font-weight: bold;
    }

    .header a:hover {
      background-color: salmon;
    }


    @media screen and (max-width: 768px) {
      .header a.logo {
        font-size: 20px;
      }

      .header a {
        padding: 10px 15px;
        margin-right: 5px;
      }
    }


    .header a.act {
      background: linear-gradient(to right, #fd746c, #ff9068);
      color: #fff;
      border-radius: 30px;
    }


    .header a.logo2 {
      background-color: #555;
    }
  </style>
</head>

<body>
  <div class="header">
    <h1 class="logo" <?php
      echo "class='logo2'"; ?>>Blood Bank & Donation </h1>
    <div class="header-right">
    <a href="Home.php" <?php if ($active == 'home')
        echo "class='act'"; ?>>Home</a>
      <a href="About_us.php" <?php if ($active == 'about')
        echo "class='act'"; ?>>About Us</a>
      <a href="Why_donate_blood.php" <?php if ($active == 'why')
        echo "class='act'"; ?>>Why Donate Blood</a>
      <a href="Donate_blood.php" <?php if ($active == 'donate')
        echo "class='act'"; ?>>Become A Donor</a>
      <a href="Need_blood.php" <?php if ($active == 'need')
        echo "class='act'"; ?>>Need Blood</a>
      <a href="Contact_us.php" <?php if ($active == 'contact')
        echo "class='act'"; ?>>Contact Us</a>
      <a href="Admin/Login.php" <?php if ($active == 'login')
        echo "class='act'"; ?>>Admin Login</a>
    </div>
  </div>

</body>

</html>