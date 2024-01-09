<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Wiki Article</title>
</head>
<body>
    <h2>Create Wiki Article</h2>
    <form action="/WIKI/creatWiki" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" required><br>

        <label for="content">Content:</label>
        <textarea name="content" rows="4" required></textarea><br>

        <label for="author">Author:</label>
        <input type="text" name="author" required><br>

        <!-- <label for="category">Choose a category:</label>
        <select id="category" name="category">
            <option value="programming">Programming</option>
            <option value="design">Design</option>
           
        </select>
        <label for="tags">Tags (comma-separated):</label>
        <input type="text" name="tags"><br> -->

        <button type="submit">save</button>
    </form>
</body>
</html>
