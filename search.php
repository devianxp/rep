<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cajerosdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener la consulta de búsqueda del campo de texto
$query = $_POST["query"];

// Consulta SQL para buscar cajeros que coincidan con la consulta
$sql = "SELECT N_de_Cajero, Lugar, Departamento, Municipio FROM cajeros WHERE Lugar LIKE '%$query%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Mostrar los resultados con los campos requeridos
        echo "<p>Número de Cajero: " . $row["N_de_Cajero"] . "</p>";
        echo "<p>Lugar: " . $row["Lugar"] . "</p>";
        echo "<p>Departamento: " . $row["Departamento"] . "</p>";
        echo "<p>Municipio: " . $row["Municipio"] . "</p>";
        echo "<hr>";
    }
} else {
    echo "No se encontraron resultados.";
}

$conn->close();
?>
