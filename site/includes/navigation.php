<div class="container" style="margin-top: 20px;">
    <ul class="nav nav-pills justify-content-center" style="background: #fff; border-radius: 8px; padding: 10px; box-shadow: 0 3px 10px rgba(0,0,0,0.1);">
        <li class="nav-item">
            <a class="nav-link <?php if ($CURRENT_PAGE == "Index") { echo 'active'; } ?>" href="index.php" style="border-radius: 50px; padding: 10px 20px;">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($CURRENT_PAGE == "About") { echo 'active'; } ?>" href="about.php" style="border-radius: 50px; padding: 10px 20px;">About Us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($CURRENT_PAGE == "Contact") { echo 'active'; } ?>" href="contact.php" style="border-radius: 50px; padding: 10px 20px;">Contact</a>
        </li>
    </ul>
</div>

<style>
    .nav-link {
        color: #007bff !important;
        transition: all 0.3s;
    }

    .nav-link:hover {
        background-color: #007bff !important;
        color: #fff !important;
    }

    .nav-link.active {
        background-color: #007bff !important;
        color: #fff !important;
    }
</style>
