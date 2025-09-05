<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "student_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Viewer</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
        th { background-color: #333; color: #fff; }
        a.button {
            display: inline-block; padding: 8px 16px; background: #007bff; color: #fff;
            text-decoration: none; border-radius: 5px; margin-right: 5px;
        }
        a.button:hover { background: #0056b3; }
    </style>
</head>
<body>

<h2>📋 Student List</h2>
<a class="button" href="add.php">➕ Add New Student</a>

<table>
    <tr>
        <th>ID</th><th>Name</th><th>Age</th><th>Course</th><th>Email</th><th>Actions</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['age'] ?></td>
            <td><?= $row['course'] ?></td>
            <td><?= $row['email'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">✏️ Edit</a> | 
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('⚠️ Sigurado ka bang gusto mong i-delete?')">🗑️ Delete</a>
            </td>
        </tr>
    <?php } ?>

</table>

</body>
</html>
