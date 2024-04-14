<?php
class clscon
{
    private $link;

    public function dbconnect()
    {
        $this->link = mysqli_connect("localhost", "root", "", "suraj_practice");
        return $this->link;
    }

    public function dbclose()
    {
        mysqli_close($this->link);
    }

    public function getallbooks()
    {
        if (isset($_SESSION["cart"]) && $_SESSION["cart"] != "") {
            $items = explode(',', $_SESSION["cart"]);
            $contents = [];
            foreach ($items as $item) {
                $contents[$item] = isset($contents[$item]) ? $contents[$item] + 1 : 1;
            }

            $output = [];

            $output[] = "<form name='f1' action='cart.php?action=update' method='post'>";
            $total = 0;
            $output[] = "<div class='card-deck'>";

            $link = $this->dbconnect();

            foreach ($contents as $Id => $qty) {
                $qry = "SELECT * FROM tbbook WHERE Id=$Id";
                $res = mysqli_query($link, $qry);

                if ($r = mysqli_fetch_array($res)) {
                    $output[] = "<div class='card'>";
                    $output[] = "<img src='$r[img]' class='card-img-top' alt='Book Image'>";
                    $output[] = "<div class='card-body'>";
                    $output[] = "<h5 class='card-title'>$r[1] by $r[2]</h5>";
                    $output[] = "<p class='card-text'>Publisher: $r[3]<br>Price: $r[4]</p>";
                    $output[] = "<p class='card-text'>Quantity: <input type='text' name='qty$r[0]' value='$qty' /></p>";
                    $amt = $r[4] * $qty;
                    $total += $amt;
                    $output[] = "<p class='card-text'>Amount: $amt</p>";
                    $output[] = "<a href='cart.php?bid=$r[0]&action=Delete' class='btn btn-danger'>Delete</a>";
                    $output[] = "</div></div>";
                }
            }

            $this->dbclose();

            $output[] = "</div><br>";
            $output[] = "Total: $total<br>";
            $_SESSION["totamt"] = $total;
            $output[] = "<input type='submit' name='b1' value='Update' class='btn btn-primary m-1 p-3' /><br>";
            $output[] = "<a href='pay.php' class='btn btn-success m-1 p-3'>Pay Now</a><br>";
            $output[] = "</form><br>";

            echo join($output);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #f4f4f4;
        }

        .card {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 19.60);
            padding: 6px;
            border-radius: 8px;
            width: 18rem;
            text-align: center;
            margin-bottom: 10px;
        }

        .card-deck {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .card-img-top {
            max-width: 100%;
            height: auto;
        }

        .btn-primary,
    .btn-success {
        margin-top: 10px;
        width: 100%;
    }
    </style>
</head>

<body>

</body>

</html>
