<?php
$conn = mysqli_connect("localhost", "root", "", "profile");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data
$result = mysqli_query($conn, "SELECT * FROM contact");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Contacts</title>
</head>
<body>

<h2>Contact Data</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>

<?php
while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>".$row['id']."</td>
            <td>".$row['name']."</td>
            <td>".$row['email']."</td>
            <td>".$row['phone']."</td>
        </tr>";
}
?>

</table>

</body>
</html>