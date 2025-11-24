<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("includes/head-tag-contents.php"); ?>
    <style>
        /* ---- Simple Modern Page Styling ---- */
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        #main-content {
            background: #fff;
            padding: 40px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }

        h2, h3 {
            color: #333;
            margin-bottom: 10px;
        }

        .welcome-text {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 20px;
        }

        /* ---- Styled Database Table ---- */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            background: #fff;
        }

        table th {
            background: #007bff;
            color: #fff;
            padding: 12px;
            text-align: left;
        }

        table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        table tr:hover {
            background: #f1f1f1;
        }

        .section-title {
            margin-top: 40px;
            font-size: 1.4rem;
            color: #444;
        }
    </style>
</head>
<body>

<?php include("includes/design-top.php"); ?>
<?php include("includes/navigation.php"); ?>

<div class="container" id="main-content">
    <h2>Welcome to my website!</h2>
    <h3>My name is Richard Thomas</h3>
    <p class="welcome-text">
        Welcome to my website. Feel free to explore and check out the database content below.
    </p>

    <h1 class="section-title">Database Records</h1>

    <?php
    // Include DB class
    include("dbconnection.php");
    $db = new Dbconnection();
    $conn = $db->connect();

    if ($conn == null) {
        echo "<p style='color:red;'>Database not connected</p>";
    } else {
        try {
            $sql = "SELECT id, name FROM test";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($results) > 0) {
                echo "<table><tr><th>ID</th><th>Name</th></tr>";

                foreach ($results as $row) {
                    echo "<tr><td>" . htmlspecialchars($row['id']) . "</td><td>" . htmlspecialchars($row['name']) . "</td></tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No data found in the table.</p>";
            }
        } catch (PDOException $e) {
            echo "<p>Error fetching data: " . $e->getMessage() . "</p>";
        }
    }
    ?>
</div>

<?php include("includes/footer.php"); ?>
</body>
</html>
