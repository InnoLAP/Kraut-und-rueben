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
                <form id="loginForm" method="post">
                    <div class="login">
                    <label for="email">E-mail: </label>
                    <input type="text" name="email" placeholder="Email" required><br>
                  </div>
                  <div class="login">
                    <label for="password">Passwort: </label>
                    <input type="password" name="password" placeholder="Passwort" required><br>
                  </div>
                </form>
            <div class="loginbutton">
                <div class="confirm-button">
                    <input type="submit" form="loginForm" name="loginBtn" value="Anmelden">
                </div>
                <div class="cancel-button"><a href="index.php">Schließen</a></div>
            </div>
            <?php
                include "functions.php";
                include "dbConnect.php";

				//Check if the login data is correct
                if(array_key_exists('loginBtn', $_POST)) {
                    $loginCheck=CheckLogin($_POST["email"], $_POST["password"], $db);

                    if($loginCheck){
						//If correct get the user specific Data and store it in session cookies for later use
                        while($row = $loginCheck->fetch_assoc()){
                            $customerId=$row["KUNDENNR"];
                            $name=$row["VORNAME"];
                            $surname=$row["NACHNAME"];
                        }

						$data=DietKunde($customerId, $db);
						$customerDiets=array();

						while($row = $data->fetch_assoc()){
                            array_push($customerDiets, $row["DIETNR"]);
                        }

						$data=AllergieKunde($customerId, $db);
						$customerAllergies=array();

						while($row = $data->fetch_assoc()){
                            array_push($customerAllergies, $row["ALLERGIENR"]);
                        }

						closeDb($db);

                        session_start();
                        $_SESSION['customerId'] = $customerId;
                        $_SESSION['name'] = $name;
                        $_SESSION['surname'] = $surname;
						$_SESSION['customerAllergies'] = $customerAllergies;
						$_SESSION['customerDiets'] = $customerDiets;

						//Redirect
                        header('location: mainpage.php');
                    } else {
						//If incorrect display an error message
                        echo('<div class="errorLogin">
                                <p>Dieser Login ist uns unbekannt<br>Email oder Passwort ist falsch</p>
                            </div>');
                    }
                }
            ?>
      </div>
    </body>
</html>
