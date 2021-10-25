<?php
    //All passwords for customers are SHA1('123')

    //Return every ZUTAT allowed for selected ALLERGIES & DIÄTEN
    function ZutatFilter($diets, $allergies, $nameString, $id) {

        $dietArgs = "";
        $dietWhere = "";
        $allergieArgs = "";
        $allergieWhere = "";
        $idWhere = "";
        $nameWhere = "";

        if($diets){
            $dietWhere="t2Temp.ZUTATENNR IS null AND ";
        }

        if($allergies){
            $allergieWhere="tTemp.ZUTATENNR IS null AND ";
        }

        if($nameString){
            $nameWhere="(BEZEICHNUNG REGEXP '{$nameString}') AND ";
        }

        if($id){
            $idWhere="ZUTAT.ZUTATENNR = {$id} AND ";
        }

        if($diets){
            for($i=0;$i<count($diets);$i++){
                if($i!=0){
                    $dietArgs.=' OR ';
                }
                else {
                    $dietArgs.="LEFT JOIN (SELECT DISTINCT DIETZUTAT.ZUTATENNR FROM DIETZUTAT WHERE ";
                }
                $dietArgs.="DIETZUTAT.DIETNR = {$diets[$i]}";
            }
            $dietArgs.=") AS t2Temp ON ZUTAT.ZUTATENNR = t2Temp.ZUTATENNR";
        }

        if($allergies){
            for($i=0;$i<count($allergies);$i++){
                if($i!=0){
                    $allergieArgs.=' OR ';
                }
                else {
                    $allergieArgs.="LEFT JOIN (SELECT DISTINCT ALLERGIEZUTAT.ZUTATENNR FROM ALLERGIEZUTAT WHERE ";
                }
                $allergieArgs.="ALLERGIEZUTAT.ALLERGIENR = {$allergies[$i]}";
            }
            $allergieArgs.=") AS tTemp ON ZUTAT.ZUTATENNR = tTemp.ZUTATENNR";
        }

        $sql=
            "SELECT
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
            {$allergieArgs}
            {$dietArgs}
            WHERE {$dietWhere}{$allergieWhere}{$nameWhere}{$idWhere}1=1";

        return $sql;
    }

    //Return every ZUTAT
    function ZutatAlle() {
        return "SELECT * FROM ZUTAT";
    }

    //Return every REZEPT allowed for selected ALLERGIES & DIÄTEN
    function RezeptFilter($diets, $allergies, $nameString, $id, $count) {
        $dietArgs = "";
        $dietWhere = "";
        $allergieArgs = "";
        $allergieWhere = "";
        $idWhere = "";
        $nameWhere = "";
        $countWhere = "";

        if($diets){
            $dietWhere="t2Temp.REZEPTNR IS null AND ";
        }

        if($allergies){
            $allergieWhere="tTemp.REZEPTNR IS null AND ";
        }

        if($nameString){
            $nameWhere="(REZEPTNAME REGEXP '{$nameString}') AND ";
        }

        if($id){
            $idWhere="REZEPTE.REZEPTNR = {$id} AND ";
        }

        if($count){
            $countWhere="REZEPTE.REZEPTZUTATENANZAHL <= {$count} AND ";
        }

        if($diets){
            for($i=0;$i<count($diets);$i++){
                if($i!=0){
                    $dietArgs.=' OR ';
                }
                else {
                    $dietArgs.="LEFT JOIN (SELECT DISTINCT DIETREZEPTE.REZEPTNR FROM DIETREZEPTE WHERE ";
                }
                $dietArgs.="DIETREZEPTE.DIETNR = {$diets[$i]}";
            }
            $dietArgs.=") AS t2Temp ON REZEPTE.REZEPTNR = t2Temp.REZEPTNR";
        }

        if($allergies){
            for($i=0;$i<count($allergies);$i++){
                if($i!=0){
                    $allergieArgs.=' OR ';
                }
                else {
                    $allergieArgs.="LEFT JOIN (SELECT DISTINCT ALLERGIEREZEPTE.REZEPTNR FROM ALLERGIEREZEPTE WHERE ";
                }
                $allergieArgs.="ALLERGIEREZEPTE.ALLERGIENR = {$allergies[$i]}";
            }
            $allergieArgs.=") AS tTemp ON REZEPTE.REZEPTNR = tTemp.REZEPTNR";
        }

        $sql=
            "SELECT
                REZEPTE.REZEPTNR,
                REZEPTE.REZEPTNAME,
                REZEPTE.REZEPTLINK,
                REZEPTE.REZEPTZUTATENANZAHL,
                REZEPTE.PORTIONENANZAHL
            FROM REZEPTE
            {$allergieArgs}
            {$dietArgs}
            WHERE {$dietWhere}{$allergieWhere}{$nameWhere}{$idWhere}{$countWhere}1=1";

        return $sql;
    }

    //Return every REZEPT
    function RezeptAlle() {
        return "SELECT * FROM REZEPTE";
    }

    //Return every ZUTAT with these ID's
    function ZutatenID($idArray, $db) {

        $zutatArgs = "WHERE ";
        $firstBool=true;

        foreach ($idArray as $key => $value) {
            if(!$firstBool) {
                $zutatArgs.=' OR ';
            }

            $firstBool=false;
            $zutatArgs.="ZUTAT.ZUTATENNR = {$key}";
        }

        $sql="SELECT * FROM ZUTAT {$zutatArgs}";

        $sql=contactDb($db, $sql);
        return $sql;
    }

    //Return every REZEPT with these ID's
    function RezepteID($idArray, $db) {

        $rezeptArgs = "WHERE ";
        $firstBool=true;

        foreach ($idArray as $key => $value) {
            if(!$firstBool) {
                $rezeptArgs.=' OR ';
            }

            $firstBool=false;
            $rezeptArgs.="REZEPTE.REZEPTNR = {$key}";
        }

        $sql="SELECT * FROM REZEPTE {$rezeptArgs}";

        $sql=contactDb($db, $sql);
        return $sql;
    }

    //Return evry ZUTAT within a REZEPT
    function ZutatenRezept($rezeptId, $db) {

        $sql=
            "SELECT
                ZUTAT.ZUTATENNR,
                REZEPTEZUTAT.MENGE
            FROM ZUTAT
            JOIN REZEPTEZUTAT
                ON ZUTAT.ZUTATENNR = REZEPTEZUTAT.ZUTATENNR AND REZEPTEZUTAT.REZEPTNR = {$rezeptId}";

        $sql=contactDb($db, $sql);
        return $sql;
    }

    //Returns the total price of a recipe
    function RezeptPreis($recipeId, $db) {
        $sql=
            "SELECT
	            SUM(ZUTAT.NETTOPREIS*REZEPTEZUTAT.MENGE) as total
            FROM ZUTAT
            JOIN REZEPTEZUTAT
	            ON ZUTAT.ZUTATENNR = REZEPTEZUTAT.ZUTATENNR AND REZEPTEZUTAT.REZEPTNR = {$recipeId}";

        $sql=contactDb($db, $sql);

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
        $sql = "SELECT * FROM KUNDE WHERE KUNDENNR={$customerId}";
        return $sql;
    }

    //Returns the diets of a customer
    function DietKunde($customerId, $db) {
        $sql = "SELECT * FROM KUNDEDIET WHERE KUNDENNR={$customerId}";
        $sql=contactDb($db, $sql);
        return $sql;
    }

    //Returns the allergies of a customer
    function AllergieKunde($customerId, $db) {
        $sql = "SELECT * FROM KUNDEALLERGIE WHERE KUNDENNR={$customerId}";
        $sql=contactDb($db, $sql);
        return $sql;
    }

    //Checks if a email & password exist and returning true/false
    function CheckLogin($email, $password, $db) {

        $sql = "SELECT * FROM KUNDE WHERE EMAIL = '{$email}' AND PASSWORT = SHA1('{$password}')";

        $sql=contactDb($db, $sql);

        if($sql -> num_rows == 0){
            return false;
        } else {
            return $sql;
        }
    }

    //Checks if the password is correct
    function CheckPassword($customerId, $password, $db) {

        $sql = "SELECT * FROM KUNDE WHERE KUNDENNR = '{$customerId}' AND PASSWORT = SHA1('{$password}')";

        $sql=contactDb($db, $sql);

        if($sql -> num_rows == 0){
            return false;
        } else {
            return true;
        }
    }

    //Checks if a Email is already in use
    function CheckEmail($customerId, $email, $db) {
        $sql = "SELECT * FROM KUNDE WHERE KUNDENNR != '{$customerId}' AND EMAIL = '{$email}'";

        $sql=contactDb($db, $sql);

        if(!$sql or $sql -> num_rows == 0){
            return true;
        } else {
            return false;
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
        if(!($password==null)){
            $args.="PASSWORT=SHA1('{$password}'),";
        }
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