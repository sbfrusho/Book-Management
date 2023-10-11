<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Read books from the JSON file
        $jsonFile = 'books.json';
        $books = json_decode(file_get_contents($jsonFile), true);

        // Output books
        foreach ($books as $book) {
            echo "<p><strong>Title:</strong> " . $book['title'] . "<br>";
            echo "<strong>Author:</strong> " . $book['author'] . "<br>";
            echo "<strong>Available:</strong> " . ($book['available'] ? 'Yes' : 'No') . "<br>";
            echo "<strong>Pages:</strong> " . $book['pages'] . "<br>";
            echo "<strong>ISBN:</strong> " . $book['isbn'] . "</p>";
        }
    ?>
    </div>
</body>
</html>