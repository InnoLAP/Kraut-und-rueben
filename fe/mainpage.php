<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Kraut und Rüben</title>
    <link rel="stylesheet" href="scss/sharedStyles.scss">
    <link rel="stylesheet" href="scss/mainpageStyles.scss">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">

</head>
<body>

    <div class="header">
        <form action="profilesettings.php">
            <button type="submit" class="button-profile" >Einstellungen</button>
        </form>
        <div class="header-logo">KRAUT &<br> RÜBEN</div>
        <form action="warenkorb.php">
            <button class="button-profile">Warenkorb</button>
        </form>
    </div>
        <div class="choose-recipes-ingredients-text">
            <br>
            <?php
                session_start();
                if(!isset($_SESSION['customerId'])){
                    //If no session exists it means that the user never logged in, redirect to the index page
                    //header('location: index.php'); Uncomment when the project is finished
                } else {
                    //If it does exists display a custom greeting
                    $_SESSION['name'];
                    echo("Guten Tag ".$_SESSION['name']." ".$_SESSION['surname']."<br>");
                }
                
            ?>
            Hier bei Kraut und Rüben können Sie entweder einzelne <br> Zutaten kaufen, oder gleich ganze Rezepte!
            <br><br>Was wünschen Sie sich heute?<br>
        </div>
    <div class="mainpage-div">
        <div class="recipes-image">
            <form action="Rezepte.php">
                <button class="recipe-button"></button>
            </form>
        </div>
        <div class="ingredients-image">
            <form action="Zutaten.php">
                <button class="ingredient-button"></button>
            </form>
        </div>
    </div>
</body>
</html>