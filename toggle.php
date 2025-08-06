<?php
// الاتصال بقاعدة البيانات
$conn = new mysqli("localhost", "root", "", "smart_methods");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// التحقق من وجود ID في الرابط
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // الحصول على الحالة الحالية
    $sql = "SELECT status FROM users WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $currentStatus = $row['status'];

        // عكس القيمة (0 تصبح 1، و 1 تصبح 0)
        $newStatus = $currentStatus == 0 ? 1 : 0;

        // تحديث الحالة في قاعدة البيانات
        $updateSql = "UPDATE users SET status = $newStatus WHERE id = $id";
        $conn->query($updateSql);
    }
}

// إغلاق الاتصال
$conn->close();

// إعادة التوجيه للصفحة الرئيسية
header("Location: index.php");
exit();
?>
