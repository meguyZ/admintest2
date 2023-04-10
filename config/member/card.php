<?php 

	include '../db_config.php';

	$sql = "SELECT * FROM download";
	$query = mysqli_query($conn, $sql);

 ?>

<div class="container mt-5">
	
	<div class="row row-cols-1 row-cols-md-3 g-4">

	<?php foreach ($query as $row) { ?>

	  <div class="col">
	    <div class="card bg-dark text-white">
	      <img src="<?php echo $row['image']; ?>" class="card-img-top">
	      <div class="card-body">
	        <h5 class="card-title">
	        	<ion-icon name="color-filter-sharp"></ion-icon>
	        	<?php echo $row['username']; ?>
	        </h5>
	        <p class="card-text">
	        	<ion-icon name="desktop-sharp"></ion-icon>
	        	คำอธิบาย : <?php echo $row['dashboard']; ?>
	        	<br>
	        	<ion-icon name="card-sharp"></ion-icon>
	        	ราคา : <span class="text-warning"><?php echo $row['price']; ?></span>
	        	<hr>
	        	<a class="btn btn-outline-primary" href="<?php echo $row['contact']; ?>">
	        		<ion-icon name="radio-button-on-sharp"></ion-icon>
	        		Download
	        	</a>
	        </p>
	      </div>
	    </div>
	  </div>

	<?php } ?>

	</div>

</div>