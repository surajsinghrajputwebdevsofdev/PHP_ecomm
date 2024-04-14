<?php
include 'conn.php';
include 'navbar.php';
if (isset($_POST["b1"])) {
    $Id = $_POST["t1"];
    $title = $_POST["t2"];
    $aut = $_POST["t3"];
    $pub = $_POST["t4"];
    $prc = $_POST["t5"];
    $img = $_POST["t6"];

    if ($_FILES["t6"]["error"] == 0) {
        $img = $_FILES["t6"]["name"];
        $target_path = "bookimg/" . $img;
        move_uploaded_file($_FILES["t6"]["tmp_name"], "bookimg/" . $_FILES["t6"]["name"]);
        $qry = "INSERT INTO tbbook (Id, title, aut, pub, prc, img) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($link, $qry);
        mysqli_stmt_bind_param($stmt, "isssds", $Id, $title, $aut, $pub, $prc, $img);
        mysqli_stmt_execute($stmt);
        if (mysqli_stmt_affected_rows($stmt) == 1) {
            echo "<script>
                    alert('Data saved successfully :)');
                    document.getElementById('registrationForm').reset();
                  </script>";
            } else {
            echo "<script>
                    alert('Error: Data not saved.');
                  </script>";
        }
        mysqli_stmt_close($stmt);
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
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

    <form action="enterdata.php" method="post" id="registrationForm" enctype="multipart/form-data">
        <label for="t1">Book ID:</label>
        <input type="text" name="t1" required>

        <label for="t2">Title:</label>
        <input type="text" name="t2" required>

        <label for="t3">Author:</label>
        <input type="text" name="t3" required>

        <label for="t4">Publisher:</label>
        <input type="text" name="t4" required>

        <label for="t5">Price:</label>
        <input type="text" name="t5" required>

        <label for="t6">Image:</label>
<input type="file" name="t6" accept="image/*" required>

        <button value="submit" type="submit" name="b1">Submit</button>
    </form>

</body>

</html>
