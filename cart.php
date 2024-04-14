<?php
session_start();
include 'connfing.php';
if (isset($_SESSION["cart"]))
    $cart = $_SESSION["cart"];
if (isset($_REQUEST["bid"]))
    $bid = $_REQUEST["bid"];
if (isset($_REQUEST["action"]))
   $action = $_REQUEST["action"];
switch ($action){
    case 'Add':
        if (isset($cart)) {
            $cart .= "," . $bid;
        } else {
            $cart = $bid;
        }
        break;
    case 'update':
        foreach ($_POST as $key => $value) {
            if (strstr($key, 'qty')) {
                $bid = str_replace('qty', '', $key);
                for ($i = 1; $i <= $value; $i++) {
                    if (isset($newcart)) {
                        $newcart .= ',' . $bid;
                    } else {
                        $newcart = $bid;
                    }
                }
            }
            if (isset($newcart)) {
                $cart = $newcart;
            } else {
                $cart = "";
            }
        }
        break;
        case 'Delete':
            if(isset($_SESSION["cart"]))
            {
                if($_SESSION["cart"]!="")
                {
                    $items=explode(',',$_SESSION["cart"]);
                    foreach ($items as $item){
                        if($bid!=$item)
                        {
                            if(isset($newcart))
                            {
                                $newcart.=','.$item;
                            }
 else {
     $newcart=$item;
 }
                        }
                    }
                }
            }
            if(isset($newcart))
            {
                $cart=$newcart;
            }
            else
            {
                $cart="";
                session_destroy();
                unset($_SESSION["cart"]);
                echo "<a href=index.php>Back to page</a>";
            }
}
$_SESSION["cart"]=$cart;
echo $_SESSION["cart"];
?>
<<html>
    <head>
        <title></title>
    </head>
    <body>
<?php
$obj = new clscon();
$obj->getallbooks();
?>
    </body>
</html>

