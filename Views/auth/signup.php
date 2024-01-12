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
    <title>Sign Up</title>
</head>
<body>

<div class="container">
    <div class="signup-form">
        <h2>Sign Up</h2>
        <form action="/WIKI/register" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                <?php if(isset($_SESSION['erroruser'])) echo $_SESSION['erroruser']; ?>
                <p id="usernameError" style="color: red;"></p>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <?php if(isset($_SESSION['erroremail'])) echo $_SESSION['erroremail']; ?>
                <p id="emailError" style="color: red;"></p>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <p id="passwordError" style="color: red;"></p>
            </div>

            <div class="form-group">
                <button type="submit">Sign Up</button>
            </div>

            <p>Already have an account? <a href="/WIKI/Login">Login here</a></p>
        </form>
    </div>
</div>
        <script>
             function validateForm() {
            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            const regexuser = /^[a-zA-Z0-9]+$/;
            if (!regexuser.test(username)) {
            document.getElementById('usernameError').innerText='invalid username';
            return false;
             }
             const emailregex = /^[a-zA-Z0-9._%+-]+@(gmail\.com|hotmail\.com)$/i;
             if(!emailregex.test(email)){
                document.getElementById('emailError').innerText = 'invalid email';
                return false;
             }
             if (password.length < 6) {
            document.getElementById('passwordError').innerText = 'Password must be at least 6 characters long';
            return false;
            } 

             document.getElementById('usernameError').innerText = '';
             document.getElementById('emailError').innerText = '';
             document.getElementById('passwordError').innerText = '';

        return true;
             }
        </script>
</body>
</html>

