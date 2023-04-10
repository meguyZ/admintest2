<?php 

    require_once('config.php');

    if (isset($_REQUEST['update_id'])) {
        try {
            $id = $_REQUEST['update_id'];
            $select_stmt = $db->prepare("SELECT * FROM accounts WHERE id = :id");
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
        $password = $_REQUEST['txt_password'];
        $firstname = $_REQUEST['txt_firstname'];
        $lastname = $_REQUEST['txt_lastname'];
        $class = $_REQUEST['txt_class'];

        if (empty($username)) {
            $errorMsg = "Please Enter Username";
        } else if (empty($password)) {
            $errorMsg = "Please Enter Password";
        } else {
            try {
                if (!isset($errorMsg)) {
                    $update_stmt = $db->prepare("UPDATE accounts SET username = :uname, password = :pass, firstname = :fname, lastname = :lname, class = :class WHERE id = :id");
                    $update_stmt->bindParam(':uname', $username);
                    $update_stmt->bindParam(':pass', $password);
                    $update_stmt->bindParam(':fname', $firstname);
                    $update_stmt->bindParam(':lname', $lastname);
                    $update_stmt->bindParam(':class', $class);
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
					  <label class="form-label">Password</label>
					  <input name="txt_password" type="text" class="form-control" value="<?php echo $password; ?>">
					</div>

					<div class="mb-3">
					  <label class="form-label">Firstname</label>
					  <input name="txt_firstname" type="text" class="form-control" value="<?php echo $firstname; ?>">
					</div>

					<div class="mb-3">
					  <label class="form-label">Lastname</label>
					  <input name="txt_lastname" type="text" class="form-control" value="<?php echo $lastname; ?>">
					</div>

					<div class="mb-3">
					  <label class="form-label">Class</label>
					  <input name="txt_class" type="text" class="form-control" value="<?php echo $class; ?>">
					</div>

					<button type="submit" name="btn_update" class="btn btn-primary">
						Update
					</button>

				</form>
			</div>
		</div>
	</div>
</div>