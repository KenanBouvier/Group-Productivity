<?php

    $conn = mysqli_connect('<IP>','<USERNAME>','<PASSWORD>','<DB>');

    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }
?>
