<?php
// Read books from the JSON file
$jsonFile = 'books.json';
$books = json_decode(file_get_contents($jsonFile), true);

// Function to save books to JSON file
function saveBooks($books) {
    global $jsonFile;
    file_put_contents($jsonFile, json_encode($books, JSON_PRETTY_PRINT));
}

// Handle delete book form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['isbn'])) {
    // Sanitize and validate ISBN
    $isbnToDelete = htmlspecialchars($_POST['isbn']);
    $isbnToDelete = preg_replace("/[^0-9]/", "", $isbnToDelete); // Remove non-numeric characters

    // Check if the book with the provided ISBN exists
    $bookExists = false;
    foreach ($books as $key => $book) {
        if ($book['isbn'] == $isbnToDelete) {
            // Delete the book from the array
            unset($books[$key]);
            $bookExists = true;
            break;
        }
    }

    // Save updated books to JSON file
    if ($bookExists) {
        saveBooks($books);
        // Return success message as JSON
        header('Content-Type: application/json');
        echo json_encode(["message" => "Book deleted successfully"], JSON_PRETTY_PRINT);
    } else {
        // Return error message if book with provided ISBN is not found
        http_response_code(404); // Not Found
        header('Content-Type: application/json');
        echo json_encode(["error" => "Book with provided ISBN not found"], JSON_PRETTY_PRINT);
    }
} else {
    // Handle invalid or missing form inputs
    http_response_code(400); // Bad Request
    header('Content-Type: application/json');
    echo json_encode(["error" => "Invalid or missing form data"], JSON_PRETTY_PRINT);
}
?>
