<?php
// Get the current script name
$currentScript = basename($_SERVER["SCRIPT_NAME"], ".php"); // e.g., 'about', 'contact', 'index'

// Set page info based on the script name
switch ($currentScript) {
    case "about":
        $CURRENT_PAGE = "About";
        $PAGE_TITLE = "About Us";
        break;

    case "contact":
        $CURRENT_PAGE = "Contact";
        $PAGE_TITLE = "Contact Us";
        break;

    case "index":
    default:
        $CURRENT_PAGE = "Index";
        $PAGE_TITLE = "Welcome to my homepage!";
        break;
}
?>
