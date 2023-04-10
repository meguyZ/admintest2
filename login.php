<?php 

    session_start();

    if (isset($_POST['username'])) {

        include('db_config.php');

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM accounts WHERE username = '$username' AND password = '$password'";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);

            $_SESSION['userid'] = $row['id'];
            $_SESSION['user'] = $row['firstname'] . " " . $row['lastname'];
            $_SESSION['class'] = $row['class'];

            if ($_SESSION['class'] == 'admin') {
                header("Location: backend");
            }

            if ($_SESSION['class'] == 'member') {
                header("Location: member");
            }
        } else {
            echo "<script>alert('User หรือ Password ไม่ถูกต้อง);</script>";
        }

    } else {
        header("Location: index.php");
    }


?>