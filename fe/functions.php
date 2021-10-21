<?php
    //All passwords for customers are SHA1('123')

    //Return every ZUTAT allowed for selected ALLERGIES & DIÄTEN
    function ZutatFilter($diets, $allergies) {

        $dietArgs = "";
        $allergieArgs = "";

        for($i=0;$i<count($diets);$i++){
            if($i!=0){
                $dietArgs.=' OR ';
            }
            else {
                $dietArgs.='WHERE ';
            }
            $dietArgs.="DIETZUTAT.DIETNR = {$diets[$i]}";
        }

        for($i=0;$i<count($allergies);$i++){
            if($i!=0){
                $allergieArgs.=' OR ';
            }
            else {
                $allergieArgs.='WHERE ';
            }
            $allergieArgs.="ALLERGIEZUTAT.ALLERGIENR = {$allergies[$i]}";
        }

        $sql=
            "SELECT * from
            (SELECT
                ZUTAT.ZUTATENNR,
                ZUTAT.BEZEICHNUNG,
                 ZUTAT.EINHEIT,
                 ZUTAT.NETTOPREIS,
                 ZUTAT.BESTAND,
                 ZUTAT.LIEFERANT,
                 ZUTAT.KALORIEN,
                 ZUTAT.KOHLENHYDRATE,
                 ZUTAT.PROTEIN
            FROM ZUTAT
            LEFT JOIN
                (SELECT DISTINCT ALLERGIEZUTAT.ZUTATENNR
                 FROM ALLERGIEZUTAT
                 {$allergieArgs}) AS tTemp
            ON ZUTAT.ZUTATENNR = tTemp.ZUTATENNR
            WHERE tTemp.ZUTATENNR IS null) as t2Temp
        LEFT JOIN
            (SELECT
                ZUTAT.ZUTATENNR,
                ZUTAT.BEZEICHNUNG,
                 ZUTAT.EINHEIT,
                 ZUTAT.NETTOPREIS,
                 ZUTAT.BESTAND,
                 ZUTAT.LIEFERANT,
                 ZUTAT.KALORIEN,
                 ZUTAT.KOHLENHYDRATE,
                 ZUTAT.PROTEIN
            FROM ZUTAT
            LEFT JOIN
                (SELECT DISTINCT DIETZUTAT.ZUTATENNR
                 FROM DIETZUTAT
                 {$dietArgs}) AS tTemp
            ON ZUTAT.ZUTATENNR = tTemp.ZUTATENNR
            WHERE tTemp.ZUTATENNR IS null) as t3Temp
        ON t2Temp.BEZEICHNUNG = t3Temp.BEZEICHNUNG
        WHERE t2Temp.BEZEICHNUNG IS NOT null AND t3Temp.BEZEICHNUNG IS NOT null";

        return $sql;
    }

    //Return every ZUTAT
    function ZutatAlle() {
        return "SELECT * FROM ZUTAT";
    }

    //Return every REZEPT allowed for selected ALLERGIES & DIÄTEN
    function RezeptFilter($diets, $allergies) {
        $dietArgs = "";
        $allergieArgs = "";

        for($i=0;$i<count($diets);$i++){
            if($i!=0){
                $dietArgs.=' OR ';
            }
            else {
                $dietArgs.='WHERE ';
            }
            $dietArgs.="DIETREZEPTE.DIETNR = {$diets[$i]}";
        }

        for($i=0;$i<count($allergies);$i++){
            if($i!=0){
                $allergieArgs.=' OR ';
            }
            else {
                $allergieArgs.='WHERE ';
            }
            $allergieArgs.="ALLERGIEREZEPTE.ALLERGIENR = {$allergies[$i]}";
        }

        $sql=
            "SELECT * from
            (SELECT
                REZEPTE.REZEPTNR,
                REZEPTE.REZEPTNAME,
                 REZEPTE.REZEPTLINK
            FROM REZEPTE
            LEFT JOIN
                (SELECT DISTINCT ALLERGIEREZEPTE.REZEPTNR
                 FROM ALLERGIEREZEPTE
                 {$allergieArgs}) AS tTemp
            ON REZEPTE.REZEPTNR = tTemp.REZEPTNR
            WHERE tTemp.REZEPTNR IS null) as t2Temp
        LEFT JOIN
            (SELECT
                REZEPTE.REZEPTNR,
                REZEPTE.REZEPTNAME,
                 REZEPTE.REZEPTLINK
            FROM REZEPTE
            LEFT JOIN
                (SELECT DISTINCT DIETREZEPTE.REZEPTNR
                 FROM DIETREZEPTE
                 {$dietArgs}) AS tTemp
            ON REZEPTE.REZEPTNR = tTemp.REZEPTNR
            WHERE tTemp.REZEPTNR IS null) as t3Temp
        ON t2Temp.REZEPTNAME = t3Temp.REZEPTNAME
        WHERE t2Temp.REZEPTNAME IS NOT null AND t3Temp.REZEPTNAME IS NOT null";

        return $sql;
    }

    //Return every REZEPT
    function RezeptAlle() {
        return "SELECT * FROM REZEPTE";
    }

    //Return every ZUTAT with these ID's
    function ZutatenID($idArray) {

        $zutatArgs = "";

        for($i=0;$i<count($idArray);$i++){
            if($i!=0){
                $zutatArgs.=' OR ';
            }
            else {
                $zutatArgs.='WHERE ';
            }
            $zutatArgs.="ZUTAT.ZUTATENNR = {$idArray[$i]}";
        }

        $sql="SELECT * FROM ZUTAT {$zutatArgs}";
        return $sql;
    }

    //Return evry ZUTAT within a REZEPT
    function ZutatenRezept($rezeptId) {

        $sql=
            "SELECT
                ZUTAT.ZUTATENNR,
                ZUTAT.BEZEICHNUNG,
                ZUTAT.KALORIEN,
                ZUTAT.KOHLENHYDRATE,
                ZUTAT.PROTEIN,
                REZEPTEZUTAT.MENGE
            FROM ZUTAT
            JOIN REZEPTEZUTAT
                ON ZUTAT.ZUTATENNR = REZEPTEZUTAT.ZUTATENNR AND REZEPTEZUTAT.REZEPTNR = {$rezeptId}";

        return $sql;
    }

    //This will delete everything regarding a costomer except for his name for tax reasons
    function DeleteKunde($customerId, $db) {
        $sqlCheck = "SELECT * FROM BESTELLUNG WHERE KUNDENNR = {$customerId}";

        $checkResult = contactDb($db, $sqlCheck);

        if($checkResult -> num_rows == 0){
            $sql = "DELETE FROM KUNDE WHERE KUNDENNR = {$customerId}";
        } else {
            $sql = 
                "UPDATE KUNDE
                    SET EMAIL=null,
                        GEBURTSDATUM=null,
                        TELEFON=null,
                        PASSWORT=null
                    WHERE KUNDENNR={$customerId}";
        }

        echo $sql;
        
        return $sql;
    }

    //Returns all DIET
    function DietAlle() {
        $sql="SELECT * FROM DIET";

        return $sql;
    }

    //Returns all ALLERGIE
    function AllergieAlle() {
        $sql="SELECT * FROM ALLERGIE";

        return $sql;
    }

    //Returns the data of a customer
    function DatenKunde($customerId) {
        $sql="SELECT * FROM KUNDE WHERE KUNDENNR={$customerId}";
        return $sql;
    }

    //Returns the diets of a customer
    function DietKunde($customerId) {
        $sql="SELECT * FROM KUNDEDIET WHERE KUNDENNR={$customerId}";
        return $sql;
    }

    //Returns the allergies of a customer
    function AllergieKunde($customerId) {
        $sql="SELECT * FROM KUNDEALLERGIE WHERE KUNDENNR={$customerId}";
        return $sql;
    }

    //Checks if a email & password exist and returning true/false
    function CheckLogin($email, $password, $db) {

        $sql = "SELECT * FROM KUNDE WHERE EMAIL = '{$email}' AND PASSWORT = SHA1('{$password}')";

        echo $sql;

        $sql=contactDb($db, $sql);

        if($sql -> num_rows == 0){
            return false;
        } else {
            return true;
        }
    }

    //Adds a customer to the KUNDE table (returns false if email already exists, birthday HAS to be "YYYY-MM-DD")
    function AddKunde($name, $surname, $birthday, $password, $street, $house, $zip, $city, $phone, $email) {
        $sql=
            "INSERT INTO KUNDE
                (NACHNAME, VORNAME, GEBURTSDATUM, PASSWORT, STRASSE, HAUSNR, PLZ, ORT, TELEFON, EMAIL) VALUE
                ('{$surname}', '{$name}', '{$birthday}', SHA1('{$password}'), '{$street}', '{$house}', '{$zip}', '{$city}', '{$phone}', '{$email}')";
        
        return $sql;
    }

    //Updates a customer in the KUNDE table (returns false if the KUNDENNR doesnt exist or the new email already exists)
    function UpdateKunde($customerId, $name, $surname, $password, $street, $house, $zip, $city, $phone, $email) {

        $args="";

        $args.="VORNAME='{$name}',";
        $args.="NACHNAME='{$surname}',";
        $args.="PASSWORT=SHA1('{$password}'),";
        $args.="STRASSE='{$street}',";
        $args.="HAUSNR='{$house}',";
        $args.="PLZ='{$zip}',";
        $args.="ORT='{$city}',";
        $args.="TELEFON='{$phone}',";
        $args.="EMAIL='{$email}'";

        $sql=
            "UPDATE KUNDE
                SET {$args}
                WHERE KUNDENNR={$customerId}";

        return $sql;
    }

    //Update the selected diets for a customer
    function AddDiet($customerId, $arrayDiet, $db) {
        $sql="DELETE FROM KUNDEDIET WHERE KUNDENNR = {$customerId}";

        contactDb($db, $sql);

        $sql="";

        for($i=0;$i<count($arrayDiet);$i++){
            $sql .= "INSERT IGNORE INTO KUNDEDIET (KUNDENNR, DIETNR) VALUES ({$customerId}, {$arrayDiet[$i]});";
        }
        return $sql;
    }

    //Update the selected allergies for a customer
    function AddAllergie($customerId, $arrayAllergie, $db) {
        $sql="DELETE FROM KUNDEALLERGIE WHERE KUNDENNR = {$customerId}";

        contactDb($db, $sql);

        $sql="";

        for($i=0;$i<count($arrayAllergie);$i++){
            $sql .= "INSERT IGNORE INTO KUNDEALLERGIE (KUNDENNR, ALLERGIENR) VALUES ({$customerId}, {$arrayAllergie[$i]});";
        }
        return $sql;
    }

    //Returns all REZEPTE where there is X or less ZUTATEN needed
    function RezepteZutatenCount($zutatenAnzahl) {
        $sql = "SELECT * FROM REZEPTE WHERE REZEPTZUTATENANZAHL <= {$zutatenAnzahl}";

        return $sql;
    }
?>