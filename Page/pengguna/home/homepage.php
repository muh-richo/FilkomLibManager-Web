<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="Page/pengguna/home/home.css">
    <title>Home Page</title>
</head>
<body>
    <?php include "Page/navbar/navigation_bar.php"; ?>
    <br>
    <div class="container">
        <div class="carousel-title">Book Collection</div>
        <div class="carousel-container">
            <button class="prev">&lt;</button>
            <div class="carousel">
                <?php
                foreach ($books as $imagePath) {
                    echo "<img src=\"$imagePath\" alt=\"Book Image\" />";
                }
                ?>
            </div>
            <button class="next">&gt;</button>
        </div>
    </div>
    <script src="Page/pengguna/home/home.js"></script>
</body>
</html>
