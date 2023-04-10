<?php 

    require_once('config.php');

    if (isset($_REQUEST['update_id'])) {
        try {
            $id = $_REQUEST['update_id'];
            $select_stmt = $db->prepare("SELECT * FROM settings WHERE id = :id");
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
        $noting = $_REQUEST['txt_noting'];
        $icon = $_REQUEST['txt_icon'];
        $image_1 = $_REQUEST['txt_image_1'];
        $image_2 = $_REQUEST['txt_image_2'];
        $image_3 = $_REQUEST['txt_image_3'];
        $github = $_REQUEST['txt_github'];
        $facebook = $_REQUEST['txt_facebook'];
        $discord = $_REQUEST['txt_discord'];

        if (empty($username)) {
            $errorMsg = "Please Enter Username";
        } else if (empty($noting)) {
            $errorMsg = "Please Enter Noting";
        } else {
            try {
                if (!isset($errorMsg)) {
                    $update_stmt = $db->prepare("UPDATE settings SET username = :uname, noting = :noting, icon = :icon, image_1 = :imag_1, image_2 = :imag_2, image_3 = :imag_3, github = :github, facebook = :fbook, discord = :discord WHERE id = :id");
                    $update_stmt->bindParam(':uname', $username);
                    $update_stmt->bindParam(':noting', $noting);
                    $update_stmt->bindParam(':icon', $icon);
                    $update_stmt->bindParam(':imag_1', $image_1);
                    $update_stmt->bindParam(':imag_2', $image_2);
                    $update_stmt->bindParam(':imag_3', $image_3);
                    $update_stmt->bindParam(':github', $github);
                    $update_stmt->bindParam(':fbook', $facebook);
                    $update_stmt->bindParam(':discord', $discord);
                    $update_stmt->bindParam(':id', $id);

                    if ($update_stmt->execute()) {
                        $updateMsg = "Record update successfully...";
                        header("refresh:3;settings.php");
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
					  <label class="form-label">Noting</label>
					  <input name="txt_noting" type="text" class="form-control" value="<?php echo $noting; ?>">
					</div>

					<div class="mb-3">
					  <label class="form-label">Icon</label>
					  <input name="txt_icon" type="text" class="form-control" value="<?php echo $icon; ?>">
					</div>

					<div class="mb-3">
					  <label class="form-label">Url : Image 1</label>
					  <input name="txt_image_1" type="text" class="form-control" value="<?php echo $image_1; ?>">
					</div>

					<div class="mb-3">
					  <label class="form-label">Url : Image 2</label>
					  <input name="txt_image_2" type="text" class="form-control" value="<?php echo $image_2; ?>">
					</div>

					<div class="mb-3">
					  <label class="form-label">Url : Image 3</label>
					  <input name="txt_image_3" type="text" class="form-control" value="<?php echo $image_3; ?>">
					</div>

					<div class="mb-3">
					  <label class="form-label">Github</label>
					  <input name="txt_github" type="text" class="form-control" value="<?php echo $github; ?>">
					</div>

					<div class="mb-3">
					  <label class="form-label">Facebook</label>
					  <input name="txt_facebook" type="text" class="form-control" value="<?php echo $facebook; ?>">
					</div>

					<div class="mb-3">
					  <label class="form-label">Discord</label>
					  <input name="txt_discord" type="text" class="form-control" value="<?php echo $discord; ?>">
					</div>

					<button type="submit" name="btn_update" class="btn btn-primary">
						Update
					</button>

				</form>
			</div>
		</div>
	</div>
</div>