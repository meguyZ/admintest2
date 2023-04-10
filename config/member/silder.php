<?php 

    include '../db_config.php';

    $title = "SELECT * FROM settings";
    $title_query = mysqli_query($conn, $title);

 ?>

<?php foreach ($title_query as $row) {  ?>

<div class="container mt-5">
	<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
	  <div class="carousel-indicators">
	    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
	    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
	    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
	  </div>
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img src="<?php echo $row['image_1']; ?>" class="d-block w-100 rounded">
	    </div>
	    <div class="carousel-item">
	      <img src="<?php echo $row['image_2']; ?>" class="d-block w-100 rounded">
	    </div>
	    <div class="carousel-item">
	      <img src="<?php echo $row['image_3']; ?>" class="d-block w-100 rounded">
	    </div>
	  </div>
	  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Previous</span>
	  </button>
	  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Next</span>
	  </button>
	</div>
</div>

<?php } ?>