<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Kraut und Rüben</title>
        <link rel="stylesheet" href="styles.scss">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>

         <div class="main-header">
             <div class="logo">KRAUT U<br> RÜBEN</div>
        </div>
        <div class="main">
        
            <div class="header">
            <div class="register">
                <br>Willkommen bei Kraut und Rüben!
                <br><br>Haben Sie bereits einen Account oder<br> möchten Sie sich neu anmelden?
                <div class="login-button">Sign in</div>
                <div class="register-button">Sign up</div>
            </div>
        </div>

        <?php
            include "functions.php";
            include "dbConnect.php";
            
            //$command=ZutatAlle();
            //$command=RezeptAlle();
            //$command=DietAlle();
            //$command=AllergieAlle();
            
            $diets=[1,2,3,4];
            $allergies=[1,2,3,4];
            //$command=ZutatFilter($diets, $allergies);
            //$command=RezeptFilter($diets, $allergies);


            $zutaten=[5001, 5002];
            //$command=ZutatenID($zutaten);

            $customerId=2008;
            //$command=DeleteKunde($customerId, $db);
            //$command=DatenKunde($customerId);
            //$command=DietKunde($customerId);
            //$command=AllergieKunde($customerId);
            //$command=AddDiet($customerId, $diets, $db);
            //$command=AddAllergie($customerId, $allergies, $db);

            $rezeptId=1;
            //$command=ZutatenRezept($rezeptId);

            $email="sigrid@leberer.de";
            $password="123";
            //$loginResult=CheckLogin($email, $password, $db);
            //$loginResult = $loginResult ? 'true' : 'false';

            $email="pauawdl@web.de";
            $name="test";
            $surname="tester";
            $birthday="2001-01-01";
            $street="yeet street";
            $house="69";
            $zip="420";
            $city="Legoland";
            $phone="420/6969696";
            //$command=AddKunde($name, $surname, $birthday, $password, $street, $house, $zip, $city, $phone, $email);
            //$command=UpdateKunde("2001", $name, $surname, $password, $street, $house, $zip, $city, $phone, $email);

            //$result=contactDb($db, $command);
            //echo "<br><br><br>";
            //echo $command;
            //echo $loginResult;
        ?>
    </body>
</html>
