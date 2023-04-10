<header class="header">
  <nav class="navbar navbar-expand-lg header-nav navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <ion-icon name="hammer-sharp"></ion-icon>
        Admin Dashboard
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "index.php" ) {
              echo "active";
            } else {
              echo "";
            } ?>" href="index.php">
              <ion-icon name="home-sharp"></ion-icon>
              หน้าหลัก
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == "accounts.php" ? "
            active":""; ?>" href="accounts.php">
              <ion-icon name="logo-codepen"></ion-icon>
              ผู้ใช้
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == "download.php" ? "
            active":""; ?>" href="download.php">
              <ion-icon name="logo-codepen"></ion-icon>
              ดาวน์โหลด
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == "settings.php" ? "
            active":""; ?>" href="settings.php">
              <ion-icon name="logo-codepen"></ion-icon>
              เว็บ
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == "oder.php" ? "
            active":""; ?>" href="oder.php">
              <ion-icon name="logo-codepen"></ion-icon>
              จำนวน
            </a>
          </li>

        </ul>
        <ul class="navbar-nav ms-auto">
          <a href="../logout.php" class="btn btn-outline-danger">
            ออกจากระบบ
          </a>
        </ul>
      </div>
    </div>
  </nav>
</header>