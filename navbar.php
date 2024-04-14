
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            padding-top: 56px;
        }

        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1000;
            padding-top: 56px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
        }

        .sidebar-sticky {
            position: relative;
            top: 56px; 
            padding-top: 20px;
            padding-bottom: 20px;
            overflow-x: hidden;
        }

        .sidebar a {
            padding: 10px;
            text-decoration: none;
            color: #333;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background-color: #eee;
        }

        .main-content {
            margin-left: 250px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: static;
                height: auto;
                box-shadow: none;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                      
       <a href="index.php" class="register-link">Home</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="register-link">Login</a>

                    </li>
       <a href="register.php" class="register-link">Register</a>

                    </li>
                      <li class="nav-item">
       <a href="enterdata.php" class="register-link">Add book</a>

                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 main-content">
            <!-- Your page content goes here -->
        </main>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
