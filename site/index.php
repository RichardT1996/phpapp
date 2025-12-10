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

        .contact-card {
            background: #f9f9f9;
            border-left: 4px solid #007bff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        }

        .contact-card h4 {
            margin: 0 0 10px 0;
            color: #007bff;
        }

        .contact-card p {
            margin: 8px 0;
            color: #555;
        }

        .contact-card .date {
            color: #999;
            font-size: 0.9em;
            margin-top: 15px;
        }

        .no-data {
            padding: 20px;
            background: #fff3cd;
            border: 1px solid #ffc107;
            border-radius: 6px;
            color: #856404;
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
        Feel free to explore and check out the database content below.
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

    <h1 class="section-title">Recent Contact Messages</h1>

    <?php
    if ($conn != null) {
        try {
            $sql = "SELECT name, email, message, created_at FROM contacts ORDER BY created_at DESC LIMIT 10";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($contacts) > 0) {
                foreach ($contacts as $contact) {
                    echo "<div class='contact-card'>";
                    echo "<h4>" . htmlspecialchars($contact['name']) . "</h4>";
                    echo "<p><strong>Email:</strong> " . htmlspecialchars($contact['email']) . "</p>";
                    echo "<p><strong>Message:</strong> " . htmlspecialchars($contact['message']) . "</p>";
                    echo "<p class='date'>" . htmlspecialchars($contact['created_at']) . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<div class='no-data'>No contact messages yet. <a href='contact.php'>Be the first to send one!</a></div>";
            }
        } catch (PDOException $e) {
            echo "<p style='color:red;'>Error fetching contacts: " . $e->getMessage() . "</p>";
        }
    }
    ?>
</div>

<?php include("includes/footer.php"); ?>
</body>
</html>
