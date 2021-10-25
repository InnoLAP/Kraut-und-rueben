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
    <link rel="stylesheet" href="scss/recipeListTemplateStyles.scss">
    <link rel="stylesheet" href="scss/sharedStyles.scss">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
</head>
    <body>
      <div class="index-header">
          <div class="header-logo">KRAUT &<br> RÜBEN</div>
     </div>
     <div class="index-image">

        <div class="pageContent">
            <form method="post" class="argForm">
              <br>
              <label for="checkDiets">Sollen Ihre gespeicherten Ernährungskategorie mit berücksichtig werden:</label><br>
              <input class="cbformat" type="checkbox" checked="true" name="checkDiets"></input><br>
              <label for="checkAllergies">Sollen Ihre gespeicherten Allergien mit berücksichtig werden:</label><br>
              <input class="cbformat" type="checkbox" checked="true" name="checkAllergies"></input><br>
              <label for="ingredientCount">Wählen Sie die maximale Anzahl der Zutaten für ein Rezept aus:</label><br>
              <input class="inputformat" type="number" name="ingredientCount"></input><br>
              <label for="idString">Suchen Sie Rezepte nach Rezept Nummer aus:</label><br>
              <input class="inputformat" type="number" name="idString"></input><br>
              <label for="nameString">Suchen Sie Rezepte nach Namen raus:</label><br>
              <input class="inputformat" type="text" name="nameString"></input><br>
              <br>
              <input class="acceptbtn" type="submit" name="argBtn" value="Suchen"></input><br>
              <br>
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
                                        <td class="buttonColumn"> <input type="submit" name="addBtn" value="hinzufügen"></td>
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
