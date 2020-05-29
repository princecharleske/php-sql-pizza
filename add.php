<?php


    include('config/db_connect.php');





    
    // $email = '';
    // $title  = '';
    // $ingredients = '';
    $email = $title = $ingredients = '';

    $errors = array('email' => '', 'title' => '', 'ingredients'=>'');

    //check for data in form..if not return same form
    //get(array) associative array
    // if(isset($_GET['submit'])){
    //     echo $_GET['email'];
    //     echo $_GET['title'];
    //     echo $_GET['ingredients'];
    // }

    //XXS - inject scripts smh #🤷‍♂️# -------------------------------------|
    //<script> window.location = "http//www.google.com"</script>         |
                                                                //       |
                                                                //       |
    if(isset($_POST['submit'])){                                //       |
        // echo htmlspecialchars($_POST['email']);  //<------------------|
        // echo htmlspecialchars($_POST['title']);
        // echo htmlspecialchars($_POST['ingredients']);
        //use htmlspecialchars to ensure no symbols enterred



        //check email
        if(empty($_POST['email'])){
            //echo 'An Email is required <br />';
           $errors['email'] = 'An Email is required <br />';
        } else {
            //echo htmlspecialchars($_POST['email']);
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ //filter_validate_email - inbuilt php filter for email 
                $errors['email'] = 'Email must be a valid Email Address!'; //returns true
            }
        }
        //check title
        if(empty($_POST['title'])){
            $errors['title'] =  'A Title is required <br />';
        } else {
            //echo htmlspecialchars($_POST['title']);
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){ //////##(^ from the start ##to the end$ ### [a-z]lowercase[A-Z]uppercase ##spaces \s #as many times as the user wants+)##
                $errors['title'] = 'Title MUST be letters and spaces only!!'; //returns true
            }
        }
        //check ingredients
        if(empty($_POST['ingredients'])){
            $errors['ingredients'] = 'At least one ingredient is required <br />';
        } else {
            //echo htmlspecialchars($_POST['ingredients']);
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){ //////looking for a comma seperated list of words
                $errors['ingredients'] = 'Ingredients must be a comma  seperated list!!!'; //returns true
        }
    }

    if(array_filter($errors)){
        //echo 'errors in the form';
    } else {

        //protect from sql injection
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

        //create sql
        $sql = "INSERT INTO pizzas(title, email, ingredients) VALUES ('$title', '$email', '$ingredients')";

        //save to db and check
        if(mysqli_query($conn, $sql)){
            //success
            //echo 'form is valid';
        header('Location: index.php');
        } else {
            echo 'query error: ' .mysqli_error($conn);
        }

       
    }


    } //end of POST check

?>


<!DOCTYPE html>
<html>

    <?php include('templates/header.php'); ?>

    <section class="container grey-text">
        <h4 class="center"> Add Pizza </h4>
        <!----
        <form class="white z-depth-3" action="add.php" method="POST">
        ---->
        <form class="white z-depth-3" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

            <label>Your Email : </label>

            <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">

            <div class="red-text"><?php echo $errors['email']; ?></div>

            <label>Pizza Title : </label>

            <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">

            <div class="red-text"><?php echo $errors['title']; ?></div>

            <label>Ingredients (comma seperated) : </label>

            <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">

            <div class="red-text"><?php echo $errors['ingredients']; ?></div>

            <div class="center">
                <input type="submit" value="submit" name="submit" class="btn brand" >
            </div>
        
        </form>

        
    <?php include('templates/footer.php'); ?>

</html>