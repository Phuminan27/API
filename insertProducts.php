<?php
include('config.db.php'); // ดึงไฟล์เชื่อมต่อฐานข้อมูลมาใช้งาน
header("Content-Type: application/json");

$dataJSON = json_decode(file_get_contents("php://input"), true);
$message = [];

// ประกาศตัวแปร สำหรับเพิ่มข้อมูล
$id = $dataJSON['id'];
$name = $dataJSON['name'];
$price = $dataJSON['price'];
$image = $dataJSON['image'];

// เขียนคำสั่งในการเพิ่มข้อมูล
$sql = "INSERT INTO products (id, name,  price,  image,) VALUES ('$id', '$name', '$price', '$image',);";

// รันคำสั่ง
$qr_insert = mysqli_query($conn, $sql);

if ($qr_insert) {
    // เพิ่มข้อมูลได้
    http_response_code(201);
    $message['status'] = "เพิ่มข้อมูลสำเร็จ";
} else {
    // เพิ่มข้อมูลไม่ได้
    http_response_code(422);
    $message['status'] = "เพิ่มข้อมูลไม่สำเร็จ: " . mysqli_error($conn);
}
// ส่งข้อมูลการดำเนินการกลับไป
echo json_encode($message);

?>
