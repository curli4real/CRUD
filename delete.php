<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "student_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];

$sql = "DELETE FROM students WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('🗑️ Student deleted successfully!'); window.location='index.php';</script>";
} else {
    echo "❌ Error deleting student: " . mysqli_error($conn);
}
?>
