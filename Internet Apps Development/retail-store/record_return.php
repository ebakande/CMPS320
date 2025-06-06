<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_id = $_POST["item_id"];
    $quantity = $_POST["quantity"];
    $price_query = $conn->query("SELECT price FROM items WHERE id=$item_id");
    $price = $price_query->fetch_assoc()["price"];
    $total = $quantity * $price;
    $stmt = $conn->prepare("INSERT INTO returns (item_id, quantity, total_refund) VALUES (?, ?, ?)");
    $stmt->bind_param("iid", $item_id, $quantity, $total);
    $stmt->execute();
    $conn->query("UPDATE items SET quantity = quantity + $quantity WHERE id = $item_id");
    echo "Return recorded successfully!";
}
?>
<form method="post">
    Item ID: <input name="item_id" type="number"><br>
    Quantity: <input name="quantity" type="number"><br>
    <button type="submit">Record Return</button>
</form>