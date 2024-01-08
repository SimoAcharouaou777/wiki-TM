<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Public/Css/signup.css">
    <title>Sign Up Form</title>
</head>
<body>

<div class="signup-container">
    <h2>Sign Up</h2>
    <form class="signup-form" action="#" method="post">
        <div class="form-group">
            <label for="username"></label>
            <input type="text" id="username" name="username" placeholder="enter your Username"  required>
        </div>
        <div class="form-group">
            <label for="email"></label>
            <input type="email" id="email" name="email" placeholder="enter your Email" required>
        </div>
        <div class="form-group">
            <label for="password"></label>
            <input type="password" id="password" name="password" placeholder="enter your password" required>
        </div>
        <div class="form-group">
            <button type="submit">Sign Up</button>
        </div>
    </form>
</div>

</body>
</html>