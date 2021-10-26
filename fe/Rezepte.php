<?php
    //Every echo() in this top <?php part can be removed in the design since they only serve debugging purposes
    include "functions.php";
    include "dbConnect.php";

    //These variables are not needed in the final version but are currently
    $customerId = 2008;
    $customerDiets=[1,2];
    $customerAllergies=[1,2];

    session_start();

    if(!isset($_SESSION['customerId'])){
        //If no session exists it means that the user never logged in, redirect to the index page
        //header('location: login.php'); <-- Uncomment when the project is finished
    } else {
        //Get the actual customer data if a session exists
        $customerId=$_SESSION['customerId'];
        $customerDiets=$_SESSION['customerDiets'];
        $customerAllergies=$_SESSION['customerAllergies'];
    }

    //Check if the origin data is from the form button that changes the search arguments
    if(array_key_exists('argBtn', $_POST)) {
        //If so get the entered info and get a according command

        if(!isset($_POST["checkDiets"])){$customerDiets=null;}

        if(!isset($_POST["checkAllergies"])){$customerAllergies=null;}

        $idString=$_POST["idString"];
        $nameString=$_POST["nameString"];
        $ingredientCount=$_POST["ingredientCount"];

        $command=RezeptFilter($customerDiets,$customerAllergies,$nameString,$idString, $ingredientCount);
    }else {
        //If not get the command with the standard parameters
        $command = RezeptFilter($customerDiets, $customerAllergies, null, null, null);
    }

    //Check if the origin data is from one of the form buttons that add an article to the cart
    if(array_key_exists('addBtn', $_POST)) {
        //If so get the selected article & amount
        $recipe=$_POST["recipeId"];
        $amount=$_POST["count"];

        //Check if a cart already exists in the session
        if(isset($_SESSION['cartArray'])) {
            $cartArray = $_SESSION['cartArray'];
        } else {
            $cartArray = array();
        }
        if(isset($_SESSION['recipeCartArray'])) {
            $recipeCartArray = $_SESSION['recipeCartArray'];
        } else {
            $recipeCartArray = array();
        }

        //Store the selected article & amount in the cart
        $recipeCartArray[$recipe] = $amount;
        $_SESSION['recipeCartArray']=$recipeCartArray;

        $ingredientResult=ZutatenRezept($recipe, $db);

        while($row = $ingredientResult->fetch_assoc()) {
            $cartArray[$row["ZUTATENNR"]] =$row["MENGE"]*$amount;
        }

        $_SESSION['cartArray']=$cartArray;

        //If a command was set in this temp variable, retrieve it
        if(isset($_SESSION['lastRezeptCommand'])){
            $command=$_SESSION['lastRezeptCommand'];
            echo('Using last command<br>');
        } else {
            $command = RezeptFilter(null, null, null, null);
            echo('Using new command<br>');
        }
    } else {
        //If not check if a cart exists
        if(isset($_SESSION['cartArray'])) {
            $cartArray = $_SESSION['cartArray'];
        } else {
            $cartArray = array();
        }
        if(isset($_SESSION['recipeCartArray'])) {
            $recipeCartArray = $_SESSION['recipeCartArray'];
        } else {
            $recipeCartArray = array();
        }
    }

    //Stash the current command in a temp variable
    $_SESSION['lastRezeptCommand'] = $command;

    //Get the result for the selected command
    $result = contactDb($db, $command);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Kraut und Rüben</title>
    <link rel="stylesheet" href="scss/rezepteStyles.scss">
    <link rel="stylesheet" href="scss/sharedStyles.scss">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
</head>
    <body>
        <div class="header">
            <form action="mainpage.php">
                <button type="submit" class="button-profile" >Zurück</button>
            </form>
            <div class="header-logo">KRAUT &<br> RÜBEN</div>
            <form action="warenkorb.php">
                <button class="button-profile">Warenkorb</button>
            </form>
        </div>
     <div class="index-image">
        <h1>Rezepte</h1>
        <div class="pageContent">
            <form method="post" class="argForm">
                <div class="checkboxes">
                    <input class="cbformat" type="checkbox" checked="true" name="checkDiets">Sollen Ihre Diäten berücksichtig werden?</input>
                </div>
                <div class="checkboxes">
                    <input class="cbformat" type="checkbox" checked="true" name="checkAllergies">Sollen Ihre Allergien berücksichtig werden?</input>
                </div>
                <div>
                    <p>Wählen Sie die maximale Anzahl der Zutaten für ein Rezept aus:</p>
                    <input class="inputformat" type="number" placeholder="Anzahl" name="ingredientCount"></input>
                </div>
                <div>
                    <p>Suchen Sie Rezepte nach Rezept Nummer aus:</p>
                    <input class="inputformat" type="number" placeholder="ID" name="idString"></input>
                </div>
                <div>
                    <p>Suchen Sie Rezepte nach Namen raus:</p>
                    <input class="inputformat" type="text"  placeholder="Zutaten name" name="nameString"></input>
                </div>
              <input class="acceptbtn" type="submit" name="argBtn" value="Suchen"></input>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Bezeichnung</th>
                        <th>Anzahl der Zutaten</th>
                        <th>Link zum Rezept</th>
                        <th>Gesamt Preis</th>
                        <th>Anzahl der Portionen</th>
                        <th>Menge</th>
                        <th class="buttonColumn">Zum Warenkorb hinzufügen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //Loop through every row of the retrieved result and make a table row with the data
                        while($row = $result->fetch_assoc()){
                            $total=RezeptPreis($row["REZEPTNR"], $db);
                            $cost=0;
                            while($row2 = $total->fetch_assoc()){
                                $cost=$row2["total"];
                                $cost=round($cost, 2);
                            }

                            echo('
                                <tr>
                                    <form method="post">
                                        <td>'.$row["REZEPTNR"].'<input type="number" name="recipeId" value="'.$row["REZEPTNR"].'" class="hide"</td>
                                        <td>'.$row["REZEPTNAME"].'</td>
                                        <td>'.$row["REZEPTZUTATENANZAHL"].'</td>
                                        <td><a href="'.$row["REZEPTLINK"].'">Rezept</a></td>
                                        <td>'.number_format($cost, 2).' €</td>
                                        <td>'.$row["PORTIONENANZAHL"].' x</td>
                                        <td><input type="number" name="count" value="1"></td>
                                        <td class="buttonColumn"> <input class="buyBtn" type="submit" name="addBtn" value="Kaufen"></td>
                                    </form>
                                </tr>'
                            );
                        }
                    ?>
                </tbody>
            </table>
        </div>

        </div>
    </body>
</html>
