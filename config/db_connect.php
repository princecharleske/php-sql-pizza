<?php


    //connect to database
    $conn = mysqli_connect('localhost', 'pizza_admin', 'password', 'charles_pizza');

    //check connection
    if(!$conn){
        echo 'Connection error :' . mysqli_connect_error();
    }


    
?>