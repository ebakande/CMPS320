<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $stmt = $conn->prepare("UPDATE items SET name=?, price=?, quantity=? WHERE id=?");
    $stmt->bind_param("sdii", $name, $price, $quantity, $id);
    $stmt->execute();
    echo "Item updated successfully!";
}
?>
<form method="post">
    Item ID: <input name="id" type="number"><br>
    Name: <input name="name"><br>
    Price: <input name="price" type="number" step="0.01"><br>
    Quantity: <input name="quantity" type="number"><br>
    <button type="submit">Update Item</button>
</form>