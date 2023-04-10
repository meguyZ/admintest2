<?php 

    session_start();

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
                    
                    <?php if (isset($_SESSION['success'])) { ?>

                    <div class="card bg-success success">
                        <div class="card-body">
                            <h2><?php echo $_SESSION['success']; ?></h2>
                        </div>
                    </div>

                    <hr>

                    <?php } ?>

                    <?php if (isset($_SESSION['error'])) { ?>

                    <div class="card bg-danger error">
                        <div class="card-body">
                            <h2><?php echo $_SESSION['error']; ?></h2>
                        </div>
                    </div>

                    <hr>

                    <?php } ?>

                    <h1>
                        <ion-icon name="person-circle-sharp"></ion-icon>
                        เข้าสู่ระบบ - Login
                    </h1>

                </div>

                <hr class="text-white">

                <div class="card-text text-white">

                    <form action="login.php" method="post">
                        
                        <div class="mb-3">
                          <label class="form-label">Username</label>
                          <input name="username" type="text" class="form-control" placeholder="Enter your Username">
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Password</label>
                          <input name="password" type="password" class="form-control" placeholder="Enter your Password">
                        </div>

                        <button class="btn btn-primary" type="submit" name="submit">
                            <ion-icon name="chatbubbles-sharp"></ion-icon>
                            เข้าสู่ระบบ
                        </button>

                        <hr class="text-white">

                        <a href="register.php" class="nav-link">
                            Go To Register
                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>
    
    <?php include 'config/member/footer.php'; ?>
    
</body>
</html>

<?php 

    if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
        session_destroy();
    }

?>