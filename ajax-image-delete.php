<?php

require_once("connection.php");

if(!empty($_POST["path"])){

    unlink($_POST["path"]);

if(unlink($_POST["path"])){
    echo "data deleted";
}
}

?>
