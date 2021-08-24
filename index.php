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
        	<h1 class="goalTitle" style = "font-size:50px">Home</h1>     
    	</div>
    	<div>
    		<!-- TODO make the groups same size -->
	    	<?php foreach($goals as $goal){ ?>
	    		<div style = "
	    		border:5px solid #E98074;
	    		background-color: #E98074;
	    		display: inline-block;
	    		padding-left: 20px;
	    		padding-right: 20px;
	    		margin: 0px 10px 10px 0px;
	    		">
	    			<h2 style = "color:#fff; text-align: center;"><?php echo htmlspecialchars($goal['title']); ?></h2>
	    			<p style = "">Details: <?php echo htmlspecialchars($goal['details']); ?></p>
	    			<!-- <p>With: </p> -->
	    			<ul style = "list-style-type: none;">
	    				<?php foreach(explode(',',$goal['people']) as $person){ ?>
	    					<li style = "margin-left:-30px"><?php echo htmlspecialchars($person) ?></li>
	    				<?php } ?>
	    			</ul>

	    		</div>

	    	<?php } ?>
        </div>
        
    </div>


</body>

</html>