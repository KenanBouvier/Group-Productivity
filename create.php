<?php

    include('config/db_connect.php');
    //write query for all goals
    $sql = 'SELECT title, details, people, schedule FROM goals';
    // make query and get restult
    $result = mysqli_query($conn,$sql);
    // fetch resulting rows
    $goals = mysqli_fetch_all($result,MYSQLI_ASSOC);
    // free result from memory as not needed
    mysqli_free_result($result);
    

    $errors = array('schedule'=>'','title'=>'','people'=>'');


    $title = $details = $people = $schedule = '';

    if(isset($_POST['submit'])){
        $title = htmlspecialchars($_POST['title']);
        $schedule = htmlspecialchars($_POST['schedule']);
        $details = htmlspecialchars($_POST['details']);
        $people = htmlspecialchars($_POST['people']);

        if(empty($_POST['title'])){
            $errors['title'] = 'Title required!';
        }

        $people = $_POST['people'];
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$people)){
            $errors['people'] = 'People must be comma separated';
        }

        if($_POST['schedule']<=0){
            $errors['schedule'] = "Frequency must be more than 0!";
        }
    

    // if no errors from form
        if(!array_filter($errors)){
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $schedule = mysqli_real_escape_string($conn, $_POST['schedule']);
            $details = mysqli_real_escape_string($conn, $_POST['details']);
            $people = mysqli_real_escape_string($conn, $_POST['people']);

            //create sql 
            $sql = "INSERT INTO goals(title,details,people,schedule) VALUES('$title','$details','$people','$schedule')";
            //saving to db

            if(mysqli_query($conn,$sql)){
                header('Location: index.php');
            }
            else{
                echo 'error here!';
                echo 'query error: ' . mysqli_error($conn);
            }
        }
    }
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
    <link rel="stylesheet" href="formStyle.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <script src="https://kit.fontawesome.com/5a250bff97.js" crossorigin="anonymous"></script>
    <script src="app.js" defer></script>
</head>

<body>
    <?php
        include 'sidebar.php';
    ?>
    <div class="formContent">
        <div class="title">
            <h1 class="goalTitle" style = "font-size:55px; padding-bottom:25px;">Create a Goal</h1>
        </div>

        <form autocomplete = "off" class="decor" action ="create.php" method = "POST">
            <div class="form-inner">
            <input type="text" placeholder="Title" name ='title' value = "<?php echo $title?>">
            <div style = "color:#a30100"><?php echo $errors['title'] ?></div>
            <input type="text" placeholder="Who with?" name = 'people'value= "<?php echo $people?>">
            <div style = "color:#a30100"><?php echo $errors['people'] ?></div>
            <textarea placeholder="Details (optional)" rows="5" name = 'details'><?php echo $details?></textarea>
            <input type="number" placeholder="Frequency (every ? days)" name = 'schedule' value = "<?php echo $schedule?>">
            <div style = "color:#a30100"><?php echo $errors['schedule'] ?></div>
            <button class = 'submit' type="submit" name = 'submit'>Add</button>
            </div>
        </form>
    </div>


</body>

</html>