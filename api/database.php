
<?php

$servername = "127.0.0.1";
$username = "rabby456_quser";
$password = "7eiHpPCL57GrC";
$dbname = "rabby456_quizbuzz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$conn-> set_charset("utf8");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>

<?php

/*
$connection = new mysqli_connect("127.0.0.1", "rabby456_quser", "7eiHpPCL57GrC");
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Selecting a database 

    $db_select = mysqli_select_db($connection, "rabby456_quizbuzz");
    if (!$db_select) {
        die("Database selection failed: " . mysqli_connect_error());
    }







exit;
//===================old======
$conn = mysql_connect("localhost", "rabby456_quser", "n~#L.E$ZQ{%3");
if (!$conn) 
{
    echo "Unable to connect to DB: " . mysql_error();
    exit;
}

if (!mysql_select_db("rabby456_quizbuzz")) 
{
    echo "Unable to select mydbname: " . mysql_error();
    exit;
}

*/

?>
