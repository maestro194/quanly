<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c71231073e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/css/datepicker.css">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap">
    <link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/footer_mobie.css">
    <link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/home.css">
    <link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/loading.css">
    <link rel="shortcut icon" href="<?php echo $actual_link ?>/public/images/default/icon.ico" type="image/x-icon">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" /> -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.js"></script> -->
    <title><?php echo $name_page ?></title>
</head>

<?php 
    if ($name_page == "Tổng quan"){
      $type="overView";
    } else if ($name_page == "Khoản thu"){
      $type="revenue";
    } else if ($name_page == "Khoản chi"){
      $type="expense";
    }
?>

<style>
  <?php echo "#".$type?> {
    background-color: black;
  }
</style>

<body>
  <div class="application">
    <div class="nav-bar">
      <div class="listed-item-tabs">
        <span class="logo">
            Money
        </span>
        <span class="items">
          <span class=nav-bar-items><a href="<?php echo $actual_link ?>/home">Tổng quan</a></span>
          <span class=nav-bar-items><a href="<?php echo $actual_link ?>/home/Thu">Khoản thu</a></span>
          <span class=nav-bar-items><a href="<?php echo $actual_link ?>/home/Chi">Khoản chi</a></span>
        </span>
        <span class="search-icon">
          <?php if (isset($_SESSION['name'])) { ?>
            <label class="icon">
              <span class="fa fa-user"></span>
            </label>
            <input type="text" value="<?php echo $_SESSION['name'] ?>" readonly>
            <ul class="items-user">
              <li class="items-user-link"><a href="<?php echo $actual_link ?>/home">Home</a></li>
              <li class="items-user-link"><a href="<?php echo $actual_link ?>/account_info">Tài khoản</a></li>
              <hr>
              <li class="items-user-link"><a href="<?php echo $actual_link ?>/account/logout">Đăng xuất</a></li>
            </ul>
          <?php } else { ?>
            <a href="" class="btn-login">
              Đăng kí tài khoản
            </a>
          <?php } ?>
        </span>
      </div>
    </div>

    <nav class="mobie-alert navigation navigation--inline">
      <ul>
        <li>
          <a id="overView" class="home-mobie-icon" href="<?php echo $actual_link ?>/home">
            <i class="icon icon--2x fa-solid fa-chart-pie"></i>
          </a>
        </li>
        <li>
          <a id="revenue" class="home-mobie-icon" href="<?php echo $actual_link ?>/home/Thu">
            <i class="icon icon--2x fa-solid fa-hand-holding-dollar"></i>
          </a>
        </li>
        <li>
          <a id="expense" class="home-mobie-icon" href="<?php echo $actual_link ?>/home/Chi">
            <i class="icon icon--2x fa-solid fa-cart-plus"></i>
          </a>
        </li>
      </ul>
    </nav>

    <div class="container">
      <?php require_once "./src/views/content/" . $view . ".php" ?>
    </div>
  
    <div class="hidden-footer"></div>
    <div class="hidden-footer-menu"></div>
  </div>
  

  <script>
    $('header ul li.btn span').click(function() {
      $('header ul div.items').toggleClass("show");
      $('header ul li.btn span').toggleClass("show");
    });
  </script>
</body>

</html>