<?php
session_start();
ob_start();  // เริ่มต้นการใช้ output buffering

require_once 'db.php';  // เรียกไฟล์เชื่อมต่อฐานข้อมูล

// สมมติว่าเป็นการเชื่อมต่อฐานข้อมูลที่นี่ หากเชื่อมต่อสำเร็จ
$connected = $conn ? true : false; // ตรวจสอบการเชื่อมต่อฐานข้อมูล

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ดึงข้อมูลผู้ใช้จากฐานข้อมูล
    $sql = "SELECT * FROM admin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // ตรวจสอบว่าผู้ใช้มีอยู่และรหัสผ่านถูกต้องหรือไม่
    if ($user && password_verify($password, $user['password'])) {
        // เก็บสถานะการล็อกอินในเซสชัน
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user['username']; // เก็บชื่อผู้ใช้ใน session

        if ($connected) {
            $_SESSION['message'] = "<div class='alert success'>เชื่อมต่อฐานข้อมูลสำเร็จ</div>";
        }

        // เปลี่ยนเส้นทางไปยังหน้า HOME/home.php
        header('Location: /P2/HOME/manage/page.php');
        exit();
    } else {
        $_SESSION['error_message'] = "<div class='alert error'>Username หรือ Password ไม่ถูกต้อง!</div>";
    }
}

ob_end_flush();  // จบ output buffering
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <div class="container">
        <!-- แสดงข้อความเชื่อมต่อฐานข้อมูลสำเร็จหรือข้อผิดพลาด -->
        <?php if (isset($_SESSION['message'])): ?>
            <?= $_SESSION['message']; ?>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['error_message'])): ?>
            <?= $_SESSION['error_message']; ?>
            <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>

        <img src="logo.png" alt="Logo" class="logo">

        <h2>เข้าสู่ระบบ</h2>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="ชื่อผู้ใช้" required>
            <input type="password" name="password" placeholder="รหัสผ่าน" required>
            <button type="submit" name="login">เข้าสู่ระบบ</button>
        </form>
    </div>

</body>
</html>
