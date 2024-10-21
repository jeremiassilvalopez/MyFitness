<?php
include 'dbFitness.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    $sql = "CALL Insertar_Usuario(?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $id, $nombre, $email, $contraseña);

    if ($stmt->execute()) {
        echo "Contacto agregado exitosamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
