<?php
include 'db.php';
$result = $conn->query("SELECT * FROM items");
echo "<h3>Current Inventory</h3><table border=1><tr><th>Name</th><th>Price</th><th>Quantity</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['name']}</td><td>\${$row['price']}</td><td>{$row['quantity']}</td></tr>";
}
echo "</table>";
$res = $conn->query("SELECT SUM(total_price) AS sales FROM sales");
$sales = $res->fetch_assoc()['sales'] ?? 0;
$ret = $conn->query("SELECT SUM(total_refund) AS returns FROM returns");
$returns = $ret->fetch_assoc()['returns'] ?? 0;
$profit = $sales - $returns;
echo "<h3>Total Profit: \$$profit</h3>";
?>