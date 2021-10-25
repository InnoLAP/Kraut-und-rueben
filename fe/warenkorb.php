<?php
//Every echo() in this top <?php part can be removed in the design since they only serve debugging purposes
include "functions.php";
include "dbConnect.php";

session_start();

$customerId=2008;

if(!isset($_SESSION['cartArray'])){
    //If no session exists it means that the user never logged in, redirect to the index page
    //header('location: login.php'); <-- Uncomment when the project is finished
} else {
    //Get the actual customer data if a session exists
    //$customerId=$_SESSION['customerId']; <-- Uncomment when the project is finished
    $recipeArray=$_SESSION['recipeCartArray'];
    $ingredientsArray=$_SESSION['cartArray'];
}

if(array_key_exists('deleteIngredientBtn', $_POST)) {
    $ingredientId=$_POST["ingredientId"];
    unset($ingredientsArray[$ingredientId]);
    $_SESSION['cartArray']=$ingredientsArray;
}

if(array_key_exists('deleteRecipeBtn', $_POST)) {
    $recipeId=$_POST["recipeId"];
    unset($recipeArray[$recipeId]);
    $_SESSION['recipeCartArray']=$recipeArray;
}

$ingredientsCart=ZutatenID($ingredientsArray, $db);
$recipeCart=RezepteID($recipeArray, $db);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Kraut und Rüben</title>
    <link rel="stylesheet" href="scss/sharedStyles.scss">
    <link rel="stylesheet" href="scss/warenkorbStyles.scss">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">

</head>
<body>

    <div class="header">
        <form action="profilesettings.php">
            <button type="submit" class="button-profile">Profile Settings</button>
        </form>
        <div class="header-logo">KRAUT &<br> RÜBEN</div>
        <form action="warenkorb.php">
            <button class="button-profile">Shopping Cart</button>
        </form>
    </div>

    <div class="order-boxes">
        <h1>Warenkorb</h1>
        <div class="ingredients-box">
            <table>
                <thead>
                    <tr>
                        <th>Bezeichnung</th>
                        <th>Preis</th>
                        <th>Kalorien</th>
                        <th>Kohlenhydrate</th>
                        <th>Proteine</th>
                        <th>Anzahl</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                        $totalPrice=0;
                        $totalProtein=0;
                        $totalKohlenhydrate=0;
                        $totalKalorien=0;
                        $totalAmount=0;
                        //Loop through every row of the retrieved result and make a table row with the data
                        if($ingredientsCart){
                            while($row = $ingredientsCart->fetch_assoc()){
                                $totalPrice += $row["NETTOPREIS"] * $ingredientsArray[$row["ZUTATENNR"]];
                                $totalProtein += $row["PROTEIN"];
                                $totalKohlenhydrate += $row["KOHLENHYDRATE"];
                                $totalKalorien += $row["KALORIEN"];
                                $totalAmount += $ingredientsArray[$row["ZUTATENNR"]];

                                echo('
                                   <form method="post">
                                      <tr>
                                            <td>'.$row["BEZEICHNUNG"].'<input type="text" class="hide" name="ingredientId" value="'.$row["ZUTATENNR"].'"></td>
                                            <td>'.$row["NETTOPREIS"]*$ingredientsArray[$row["ZUTATENNR"]].'€</td>
                                            <td>'.$row["KALORIEN"].'</td>
                                            <td>'.$row["KOHLENHYDRATE"].'</td>
                                            <td>'.$row["PROTEIN"].'</td>
                                            <td>'.$ingredientsArray[$row["ZUTATENNR"]].'</td>
                                            <td class="delete-ingredient-btn"><input type="submit" name="deleteIngredientBtn" Value="Entfernen"><button class="delete-ingredient-btn">Entfernen</button></input></td>
                                      </tr>
                                   </form>
                               ');
                            }
                        }
                    echo('
                            <tr>
                                <td class="buttonColumn"></td>
                                <td class="buttonColumn"></td>
                                <td class="buttonColumn"></td>
                                <td class="buttonColumn"></td>
                                <td class="buttonColumn"></td>
                                <td class="buttonColumn"></td>
                                <td class="buttonColumn"></td>
                            </tr>
                        ');
                    echo('
                            <tr>
                                <td>Gesamt:</td>
                                <td>'.$totalPrice.'€</td>
                                <td>'.$totalKalorien.'</td>
                                <td>'.$totalKohlenhydrate.'</td>
                                <td>'.$totalProtein.'</td>
                                <td>'.$totalAmount.'</td>
                            </tr>
                        ');
                    ?>
                </tbody>
            </table>
        </div>

        <div class="recipes-box">
            <table>
                <thead>
                <tr>
                    <th>Rezepte</th>
                    <th>Portionen</th>
                    <th>Link</th>
                </tr>
                </thead>

                <tbody>

                    <?php
                        //Loop through every row of the retrieved result and make a table row with the data
                        if($recipeCart){
                            while($row = $recipeCart->fetch_assoc()){
                                echo('
                                    <form method="post">
                                        <tr>
                                            <td>'.$row["REZEPTNAME"].'<input type="text" class="hide" name="recipeId" value="'.$row["REZEPTNR"].'"></td>
                                            <td>'.$row["PORTIONENANZAHL"].'x</td>
                                            <td><a href="'.$row["REZEPTLINK"].'">Hier klicken!</a></td>
                                            <td class="buttonColumn"><input type="submit" name="deleteRecipeBtn" Value="Entfernen"></td>
                                        </tr>
                                    </form>
                                ');
                            }
                        }
                    ?>

                </tbody>
            </table>
        </div>

        <input class="cta-buy-btn"  type="submit" name="buyBtn" value="Jetzt Kaufen">
    </div>

</body>
</html>