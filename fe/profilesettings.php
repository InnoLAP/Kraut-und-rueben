<?php
    include "functions.php";
    include "dbConnect.php";

    $errorMsg="";

    session_start();
    if(!isset($_SESSION['customerId'])){
        //If no session exists it means that the user never logged in, redirect to the index page
        header('location: index.php');
    } else {
        $customerId=$_SESSION['customerId'];
    }

    if(array_key_exists('deleteBtn', $_POST)) {
        DeleteKunde($customerId, $db);
        session_destroy();

        //Redirect
        header('location: index.php');
    }

    $command=DatenKunde($customerId);

    $result=contactDb($db, $command);

    while($row = $result->fetch_assoc()){
        $name=$row["VORNAME"];
        $surname=$row["NACHNAME"];
        $city=$row["ORT"];
        $zip=$row["PLZ"];
        $telephone=$row["TELEFON"];
        $email=$row["EMAIL"];
        $houseNr=$row["HAUSNR"];
        $street=$row["STRASSE"];
    }

    if(array_key_exists('saveBtn', $_POST)) {
        $oldPassword=$_POST["oldPassword"];

        if(CheckPassword($customerId, $oldPassword, $db)){
            $email=$_POST["email"];
            if(CheckEmail($customerId, $email, $db)) {
                $name=$_POST["name"];
                $surname=$_POST["surname"];
                $city=$_POST["city"];
                $zip=$_POST["zip"];
                $telephone=$_POST["telephone"];
                $houseNr=$_POST["houseNr"];
                $street=$_POST["street"];
                $newPassword=$_POST["newPassword"];


                $changeCommand=UpdateKunde($customerId, $name, $surname, $newPassword, $street, $houseNr, $zip, $city, $telephone, $email);
                $changeResult=contactDb($db, $changeCommand);

                $command=DatenKunde($customerId);

                $result=contactDb($db, $command);

                while($row = $result->fetch_assoc()){
                    $name=$row["VORNAME"];
                    $surname=$row["NACHNAME"];
                    $city=$row["ORT"];
                    $zip=$row["PLZ"];
                    $telephone=$row["TELEFON"];
                    $email=$row["EMAIL"];
                    $houseNr=$row["HAUSNR"];
                    $street=$row["STRASSE"];
                }

                $errorMsg='<p class="errorMsg">Erfolgreich geändert!</p>';
            } else {
                $errorMsg='<p class="errorMsg">Email ist schon vergeben!</p>';
            }
        } else{
            if(!($_POST["name"] == null)){$name=$_POST["name"];}
            if(!($_POST["surname"] == null)){$surname=$_POST["surname"];}
            if(!($_POST["city"] == null)){$city=$_POST["city"];}
            if(!($_POST["zip"] == null)){$zip=$_POST["zip"];}
            if(!($_POST["telephone"] == null)){$telephone=$_POST["telephone"];}
            if(!($_POST["email"] == null)){$email=$_POST["email"];}
            if(!($_POST["houseNr"] == null)){$houseNr=$_POST["houseNr"];}
            if(!($_POST["street"] == null)){$street=$_POST["street"];}

            $errorMsg='<p class="errorMsg">Falsches Passwort</p>';
        }

    }

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Kraut und Rüben</title>
    <link rel="stylesheet" href="scss/sharedStyles.scss">
    <link rel="stylesheet" href="scss/settingStyles.scss">
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
        <button class="button-profile noHover">Einstellungen</button>
    </div>
    <div class="profile-settings-main-div">
            <div class="col-md-9">
                <div class="container content clear-fix">
                    <h2 class="mt-5 mb-5">Profile Settings</h2>
                    <div class="row" style="height:100%">
                        <div class="col-md-9">
                            <div class="container">
                                <form method="post">
                                    <div class="form-group">
                                        <label for=firstName>Vorname:</label>
                                        <input type="text" class="form-control" value="<?php echo($name)?>" name="name" id="firstName">
                                    </div>
                                    <div class="form-group">
                                        <label for=lastName>Nachname:</label>
                                        <input type="text" class="form-control" value="<?php echo($surname)?>" name="surname" id="lastName">
                                    </div>
                                    <div class="form-group">
                                        <label for=email>Email:</label>
                                        <input type="email" value="<?php echo($email)?>" class="form-control" name="email" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for=address>Strasse:</label>
                                        <input type="text" class="form-control" value="<?php echo($street)?>" name="street" id="fullName">
                                    </div>
                                    <div class="form-group">
                                        <label for=hausnr>Haus Nr:</label>
                                        <input type="number" class="form-control" value="<?php echo($houseNr)?>" name="houseNr" id="fullName">
                                    </div>
                                    <div class="form-group">
                                        <label for=plz>PLZ:</label>
                                        <input type="number" maxlength="5" class="form-control" value="<?php echo($zip)?>" name="zip" id="fullName">
                                    </div>
                                    <div class="form-group">
                                        <label for=ort>Ort:</label>
                                        <input type="text" class="form-control" value="<?php echo($city)?>" name="city" id="fullName">
                                    </div>
                                    <div class="form-group">
                                        <label for=telefon>Telefon:</label>
                                        <input type="tel" class="form-control" value="<?php echo($telephone)?>" name="telephone" id="fullName">
                                    </div>
                                    <div class="form-group">
                                        <label for=pass>Neues Passwort:</label>
                                        <input type="password" class="form-control"  name="newPassword" id="pass">
                                    </div>
                                    <div class="divider"></div>
                                    <div class="form-group">
                                        <label for=pass>Passwort:</label>
                                        <input type="password" class="form-control" placeholder="Benötigt" name="oldPassword" id="pass" required>
                                    </div>
                                    <input type="checkbox" required>Ich bestätige hiermit das diese Angaben korrekt sind.</input>
                                    <div class="row mt-5">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary btn-block" name="saveBtn">Speichern</button>
                                        </div>
                                        <?php echo($errorMsg)?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="profile-settings-img">
            <div class="more-options">
                <form action="DietAllergien.php">
                    <button type="submit" class="additional-options-btn">Diät und Allergen</button>
                </form>
                <button onclick="document.getElementById('id01').style.display='block'" class="additional-options-btn">Account Löschen</button>
                <button class="additional-options-btn">Datei herunterladen</button>

                <div id="id01" class="modal">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
                    <form class="modal-content" method="post">
                        <div class="container2">
                            <h1>Account Löschen</h1>
                            <p>Sind Sie sich sicher, dass Sie Ihr Konto löschen möchten?</p>

                            <div class="clearfix">
                                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                                <button type="submit" name="deleteBtn" class="deletebtn">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
