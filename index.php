<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Smart Methods Task</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 50px;
    }
    form {
      margin-bottom: 20px;
    }
    input {
      margin-right: 10px;
    }
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      padding: 8px;
    }
  </style>
</head>
<body>

  <h2>Add User</h2>

  <form action="insert.php" method="post">
    <input type="text" name="name" placeholder="Name" required>
    <input type="number" name="age" placeholder="Age" required>
    <button type="submit">Submit</button>
  </form>

  <h3>Users Table</h3>

  <?php
  // الاتصال بقاعدة البيانات
  $conn = new mysqli("localhost", "root", "", "smart_methods");

  // التأكد من نجاح الاتصال
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // جلب البيانات من قاعدة البيانات
  $sql = "SELECT * FROM users";
  $result = $conn->query($sql);

  // عرض النتائج في جدول
  if ($result->num_rows > 0) {
    echo "<table>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Age</th>
              <th>Status</th>
              <th>Action</th>
            </tr>";

    while($row = $result->fetch_assoc()) {
      echo "<tr>
              <td>{$row['id']}</td>
              <td>{$row['name']}</td>
              <td>{$row['age']}</td>
              <td>{$row['status']}</td>
              <td><a href='toggle.php?id={$row['id']}'>Toggle</a></td>
            </tr>";
    }

    echo "</table>";
  } else {
    echo "No users found.";
  }

  $conn->close();
  ?>

</body>
</html>
