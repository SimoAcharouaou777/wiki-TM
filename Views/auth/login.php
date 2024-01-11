

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f3f4f6;
        }

        .container {
            max-width: 400px;
            margin: auto;
            margin-top: 50px;
        }

        .signup-form {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 20px;
        }

        .signup-form h2 {
            font-size: 2em;
            margin-bottom: 20px;
            text-align: center;
            color: #374151;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 0.9em;
            color: #718096;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #d2d6dc;
            border-radius: 5px;
        }

        .form-group button {
            width: 100%;
            padding: 12px;
            background-color: blue;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-group button:hover {
            background-color: #45a049;
        }

        .form-group p {
            margin-top: 15px;
            text-align: center;
        }

        .form-group p a {
            color: #4caf50;
            text-decoration: none;
            font-weight: bold;
        }

        .form-group p a:hover {
            text-decoration: underline;
        }
    </style>
    <title>LogIn</title>
</head>
<body>

<div class="container">
    <div class="signup-form">
        <h2>Sign Up</h2>
        <form action="/WIKI/login" method="post">
        <?php if(isset($_SESSION['errorempty'])) echo $_SESSION['errorempty']; ?>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <?php if(isset($_SESSION['erroremail'])) echo $_SESSION['erroremail']; ?>
                <?php if(isset($_SESSION['invalidpassword'])) echo $_SESSION['invalidpassword']; ?>
            </div>

            <div class="form-group">
                <button type="submit">Sign IN</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>

