<?php 

    require_once('config.php');

    if (isset($_REQUEST['btn_insert'])) {
        $accounts = $_REQUEST['txt_accounts'];
        $product = $_REQUEST['txt_product'];
        $settings = $_REQUEST['txt_settings'];
        $accounts_img = $_REQUEST['txt_accounts_img'];
        $product_img = $_REQUEST['txt_product_img'];
        $settings_img = $_REQUEST['txt_settings_img'];

        if (empty($accounts)) {
            $errorMsg = "Please enter Username";
        } else if (empty($product)) {
            $errorMsg = "please Enter Product";
        } else if (empty($settings)) {
            $errorMsg = "please Enter Settings";
        } else {
            try {
                if (!isset($errorMsg)) {
                    $insert_stmt = $db->prepare("INSERT INTO oder(accounts, product, settings, accounts_img, product_img, settings_img) VALUES (:acco, :prod, :sett, :accimg, :proimg, :setimg)");
                    $insert_stmt->bindParam(':acco', $accounts);
                    $insert_stmt->bindParam(':prod', $product);
                    $insert_stmt->bindParam(':sett', $settings);
                    $insert_stmt->bindParam(':accimg', $accounts_img);
                    $insert_stmt->bindParam(':proimg', $product_img);
                    $insert_stmt->bindParam(':setimg', $settings_img);

                    if ($insert_stmt->execute()) {
                        $inserMsg = "SuccessFully";
                        header("refresh:3;oder.php");
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
					  <label class="form-label">Accounts</label>
					  <input name="txt_accounts" type="text" class="form-control" placeholder="Enter your Accounts">
					</div>

					<div class="mb-3">
					  <label class="form-label">Product</label>
					  <input name="txt_product" type="text" class="form-control" placeholder="Enter your Product">
					</div>

					<div class="mb-3">
					  <label class="form-label">Settings</label>
					  <input name="txt_settings" type="text" class="form-control" placeholder="Enter your Settings">
					</div>

					<div class="mb-3">
					  <label class="form-label">Accounts Image</label>
					  <input name="txt_accounts_img" type="text" class="form-control" placeholder="Enter your Accounts Image">
					</div>

					<div class="mb-3">
					  <label class="form-label">Product Image</label>
					  <input name="txt_product_img" type="text" class="form-control" placeholder="Enter your Product Image">
					</div>

					<div class="mb-3">
					  <label class="form-label">Settings Image</label>
					  <input name="txt_settings_img" type="text" class="form-control" placeholder="Enter your Settings Image">
					</div>

					<button type="submit" name="btn_insert" class="btn btn-primary">
						Create
					</button>

				</form>
			</div>
		</div>
	</div>
</div>