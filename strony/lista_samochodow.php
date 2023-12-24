<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista Samochodów</title>
    <link rel="stylesheet" href="../CSS/lista_samochodow.css"> <!-- Odwołanie do pliku CSS -->
</head>
<body>
<nav class ="navbar">
<img src="https://i.pinimg.com/originals/34/04/34/340434c255ca88fd09255e2ba17d4e4a.jpg" alt="Logo" class="logo">
    <ul>
        <li><a href="">Strona Główna</a></li>
        <li><a href="">O nas</a></li>
        <li><a href="">Oferta</a></li>
        <li><a href="">Kontakt</a></li> 
    </ul>
</nav>
<?php
// Połączenie z bazą danych
require_once('../scripts/connect.php');

// Parametry paginacji
$results_per_page = 9; // liczba wyników na stronę

// Pobranie numeru bieżącej strony
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

// Obliczenie offsetu dla zapytania SQL
$offset = ($page - 1) * $results_per_page;

// Zapytanie SQL z uwzględnieniem LIMIT i OFFSET
$sql = "SELECT * FROM cars LIMIT $offset, $results_per_page";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='car-container'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='car'>";
        echo "<a href='strona_samochodu.php?id=" . $row["id_car"] . "'>";
        echo "<img src='" . $row["img"] . "' alt='Car Image'>";
        echo "<div class='overlay'>";
        echo $row["brand"] . " " . $row["model"]; // Opis marki i modelu na przezroczystym tle
        echo "</div>";
        echo "</a>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "Brak dostępnych samochodów";
}

// Pobranie liczby wszystkich samochodów
$sql_count = "SELECT COUNT(*) AS total FROM cars";
$count_result = $conn->query($sql_count);
$row_count = $count_result->fetch_assoc();
$total_results = $row_count['total'];

// Obliczenie liczby stron
$total_pages = ceil($total_results / $results_per_page);

// Wyświetlenie linków do kolejnych stron
for ($i = 1; $i <= $total_pages; $i++) {
    echo "<a href='?page=$i'>$i</a> ";
}

$conn->close();
?>

</body>
</html>
