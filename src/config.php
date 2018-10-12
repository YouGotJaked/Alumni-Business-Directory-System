ini_set('display_errors', 'On');
error_reporting(E_ALL);

$db_host = "dbserver.engr.scu.edu";
$db_user = "jday"
$db_pass = "hunter2"
$db_name = "sdb_jday"

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name)
    or die("Error" . mysqli_connect($conn));

$query = "SHOW DATABASES"

$result = $conn->query($query);

echo "Connected. Dumping DB list:<br>\n";
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['Database'] . "<br>\n";
}

mysqli_close($conn);
