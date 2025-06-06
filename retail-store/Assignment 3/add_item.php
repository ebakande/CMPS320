<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $stmt = $conn->prepare("INSERT INTO items (name, price, quantity) VALUES (?, ?, ?)");
    $stmt->bind_param("sdi", $name, $price, $quantity);
    $stmt->execute();
    echo "Item added successfully!";
}
?>
<form method="post">
    Name: <input name="name"><br>
    Price: <input name="price" type="number" step="0.01"><br>
    Quantity: <input name="quantity" type="number"><br>
    <button type="submit">Add Item</button>
</form>