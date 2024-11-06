<?php
require_once '../db.php';  // เรียกใช้การเชื่อมต่อฐานข้อมูล

// ดึงข้อมูลข่าวจากฐานข้อมูลตามประเภท "งานวิชาการ" (type = 1)
// และเรียงลำดับ id จากมากไปน้อย
$sql = "SELECT * FROM articles WHERE category_id = 1 ORDER BY id DESC";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/news.css">
    <title>ข่าววิชาการ</title>
   
</head>

<body>
<div class="header">
    <div class="header-content">
        <img src="logo.png" alt="Logo" class="logo">
        <div class="school-name">โรงเรียนอนุบาลกุลจิตต์</div>
    </div>
    <div class="nav-links">
         <a href="/P2/HOME/manage/page.php">หน้าหลัก</a>
    </div>
</div>
    <div class="container">
        <h1>ข่าววิชาการ</h1>

        <!-- แสดงรายการข่าว -->
        <div class="news-list">
            <ul>
                <?php while ($news = $result->fetch_assoc()): ?>
                    <li>
                        <a class="news-title" href="news_detail.php?id=<?= $news['id']; ?>">
                            <?= htmlspecialchars($news['title']); ?>
                        </a>
                        <span class="news-detail">[<?= $news['id']; ?>]</span>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
</body>

</html>
