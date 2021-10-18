<!DOCTYPE HTML>
<html lang="en">
    <head>
    </head>
    <body>
        <?php
            $diet=[1,2];
            $command=test($diet);
            $result=contactDb($command);
            echo "<br><br><br>";
            echo $command;
        ?>
    </body>
</html>

<?php
    function test($diets) {

        $commandArgs = "";

        for($i=0;$i<count($diets);$i++){
            if($i!=0){
                $commandArgs.=' OR ';
            }
            else {
                $commandArgs.='WHERE ';
            }
            $commandArgs.="DIETZUTAT.DIETNR = {$diets[$i]}";
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
            LEFT JOIN
                (SELECT DISTINCT DIETZUTAT.ZUTATENNR
                FROM DIETZUTAT
                {$commandArgs}) AS tTemp
            ON ZUTAT.ZUTATENNR = tTemp.ZUTATENNR
            WHERE tTemp.ZUTATENNR IS null";
        return $sql;
    }

    function contactDb($command){
        include "dbConnect.php";

        $send = mysqli_query($db,$command);

        if ($send->num_rows > 0) {
            echo "<table>"; // start a table tag in the HTML

            while($row = $send->fetch_assoc()){   //Creates a loop to loop through results
                echo "<tr><td>" . $row['ZUTATENNR'] . "</td><td>" . $row['BEZEICHNUNG'] . "</td></tr>";  //$row['index'] the index here is a field name
            }

            echo "</table>";
          } else {
            echo "0 results";
          }

        mysqli_close($db);

        return $send;
    }
?>
