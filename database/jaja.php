<?php
    include('../config.db.php');  // นำไฟล์เชื่อมต่อกับฐานข้อมูลมาใช้
    $table = "CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price FLOAT NOT NULL,
    image TEXT
    )";

    if($conn->query($table) === TRUE){
        echo "สร้างตารางสำเร็จ";
    }else{
        echo "สร้างตารางไม่สำเร็จ" .$conn->error;
    }
    $conn->close();
?>