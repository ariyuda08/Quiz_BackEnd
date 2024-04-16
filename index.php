<?php
include 'User.php';
include 'FormHandler.php';

$user = new User(connectToDatabase()); // Membuat objek User dengan koneksi database
$message = ''; // Inisialisasi pesan

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST['name'] ?? '';
    $userEmail = $_POST['email'] ?? '';
    if (!empty($userName) && !empty($userEmail)) {
        $input = new FormHandler($userName, $userEmail);
        $input->processForm(); // Memproses form untuk menambahkan user baru
        $message = 'User added successfully'; // menampilkan pesan setelah berhasil menambahkan user
    }
}
$users = $user->getAllUsers(); // Mendapatkan semua data user dari database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        p {
            color: #4CAF50;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add User</h2>
    <form method="post">
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name" required><br>
        <label for="email">E-mail:</label><br>
        <input type="email" name="email" id="email" required><br>
        <input type="submit" name="submit" value="Submit"> 
    </form>

    <?php if (!empty($message)): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <h2>Registered Users</h2>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?php echo htmlspecialchars($user['name']); ?> - <?php echo htmlspecialchars($user['email']); ?></li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>
