<?php 

    session_start();

    require_once "db_config.php";

    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        $user_check = "SELECT * FROM accounts WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);

        if ($user['username'] === $username) {
            echo "<script>alert('Username already exists');</script>";
        } else {

            $query = "INSERT INTO accounts (username, password, firstname, lastname, class)
                        VALUE ('$username', '$password', '$firstname', '$lastname', 'member')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $_SESSION['success'] = "Insert Accounts successfully";
                header("Location: index.php");
            } else {
                $_SESSION['error'] = "Something went wrong";
                header("Location: index.php");
            }
        }

    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php include 'main.php'; ?>

</head>
<body>

    <div class="container mt-5">
        
        <div class="card" style="background: rgba(0, 0, 0, 0.5);">
                
            <div class="card-body">
                
                <div class="card-title text-white" style="text-align: center;">
                    
                    <h1>
                        <ion-icon name="person-circle-sharp"></ion-icon>
                        สมัครสมาชิค - Register
                    </h1>

                </div>

                <hr class="text-white">

                <div class="card-text text-white">

                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        
                        <div class="mb-3">
                          <label class="form-label">Username</label>
                          <input name="username" type="text" class="form-control" placeholder="Enter your Username">
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Password</label>
                          <input name="password" type="password" class="form-control" placeholder="Enter your Password">
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Firstname</label>
                          <input name="firstname" type="text" class="form-control" placeholder="Enter your Firstname">
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Lastname</label>
                          <input name="lastname" type="text" class="form-control" placeholder="Enter your Lastname">
                        </div>

                        <button class="btn btn-primary" type="submit" name="submit">
                            <ion-icon name="chatbubbles-sharp"></ion-icon>
                            สมัครสมาชิค
                        </button>

                        <hr class="text-white">

                        <a href="index.php" class="nav-link">
                            Go To Login
                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>
    
    <?php include 'config/member/footer.php'; ?>

</body>
</html>