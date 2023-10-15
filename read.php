<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
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

        th, td {
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

        // Output books in a table
        if (!empty($books)) {
            echo "<table>";
            echo "<tr><th>Title</th><th>Author</th><th>Available</th><th>Pages</th><th>ISBN</th></tr>";
            foreach ($books as $book) {
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
            echo "No books available.";
        }
        ?>
    </div>
</body>
</html>
