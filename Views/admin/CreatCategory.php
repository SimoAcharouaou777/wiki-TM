
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../WIKI/Public/Css/signup.css">
    <title>Sign Up Form</title>
</head>
<body>

<div class="login-container">
    <h2>Add Category</h2>
    <form class="signup-form" action="/WIKI/CategoryController" method="post">
        <div class="form-group">
            <label for="name"></label>
            <input type="text" id="name" name="name" placeholder="enter category name" required>
        </div>
        <div class="form-group">
            <button type="submit">Add</button>
        </div>
    </form>
</div>

</body>
</html>
