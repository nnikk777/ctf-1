<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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

<h1>🔑 Admin Login</h1>
<p>Enter your credentials to access the admin panel.</p>

<form method="POST">
    <input type="text" name="user" placeholder="Username" required><br>
    <input type="password" name="pass" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>

<?php
$flag = getenv("FLAG"); // Флаг берется из переменной окружения


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    
    $accounts = file("/var/private/admin.txt", FILE_IGNORE_NEW_LINES);
    foreach ($accounts as $account) {
    	list($stored_user, $stored_pass) = explode(":", $account);

    	if ($user === $stored_user && $pass === $stored_pass) {
        	if ($user === "admin") {
            	echo "<p style='color: lightgreen;'>Welcome, admin!</p>";
            	echo "<p>Your flag: <strong>$flag</strong></p>";
        	} else {
            	echo "<p style='color: lightgreen;'>Welcome, $stored_user!</p>";
        }
        exit;
    	}
    }
}

?>

</body>
</html>
