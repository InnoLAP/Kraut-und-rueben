<?php
    include "functions.php";
    include "dbConnect.php";

    $customerId=2008;
    $errorMsg="";

    session_start();
    if(!isset($_SESSION['customerId'])){
        //If no session exists it means that the user never logged in, redirect to the index page
        //header('location: index.php'); Uncomment when the project is finished
    } else {
        $customerId=$_SESSION['customerId'];
    }

    if(array_key_exists('deleteBtn', $_POST)) {
        DeleteKunde($customerId, $db);
        session_destroy();

        //Redirect
        header('location: index.php');
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
        <form action="profilesettings.php">
            <button type="submit" class="button-profile" >Zurück</button>
        </form>
        <div class="header-logo">KRAUT &<br> RÜBEN</div>
        <button class="button-profile noHover">Diäten & Allergien</button>
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
                                    <label for=plz>Milch:</label>
                                    <input type="checkbox" maxlength="5" class="form-control" value="<?php echo($zip)?>" name="zip" id="fullName">
                                </div>
                                <div class="form-group">
                                    <label for=ort>Fisch:</label>
                                    <input type="checkbox" class="form-control" value="<?php echo($city)?>" name="city" id="fullName">
                                </div>
                                <div class="form-group">
                                    <label for=telefon>Gluten:</label>
                                    <input type="checkbox" class="form-control" value="<?php echo($telephone)?>" name="telephone" id="fullName">
                                </div>
                                <div class="form-group">
                                    <label for=pass>Erdnüsse:</label>
                                    <input type="checkbox" class="form-control"  name="newPassword" id="pass">
                                </div>
                                    <div class="form-group">
                                        <label for=pass>Eier:</label>
                                        <input type="checkbox" class="form-control" placeholder="Benötigt" name="oldPassword" id="pass" required>
                                    </div>
                                <div class="form-group">
                                    <label for=pass>Sellerie:</label>
                                    <input type="checkbox" class="form-control" placeholder="Benötigt" name="oldPassword" id="pass" required>
                                </div>
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
            <form action="profilesettings.php">
                <button class="additional-options-btn">Profile Settings</button>
            </form>
            <button onclick="document.getElementById('id01').style.display='block'" class="additional-options-btn">Account Löschen</button>
            <button class="additional-options-btn">Datei herunterladen</button>

                <div id="id01" class="modal">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
                    <form class="modal-content" method="post">
                        <div class="container2">
                            <h1>Account Löschen</h1>
                            <p>Sind Sie sicher, dass Sie Ihr Konto löschen möchten?</p>

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
