<?php
session_start();
require_once 'db.php';  // เรียกการเชื่อมต่อฐานข้อมูล

// ตรวจสอบสถานะการล็อกอิน
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit();
}

// ดึงข้อมูลผู้ใช้จากฐานข้อมูล
$sql = "SELECT * FROM admin ORDER BY id ASC";  // ลิสต์ตาม id
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css"> <!-- เรียกไฟล์ CSS -->
    <title>จัดการผู้ใช้</title>
</head>
<body>
<div class="header">
    <div class="header-content">
        <img src="logo.png" alt="Logo" class="logo">
        <div class="school-name">จัดการผู้ใช้งาน</div>
    </div>
    <div class="nav-links">
        <a href="/P2/HOME/manage/page.php">หน้าหลัก</a>
    </div>
</div>

<div class="container">
    <div class="add-user">
        <a href="create.php" class="button">+ เพิ่มผู้ใช้ใหม่</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ชื่อผู้ใช้</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>การดำเนินการ</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($user = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= htmlspecialchars($user['id']); ?></td>
                <td><?= htmlspecialchars($user['username']); ?></td>
                <td><?= htmlspecialchars($user['first_name']); ?></td>
                <td><?= htmlspecialchars($user['last_name']); ?></td>
                <td class="action-buttons">
                    <a href="update.php?id=<?= $user['id']; ?>" class="edit">แก้ไข</a>
                    <a href="delete.php?id=<?= $user['id']; ?>" class="delete" onclick="return confirm('คุณแน่ใจหรือไม่ที่จะลบผู้ใช้นี้?');">ลบ</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
