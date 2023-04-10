<?php 

    require_once('config.php');

    if (isset($_REQUEST['btn_insert'])) {
        $username = $_REQUEST['txt_username'];
        $password = $_REQUEST['txt_password'];
        $firstname = $_REQUEST['txt_firstname'];
        $lastname = $_REQUEST['txt_lastname'];
        $class = $_REQUEST['txt_class'];

        if (empty($username)) {
            $errorMsg = "Please enter Username";
        } else if (empty($password)) {
            $errorMsg = "please Enter Password";
        } else if (empty($firstname)) {
            $errorMsg = "please Enter Firstname";
        } else if (empty($lastname)) {
            $errorMsg = "please Enter Lastname";
        } else if (empty($class)) {
            $errorMsg = "please Enter Class";
        } else {
            try {
                if (!isset($errorMsg)) {
                    $insert_stmt = $db->prepare("INSERT INTO accounts(username, password, firstname, lastname, class) VALUES (:uname, :pass, :first, :last, :class)");
                    $insert_stmt->bindParam(':uname', $username);
                    $insert_stmt->bindParam(':pass', $password);
                    $insert_stmt->bindParam(':first', $firstname);
                    $insert_stmt->bindParam(':last', $lastname);
                    $insert_stmt->bindParam(':class', $class);

                    if ($insert_stmt->execute()) {
                        $inserMsg = "SuccessFully";
                        header("refresh:3;accounts.php");
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
					  <label class="form-label">Password</label>
					  <input name="txt_password" type="text" class="form-control" placeholder="Enter your Username">
					</div>

					<div class="mb-3">
					  <label class="form-label">Firstname</label>
					  <input name="txt_firstname" type="text" class="form-control" placeholder="Enter your Username">
					</div>

					<div class="mb-3">
					  <label class="form-label">Lastname</label>
					  <input name="txt_lastname" type="text" class="form-control" placeholder="Enter your Username">
					</div>

					<div class="mb-3">
					  <label class="form-label">Class</label>
					  <input name="txt_class" type="text" class="form-control" placeholder="Enter your Username">
					</div>

					<button type="submit" name="btn_insert" class="btn btn-primary">
						Create
					</button>

				</form>
			</div>
		</div>
	</div>
</div>