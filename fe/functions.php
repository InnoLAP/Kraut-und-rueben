<?php
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

    //Retrun every ZUTAT
    function ZutatAlle(){
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
    function ZutatenRezept($rezeptId){

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
    function DeleteCustomer($customerId) {
        $sql= 
            "UPDATE KUNDE
                SET EMAIL=null,
                    ORT=null,
                    PLZ=null,
                    GEBURTSDATUM=null,
                    TELEFON=null,
                    PASSWORT=null,
                    STRASSE=null,
                    HAUSNR=null
                WHERE KUNDENNR={$customerId}";
        return $sql;
    }
?>