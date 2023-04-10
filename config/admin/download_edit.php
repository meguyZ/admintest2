<?php 

    require_once('config.php');

    if (isset($_REQUEST['update_id'])) {
        try {
            $id = $_REQUEST['update_id'];
            $select_stmt = $db->prepare("SELECT * FROM download WHERE id = :id");
            $select_stmt->bindParam(':id', $id);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
        } catch(PDOException $e) {
            $e->getMessage();
        }
    }

    if (isset($_REQUEST['btn_update'])) {
        $username = $_REQUEST['txt_username'];
        $dashboard = $_REQUEST['txt_dashboard'];
        $price = $_REQUEST['txt_price'];
        $image = $_REQUEST['txt_image'];
        $contact = $_REQUEST['txt_contact'];

        if (empty($username)) {
            $errorMsg = "Please Enter Username";
        } else if (empty($dashboard)) {
            $errorMsg = "Please Enter Dashboard";
        } else {
            try {
                if (!isset($errorMsg)) {
                    $update_stmt = $db->prepare("UPDATE download SET username = :uname, dashboard = :dash, price = :price, image = :imag, contact = :cont WHERE id = :id");
                    $update_stmt->bindParam(':uname', $username);
                    $update_stmt->bindParam(':dash', $dashboard);
                    $update_stmt->bindParam(':price', $price);
                    $update_stmt->bindParam(':imag', $image);
                    $update_stmt->bindParam(':cont', $contact);
                    $update_stmt->bindParam(':id', $id);

                    if ($update_stmt->execute()) {
                        $updateMsg = "Record update successfully...";
                        header("refresh:3;accounts.php");
                    }
                }
            } catch(PDOException $e) {
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

				<?php if (isset($updateMsg)) { ?>

				<div class="card bg-success">
					<div class="card-body">
						<h2><?php echo $updateMsg; ?></h2>
					</div>
				</div>

				<?php } ?>

				<h1>
					Update +
				</h1>
			</div>
			<div class="card-text">
				<form method="post">

					<div class="mb-3">
					  <label class="form-label">Username</label>
					  <input name="txt_username" type="text" class="form-control" value="<?php echo $username; ?>">
					</div>

					<div class="mb-3">
					  <label class="form-label">Dashboard</label>
					  <input name="txt_dashboard" type="text" class="form-control" value="<?php echo $dashboard; ?>">
					</div>

					<div class="mb-3">
					  <label class="form-label">Price</label>
					  <input name="txt_price" type="text" class="form-control" value="<?php echo $price; ?>">
					</div>

					<div class="mb-3">
					  <label class="form-label">Url : Image</label>
					  <input name="txt_image" type="text" class="form-control" value="<?php echo $image; ?>">
					</div>

					<div class="mb-3">
					  <label class="form-label">Contact</label>
					  <input name="txt_contact" type="text" class="form-control" value="<?php echo $contact; ?>">
					</div>

					<button type="submit" name="btn_update" class="btn btn-primary">
						Update
					</button>

				</form>
			</div>
		</div>
	</div>
</div>