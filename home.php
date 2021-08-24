<?php
    include('config/db_connect.php');

    // TODO set current_id to the goal 

    //write query for all goals
    $sql = 'SELECT title, details, people, schedule FROM goals';

    // make query and get restult
    $result = mysqli_query($conn,$sql);

    // fetch resulting rows
    $goals = mysqli_fetch_all($result,MYSQLI_ASSOC);

    // free result from memory as not needed
    mysqli_free_result($result);

    //closing the connection
    mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productivity_App</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/5a250bff97.js" crossorigin="anonymous"></script>
    <script src="app.js" defer></script>
</head>

<body>
    <?php
        include 'sidebar.php';
    ?>
    <div class="content">
        <div class="title">
            <!-- Instead of looping through all goals i want to get only one goal -->
            <?php foreach($goals as $goal){?>
                <h1 class="goalTitle" style = "font-size:50px">
                    <?php echo htmlspecialchars($goal['title']); ?>
                </h1>
            <?php }?>
        </div>

        <div class = "details">
            <!-- Instead of looping through all goals i want to get only one goal -->
            <?php 
                foreach($goals as $goal){?> 
                    <p><?php echo htmlspecialchars($goal['details']); ?></p>
            <?php } ?>
        </div>
        <!-- this completion nav could just be a php include as it won't change -->
        <div class="completion-nav"> 
            <h1 class="goalTitle">Activity Status</h1>

            <a href="#">John</a>
            <a href="#">Jane</a>
            <a href="#">Anne</a>
            <a href="#">Richard</a>
            <a href="#">Me!</a>
        </div>
    </div>

    <!-- <div class="content">
        <h1 class="goalTitle" style = "font-size:50px">Your activity</h1>
        <div class="completion-nav"> 
            <h1 class="goalTitle">Activity Status</h1>
            <a href="#">John</a>
            <a href="#">Jane</a>
            <a href="#">Anne</a>
            <a href="#">Richard</a>
            <a href="#">Me!</a>
        </div>
    </div> -->
</body>

</html>