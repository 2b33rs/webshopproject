
<?php
// Hier würden normalerweise Datenbankabfragen oder andere Suchlogik erfolgen.
// Für diese Beispielimplementierung verwenden wir statische Daten.

$searchTerm = $_GET['searchTerm'];

// Filtern der Produkte basierend auf dem Suchbegriff
$filteredProducts = array_filter($products, function ($product) use ($searchTerm) {
    return stripos($product['name'], $searchTerm) !== false || stripos($product['description'], $searchTerm) !== false;
});

// JSON-Antwort senden
header('Content-Type: application/json');
echo json_encode($filteredProducts);
?>