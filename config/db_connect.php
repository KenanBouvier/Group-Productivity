<?php

    $conn = mysqli_connect('localhost','kenan','Mysql528','productivity_group');

    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }
?>