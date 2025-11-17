<?php include("includes/a_config.php");?>
<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/design-top.php");?>
<?php include("includes/navigation.php");?>

<div class="container" id="main-content">
	<h2>Welcome to my website!</h2>
	<p>Some content goes here! Let's go with the classic "lorem ipsum."</p>

	<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</p>
	<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</p>
</div>

<h1>hello matey</h1>

<?php include("includes/footer.php");

// Include the DB connection class and establish the connection
include("dbconnection.php");
$db = new Dbconnection();
$conn = $db->connect();

if ($conn == null) {
    echo "Database not connected";
} else {
    try {
        // Query to fetch all records from example_table
        $sql = "SELECT id, name FROM test";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // Fetch all records
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if (count($results) > 0) {
            echo "<p>Contents of example_table:</p>";
            echo "<table border='1'><tr><th>ID</th><th>Name</th></tr>";
            
            // Loop through the results and display them in a table
            foreach ($results as $row) {
                echo "<tr><td>" . htmlspecialchars($row['id']) . "</td><td>" . htmlspecialchars($row['name']) . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No data found in the table.</p>";
        }
    } catch (PDOException $e) {
        echo "Error fetching data: " . $e->getMessage();
    }
}
?>


</body>
</html>