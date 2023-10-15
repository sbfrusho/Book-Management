<?php
    // Read books from the JSON file
    $jsonFile = 'books.json';
    $books = json_decode(file_get_contents($jsonFile), true);

    // Function to save books to JSON file
    function saveBooks($books) {
        global $jsonFile;
        file_put_contents($jsonFile, json_encode($books, JSON_PRETTY_PRINT));
    }

    // Handle add book form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['title']) && !empty($_POST['author']) && isset($_POST['available']) && isset($_POST['pages']) && !empty($_POST['isbn'])) {
        // Sanitize form inputs
        $title = htmlspecialchars($_POST['title']);
        $author = htmlspecialchars($_POST['author']);
        $available = ($_POST['available'] == 'true') ? true : false;
        $pages = intval($_POST['pages']);
        $isbn = htmlspecialchars($_POST['isbn']);

        // Create new book
        $newBook = [
            'title' => $title,
            'author' => $author,
            'available' => $available,
            'pages' => $pages,
            'isbn' => $isbn
        ];

        // Add new book to the books array
        $books[] = $newBook;

        // Save updated books to JSON file
        saveBooks($books);
        echo "New Book Added Succesfully";

        // Return success message as JSON
        // header('Content-Type: application/json');
        // echo json_encode(["message" => "Book added successfully"], JSON_PRETTY_PRINT);
    } else {
        // Handle invalid or missing form inputs
        http_response_code(400); // Bad Request
        header('Content-Type: application/json');
        echo json_encode(["error" => "Invalid or missing form data"], JSON_PRETTY_PRINT);
    }
?>


