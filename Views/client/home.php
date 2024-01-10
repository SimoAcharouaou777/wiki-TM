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

        <label for="category">Choose a category:</label>

        <select id="category" name="category_id">
            <?php foreach ($cate as $category) { ?>
            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
            <?php } ?>
        </select>
        
        <label for="tag">Choose tag</label>
        <select name="tags[]" id="tag" multiple>
            <?php foreach($tag as $tag) {?>
            <option value="<?= $tag->id ?>"><?= $tag->name ?></option>
            <?php } ?>
        </select>
               
        <button type="submit">save</button>
    </form>
    <div id="wikis">
        <?php
        foreach ($wikies as $wiki) {
            echo '<div class="wiki-container">';
            echo '<h3>' . $wiki->title . '</h3>';
            echo '<p><strong>Author:</strong> ' . $wiki->author . '</p>';
            echo '<p>' . $wiki->content . '</p>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
