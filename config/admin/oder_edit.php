<?php 

    require_once('config.php');

    if (isset($_REQUEST['update_id'])) {
        try {
            $id = $_REQUEST['update_id'];
            $select_stmt = $db->prepare("SELECT * FROM oder WHERE id = :id");
            $select_stmt->bindParam(':id', $id);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
        } catch(PDOException $e) {
            $e->getMessage();
        }
    }

    if (isset($_REQUEST['btn_update'])) {
        $accounts = $_REQUEST['txt_accounts'];
        $product = $_REQUEST['txt_product'];
        $settings = $_REQUEST['txt_settings'];
        $accounts_img = $_REQUEST['txt_accounts_img'];
        $product_img = $_REQUEST['txt_product_img'];
        $settings_img = $_REQUEST['txt_settings_img'];

        if (empty($accounts)) {
            $errorMsg = "Please Enter Accounts";
        } else if (empty($product)) {
            $errorMsg = "Please Enter Product";
        } else {
            try {
                if (!isset($errorMsg)) {
                    $update_stmt = $db->prepare("UPDATE oder SET accounts = :acco, product = :prod, settings = :sett, accounts_img = :accimg, product_img = :proimg, settings_img = :setimg WHERE id = :id");
                    $update_stmt->bindParam(':acco', $accounts);
                    $update_stmt->bindParam(':prod', $product);
                    $update_stmt->bindParam(':sett', $settings);
                    $update_stmt->bindParam(':accimg', $accounts_img);
                    $update_stmt->bindParam(':proimg', $product_img);
                    $update_stmt->bindParam(':setimg', $settings_img);
                    $update_stmt->bindParam(':id', $id);

                    if ($update_stmt->execute()) {
                        $updateMsg = "Record update successfully...";
                        header("refresh:3;oder.php");
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
					  <label class="form-label">Accounts</label>
					  <input name="txt_accounts" type="text" class="form-control" value="<?php echo $accounts; ?>">
					</div>

					<div class="mb-3">
					  <label class="form-label">Product</label>
					  <input name="txt_product" type="text" class="form-control" value="<?php echo $product; ?>">
					</div>

					<div class="mb-3">
					  <label class="form-label">Settings</label>
					  <input name="txt_settings" type="text" class="form-control" value="<?php echo $settings; ?>">
					</div>

					<div class="mb-3">
					  <label class="form-label">Accounts Image</label>
					  <input name="txt_accounts_img" type="text" class="form-control" value="<?php echo $accounts_img; ?>">
					</div>

					<div class="mb-3">
					  <label class="form-label">Product Image</label>
					  <input name="txt_product_img" type="text" class="form-control" value="<?php echo $product_img; ?>">
					</div>

					<div class="mb-3">
					  <label class="form-label">Settings Image</label>
					  <input name="txt_settings_img" type="text" class="form-control" value="<?php echo $settings_img; ?>">
					</div>

					<button type="submit" name="btn_update" class="btn btn-primary">
						Update
					</button>

				</form>
			</div>
		</div>
	</div>
</div>