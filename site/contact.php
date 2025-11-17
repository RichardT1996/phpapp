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
	<h2>Contact Us</h2>
	<form action="#" method="post" class="contact-form">
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

<?php include("includes/footer.php");?>

</body>
</html>