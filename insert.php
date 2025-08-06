insert.php
<?php
// الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = ""; // بدون كلمة مرور في XAMPP عادةً
$dbname = "smart_methods";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// التحقق من إرسال النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // جلب البيانات من النموذج
    $name = $_POST['name'];
    $age = $_POST['age'];

    // استعلام الإدخال
    $sql = "INSERT INTO users (name, age) VALUES ('$name', $age)";

    if ($conn->query($sql) === TRUE) {
        // إعادة التوجيه للصفحة الرئيسية بعد الإدخال
        header("Location: index.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// إغلاق الاتصال
$conn->close();
?>
