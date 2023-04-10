
<?php 

	include '../db_config.php';

	$title = "SELECT * FROM settings";
	$title_query = mysqli_query($conn, $title);

	foreach ($title_query as $row) {

 ?>

<div class="container mt-5">
	<div class="card bg-dark text-white" style="text-align: center;">
		<div class="card-body">
			<div class="card-title">
				<h1>
					<ion-icon name="podium-sharp"></ion-icon>
					<?php echo $row['username']; ?>
				</h1>
			</div>
			<div class="card-text">
				<h2>
					<div class="btn-group" role="group">
						<a href="<?php echo $row['github']; ?>" class="nav-link"><ion-icon name="logo-github"></ion-icon></a>
						&nbsp;
						<a href="<?php echo $row['facebook']; ?>" class="nav-link"><ion-icon name="logo-facebook"></ion-icon></a>
						&nbsp;
						<a href="<?php echo $row['discord']; ?>" class="nav-link"><ion-icon name="logo-discord"></ion-icon></a>
					</div>
				</h2>
				<hr>
				<h4>
					<div class="md-3">
						<ion-icon name="clipboard-sharp"></ion-icon>
						โปรดคลิกที่ Icon เพื่อ ติดต่อหาเรา
					</div>
				</h4>
			</div>
		</div>
	</div>
</div>

<?php } ?>