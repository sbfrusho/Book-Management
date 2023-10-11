<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 50px;
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            display: inline-block;
        }
        input[type="checkbox"] {
            width: 20px;
        }
        button[type="submit"] {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Book Management</h1>

        <h2>Search Books</h2>
        <form action="search.php" method="get" class="form-group">
            <label for="searchQuery">Search by Title or Author:</label>
            <input type="text" id="searchQuery" name="query" required>
            <button type="submit">Search</button>
        </form>

        <h2>Delete Book</h2>
        <form action="delete.php" method="post" class="form-group">
            <label for="isbn">Enter ISBN to Delete:</label>
            <input type="text" id="isbn" name="isbn" required>
            <button type="submit">Delete</button>
        </form>

        <h2>Add New Book</h2>
        <form action="add.php" method="post" class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required><br>
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required><br>
            <label for="available">Available:</label>
            <input type="checkbox" id="available" name="available"><br>
            <label for="pages">Number of Pages:</label>
            <input type="number" id="pages" name="pages" required><br>
            <label for="isbn">ISBN:</label>
            <input type="text" id="isbn" name="isbn" required><br>
            <button type="submit">Add Book</button>
        </form>
    </div>

    

    <div class="container">

        <form action="read.php">
        <button type="submit">Show List</button>
        </form>
        
    </div>


</body>
</html>
