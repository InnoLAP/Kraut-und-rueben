<!DOCTYPE HTML>
<html lang="en">
    <head>
    </head>
    <body>
        <?php
            include "functions.php";
            include "dbConnect.php";
            
            //$command=ZutatAlle();
            //$command=RezeptAlle();
            
            $diets=[1,2];
            $allergies=[1,2];
            //$command=ZutatFilter($diets, $allergies);
            //$command=RezeptFilter($diets, $allergies);

            $zutaten=[5001, 5002];
            //$command=ZutatenID($zutaten);

            $customerId=2001;
            //$command=DeleteCustomer($customerId);

            $rezeptId=1;
            //$command=ZutatenRezept($rezeptId);

            $result=contactDb($db, $command);
            echo "<br><br><br>";
            echo $command;
        ?>
    </body>
</html>
