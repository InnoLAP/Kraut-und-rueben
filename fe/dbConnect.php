<?php
    $db = mysqli_connect("localhost","root","","krautundrueben");

    if(!$db)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    function contactDb($db, $command){

        $send = mysqli_query($db,$command);

        mysqli_close($db);

        return $send;
    }

?>