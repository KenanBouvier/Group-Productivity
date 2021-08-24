<div class="sidenav">
    <h1 class="sidenav-title">My Goals</h1>
    <?php foreach($goals as $goal){?>
        <a href="home.php"><?php echo htmlspecialchars($goal['title']) ?></a>
    <?php } ?>

    <div class = "add">
         <button class="btn" id = "add-goal" onclick = "location.href='create.php'" >
            <i class = "fas fa-plus"></i>
        </button>
    </div>
</div>