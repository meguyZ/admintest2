<?php 

    $conn = mysqli_connect("localhost", "root", "", "Your Database"); -- ไส่ชื่อฐานข้อมูลของคน

    if (!$conn) {
        die("Failed to connec to databse " . mysqli_error($conn));
    }

?>