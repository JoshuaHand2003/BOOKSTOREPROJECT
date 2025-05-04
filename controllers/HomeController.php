<?php
class HomeController {
    public function handleRequest() {
        include 'views/templates/header.php';
        echo "<h2>Home</h2><p>This is the homepage of the BookStore.</p>";
        include 'views/templates/footer.php';
    }
}
?>
