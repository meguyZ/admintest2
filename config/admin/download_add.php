<?php 

    require_once('config.php');

    if (isset($_REQUEST['btn_insert'])) {
        $username = $_REQUEST['txt_username'];
        $dashboard = $_REQUEST['txt_dashboard'];
        $price = $_REQUEST['txt_price'];
        $image = $_REQUEST['txt_image'];
        $contact = $_REQUEST['txt_contact'];

        if (empty($username)) {
            $errorMsg = "Please enter Username";
        } else if (empty($dashboard)) {
            $errorMsg = "please Enter Dashboard";
        } else if (empty($price)) {
            $errorMsg = "please Enter Price";
        } else if (empty($image)) {
            $errorMsg = "please Enter Image";
        } else if (empty($contact)) {
            $errorMsg = "please Enter Contact";
        } else {
            try {
                if (!isset($errorMsg)) {
                    $insert_stmt = $db->prepare("INSERT INTO download(username, dashboard, price, image, contact) VALUES (:uname, :dash, :price, :imag, :cont)");
                    $insert_stmt->bindParam(':uname', $username);
                    $insert_stmt->bindParam(':dash', $dashboard);
                    $insert_stmt->bindParam(':price', $price);
                    $insert_stmt->bindParam(':imag', $image);
                    $insert_stmt->bindParam(':cont', $contact);

                    if ($insert_stmt->execute()) {
                        $inserMsg = "SuccessFully";
                        header("refresh:3;download.php");
                    }
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

 ?>

<div class="container mt-5">
	<div class="card bg-dark text-white">
		<div class="card-body">
			<div class="card-title">

				<?php if (isset($errorMsg)) { ?>

				<div class="card bg-danger">
					<div class="card-body">
						<h2><?php echo $errorMsg; ?></h2>
					</div>
				</div>

				<?php } ?>

				<?php if (isset($inserMsg)) { ?>

				<div class="card bg-success">
					<div class="card-body">
						<h2><?php echo $inserMsg; ?></h2>
					</div>
				</div>

				<?php } ?>

				<h1>
					Add +
				</h1>
			</div>
			<div class="card-text">
				<form method="post">

					<div class="mb-3">
					  <label class="form-label">Username</label>
					  <input name="txt_username" type="text" class="form-control" placeholder="Enter your Username">
					</div>

					<div class="mb-3">
					  <label class="form-label">Dashboard</label>
					  <input name="txt_dashboard" type="text" class="form-control" placeholder="Enter your Dashboard">
					</div>

					<div class="mb-3">
					  <label class="form-label">Price</label>
					  <input name="txt_price" type="text" class="form-control" placeholder="Enter your Price">
					</div>

					<div class="mb-3">
					  <label class="form-label">Url : Image</label>
					  <input name="txt_image" type="text" class="form-control" placeholder="Enter your Image">
					</div>

					<div class="mb-3">
					  <label class="form-label">Content</label>
					  <input name="txt_contact" type="text" class="form-control" placeholder="Enter your Content">
					</div>

					<button type="submit" name="btn_insert" class="btn btn-primary">
						Create
					</button>

				</form>
			</div>
		</div>
	</div>
</div>