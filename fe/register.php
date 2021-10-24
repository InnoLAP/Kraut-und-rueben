<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Kraut und Rüben</title>
        <link rel="stylesheet" href="styles.scss">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
        <style>
        label{
          position: relative;
          width:300px;
          margin:20px;
          padding:5px;
          font-size:20px;
          }
          input[type=text], input[type=datetime], input[type=tel], input[type=password] {
          width: 70%;
          padding: 4px 30px;
          margin: 2px 0;
          box-sizing: content-box;
          border: none;
          border-bottom: 2px solid red;
          }
          .required:after {
            content:" *";
            color: white;
            text-shadow:0px 0px;
          }
        </style>
    </head>
    <body>

         <div class="index-header">
             <div class="header-logo">KRAUT &<br> RÜBEN</div>
        </div>
        <div class="index-image">
            <div class="register-box2">
                <h2>Registrierungsformular:</h2>
                <form>

                    <label class="required" for="VORNAME">Vorname:</label>
                    <input type="text" name="VORNAME" placeholder="Vorname" required><br>

                    <label class="required" for="NACHNAME">Nachname:</label>
                    <input type="text" name="VORNAME" placeholder="Nachname" required><br>

                    <label class="required" for="GEBURTSDATUM">Geburtsdatum:</label>
                    <input type="datetime" name="GEBURTSDATUM" placeholder="dd.mm.yyyy" required><br>

                    <label class="required" for="STRASSE">Straße:</label>
                    <input type="text" name="STRASSE" placeholder="Blumenstraße" required><br>

                    <label class="required" for="HAUSNR">Hausnummer:</label>
                    <input type="text" name="HAUSNR" placeholder="123" required><br>

                    <label class="required" for="PLZ">Postleitszahl:</label>
                    <input type="text" name="PLZ" placeholder="80331" required><br>

                    <label class="required" for="ORT">Wohnort:</label>
                    <input type="text" name="ORT" placeholder="München" required><br>

                    <label class="required"for="TELEFON">Telefonnummer:</label>
                    <input type="tel" name="TELEFON" placeholder="089-1337" required><br>

                    <label class="required" for="email">E-mail: </label>
                    <input type="text" name="email" placeholder="Email" required><br>

                    <label class="required" for="password">Passwort: </label>
                    <input type="password" name="password" placeholder="Passwort" required><br>

                </form>
<br><br>
            <div class="loginbutton">
                <div class="confirm-button">
                    <input type="submit" form="loginForm" name="loginBtn" value="Regristrieren" class="bacon">
                </div>
                <div class="cancel-button"><a href="index.php">Schließen</a></div>
            </div>
            </div>


            <?php
            /*
                include "functions.php";
                include "dbConnect.php";

                if(array_key_exists('loginBtn', $_POST)) {
                    $loginCheck=CheckLogin($_POST["email"], $_POST["password"], $db);

                    if($loginCheck){
                        while($row = $loginCheck->fetch_assoc()){
                            $customerId=$row["KUNDENNR"];
                            $name=$row["VORNAME"];
                            $surname=$row["NACHNAME"];
                        }

                        session_start();
                        $_SESSION['customerId'] = $customerId;
                        $_SESSION['name'] = $name;
                        $_SESSION['surname'] = $surname;

                        header('location: mainpage.php');
                    } else {
                        echo('<div class="errorLogin">
                                <p>Dieser Login ist uns unbekannt<br>Email oder Passwort ist falsch</p>
                            </div>');
                    }
                } */
            ?>

      </div>
    </body>
</html>
