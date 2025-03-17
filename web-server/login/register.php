<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #121212;
            color: white;
            margin: 0;
            padding: 0;
        }
        form {
            background: #222;
            padding: 20px;
            margin: 50px auto;
            width: 80%;
            max-width: 400px;
            border-radius: 8px;
            box-shadow: 2px 2px 10px rgba(255, 0, 0, 0.5);
        }
        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }
        button {
            background: #ff0000;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background: #cc0000;
        }
    </style>
</head>
<body>

<h1>🔒 User Registration</h1>
<p>Register a new user account.</p>

<form method="POST">
    <input type="text" name="user" placeholder="Username" required><br>
    <input type="password" name="pass" placeholder="Password" required><br>
    <button type="submit">Register</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    
    // Простейший способ "сохранить" пользователя (НЕ безопасный, но ок для CTF)
    file_put_contents("/var/private/admin.txt", "$user:$pass\n", FILE_APPEND);
    echo "<p style='color: lightgreen;'>Account created!</p>";
}
?>

</body>
</html>

