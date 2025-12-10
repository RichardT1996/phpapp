<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("includes/head-tag-contents.php"); ?>
    <link rel="stylesheet" href="style.css">
    <style>
        /* ---- Page & Form Styling ---- */
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
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .contact-form label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #555;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .contact-form input:focus,
        .contact-form textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        .contact-form button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 25px;
            font-size: 1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .contact-form button:hover {
            background-color: #0056b3;
        }

        .contact-form h2 {
            margin-top: 0;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 6px;
            font-size: 1rem;
        }

        .alert.success {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }

        .alert.error {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }
    </style>
</head>

<body>

<?php include("includes/design-top.php"); ?>
<?php include("includes/navigation.php"); ?>

<div class="container" id="main-content">
    <?php if (isset($_GET['success'])): ?>
        <div class="alert success">✅ Thank you! Your message has been sent successfully.</div>
    <?php endif; ?>
    
    <?php if (isset($_GET['error'])): ?>
        <div class="alert error">
            ❌ 
            <?php
            switch($_GET['error']) {
                case 'missing_fields':
                    echo 'Please fill in all fields.';
                    break;
                case 'invalid_email':
                    echo 'Please enter a valid email address.';
                    break;
                case 'database':
                    echo 'An error occurred. Please try again later.';
                    break;
                default:
                    echo 'An error occurred. Please try again.';
            }
            ?>
        </div>
    <?php endif; ?>

    <form action="submit_contact.php" method="post" class="contact-form">
        <h2>Contact Us</h2>

        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Your name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Your email" required>

        <label for="message">Message</label>
        <textarea id="message" name="message" rows="5" placeholder="Your message" required></textarea>

        <button type="submit">Send Message</button>
    </form>
</div>

<?php include("includes/footer.php"); ?>

</body>
</html>
