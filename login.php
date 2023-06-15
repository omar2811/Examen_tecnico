<?php
include 'db_conexion.php';
?>
 <script>
        function mostrarPopup() {
            alert("Contraseña no válida. Por favor, inténtalo nuevamente.");
            window.location.href = "index.html";
        }
    </script>
<?php
session_start();


$username = $_POST["username"];
$password = $_POST["password"];

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
  $_SESSION["username"] = $username;
  header("Location: inicio.php");
  exit();
} else {
  echo  '<script>mostrarPopup();</script>';
}

$stmt->close();
$conn->close();
?>