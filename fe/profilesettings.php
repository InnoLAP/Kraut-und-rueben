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

    <div class="header">
        <button class="button-profile"><a href="mainpage.php" class="button-profile">Zurück</a></button>
        <div class="header-logo">KRAUT &<br> RÜBEN</div>
        <button class="button-profile">Shopping Cart</button>
    </div>

    <div class="profile-settings-main-div">

            <div class="col-md-9">

                <div class="container content clear-fix">

                    <h2 class="mt-5 mb-5">Profile Settings</h2>

                    <div class="row" style="height:100%">

                        <div class="col-md-9">

                            <div class="container">

                                <form>

                                    <div class="form-group">

                                        <label for=firstName>Vorname</label>
                                        <input type="text" class="form-control" placeholder="%CURRENT_USER_VORNAME%" id="firstName">

                                    </div>

                                    <div class="form-group">

                                        <label for=lastName>Nachname</label>
                                        <input type="text" class="form-control" placeholder="%CURRENT_USER_NACHNAME%" id="lastName">

                                    </div>

                                    <div class="form-group">

                                        <label for=email>Email</label>
                                        <input type="email" placeholder="%CURRENT_USER_EMAIL%" class="form-control" id="email">

                                    </div>
                                    <div class="form-group">

                                        <label for=pass>Passwort</label>
                                        <input type="password" class="form-control" id="pass">

                                    </div>
                                    <div class="form-group ">

                                        <label for=birthday>Geburtsdatum</label>
                                        <input type="date" class="form-control" placeholder="%CURRENT_USER_GEBURTSDATUM%" id="birthday">

                                    </div>

                                    <div class="form-group">

                                        <label for=address>Strasse</label>
                                        <input type="text" class="form-control" placeholder="%CURRENT_USER_STRASSE%" id="fullName">

                                    </div>

                                    <div class="form-group">

                                        <label for=hausnr>Haus Nr</label>
                                        <input type="text" class="form-control" placeholder="%CURRENT_USER_HAUSNR%" id="fullName">

                                    </div>

                                    <div class="form-group">

                                        <label for=plz>PLZ</label>
                                        <input type="text" class="form-control" placeholder="%CURRENT_USER_PLZ%" id="fullName">

                                    </div>

                                    <div class="form-group">

                                        <label for=ort>Ort</label>
                                        <input type="text" class="form-control" placeholder="%CURRENT_USER_ORT%" id="fullName">

                                    </div>

                                    <div class="form-group">

                                        <label for=telefon>Telefon</label>
                                        <input type="text" class="form-control" placeholder="%CURRENT_USER_TELEFON%" id="fullName">

                                    </div>


                                    <div class="row mt-5">

                                        <div class="col">

                                            <button type="button" class="btn btn-primary btn-block">Speichern</button>


                                            <button type="button" class="btn btn-default btn-block">Cancel</button>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        <div class="profile-settings-img"></div>


    </div>


    <?php
?>
</body>
</html>