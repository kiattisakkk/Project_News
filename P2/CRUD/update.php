<?php
require_once 'db.php';
include 'crud.php';

// ตรวจสอบว่าได้รับ ID ของผู้ใช้หรือไม่
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // ดึงข้อมูลผู้ใช้จากฐานข้อมูลเพื่อนำมาแสดงในฟอร์ม
    $sql = "SELECT * FROM admin WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = $_POST['password'];

    // อัปเดตข้อมูลผู้ใช้
    updateAdmin($id, $username, $first_name, $last_name, $password); 
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/up.css">
    <title>อัปเดตข้อมูลผู้ใช้แอดมิน</title>
    
</head>
<body>
    <div class="container">
        <h1>แก้ไขข้อมูลผู้ใช้งาน</h1>
        <form action="update.php?id=<?= $admin['id']; ?>" method="POST">
            <input type="hidden" name="id" value="<?= $admin['id']; ?>">

            <label for="username">ชื่อผู้ใช้:</label>
            <input type="text" name="username" value="<?= htmlspecialchars($admin['username']); ?>" required>

            <label for="first_name">ชื่อ:</label>
            <input type="text" name="first_name" value="<?= htmlspecialchars($admin['first_name']); ?>" required>

            <label for="last_name">นามสกุล:</label>
            <input type="text" name="last_name" value="<?= htmlspecialchars($admin['last_name']); ?>" required>

            <label for="password">รหัสผ่าน:</label>
            <input type="password" name="password" placeholder="เว้นว่างไว้หากไม่ต้องการเปลี่ยน">

            <input type="submit" value="อัปเดตข้อมูล">
        </form>
        <a href="home.php" class="back-link">กลับไปหน้าจัดการผู้ใช้</a>
    </div>
</body>
</html>