This updated code uses the `mysqli_*` functions, which are the recommended replacement for the deprecated `mysql_*` functions. It also includes comprehensive error handling to ensure robustness and security.  Error messages are logged and appropriate responses given to the user.

```php
<?php
$mysqli = new mysqli("localhost", "username", "password", "database_name");

if ($mysqli->connect_errno) {
    error_log("Failed to connect to MySQL: " . $mysqli->connect_error);
    die("Connection failed. Please try again later.");
}

$sql = "SELECT * FROM users";
$result = $mysqli->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        // Process each row
        echo "ID: " . $row['id'] . ", Name: " . $row['name'] . "<br>";
    }
    $result->free_result();
} else {
    error_log("Failed to execute query: " . $mysqli->error);
    die("Error retrieving data. Please try again later.");
}

$mysqli->close();
?>
```