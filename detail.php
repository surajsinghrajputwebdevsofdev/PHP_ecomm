<?php
include 'connfing.php';

function detail_data()
{
    if (isset($_REQUEST["bid"])) {
        $con = new clscon();
        $bid = $_REQUEST["bid"];
        $qry = "select * from tbbook where Id=$bid";
        $res = mysqli_query($con->dbconnect(), $qry);

        echo "<div class='back-button'><a href='javascript:history.go(-1)'> Back</a></div>";
        echo "<div class='book-container'>";
        while ($r = mysqli_fetch_row($res)) {
            echo "<div class='book-card'>";
            echo "<img src='$r[5]' alt='Book Cover' class='book-image' />";
            echo "<div class='book-details'>";
            echo "<p class='book-title'>$r[1]</p>";
            echo "<p class='book-author'>Author: $r[2]</p>";
            echo "<p class='book-publisher'>Publisher: $r[3]</p>";
            echo "<p class='book-price'>Price: $r[4]</p>";
            echo "<a href=cart.php?bid=$r[0] &action=Add><img src=t4.png heigth=50 width=100 /></a>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";

        $con->dbclose();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .back-button {
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            text-align: left;
        }

        .back-button a {
            text-decoration: none;
            color: #fff;
        }

        .book-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .book-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            margin: 10px;
            overflow: hidden;
            width: 300px;
        }

        .book-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .book-details {
            padding: 15px;
            text-align: left;
        }

        .book-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .book-author, .book-publisher, .book-price {
            font-size: 14px;
            margin: 5px 0;
        }

        .add-to-cart-btn {
            display: block;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 4px;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php
    detail_data();
    ?>
</body>
</html>
