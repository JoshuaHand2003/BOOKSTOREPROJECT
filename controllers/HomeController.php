<?php
class HomeController {
    public function handleRequest() {
        // Includes the header template to display the top part of the page.
        include 'views/templates/header.php';
        
        // Displays the homepage content.
        echo "<h2>Home</h2><p>This is the homepage of the BookStore.</p>";
        
        // Includes the footer template to display the bottom part of the page.
        include 'views/templates/footer.php';
    }
}
?>
