<?php

    session_start();

    if($_SERVER['QUERY_STRING'] == 'noname' ){
        //unset($_SESSION['name']);
        session_unset();
    }


    $name= $_SESSION['name'] ?? 'Guest';

    //overriding
    //$_SESSION['name'] = 'sharothi';

    //get gender cookie
    $gender = $_COOKIE['gender'] ?? 'Unknown';


?>



<head>
    <title>My Pizza!</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <style type="text/css">

        /* body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        } */

        .brand{
            background: #cbb09c !important;
        }
        .brand-text{
            color: #cbb09c !important;
        }

        form{
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;

        }

        .pizzastyle{
            width: 100px;
            margin: 40px auto -30px;
            display: block;
            position: relative;
            top: -30px;
        }

    </style>

</head>
    <body class="grey lighten-4">
        <nav class="white ">
            <div class="container">
                <a href="index.php" class="brand-logo brand-text"> My Pizza!!</a>

                    <ul id="nav-mobile" class="right hide-on-small-and-down">

                        <li class="grey-text" > Hello <?php echo htmlspecialchars($name); ?> </li>
                        <li class="grey-text" > ( <?php echo htmlspecialchars($gender); ?> )</li>

                        <li> <a href="add.php" class="btn brand z-depth-0">Add a Pizza</a> </li>

                    </ul>
            </div>
        </nav> 