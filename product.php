<?php
require   '/db.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
        }
        table {
            width: 95%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background: #333;
            color: #fff;
        }
        img {
            width: 60px;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Product List</h2>

<table>
    <tr>
        <th>ID</th>
        <th>SKU</th>
        <th>Name</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Image</th>
        <th>Description</th>
    </tr>

    <?php
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['sku']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['price']}</td>
                    <td>{$row['stock']}</td>
                    <td>{$row['image']}</td>
                    <td>{$row['descriptions']}</td>
                    
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No products found</td></tr>";
    }
    ?>

</table>

</body>
</html>