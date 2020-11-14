<?php

include "config.php";    

if(isset($_GET['collect'])){
    $machine_id = strip_tags(mysqli_real_escape_string($mysqli,$_GET['machine_id']));
    if(preg_match("/^[a-f0-9]+$/", $machine_id)){
    // string only contain the a to z , A to Z, 0 to 9
        if(strlen($machine_id) == 32){
            mysqli_query($mysqli,"INSERT INTO stats SET stat_machine_id = '$machine_id', stat_timestamp = NOW()");
        }
    }
}

?>