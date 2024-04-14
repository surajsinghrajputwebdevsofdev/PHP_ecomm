<?php
include 'conn.php';
include 'navbar.php';

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $qry = "SELECT * FROM register WHERE email='$email' AND password='$password'";
    $res = mysqli_query($link, $qry) or die(mysqli_error($link));

    if (mysqli_num_rows($res) == 1) {
        echo "<script>
                    alert(' Login successfully :)');
                    document.getElementById('registrationForm').reset();
                  </script>";
        header("Location: index.php");
        exit();
    } else {
        $loginError = "Invalid email or password. Please try again.";
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
  
    <div class="container-fluid">
        <div class="row content-center items-center"> 
   <div class="card">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Enter email..." required>

            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Enter password..." required>

            <?php if (isset($loginError)) : ?>
                <p class="error"><?php echo $loginError; ?></p>
            <?php endif; ?>

                <button type="submit" name="login">Login</button></br>

        </form>
    </div>
        </div>
     </div>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 80vh;
            margin: 0;
             background-color: #f4f4f4;
            font-family: 'Arial', sans-serif;
        }
        .card {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
            padding: 20px;
            border-radius: 8px;
            width: 350px;
            text-align: center;
            right: 20vh; 
        }
        h2 {
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            color: #555;
        }

        input {
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</body>

</html>





