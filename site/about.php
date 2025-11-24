<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("includes/head-tag-contents.php"); ?>

    <style>
        /* ---- Same Modern Page Styling as Home Page ---- */
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

        h2 {
            color: #333;
            margin-top: 30px;
            margin-bottom: 10px;
        }

        p {
            font-size: 1.1rem;
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<?php include("includes/design-top.php"); ?>
<?php include("includes/navigation.php"); ?>

<div class="container" id="main-content">

    <h2>About Us</h2>
    <p>Welcome to our website! We are dedicated to providing helpful information and quality content for our visitors.</p>

    <h2>Our Mission</h2>
    <p>Our mission is to offer clear, accessible resources that educate and inspire people from all backgrounds.</p>

    <h2>Our Story</h2>
    <p>Founded with a passion for learning and creativity, we started this project to share knowledge and build a community of curious minds.</p>

    <h2>Contact</h2>
    <p>If you have any questions or feedback, feel free to reach out—we’d love to hear from you!</p>

</div>

<?php include("includes/footer.php"); ?>

</body>
</html>
