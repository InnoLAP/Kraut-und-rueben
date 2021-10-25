<?php
    $db = mysqli_connect("localhost","root","","krautundrueben");

    if(!$db)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    function contactDb($db, $command){

        $send = mysqli_query($db, $command);

        echo(mysqli_error($db));
        return $send;
    }

    function closeDb($db) {
        mysqli_close($db);
    }

?>