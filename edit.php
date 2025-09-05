<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "student_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get student data
$id = $_GET['id'];
$sql = "SELECT * FROM students WHERE id = $id";
$result = mysqli_query($conn, $sql);
$student = mysqli_fetch_assoc($result);

// Handle update form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];
    $email = $_POST['email'];

    $update_sql = "UPDATE students SET name='$name', age=$age, course='$course', email='$email' WHERE id=$id";

    if (mysqli_query($conn, $update_sql)) {
        echo "<script>alert('✅ Student updated!'); window.location='index.php';</script>";
    } else {
        echo "❌ Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        form { max-width: 400px; margin: auto; }
        label { display: block; margin-top: 10px; }
        input[type="text"], input[type="number"], input[type="email"] {
            width: 100%; padding: 8px; margin-top: 5px;
        }
        button { margin-top: 15px; padding: 10px 20px; background: green; color: white; border: none; cursor: pointer; }
        button:hover { background: darkgreen; }
    </style>
</head>
<body>

<h2>✏️ Edit Student</h2>

<form method="POST">
    <label>Name:</label>
    <input type="text" name="name" value="<?= $student['name'] ?>" required>

    <label>Age:</label>
    <input type="number" name="age" value="<?= $student['age'] ?>" required>

    <label>Course:</label>
    <input type="text" name="course" value="<?= $student['course'] ?>" required>

    <label>Email:</label>
    <input type="email" name="email" value="<?= $student['email'] ?>" required>

    <button type="submit">💾 Update Student</button>
</form>

</body>
</html>
