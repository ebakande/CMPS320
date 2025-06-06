<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $stmt = $conn->prepare("DELETE FROM items WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    echo "Item deleted successfully!";
}
?>
<form method="post">
    Item ID to Delete: <input name="id" type="number"><br>
    <button type="submit">Delete Item</button>
</form>