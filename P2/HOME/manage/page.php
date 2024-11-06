<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โรงเรียนอนุบาลกุลจินต์</title>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/page.css">
</head>
<body>
    <header class="header">
        <div class="header-content">
            <div class="brand">
                <img src="logo.png" alt="โลโก้โรงเรียน" class="logo">
                <span class="school-name">โรงเรียนอนุบาลกุลจินต์</span>
            </div>
            <nav class="nav">
                <a href="/P2/HOME/home.php" class="nav-link">เพิ่มข่าวสารใหม่</a>
                <a href="/P2/CRUD/home.php" class="nav-link">จัดการผู้ใช้งาน</a>
                <a href="/P2/logout.php" class="nav-link">ออกจากระบบ</a>
            </nav>
        </div>
    </header>

    <main class="main">
        <div class="categories">
            <a href="/P2/HOME/manage/academic.php" class="category-card">
                <img src="https://www.kunlajin-hy.com/V3/event_pic/56-09-19/064.jpg" alt="งานวิชาการ" class="category-image">
                <div class="category-content">
                    <h2 class="category-title">งานวิชาการ</h2>
                    <p class="category-description">การบริหารงานวิชาการเป็นงานที่สำคัญสำหรับผู้บริหารสถานศึกษา เน้นการปรับปรุงคุณภาพการเรียนการสอนเพื่อความสำเร็จของสถานศึกษา</p>
                </div>
            </a>

            <a href="/P2/HOME/manage/train.php" class="category-card">
                <img src="https://www.kunlajin-hy.com/V3/event_pic/60_07_18_20/003.jpg" alt="อบรม/สัมมนา" class="category-image">
                <div class="category-content">
                    <h2 class="category-title">อบรม/สัมมนา</h2>
                    <p class="category-description">การจัดอบรมและสัมมนาเพื่อเสริมสร้างความรู้และทักษะที่จำเป็นสำหรับบุคลากรและนักเรียน</p>
                </div>
            </a>

            <a href="/P2/HOME/manage/activity.php" class="category-card">
                <img src="http://www.kunlajin-hy.com/V3/event_pic/58-01-29/049.jpg" alt="กิจกรรม" class="category-image">
                <div class="category-content">
                    <h2 class="category-title">กิจกรรม</h2>
                    <p class="category-description">กิจกรรมสร้างสรรค์ต่างๆ ที่จัดขึ้นเพื่อพัฒนาทักษะและส่งเสริมการเรียนรู้ในทุกๆ ด้านของนักเรียน</p>
                </div>
            </a>
        </div>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <p>1 ถนนรณภูมิ ตำบลหาดใหญ่ อำเภอหาดใหญ่ จังหวัดสงขลา 90110</p>
            <p>โทร: 074-257884 | Fax: 074-258107 | E-mail: kunlajin@gmail.com</p>
        </div>
    </footer>
</body>
</html>
