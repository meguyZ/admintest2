<?php 

    include '../db_config.php';

    $title = "SELECT * FROM settings";
    $title_query = mysqli_query($conn, $title);

 ?>

<?php foreach ($title_query as $row) {  ?>

<div class="container mt-5">
	<div class="card bg-dark rounded-pill">
		<div class="card-body text-white">
			<ion-icon name="shield-half-sharp"></ion-icon>
			ประกาศ : <?php echo $row['noting']; ?>
		</div>
	</div>
</div>

<?php } ?>