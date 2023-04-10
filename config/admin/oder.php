
<?php 

	include '../db_config.php';

	$oder = "SELECT * FROM oder";
	$oder_query = mysqli_query($conn, $oder);

 ?>

<div class="container mt-5">
	<div class="row row-cols-1 row-cols-md-2 g-4">

	<?php foreach($oder_query as $row) { ?>

	  <div class="col">
	    <div class="card bg-dark">
	      <div class="card-body">

	      	<div class="card-title text-white">

	      		<h1>
	      			<?php echo $row['accounts']; ?>
	      			<img width="200" src="<?php echo $row['accounts_img']; ?>" class="rounded float-end">
	      		</h1>

	      	</div>

	        <div class="card-text text-white">

	        	<?php 

	        		include '../db_config.php';

	        		$dash_post = "SELECT * FROM accounts";
	        		$dash_post_run = mysqli_query($conn, $dash_post);

	        		if ($row = mysqli_num_rows($dash_post_run)) {
	        			echo "<h2 class='text-success'>Stock : ". $row ." $</h2>";
	        		} else {
	        			echo "<h2 class='text-danger'> NOT DATA </h2>";
	        		}

	        	 ?>

	        </div>

	      </div>
	    </div>
	  </div>

	<?php } ?>

	<?php foreach($oder_query as $row) { ?>

	  <div class="col">
	    <div class="card bg-dark">
	      <div class="card-body">

	      	<div class="card-title text-white">
	      		<h1>
	      			<?php echo $row['product']; ?>
	      			<img width="200" src="<?php echo $row['product_img']; ?>" class="rounded float-end">
	      		</h1>
	      	</div>

	        <div class="card-text text-white">

	        	<?php 

	        		include '../db_config.php';

	        		$dash_post = "SELECT * FROM download";
	        		$dash_post_run = mysqli_query($conn, $dash_post);

	        		if ($row = mysqli_num_rows($dash_post_run)) {
	        			echo "<h2 class='text-success'> Stock : ". $row ." $</h2>";
	        		} else {
	        			echo "<h2 class='text-danger'> NOT DATA </h2>";
	        		}

	        	 ?>

	        </div>

	      </div>
	    </div>
	  </div>

	<?php } ?>

	<?php foreach($oder_query as $row) { ?>

	  <div class="col">
	    <div class="card bg-dark">
	      <div class="card-body">

	      	<div class="card-title text-white">
	      		<h1>
	      			<?php echo $row['settings']; ?>
	      			<img width="200" src="<?php echo $row['settings_img']; ?>" class="rounded float-end">
	      		</h1>
	      	</div>

	        <div class="card-text text-white">

	        	<?php 

	        		include '../db_config.php';

	        		$dash_post = "SELECT * FROM settings";
	        		$dash_post_run = mysqli_query($conn, $dash_post);

	        		if ($row = mysqli_num_rows($dash_post_run)) {
	        			echo "<h2 class='text-success'> Stock : ". $row ." $</h2>";
	        		} else {
	        			echo "<h2 class='text-danger'> NOT DATA </h2>";
	        		}

	        	 ?>

	        </div>

	      </div>
	    </div>
	  </div>

	<?php } ?>

	</div>
</div>