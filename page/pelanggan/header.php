<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="assets/css/home.css">
    <script src="https://kit.fontawesome.com/c9c55908e1.js" crossorigin="anonymous"></script>
    <title>Shoes Store</title>
    <style>
    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-toggle {
      padding: 10px;
      background-color: #fff;
      color: #000;
      border-radius: 50px;
      cursor: pointer;
      display: flex;
      align-items: center;
    }

    .dropdown-toggle .user-icon {
      margin-right: 5px;
    }

    .dropdown-menu {
      position: absolute;
      top: 110%;
      left: -55px;
      min-width: 150px;
      background-color: #fff;
      color: #000;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      padding: 10px;
      display: none;
    }

    .dropdown-menu.show {
      display: block;
    }
    .dropdown-menu h4 {
      margin:10px;
    }
    .dropdown-menu a {
      text-decoration:none;
    }
    .dropdown-menu-item {
      padding: 10px;
      cursor: pointer;
      text-decoration: none;
      color: #000;
      transition: background-color 0.3s;
    }

    .dropdown-menu-item:hover {
      background-color: #f5f5f5;
    }

    .fa-user{
        color: var(--warna-utama);
    }

    #login{
      background-color:#fff;
      padding: 10px 20px;
      text-decoration: none;
      color: var(--warna-utama);
      border-radius: 20px;
      transition: .4s;
    }
    #login:hover{
      background-color: var(--warna-utama);
      color: #fff;
    }
  </style>
</head>
<body>
    <nav>
        <div>
            <div class="logo-navbar">
                <div class="logo"><img src="assets/img/logo.png" alt="logo"></div>
                <div><h3>T-SHOES</h3><p>store</p></div>
            </div>
            <ul>
                <a href="index.php"><li><u>Home</u></li></a>
                <a href="index.php#product"><li><u>Product</u></li></a>
                <a href="index.php#about"><li><u>About</u></li></a>
                <a href="index.php#contact"><li><u>Contact</u></li></a>
            </ul>
        </div>
        <div>
            <a href="index.php?p=keranjang"><span><i class="fa fa-cart-shopping"></i></span></a>
            <?php if ($_SESSION['id_user'] === 'PLG') { ?>
              <a href="login.php" id="login">Login</a>
            <?php } else { ?>
            <div class="dropdown">
                <div class="dropdown-toggle">
                    <i class="fa fa-user"></i>
                </div>
                <div class="dropdown-menu">
                  <h4><?= $_SESSION['nama_user']?></h4>
                  <hr>
                <a href="?p=list_pesanan"><div class="dropdown-menu-item">List Pesanan</div></a>
                <div class="dropdown-menu-item">Profile</div>
                <a href="logout.php"><div class="dropdown-menu-item">Logout</div></a>
                </div>
            </div>
            <?php } ?>
            <div id="togle-menu">
                <input type="checkbox" onclick="menuToggle()" name="togle" id="togle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>