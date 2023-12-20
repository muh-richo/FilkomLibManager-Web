<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="Page/pengguna/koleksi/koleksi.css">
    <title>Koleksi Buku</title>
</head>
<body>
    <div class="searchContainer" id="searchContainer">
        <input
            type="text"
            class="searchInput"
            id="searchInput"
            placeholder="Search by title or author"
        />
        <button class="searchButton" id="searchButton">Search</button>
    </div>

    <div class="container" id="bookContainer">
        <?php foreach ($books as $book) { ?>
            <div class="book">
                <?php $imagePath = $book['image_path']; echo "<img src=\"$imagePath\" alt=\"Book Image\" />";?>
                <h3><?php echo $book['judul_buku']; ?></h3>
                <p><?php echo $book['pengarang']; ?></p>
            </div>
        <?php } ?>
    </div>
    <script>
        document.getElementById("searchButton").addEventListener("click", performSearch);

        function performSearch() {
            const searchTerm = document.getElementById("searchInput").value.toLowerCase();
            const books = <?php echo json_encode($books); ?>;

            const filteredBooks = books.filter((book) => {
                const title = book.judul_buku.toLowerCase();
                const author = book.pengarang.toLowerCase();

                return title.includes(searchTerm) || author.includes(searchTerm);
            });

            renderBooks(filteredBooks);
        }

        function renderBooks(booksArray) {
            const container = document.getElementById("bookContainer");
            container.innerHTML = "";

            booksArray.forEach((book) => {
                const bookElement = document.createElement("div");
                bookElement.classList.add("book");

                const imageElement = document.createElement("img");
                imageElement.src = book.image_path;
                imageElement.alt = "Book Image";

                const titleElement = document.createElement("h3");
                titleElement.textContent = book.judul_buku;

                const authorElement = document.createElement("p");
                authorElement.textContent = book.pengarang;

                bookElement.appendChild(imageElement);
                bookElement.appendChild(titleElement);
                bookElement.appendChild(authorElement);

                container.appendChild(bookElement);
            });
        }
    </script>
</body>
</html>
