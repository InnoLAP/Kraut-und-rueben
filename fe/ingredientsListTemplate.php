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
        echo("Search set<br>");

        if(!isset($_POST["checkDiets"])){$customerDiets=null;}

        if(!isset($_POST["checkAllergies"])){$customerAllergies=null;}

        $idString=$_POST["idString"];
        $nameString=$_POST["nameString"];

        $command=ZutatFilter($customerDiets,$customerAllergies,$nameString,$idString);
    }else {
        //If not get the command with the standard parameters
        echo('New search<br>');
        $command = ZutatFilter($customerDiets, $customerAllergies, null, null);
    }
    
    //Check if the origin data is from one of the form buttons that add an article to the cart
    if(array_key_exists('addBtn', $_POST)) {
        //If so get the selected article & amount
        $ingredient=$_POST["ingredientId"];
        $amount=$_POST["amount"];

        //Check if a cart already exists in the session
        if(isset($_SESSION['cartArray'])) {
            $cartArray = $_SESSION['cartArray'];
        } else {
            $cartArray = array();
        }

        //Store the selected article & amount in the cart
        $cartArray[$ingredient] = $amount;
        $_SESSION['cartArray']=$cartArray;
        
        //If a command was set in this temp variable, retrieve it
        if(isset($_SESSION['lastZutatCommand'])){
            $command=$_SESSION['lastZutatCommand'];
            echo('Using last command<br>');
        } else {
            $command = ZutatFilter(null, null, null, null);
            echo('Using new command<br>');
        }
    } else {
        //If not check if a cart exists
        if(isset($_SESSION['cartArray'])) {
            $cartArray = $_SESSION['cartArray'];
        } else {
            $cartArray = array();
        }
    }
    
    //Display the current shopping cart (debugging)
    echo("Cart consists of:<br>");
    foreach ($cartArray as $key => $value){
        echo "Key: $key; Value: $value<br />\n";
    }
    echo '<pre>'; print_r($cartArray); echo '</pre>';

    //Stash the current command in a temp variable
    $_SESSION['lastZutatCommand'] = $command;

    //Get the result for the selected command
    $result = contactDb($db, $command);
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Kraut und Rüben</title>
        <link rel="stylesheet" href="testStyles01.scss">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="pageContent">
            <form method="post">
                <input type="checkbox" checked="true" name="checkDiets">Check for diet?</input>
                <input type="checkbox" checked="true" name="checkAllergies">Check for Allergies?</input>
                <input type="number" name="idString">Search by id</input>
                <input type="text" name="nameString">Search by name</input>
                <input type="submit" name="argBtn" value="Accept" />
            </form> 
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Bezeichnung</th>
                        <th>Preis</th>
                        <th>Kalorien</th>
                        <th>Kohlenhydrate</th>
                        <th>Proteine</th>
                        <th>Anzahl</th>
                        <th class="buttonColumn"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //Loop through every row of the retrieved result and make a table row with the data
                        while($row = $result->fetch_assoc()){
                            echo('
                                <tr>
                                    <form method="post">
                                        <td>'.$row["ZUTATENNR"].'<input type="number" name="ingredientId" value="'.$row["ZUTATENNR"].'" class="hide"</td>
                                        <td>'.$row["BEZEICHNUNG"].'</td>
                                        <td>'.$row["NETTOPREIS"].' €</td>
                                        <td>'.$row["KALORIEN"].'</td>
                                        <td>'.$row["KOHLENHYDRATE"].'</td>
                                        <td>'.$row["PROTEIN"].'</td>
                                        <td class="inputColumn"><input type="number" value="1" min="1" max="999" name="amount">x '.$row["EINHEIT"].'</td>
                                        <td class="buttonColumn"><input type="submit" name="addBtn" value="Kaufen"></td>
                                    </form>
                                </tr>'
                            );
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>