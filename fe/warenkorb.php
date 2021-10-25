<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Kraut und Rüben</title>
    <link rel="stylesheet" href="scss/sharedStyles.scss">
    <link rel="stylesheet" href="scss/warenkorbStyles.scss">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">

</head>
<body>

    <div class="header">
        <form action="profilesettings.php">
            <button type="submit" class="button-profile">Profile Settings</button>
        </form>
        <div class="header-logo">KRAUT &<br> RÜBEN</div>
        <form action="warenkorb.php">
            <button class="button-profile">Shopping Cart</button>
        </form>
    </div>

    <div class="order-boxes">
        <h1>Warenkorb</h1>
        <div class="ingredients-box">
            <table>
                <thead>
                    <tr>
                        <th>Bezeichnung</th>
                        <th>Preis</th>
                        <th>Kalorien</th>
                        <th>Kohlenhydrate</th>
                        <th>Proteine</th>
                        <th>Anzahl</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <form method="post">
                            <td>test</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="delete-ingredient-btn"><button class="delete-ingredient-btn">Entfernen</button></td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="recipes-box">
            <table>
                <thead>
                <tr>
                    <th>Rezepte</th>
                    <th>Portionen</th>
                    <th>Link</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <form method="post">
                        <td>salada de alface com molho</td>
                        <td></td>
                        <td><a>hier</a></td>
                        <td class="delete-ingredient-btn"><button class="delete-ingredient-btn">Entfernen</button></td>
                    </form>
                </tr>
                </tbody>
            </table>
        </div>

        <button class="cta-buy-btn">Jetzt kaufen</button>
    </div>

</body>
</html>