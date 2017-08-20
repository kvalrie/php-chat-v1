<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Error</title>
</head>
<body>

    <h1>Error</h1>
    <p>
    <?php 
        echo $_SESSION['message'];    
    ?>
    </p>     
    <a href="index.php"><button>Home</button></a>
</div>
</body>
</html>