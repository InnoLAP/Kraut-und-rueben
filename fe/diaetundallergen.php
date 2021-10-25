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
        <button class="button-profile">Shopping Cart</button>
    </div>
    <div class="profile-settings-main-div">
        <div class="col-md-9">
            <div class="container content clear-fix">
                <h2 class="mt-5 mb-5">Diät Präferenz</h2>
                <div class="row" style="height:100%">
                    <div class="col-md-9">
                        <div class="container">
                            <form method="post">
                                <div class="form-group">
                                    <label for=firstName>Pescatarian:</label>
                                    <input type="checkbox" class="form-control" value="<?php echo($name)?>" name="name" id="firstName">
                                </div>
                                <div class="form-group">
                                    <label for=lastName>Vegan:</label>
                                    <input type="checkbox" class="form-control" value="<?php echo($surname)?>" name="surname" id="lastName">
                                </div>
                                <div class="form-group">
                                    <label for=email>Low Carb:</label>
                                    <input type="checkbox" value="<?php echo($email)?>" class="form-control" name="email" id="email">
                                </div>
                                <div class="form-group">
                                    <label for=address>Fleisch&Gemüse:</label>
                                    <input type="checkbox" class="form-control" value="<?php echo($street)?>" name="street" id="fullName">
                                </div>
                                <div class="form-group">
                                    <label for=hausnr>Vegetarisch:</label>
                                    <input type="checkbox" class="form-control" value="<?php echo($houseNr)?>" name="houseNr" id="fullName">
                                </div>
                                <h2 class="mt-5 mb-5">Allergen Präferenz</h2>
                                <div class="form-group">
                                    <label for=plz>PLZ:</label>
                                    <input type="checkbox" maxlength="5" class="form-control" value="<?php echo($zip)?>" name="zip" id="fullName">
                                </div>
                                <div class="form-group">
                                    <label for=ort>Ort:</label>
                                    <input type="checkbox" class="form-control" value="<?php echo($city)?>" name="city" id="fullName">
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
            <button type="submit" class="additional-options-btn">Profile Settings</button>
            <button onclick="document.getElementById('id01').style.display='block'" class="additional-options-btn">Account Löschen</button>
            <button type="submit" class="additional-options-btn">Datei herunterladen</button>

                <div id="id01" class="modal">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
                    <form class="modal-content" action="/action_page.php">
                        <div class="container2">
                            <h1>Account Löschen</h1>
                            <p>Sind Sie sicher, dass Sie Ihr Konto löschen möchten?</p>

                            <div class="clearfix">
                                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="deletebtn">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
