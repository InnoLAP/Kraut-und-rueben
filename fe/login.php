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

         <div class="index-header">
             <div class="header-logo">KRAUT &<br> RÜBEN</div>
        </div>
        <div class="index-image">
            <div class="register-box">
                <br>Login
                <br><br>Bitte geben Sie ihre E-mail Adresse<br>und Passwort ein:
                <form>
                  <div class="login">
                    <label for "email" id="email">E-mail: </label>
                    <input type="text" name="EMAIL:" placeholder="Max.Mustermann@gmail.com"><br>
                  </div>
                  <div class="login">
                    <label for "passwort" id="passwort">Passwort: </label>
                    <input type="text" name="Passwort:" placeholder="*********"><br>
                  </div>
                </form>
                <div class="loginbutton">
                <div class="confirm-button" type="submit" >Anmelden</div>
                <div class="cancel-button"type="reset" >Schließen</div>
              </div>
            </div>
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
