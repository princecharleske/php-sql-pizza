<?php

    //superglobals
    //$_GET['name'], $_POST['name']
    // echo $_SERVER['SERVER_NAME'] . ' <br /> ';
    // echo $_SERVER['REQUEST_METHOD'] . ' <br /> ';
    // echo $_SERVER['SCRIPT_FILENAME'] . ' <br /> ';
    // echo $_SERVER['PHP_SELF'] . ' <br /> ';
    
    // $_SESSION, $_COOKIE


    //sessions
    
    if(isset($_POST['submit'])){


        //coockie for gender
        setcookie('gender', $_POST['gender'], time() +86400);
        
        session_start();

        $_SESSION['name'] = $_POST['name'];

        //echo $_SESSION['name'];
        header('Location: index.php');

    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>

    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <input type="text" name="name">
        <select name="gender" id="">
            <option value="male">male</option>
            <option value="female">female</option>
        </select>
        <input type="submit" name="submit">
    </form>

    
</body>
</html>