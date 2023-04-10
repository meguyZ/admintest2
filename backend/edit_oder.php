<?php 

    session_start();

    if (!$_SESSION['userid']) {
        header("Location: ../index.php");
    } else {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php include '../main.php'; ?>

</head>
<body>
    
    <?php include '../config/admin/navbar.php'; ?>

    <?php include '../config/admin/oder_edit.php'; ?>

    <?php include '../config/member/footer.php'; ?>

</body>
</html>


<?php } ?>