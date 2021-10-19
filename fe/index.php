<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Kraut und Rüben</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>

        <div class="main-header">
            <button class="button-profile">Profile Settings</button>
            <div class="logo">KRAUT U<br> RÜBEN</div>
            <button class="button-profile">Shopping Cart</button>
        </div>

        <div class="main">
        <div class="header">
            <div class="register"></div>
        </div>

        <?php
            include "functions.php";
            include "dbConnect.php";
            
            //$command=ZutatAlle();
            //$command=RezeptAlle();
            
            $diets=[1,2];
            $allergies=[1,2];
            //$command=ZutatFilter($diets, $allergies);
            //$command=RezeptFilter($diets, $allergies);

            $zutaten=[5001, 5002];
            //$command=ZutatenID($zutaten);

            $customerId=2001;
            //$command=DeleteCustomer($customerId);

            $rezeptId=1;
            //$command=ZutatenRezept($rezeptId);

            $result=contactDb($db, $command);
            echo "<br><br><br>";
            echo $command;
        ?>
    </body>
</html>
