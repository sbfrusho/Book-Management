<?php
// Read books from the JSON file
$jsonFile = 'books.json';
$books = json_decode(file_get_contents($jsonFile), true);

// Function to search for books
function searchBooks($query, $books) {
    $results = [];
    foreach ($books as $book) {
        // Case-insensitive search by title or author
        if (stripos($book['title'], $query) !== false || stripos($book['author'], $query) !== false) {
            $results[] = $book;
        }
    }
    return $results;
}

// Handle search form submission
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['query'])) {
    $searchQuery = $_GET['query'];
    // Perform the search
    $searchResults = searchBooks($searchQuery, $books);

    // Output search results as JSON
    header('Content-Type: application/json');
    echo json_encode($searchResults, JSON_PRETTY_PRINT);
} else {
    // Handle invalid or missing query parameter
    http_response_code(400); // Bad Request
    echo json_encode(["error" => "Invalid search query"]);
}
?>
