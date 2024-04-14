<?php
include 'connfing.php';
include 'navbar.php';

function desp_data() {
    $con = new clscon();
    $qry = "select * from tbbook";
    $res = mysqli_query($con->dbconnect(), $qry);

    echo '<div class="container mt-5">';
    echo '<div class="card-deck">';

    while ($r = mysqli_fetch_array($res)) {
        echo '<div class="col-md-4"> <br>';
        echo '<div class="card" style="width: 18rem;">';
        echo '<img src="' . $r[5] . '" class="card-img-top" alt="Book Image" height="200" width="100">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title"><a href="detail.php?bid=' . $r[0] . '">' . $r[1] . '</a></h5>';
        echo '<p class="card-text">Author: ' . $r[2] . '</p>';
        echo '<p class="card-text">Publisher: ' . $r[3] . '</p>';
        echo '<p class="card-text">Price: ' . $r[4] . '</p>';
        echo "<a href=cart.php?bid=$r[0]&action=Add><img src=t4.png heigth=50 width=100 /></a>";
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div> <br>';
    $con->dbclose();
}
?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
                padding: 6px;
                border-radius: 8px;
                width: 100px;
                text-align: center;
                left: 18vh;
                margin-bottom: 10px;
            }
            nav {
                position: fixed;
                top: 0;
                width: 90%;
                z-index: 1000;
                background-color: #ffffff;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            body {
                font-family: Helvetica, sans-serif;
                padding: 5%;

            }

            #slideshow {
                text-align: center;
                overflow: hidden;
                height: 310px;
                width: 1111px;
                margin-top: auto;
                padding-top: auto;
                border-radius: 4px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
            }

            .slide-wrapper {
                width: 2912px;
                -webkit-animation: slide 18s ease infinite;
            }

            .slide {
                float: left;
                height: 510px;
                width: 728px;
            }

            .slide:nth-child(1) {
                background-image: url('s8.png');
            }

            .slide:nth-child(2) {
                background-image: url('s7.jpeg');
            }

            .slide:nth-child(3) {
                background-image: url('s6.jpg');
            }

            .slide:nth-child(4) {
                background-image: url('s5.jpg');
            }

            .slide-number {
                color: #000;
                text-align: center;
                font-size: 10em;
            }

            @-webkit-keyframes slide {
                20% {
                    margin-left: 0px;
                }
                30% {
                    margin-left: -728px;
                }
                50% {
                    margin-left: -728px;
                }
                60% {
                    margin-left: -1456px;
                }
                70% {
                    margin-left: -1456px;
                }
                80% {
                    margin-left: -2184px;
                }
                90% {
                    margin-left: -2184px;
                }
            }

        </style>
    </head>
    <body> <div id="slideshow">
            <div class="slide-wrapper">
                <div class="slide"><h1 class="slide-number"></h1></div>
                <div class="slide"><h1 class="slide-number"></h1></div>
                <div class="slide"><h1 class="slide-number"></h1></div>
                <div class="slide"><h1 class="slide-number"></h1></div>
                <div class="slide"><h1 class="slide-number"></h1></div>
            </div>
        </div>
        <?php
        desp_data();
        include 'navbar.php'; // Including the navbar after the cards
        ?>   
        <script>
            let slideIndex = 0;
            showSlides();

            function showSlides() {
                let i;
                let slides = document.getElementsByClassName("mySlides");
                let dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex > slides.length) {
                    slideIndex = 1
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
                setTimeout(showSlides, 1000);
            }
        </script>

    </body>
</html>