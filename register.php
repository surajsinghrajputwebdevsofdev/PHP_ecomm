<?php
include 'conn.php';
include 'navbar.php';
if (isset($_POST["b1"])) {
    $name = $_POST["t1"];
    $email = $_POST["t2"];
    $password = $_POST["t3"];
    if ($_FILES["t4"]["error"] == 0) {
        $image = $_FILES["t4"]["name"];
        $target_path = "img/" . $image;
        move_uploaded_file($_FILES["t4"]["tmp_name"], "img/".$_FILES["t4"]["name"]);

        $qry = "INSERT INTO register (name, email, password, image) VALUES ('$name', '$email', '$password', '$image')";
        $res = mysqli_query($link, $qry) or die(mysqli_error($link));

        if (mysqli_affected_rows($link) == 1) {
            echo "<script>
                    alert('Registered successfully :)');
                    document.getElementById('registrationForm').reset();
                  </script>";
               header("Location: login.php"); //next page per jane ka code hai ye
        } else {
            echo "<script>
                    alert(' cannot Registered please try again later.. :( ');
                  </script>";
        }
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
        }

        .card {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }

        .image-container {
            margin-bottom: 20px;
        }

        #uploadedImage {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            display: none;
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
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
                <div class="card">
                    <h2>Register</h2>
                    <form action="register.php" method="post" id="registrationForm" enctype="multipart/form-data">
                        <!-- Your form elements go here -->
                        <label for="t1">Name:</label>
                        <input type="text" name="t1" placeholder="Enter name..." required>
                        <label for="t2">Email:</label>
                        <input type="email" name="t2" placeholder="Enter email..." required>
                        <label for="t3">Password:</label>
                        <input type="password" placeholder="Enter passwo rd..." name="t3" required>
                        <label for="t4">Select Image:</label>
                        <input type="file" name="t4" accept="image/*" onchange="displayImage(this)">
                        <div class="image-container image-center">
                            <img src="#" alt="Selected Image" id="uploadedImage">
                        </div>
                        <button value="submit" type="submit" name="b1">Register</button>
                        <br>
                    </form>
                </div>
            
        </div>
    </div>
    <script>
        function displayImage(input) {
            var file = input.files[0];
            var image = document.getElementById('uploadedImage');
            
            if (file) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    image.src = e.target.result;
                    image.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                image.src = '#';
                image.style.display = 'none';
            }
        }
    </script>
</body>
</html>
