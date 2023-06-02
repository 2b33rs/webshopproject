<?php include_once './header.php' ?>

<?php

$mysqli = new mysqli("localhost", "root", "", "webshop");
	if ($mysqli->connect_errno) {
		die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
	}
	$sql = "SELECT * FROM user WHERE username=? AND PASSWORD=?";
	$statement = $mysqli->prepare($sql);
	$statement->bind_param("ss", $username, $password);

	$statement->execute();
	$result = $statement->get_result();

//$products = array(
//    array("id" => 1, "name" => "Product 1", "description" => "Description of Product 1"),
//    array("id" => 2, "name" => "Product 2", "description" => "Description of Product 2"),
//    array("id" => 3, "name" => "Product 3", "description" => "Description of Product 3"),
//    array("id" => 4, "name" => "Product 4", "description" => "Description of Product 4")
//);

$searchTerm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';

if (!empty($searchTerm)) {
    $filteredProducts = array_filter($products, function ($product) use ($searchTerm) {
        return stripos($product['name'], $searchTerm) !== false || stripos($product['description'], $searchTerm) !== false;
    });
} else {
    $filteredProducts = $products;
}
?>
  <div class="container">
        <h1>Webshop Search</h1>

        <form action="" method="GET">
            <div class="search-container">
                <input type="text" name="searchTerm" placeholder="Search..." value="<?php echo $searchTerm; ?>">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <div id="search-results">
            <?php if (empty($filteredProducts)) : ?>
                <p>No results found.</p>
            <?php else : ?>
                <ul class="list-group">
                    <?php foreach ($filteredProducts as $product) : ?>
                        <li class="list-group-item">
                            <h5><?php echo $product['name']; ?></h5>
                            <p><?php echo $product['description']; ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>

    <?php include_once '../html/footer.html' ?>

