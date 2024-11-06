<?php
session_start();
require_once 'db.php';  // เรียกการเชื่อมต่อฐานข้อมูล

// ตรวจสอบว่ายังล็อกอินอยู่หรือไม่
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/home.css">
    <title>จัดการข่าวสาร</title>
    
</head>
<body>
<div class="header">
    <div class="header-content">
        <img src="logo.png" alt="Logo" class="logo">
        <div class="school-name">เพิ่มข่าวสารใหม่</div>
    </div>
    <div class="nav-links">
        <a href="/P2/HOME/manage/page.php">หน้าหลัก</a>
    </div>
</div>


    <div class="container">
        <form action="save.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="type">ประเภทข่าว *</label>
                <select name="type" id="type" required>
                    <option value="1">งานวิชาการ</option>
                    <option value="2">อบรม/สัมมนา</option>
                    <option value="3">กิจกรรม</option>
                </select>
            </div>

            <div class="form-group">
                <label for="title">หัวข้อข่าว *</label>
                <input type="text" name="title" id="title" required>
            </div>

            <div class="form-group">
                <label for="content">เนื้อข่าว *</label>
                <textarea name="content" id="content" rows="10" required></textarea>
            </div>

                        <div class="form-group">
                <label for="images">
                    <i class="fas fa-image" style="color: #4a90e2;"></i> แนบไฟล์ภาพ
                </label>
                <input type="file" name="images[]" id="images" accept="image/*" multiple>
            </div>

            <div class="form-group">
                <label for="pdf_file">
                    <i class="fas fa-file-pdf" style="color: #e74c3c;"></i> แนบไฟล์ PDF
                </label>
                <input type="file" name="pdf_file" id="pdf_file" accept=".pdf">
            </div>

            <div class="form-group">
                <label for="video_file">
                    <i class="fas fa-video" style="color: #8e44ad;"></i> แนบไฟล์วิดีโอ
                </label>
                <input type="file" name="video_file" id="video_file" accept="video/*">
            </div>

            <div class="form-group">
                <label for="additional_details">รายละเอียดเพิ่มเติม</label>
                <input type="text" name="additional_details" id="additional_details" placeholder="เช่น https://www.example.com">
            </div>

            <div class="form-group">
                <label for="start_date">เริ่มเสนอข่าวตั้งแต่ *</label>
                <input type="date" name="start_date" id="start_date" required>
            </div>

            <button type="submit" class="submit-button">บันทึก</button>
        </form>
    </div>

    <div id="successPopup" class="popup">
        <p id="popupMessage"></p>
        <button onclick="closePopup()">ปิด</button>
    </div>

    <script>
        function showPopup(message) {
            document.getElementById('popupMessage').innerText = message;
            document.getElementById('successPopup').style.display = 'block';
        }

        function closePopup() {
            document.getElementById('successPopup').style.display = 'none';
        }

        <?php
        if (isset($_SESSION['success'])) {
            echo "showPopup('" . addslashes($_SESSION['success']) . "');";
            unset($_SESSION['success']);
        }
        if (isset($_SESSION['error'])) {
            echo "showPopup('" . addslashes($_SESSION['error']) . "');";
            unset($_SESSION['error']);
        }
        ?>
    </script>
</body>
</html>
