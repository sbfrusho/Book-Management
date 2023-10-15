<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Resul</title>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            /* background-color: #fff; */
            /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
            border-radius: 5px;
            margin-top: 50px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            /* background-color: #f2f2f2; */
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        // Read books from the JSON file
        $jsonFile = 'books.json';
        $books = json_decode(file_get_contents($jsonFile), true);

        // Function to search for books
        function searchBooks($query, $books)
        {
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

            // Output search results in a table
            if (!empty($searchResults)) {
                echo "<table>";
                echo "<tr><th>Title</th><th>Author</th><th>Available</th><th>Pages</th><th>ISBN</th></tr>";
                foreach ($searchResults as $book) {
                    echo "<tr>";
                    echo "<td>" . $book['title'] . "</td>";
                    echo "<td>" . $book['author'] . "</td>";
                    echo "<td>" . ($book['available'] ? 'Yes' : 'No') . "</td>";
                    echo "<td>" . $book['pages'] . "</td>";
                    echo "<td>" . $book['isbn'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No matching books found.";
            }
        } else {
            // Handle invalid or missing query parameter
            http_response_code(400); // Bad Request
            echo "Invalid Search Query";
        }
        ?>
    </div>
</body>

</html>
