<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Get data from form
    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];
    $email = $_POST['email'];

    // 2. Connect to DB
    $conn = mysqli_connect("localhost", "root", "", "student_db");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // 3. Insert into database
    $sql = "INSERT INTO students (name, age, course, email)
            VALUES ('$name', '$age', '$course', '$email')";

    if (mysqli_query($conn, $sql)) {
        echo "✅ Record inserted successfully. <a href='index.php'>View Students</a>";
    } else {
        echo "❌ Error: " . mysqli_error($conn);
    }

    // 4. Close connection
    mysqli_close($conn);
    exit(); // Stops page from continuing to render form
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <style>
        body {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>➕ Add New Student</h1>
    <form method="POST" action="add.php">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Age:</label><br>
        <input type="number" name="age" required><br><br>

        <label>Course:</label><br>
        <input type="text" name="course" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <button type="submit">Add Student</button>
    </form>
    <br>
    <a href="index.php">🔙 Back to Student List</a>
</body>
</html>
