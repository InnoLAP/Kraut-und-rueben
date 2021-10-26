<?php
    include "functions.php";
    include "dbConnect.php";

    $errorMsg="";
    $name="";
    $surname="";
    $street="";
    $houseNr="";
    $city="";
    $zip="";
    $telephone="";
    $birthday="";
    $email="";

    if(array_key_exists('regBtn', $_POST)) {
        $email=$_POST["email"];
        $name=$_POST["name"];
        $surname=$_POST["surname"];
        $street=$_POST["street"];
        $houseNr=$_POST["houseNr"];
        $city=$_POST["city"];
        $zip=$_POST["zip"];
        $telephone=$_POST["telephone"];
        $password=$_POST["password"];
        $birthday=$_POST["birthday"];
        
        if(CheckEmail(null, $email, $db)) {
            AddKunde($name, $surname, $birthday, $password, $street, $houseNr, $zip, $city, $telephone, $email, $db);

			//Redirect
            header('location: login.php');
        } else {
            $errorMsg="<p>Diese Email existiert bereits bei uns!</p>";
        }
    }
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Kraut und Rüben</title>
        <link rel="stylesheet" href="scss/sharedStyles.scss">
        <link rel="stylesheet" href="scss/registerStyles.scss">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="index-header">
             <div class="header-logo">KRAUT &<br> RÜBEN</div>
        </div>
        <div class="index-image">
            <div class="register-box2">
                <h2>Registrierungsformular:</h2>
                <form method="post" id="regForm">

                    <label class="required" for="VORNAME">Vorname:</label>
                    <input type="text" name="name" <?php echo('value="'.$name.'"')?> placeholder="Vorname" required><br>

                    <label class="required" for="NACHNAME">Nachname:</label>
                    <input type="text" name="surname" <?php echo('value="'.$surname.'"')?> placeholder="Nachname" required><br>
                    
                    <label class="required" for="email">E-mail: </label>
                    <input type="email" name="email" <?php echo('value="'.$email.'"')?> placeholder="Email" required><br>
                    
                    <label class="required" for="STRASSE">Straße:</label>
                    <input type="text" name="street" <?php echo('value="'.$street.'"')?> placeholder="Blumenstraße" required><br>
                    
                    <label class="required" for="HAUSNR">Hausnummer:</label>
                    <input type="number" name="houseNr" <?php echo('value="'.$houseNr.'"')?> placeholder="123" required><br>
                    
                    <label class="required" for="ORT">Wohnort:</label>
                    <input type="text" name="city" <?php echo('value="'.$city.'"')?> placeholder="München" required><br>
                    
                    <label class="required" for="PLZ">Postleitszahl:</label>
                    <input type="number" name="zip" <?php echo('value="'.$zip.'"')?> placeholder="80331" required><br>
                    
                    <label class="required"for="TELEFON">Telefonnummer:</label>
                    <input type="tel" name="telephone" <?php echo('value="'.$telephone.'"')?> placeholder="089-1337" required><br>
                    
                    <label class="required" for="password">Passwort: </label>
                    <input type="password" name="password" placeholder="Passwort" required><br>
                    
                    <label class="required" for="GEBURTSDATUM">Geburtsdatum:</label>
                    <input type="date" name="birthday" <?php echo('value="'.$birthday.'"')?> placeholder="dd.mm.yyyy" required><br>

                    
                </form>
                <br><br>
                <input type="checkbox" form="regForm" required>Ich habe die <a class="agbLink" href="agb.html">AGB</a> gelesen und erkläre mich einverstanden *</input>
                <div class="loginbutton">
                    <div class="confirm-button">
                        <input type="submit" form="regForm" name="regBtn" value="Regristrieren" class="bacon">
                    </div>
                    <div class="cancel-button"><a href="index.php">Schließen</a></div>
                </div>
                <?php echo($errorMsg); ?>
            </div>
        </div>
    </body>
</html>
