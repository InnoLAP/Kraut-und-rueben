<?php
    include "functions.php";
    include "dbConnect.php";

    $errorMsg="";

    $i=0;
    $allergieEcho="";
    $dietEcho="";

    session_start();
    if(!isset($_SESSION['customerId'])){
        //If no session exists it means that the user never logged in, redirect to the index page
        header('location: index.php');
    } else {
        $customerId=$_SESSION['customerId'];
    }

    if(array_key_exists('saveBtn', $_POST)) {
        $allergieArray=array();
        $dietArray=array();

        if(isset($_POST["allergieArray"])){
            $allergieArrayResult = $_POST["allergieArray"];

            foreach ($allergieArrayResult as $key => $value) {
                array_push($allergieArray, $key);
            }

            AddAllergie($customerId, $allergieArray, $db);

        } else {
            AddAllergie($customerId, $allergieArray, $db);
        }

        if(isset($_POST["dietArray"])){
            $dietArrayResult = $_POST["dietArray"];

            foreach ($dietArrayResult as $key => $value) {
                array_push($dietArray, $key);
            }

            AddDiet($customerId, $dietArray, $db);

        } else {
            AddDiet($customerId, $dietArray, $db);
        }

        $_SESSION['customerAllergies'] = $allergieArray;
		$_SESSION['customerDiets'] = $dietArray;

        $errorMsg='<p class="saved">Gespeichert!</p>';
    }

    if(array_key_exists('deleteBtn', $_POST)) {
        DeleteKunde($customerId, $db);
        session_destroy();

        //Redirect
        header('location: index.php');
    }

    $allergies=AllergieAlle($db);

    while($row = $allergies->fetch_assoc()){
        $allergieEcho.=
            '<div class="form-group">
                <label for=plz>'.$row["ALLERGIENAME"].':</label>
                <input type="checkbox" maxlength="5" class="form-control checker" name="allergieArray['.$row["ALLERGIENR"].']" id="fullName">
            </div>'
        ;
    }

    $i=0;
    $diets=DietAlle($db);

    while($row = $diets->fetch_assoc()){
        $dietEcho.=
            '<div class="form-group">
                <label for=plz>'.$row["DIETNAME"].':</label>
                <input type="checkbox" maxlength="5" class="form-control checker" value="false" name="dietArray['.$row["DIETNR"].']" id="fullName">
            </div>'
        ;
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
                                <?php
                                    echo($dietEcho);
                                ?>
                                <h2 class="mt-5 mb-5">Allergen Präferenz</h2>
                                <?php
                                    echo($allergieEcho);
                                ?>
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
