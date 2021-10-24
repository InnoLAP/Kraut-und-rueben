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
      </div>
    </body>
</html>
