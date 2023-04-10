<?php 

    include '../db_config.php';

    $title = "SELECT * FROM settings";
    $title_query = mysqli_query($conn, $title);

 ?>

<?php foreach ($title_query as $row ) { ?>

<header class="header">
	<nav class="navbar navbar-expand-lg header-nav navbar-dark bg-dark">
	  <div class="container">
	    <a class="navbar-brand" href="">
	    	<ion-icon name="hammer-sharp"></ion-icon>
	    	<?php echo $row['username']; ?>
	    </a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
	      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

	        <li class="nav-item">
	          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "index.php") { echo 'active'; } else { echo ""; } ?>" 
	          	href="index.php">
	          	<ion-icon name="home-sharp"></ion-icon>
	          	หน้าหลัก
	          </a>
	        </li>

	        <li class="nav-item">
	          <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == "download.php" ? "active":""; ?>" 
	          	href="download.php">
	          	<ion-icon name="document-text-sharp"></ion-icon>
	          	ดาวน์โหลด
	          </a>
	        </li>

	        <li class="nav-item">
	          <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == "contact.php" ? "active":""; ?>" 
	          	href="contact.php">
	          	<ion-icon name="document-text-sharp"></ion-icon>
	          	ติดต่อสอบถาม
	          </a>
	        </li>

	      </ul>
	      <ul class="navbar-nav ms-auto">
	      	<a href="../logout.php" class="btn btn-outline-danger">
	      		<ion-icon name="bookmarks-sharp"></ion-icon>
	      		ออกจากระบบ
	      	</a>
	      </ul>
	    </div>
	  </div>
	</nav>
</header>

<?php } ?>